<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\InventoryTrait;
use App\Http\Requests\StoreOfferRequest;
use App\Models\Offer;
use App\Models\OfferDetail;
use App\Models\Purchasing;
use App\Models\PurchasingDetail;
use App\Models\Selling;
use App\Models\Supply;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OfferController extends Controller
{
    use InventoryTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('offer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Offer::with(['supplier', 'offer_details']);

            if (Gate::allows('actor_supplier') && Gate::denies('actor_admin')) {
                $query->where('supplier_id', Auth::id());
            }

            $query->select(sprintf('%s.*', (new Offer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'offer_show';
                $editGate = 'offer_edit';
                $deleteGate = 'offer_delete';
                $crudRoutePart = 'offers';

                return view('_partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('supplier_name', function ($row) {
                return $row->supplier ? $row->supplier->name : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Offer::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('grand_total', function ($row) {
                return $row->grand_total ? $row->grand_total : '';
            });
            $table->editColumn('offer_detail', function ($row) {
                $labels = [];
                foreach ($row->offer_details as $offer_detail) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $offer_detail->quantity);
                }

                return implode(' ', $labels);
            });

            $table->editColumn('offering_number', function ($row) {
                return $row->offering_number ? $row->offering_number : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'supplier', 'offer_detail']);

            return $table->make(true);
        }

        $users = User::get();
        $offer_details = OfferDetail::get();

        return view('content.admin.offers.index', compact('users', 'offer_details'));
    }

    public function create()
    {
        abort_if(Gate::denies('offer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supplies = Supply::with('product')->where('status', 'enabled')->get();

        $offer_details = OfferDetail::pluck('quantity', 'id');

        return view('content.admin.offers.create', compact('offer_details', 'suppliers', 'supplies'));
    }

    public function store(StoreOfferRequest $request)
    {
        $createdOfferDetails = null;
        foreach ($request->offer_details as $offer_detail) {
            $createOffer = OfferDetail::create([
                'quantity' => $offer_detail['quantity'],
                'price_offer' => $offer_detail['price_offer'],
                'price_deal' => 0,
                'supply_id' => $offer_detail['supply_id'],
            ]);

            if ($createOffer) {
                $createdOfferDetails[] = $createOffer->id;
            }
        }

        $offer = Offer::create([
            'supplier_id' => Auth::id(),
            'status' => 'on_progress',
            'grand_total' => 0,
            'offering_expired_date' => Carbon::now()->addMonth()->format('Y-m-d H:i:s'),
            'offering_number' => Str::random(10),
        ]);

        $offer->offer_details()->sync($createdOfferDetails);

        return redirect()->route('admin.offers.index');
    }

    public function update(Request $request, Offer $offer)
    {
        $offer->load('offer_details');
        if ($request->has('action_type')) {
            if ($request->action_type == 'accept-deal') {
                if (Gate::allows('actor_supplier')) {
                    if ($offer->status == 'on_progress') {
                        $offer->update([
                            'status' => 'accepted_by_supplier'
                        ]);
                    }
                } else if (Gate::allows('actor_admin')) {
                    if ($offer->status == 'accepted_by_supplier') {

                        $purchasing = [
                            'batch_code' => Str::random(10),
                            'notes' => null,
                            'additional_cost' => 0,
                            'price_discounts' => 0,
                            'supplier_id' => $offer->supplier_id,
                            'status' => 'waiting_payment',
                            'grand_total' => 0,
                            'purchasing_transaction_number' => 'PRO-' . date('YmdHis'),
                        ];

                        $purchasingDetail = null;
                        foreach ($request->all() as $index => $item) {
                            if (str_contains($index, 'price_offer')) {
                                $price_with_id = explode('#', $index);
                                $offerDetail = OfferDetail::with('supply', 'supply.product')
                                    ->where('id', $price_with_id[1])->first();

                                if ($offerDetail) {
                                    $offerDetail->update([
                                        'price_deal' => $item
                                    ]);

                                    $this->appending_invent(
                                        $offerDetail->quantity,
                                        $offerDetail->supply->product,
                                        $offerDetail,
                                        'in'
                                    );

                                    $purchasingDetail[] = $offerDetail;
                                }
                            }
                        }

                        $offer->update([
                            'status' => 'done'
                        ]);

                        // purchasing
                        $purchasingDetailCreated = [];
                        foreach ($purchasingDetail as $item) {
                            $purchasing['grand_total'] += $item->price_deal;
                            $created = PurchasingDetail::create([
                                'subtotal' => $item->price_deal,
                                'quantity' => $item->quantity,
                                'product_id' => $item->supply->product_id,
                            ]);

                            $purchasingDetailCreated[] = $created->id;
                        }

                        $purchasing['rounding_cost'] = $purchasing['grand_total'];
                        $purchasingCreate = Purchasing::create($purchasing);

                        if ($purchasingCreate) {
                            $purchasingCreate->purchasing_details()->sync($purchasingDetailCreated);
                        }
                    }
                }

            } else if ($request->action_type == 'negotiation') {
                foreach ($request->all() as $index => $item) {
                    if (str_contains($index, 'price_offer')) {

                        $price_with_id = explode('#', $index);
                        $offerDetail = OfferDetail::with('supply')
                            ->where('id', $price_with_id[1])->first();

                        $offerDetail?->update([
                            'price_offer' => $item
                        ]);
                    }
                }
            }

            return redirect()->route('admin.offers.show', $offer->id)->with('success', 'Success updating offers.');
        }

        return redirect()->route('admin.offers.show', $offer->id)->with('errors', 'Something went wrong.');
    }

    public function show(Offer $offer)
    {
        abort_if(Gate::denies('offer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->load('supplier', 'offer_details', 'offer_details.supply');

        return view('content.admin.offers.show', compact('offer'));
    }

    public function destroy(Offer $offer)
    {
        abort_if(Gate::denies('offer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->delete();

        return back();
    }

}
