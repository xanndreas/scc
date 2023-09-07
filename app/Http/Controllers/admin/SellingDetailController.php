<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySellingDetailRequest;
use App\Http\Requests\StoreSellingDetailRequest;
use App\Http\Requests\UpdateSellingDetailRequest;
use App\Models\Product;
use App\Models\SellingDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SellingDetailController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('selling_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SellingDetail::with(['product'])->select(sprintf('%s.*', (new SellingDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'selling_detail_show';
                $editGate      = 'selling_detail_edit';
                $deleteGate    = 'selling_detail_delete';
                $crudRoutePart = 'selling-details';

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
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        $products = Product::get();

        return view('admin.sellingDetails.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('selling_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sellingDetails.create', compact('products'));
    }

    public function store(StoreSellingDetailRequest $request)
    {
        $sellingDetail = SellingDetail::create($request->all());

        return redirect()->route('admin.selling-details.index');
    }

    public function edit(SellingDetail $sellingDetail)
    {
        abort_if(Gate::denies('selling_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sellingDetail->load('product');

        return view('admin.sellingDetails.edit', compact('products', 'sellingDetail'));
    }

    public function update(UpdateSellingDetailRequest $request, SellingDetail $sellingDetail)
    {
        $sellingDetail->update($request->all());

        return redirect()->route('admin.selling-details.index');
    }

    public function show(SellingDetail $sellingDetail)
    {
        abort_if(Gate::denies('selling_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sellingDetail->load('product', 'sellingDetailSellings');

        return view('admin.sellingDetails.show', compact('sellingDetail'));
    }

    public function destroy(SellingDetail $sellingDetail)
    {
        abort_if(Gate::denies('selling_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sellingDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroySellingDetailRequest $request)
    {
        $sellingDetails = SellingDetail::find(request('ids'));

        foreach ($sellingDetails as $sellingDetail) {
            $sellingDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
