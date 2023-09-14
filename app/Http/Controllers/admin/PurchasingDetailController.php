<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchasingDetailRequest;
use App\Http\Requests\StorePurchasingDetailRequest;
use App\Http\Requests\UpdatePurchasingDetailRequest;
use App\Models\Product;
use App\Models\PurchasingDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchasingDetailController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('purchasing_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchasingDetail::with(['product'])->select(sprintf('%s.*', (new PurchasingDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'purchasing_detail_show';
                $editGate      = 'purchasing_detail_edit';
                $deleteGate    = 'purchasing_detail_delete';
                $crudRoutePart = 'purchasing-details';

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
            $table->editColumn('subtotal', function ($row) {
                return $row->subtotal ? $row->subtotal : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        $products = Product::get();

        return view('admin.purchasingDetails.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchasing_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchasingDetails.create', compact('products'));
    }

    public function store(StorePurchasingDetailRequest $request)
    {
        $purchasingDetail = PurchasingDetail::create($request->all());

        return redirect()->route('admin.purchasing-details.index');
    }

    public function edit(PurchasingDetail $purchasingDetail)
    {
        abort_if(Gate::denies('purchasing_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchasingDetail->load('product');

        return view('admin.purchasingDetails.edit', compact('products', 'purchasingDetail'));
    }

    public function update(UpdatePurchasingDetailRequest $request, PurchasingDetail $purchasingDetail)
    {
        $purchasingDetail->update($request->all());

        return redirect()->route('admin.purchasing-details.index');
    }

    public function show(PurchasingDetail $purchasingDetail)
    {
        abort_if(Gate::denies('purchasing_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasingDetail->load('product');

        return view('admin.purchasingDetails.show', compact('purchasingDetail'));
    }

    public function destroy(PurchasingDetail $purchasingDetail)
    {
        abort_if(Gate::denies('purchasing_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasingDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchasingDetailRequest $request)
    {
        $purchasingDetails = PurchasingDetail::find(request('ids'));

        foreach ($purchasingDetails as $purchasingDetail) {
            $purchasingDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
