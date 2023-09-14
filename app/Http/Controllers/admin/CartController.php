<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCartRequest;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CartController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('cart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Cart::with(['product', 'user'])->select(sprintf('%s.*', (new Cart)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'cart_show';
                $editGate      = 'cart_edit';
                $deleteGate    = 'cart_delete';
                $crudRoutePart = 'carts';

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
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product', 'user']);

            return $table->make(true);
        }

        $products = Product::get();
        $users    = User::get();

        return view('admin.carts.index', compact('products', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('cart_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carts.create', compact('products', 'users'));
    }

    public function store(StoreCartRequest $request)
    {
        $cart = Cart::create($request->all());

        return redirect()->route('admin.carts.index');
    }

    public function edit(Cart $cart)
    {
        abort_if(Gate::denies('cart_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cart->load('product', 'user');

        return view('admin.carts.edit', compact('cart', 'products', 'users'));
    }

    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $cart->update($request->all());

        return redirect()->route('admin.carts.index');
    }

    public function show(Cart $cart)
    {
        abort_if(Gate::denies('cart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cart->load('product', 'user');

        return view('admin.carts.show', compact('cart'));
    }

    public function destroy(Cart $cart)
    {
        abort_if(Gate::denies('cart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cart->delete();

        return back();
    }

    public function massDestroy(MassDestroyCartRequest $request)
    {
        $carts = Cart::find(request('ids'));

        foreach ($carts as $cart) {
            $cart->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
