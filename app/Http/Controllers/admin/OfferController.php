<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOfferRequest;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use App\Models\OfferDetail;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('offer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Offer::with(['supplier', 'offer_details'])->select(sprintf('%s.*', (new Offer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'offer_show';
                $editGate      = 'offer_edit';
                $deleteGate    = 'offer_delete';
                $crudRoutePart = 'offers';
                $otherCan = true;

                return view('_partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'otherCan',
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

        $users         = User::get();
        $offer_details = OfferDetail::get();

        return view('content.admin.offers.index', compact('users', 'offer_details'));
    }

    public function create()
    {
        abort_if(Gate::denies('offer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offer_details = OfferDetail::pluck('quantity', 'id');

        return view('admin.offers.create', compact('offer_details', 'suppliers'));
    }

    public function store(StoreOfferRequest $request)
    {
        $offer = Offer::create($request->all());
        $offer->offer_details()->sync($request->input('offer_details', []));

        return redirect()->route('admin.offers.index');
    }

    public function edit(Offer $offer)
    {
        abort_if(Gate::denies('offer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offer_details = OfferDetail::pluck('quantity', 'id');

        $offer->load('supplier', 'offer_details');

        return view('admin.offers.edit', compact('offer', 'offer_details', 'suppliers'));
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $offer->update($request->all());
        $offer->offer_details()->sync($request->input('offer_details', []));

        return redirect()->route('admin.offers.index');
    }

    public function show(Offer $offer)
    {
        abort_if(Gate::denies('offer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->load('supplier', 'offer_details');

        return view('content.admin.offers.show', compact('offer'));
    }

    public function destroy(Offer $offer)
    {
        abort_if(Gate::denies('offer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->delete();

        return back();
    }

    public function massDestroy(MassDestroyOfferRequest $request)
    {
        $offers = Offer::find(request('ids'));

        foreach ($offers as $offer) {
            $offer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
