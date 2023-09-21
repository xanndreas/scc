<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInventoryRequest;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Inventory;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('inventory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Inventory::with(['product'])->select(sprintf('%s.*', (new Inventory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'inventory_show';
                $editGate      = 'inventory_edit';
                $deleteGate    = 'inventory_delete_disabled';
                $crudRoutePart = 'inventories';
                $otherCan = true;

                return view('_partials.datatablesActions', compact(
                    'viewGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('model_key', function ($row) {
                return $row->model_key ? $row->model_key : '';
            });
            $table->editColumn('model_name', function ($row) {
                return $row->model_name ? $row->model_name : '';
            });
            $table->editColumn('types', function ($row) {
                return $row->types ? Inventory::TYPES_SELECT[$row->types] : '';
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
        $product = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::get();

        return view('content.admin.inventories.index', compact('products','product'));
    }

    public function create()
    {
        abort_if(Gate::denies('inventory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('content.admin.inventories.create', compact('products'));
    }

    public function store(StoreInventoryRequest $request)
    {
        $inventory = Inventory::create($request->all());
        return back();
    }

    public function edit(Inventory $inventory)
    {
        abort_if(Gate::denies('inventory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inventory->load('product');

        return view('content.admin.inventories.edit', compact('inventory', 'products'));
    }

    public function update(UpdateInventoryRequest $request, Inventory $inventory)
    {
        $inventory->update($request->all());

        return redirect()->route('content.admin.inventories.index');
    }

    public function show(Inventory $inventory)
    {
        abort_if(Gate::denies('inventory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inventory->load('product');

        return view('content.admin.inventories.show', compact('inventory'));
    }

    public function destroy(Inventory $inventory)
    {
        abort_if(Gate::denies('inventory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inventory->delete();

        return back();
    }

    public function massDestroy(MassDestroyInventoryRequest $request)
    {
        $inventories = Inventory::find(request('ids'));

        foreach ($inventories as $inventory) {
            $inventory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
