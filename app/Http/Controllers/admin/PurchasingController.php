<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\InventoryTrait;
use App\Http\Controllers\traits\LedgerTrait;
use App\Models\Offer;
use App\Models\OfferDetail;
use App\Models\Purchasing;
use App\Models\PurchasingDetail;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchasingController extends Controller
{
    use LedgerTrait, InventoryTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('purchasing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Purchasing::with(['supplier', 'purchasing_details'])->select(sprintf('%s.*', (new Purchasing)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->addColumn('mark', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'purchasing_show';
                $editGate = 'purchasing_edit_disabled';
                $deleteGate = 'purchasing_delete_disabled';
                $crudRoutePart = 'purchasings';

                return view('_partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('mark', function ($row) {
                return view('content.admin.purchasings._partials.markDone', compact(
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('batch_code', function ($row) {
                return $row->batch_code ? $row->batch_code : '';
            });
            $table->editColumn('grand_total', function ($row) {
                return $row->grand_total ? $row->grand_total : '';
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->editColumn('rounding_cost', function ($row) {
                return $row->rounding_cost ? $row->rounding_cost : '';
            });
            $table->editColumn('additional_cost', function ($row) {
                return $row->additional_cost ? $row->additional_cost : '';
            });
            $table->editColumn('price_discounts', function ($row) {
                return $row->price_discounts ? $row->price_discounts : '';
            });
            $table->addColumn('supplier_name', function ($row) {
                return $row->supplier ? $row->supplier->name : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Purchasing::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('purchasing_detail', function ($row) {
                $labels = [];
                foreach ($row->purchasing_details as $purchasing_detail) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $purchasing_detail->subtotal);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('purchasing_transaction_number', function ($row) {
                return $row->purchasing_transaction_number ? $row->purchasing_transaction_number : '';
            });
            $table->editColumn('purchasing_rel_number', function ($row) {
                return $row->purchasing_rel_number ? $row->purchasing_rel_number : '';
            });

            $table->rawColumns(['actions', 'mark', 'placeholder', 'supplier', 'purchasing_detail']);

            return $table->make(true);
        }

        $users = User::get();
        $purchasing_details = PurchasingDetail::get();

        return view('content.admin.purchasings.index', compact('users', 'purchasing_details'));
    }

    public function show(Purchasing $purchasing)
    {
        abort_if(Gate::denies('purchasing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasing->load('supplier', 'purchasing_details');

        return view('content.admin.purchasings.show', compact('purchasing'));
    }

    public function markDone(Request $request, Purchasing $purchasing)
    {
        abort_if(Gate::denies('purchasing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasing->update([
            'status' => 'confirmed'
        ]);

        $this->appending_ledger($purchasing->grand_total, $purchasing, $purchasing->purchasing_transaction_number);


        $offers = Offer::with('offer_details')->where('offering_number', $purchasing->purchasing_rel_number)
            ->first();

        if ($offers) {
            foreach ($offers->offer_details as $offerDetail) {
                $this->appending_invent(
                    $offerDetail->quantity,
                    $offerDetail->supply->product,
                    $offerDetail,
                    'in'
                );
            }
        }

        return redirect()->route('admin.purchasings.index');
    }

}
