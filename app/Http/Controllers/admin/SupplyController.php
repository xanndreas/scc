<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupplyRequest;
use App\Http\Requests\StoreSupplyRequest;
use App\Http\Requests\UpdateSupplyRequest;
use App\Models\Product;
use App\Models\Supply;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SupplyController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('supply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Supply::with(['product'])->select(sprintf('%s.*', (new Supply)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'supply_show';
                $editGate      = 'supply_edit';
                $deleteGate    = 'supply_delete';
                $crudRoutePart = 'supplies';

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
            $table->editColumn('quantity_needs', function ($row) {
                return $row->quantity_needs ? $row->quantity_needs : '';
            });
            $table->editColumn('initial_price', function ($row) {
                return $row->initial_price ? $row->initial_price : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Supply::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        $products = Product::get();

        return view('admin.supplies.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('supply_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.supplies.create', compact('products'));
    }

    public function store(StoreSupplyRequest $request)
    {
        $supply = Supply::create($request->all());

        return redirect()->route('admin.supplies.index');
    }

    public function edit(Supply $supply)
    {
        abort_if(Gate::denies('supply_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supply->load('product');

        return view('admin.supplies.edit', compact('products', 'supply'));
    }

    public function update(UpdateSupplyRequest $request, Supply $supply)
    {
        $supply->update($request->all());

        return redirect()->route('admin.supplies.index');
    }

    public function show(Supply $supply)
    {
        abort_if(Gate::denies('supply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supply->load('product');

        return view('admin.supplies.show', compact('supply'));
    }

    public function destroy(Supply $supply)
    {
        abort_if(Gate::denies('supply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supply->delete();

        return back();
    }

    public function massDestroy(MassDestroySupplyRequest $request)
    {
        $supplies = Supply::find(request('ids'));

        foreach ($supplies as $supply) {
            $supply->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
