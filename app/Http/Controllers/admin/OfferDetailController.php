<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOfferDetailRequest;
use App\Http\Requests\StoreOfferDetailRequest;
use App\Http\Requests\UpdateOfferDetailRequest;
use App\Models\OfferDetail;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OfferDetailController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('offer_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OfferDetail::with(['product'])->select(sprintf('%s.*', (new OfferDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'offer_detail_show';
                $editGate      = 'offer_detail_edit';
                $deleteGate    = 'offer_detail_delete';
                $crudRoutePart = 'offer-details';

                return view('partials.datatablesActions', compact(
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
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('price_offer', function ($row) {
                return $row->price_offer ? $row->price_offer : '';
            });
            $table->editColumn('price_deal', function ($row) {
                return $row->price_deal ? $row->price_deal : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        $products = Product::get();

        return view('admin.offerDetails.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('offer_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.offerDetails.create', compact('products'));
    }

    public function store(StoreOfferDetailRequest $request)
    {
        $offerDetail = OfferDetail::create($request->all());

        return redirect()->route('admin.offer-details.index');
    }

    public function edit(OfferDetail $offerDetail)
    {
        abort_if(Gate::denies('offer_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offerDetail->load('product');

        return view('admin.offerDetails.edit', compact('offerDetail', 'products'));
    }

    public function update(UpdateOfferDetailRequest $request, OfferDetail $offerDetail)
    {
        $offerDetail->update($request->all());

        return redirect()->route('admin.offer-details.index');
    }

    public function show(OfferDetail $offerDetail)
    {
        abort_if(Gate::denies('offer_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offerDetail->load('product', 'offerDetailOffers');

        return view('admin.offerDetails.show', compact('offerDetail'));
    }

    public function destroy(OfferDetail $offerDetail)
    {
        abort_if(Gate::denies('offer_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offerDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyOfferDetailRequest $request)
    {
        $offerDetails = OfferDetail::find(request('ids'));

        foreach ($offerDetails as $offerDetail) {
            $offerDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
