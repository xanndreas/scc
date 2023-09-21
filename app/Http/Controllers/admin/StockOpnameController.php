<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStockOpnameRequest;
use App\Http\Requests\UpdateStockOpnameRequest;
use App\Models\Product;
use App\Models\StockOpname;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StockOpnameController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('stock_opname_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = StockOpname::with(['product'])->select(sprintf('%s.*', (new StockOpname)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'stock_opname_show';
                $editGate      = 'stock_opname_edit';
                $deleteGate    = 'stock_opname_delete';
                $crudRoutePart = 'stock-opnames';

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
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->editColumn('types', function ($row) {
                return $row->types ? StockOpname::TYPES_SELECT[$row->types] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        $products = Product::get();

        return view('admin.stockOpnames.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('stock_opname_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stockOpnames.create', compact('products'));
    }

    public function store(StoreStockOpnameRequest $request)
    {
        $stockOpname = StockOpname::create($request->all());

        return redirect()->route('admin.stock-opnames.index');
    }

    public function edit(StockOpname $stockOpname)
    {
        abort_if(Gate::denies('stock_opname_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stockOpname->load('product');

        return view('admin.stockOpnames.edit', compact('products', 'stockOpname'));
    }

    public function update(UpdateStockOpnameRequest $request, StockOpname $stockOpname)
    {
        $stockOpname->update($request->all());

        return redirect()->route('admin.stock-opnames.index');
    }

    public function show(StockOpname $stockOpname)
    {
        abort_if(Gate::denies('stock_opname_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockOpname->load('product');

        return view('admin.stockOpnames.show', compact('stockOpname'));
    }

    public function destroy(StockOpname $stockOpname)
    {
        abort_if(Gate::denies('stock_opname_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockOpname->delete();

        return back();
    }

    public function massDestroy(MassDestroyStockOpnameRequest $request)
    {
        $stockOpnames = StockOpname::find(request('ids'));

        foreach ($stockOpnames as $stockOpname) {
            $stockOpname->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
