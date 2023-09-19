<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\CartTrait;
use App\Http\Controllers\traits\JsonResponseTrait;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class MarketplaceController extends Controller
{
    use CartTrait, JsonResponseTrait;

    public function index(Request $request)
    {
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        if ($request->ajax()) {

            $view = view('content.customers.marketplaces._partials.items', compact('products'))->render();

            return response()->json(['html' => $view]);
        }


        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.marketplaces.index', ['pageConfigs' => $pageConfigs], compact('products'));
    }

    public function show(Request $request)
    {
        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.marketplaces.show', ['pageConfigs' => $pageConfigs]);
    }

    public function store(Request $request, Product $product)
    {
        if ($request->ajax()) {
            $user = User::where('id', Auth::id())->first();
            if (!$user) {
                return $this->responseJson(400, 'Bad request');
            }

            $cart = $this->appending_cart($user, $product);
            if ($cart) {
                $this->responseJson(200, 'Resource deleted successfully');
            }

            return $this->responseJson(400, 'Bad request');
        }

        return response(null, ResponseAlias::HTTP_FORBIDDEN);
    }

    public function destroy(Request $request, Cart $cart)
    {
        if ($request->ajax()) {
            $cart = $this->changing_cart($cart, true);
            if ($cart) {
                $this->responseJson(200, 'Resource deleted successfully');
            }

            return $this->responseJson(400, 'Bad request');
        }

        return response(null, ResponseAlias::HTTP_FORBIDDEN);
    }

    public function update(Request $request, Cart $cart)
    {
        if ($request->ajax()) {
            if (!$request->has('quantity')) {
                return $this->responseJson(400, 'Quantity is required');
            }

            if (!Auth::check()) {
                return $this->responseJson(400, 'Bad request');
            }

            $cart = $this->changing_cart($cart, false, $request->quantity);
            if ($cart) {
                $this->responseJson(200, 'Resource deleted successfully');
            }

            return $this->responseJson(400, 'Bad request');

        }

        return response(null, ResponseAlias::HTTP_FORBIDDEN);
    }
}
