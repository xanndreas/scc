<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\InventoryTrait;
use App\Http\Requests\StoreInventoryRequest;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\StockOpname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InventoryController extends Controller
{
    use InventoryTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('inventory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Inventory::with(['product'])
                ->selectRaw("SUM(CASE WHEN types = 'in' THEN quantity ELSE 0 END) - SUM(CASE WHEN types = 'out' THEN quantity ELSE 0 END) AS quantity_sum,
                product_id")
                ->groupBy(['product_id'])
                ->orderByDesc('product_id');

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'inventory_show';
                $editGate = 'inventory_edit';
                $deleteGate = 'inventory_delete_disabled';
                $crudRoutePart = 'inventories';
                $otherCan = true;

                return view('_partials.datatablesActions', compact(
                    'viewGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('product_type', '&nbsp;');

            $table->addColumn('product_stock_minimum', '&nbsp;');

            $table->addColumn('product_price_buy', '&nbsp;');

            $table->addColumn('product_price_sell', '&nbsp;');

            $table->addColumn('product_product_code', '&nbsp;');

            $table->editColumn('product_type', function ($row) {
                return $row->product ? Product::TYPE_SELECT[$row->product->type] : '';
            });
            $table->editColumn('product_stock_minimum', function ($row) {
                return $row->product ? $row->product->stock_minimum : '';
            });
            $table->editColumn('product_price_buy', function ($row) {
                return $row->product ? $row->product->price_buy : '';
            });
            $table->editColumn('product_price_sell', function ($row) {
                return $row->product ? $row->product->price_sell : '';
            });
            $table->editColumn('product_product_code', function ($row) {
                return $row->product ? $row->product->product_code : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        $product = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::get();

        return view('content.admin.inventories.index', compact('products', 'product'));
    }

    public function create()
    {
        abort_if(Gate::denies('inventory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('content.admin.inventories.create', compact('products'));
    }

    public function store(StoreInventoryRequest $request)
    {
        $stockOpname = StockOpname::create($request->all());
        if (!$stockOpname) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }

        $product = Product::where('id', $request->product_id)->first();

        $this->appending_invent($request->quantity, $product, $stockOpname, $request->types);

        return back();
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('inventory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('category');

        $inventory = Inventory::with('product')->where('product_id', $product->id)->get();

        return view('content.admin.inventories.show', compact('inventory', 'product'));
    }

    public function destroy(Inventory $inventory)
    {
        abort_if(Gate::denies('inventory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inventory->delete();

        return back();
    }

}
