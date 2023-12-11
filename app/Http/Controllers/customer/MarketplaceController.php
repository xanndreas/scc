<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\CartTrait;
use App\Http\Controllers\traits\JsonResponseTrait;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\DiscountSelling;
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
            ->where('name', 'like', '%' . $request->q . '%')
            ->paginate(4);

        if ($request->ajax()) {
            $view = view('content.customers.marketplaces._partials.items', compact('products'))->render();

            return response()->json(['html' => $view]);
        }

        $newProducts = Product::with('category')->orderByDesc('created_at')->limit(10)->get();

        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.marketplaces.index', ['pageConfigs' => $pageConfigs], compact('products', 'newProducts'));
    }

    public function show(Request $request, $slug)
    {
        $product = Product::with('category')->where('slug', $slug)->first();

        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.marketplaces.show', ['pageConfigs' => $pageConfigs], compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        if ($request->ajax()) {
            $user = User::where('id', Auth::id())->first();
            if (!$user) {
                return $this->responseJson(400, 'Please login first', null, route('login'));
            }

            $cart = $this->appending_cart($user, $product);
            if ($cart) {
                return $this->responseJson(200, 'Success add to your cart');
            }

            return $this->responseJson(400, 'Product out of stock');
        }

        return response(null, ResponseAlias::HTTP_FORBIDDEN);
    }

    public function destroy(Request $request, Cart $cart)
    {
        if ($request->ajax()) {
            $cart = $this->changing_cart($cart, true);
            if ($cart) {
                $this->responseJson(200, 'Product deleted from cart');
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
                $this->responseJson(200, 'Product updated from your cart');
            }

            return $this->responseJson(400, 'Bad request');

        }

        return response(null, ResponseAlias::HTTP_FORBIDDEN);
    }

    public function checkVoucher(Request $request)
    {
        if (Auth::check()) {
            if ($request->has('discount_code')) {
                $discountCode = Discount::where('code', $request->discount_code)
                    ->first();

                $discountQuota = DiscountSelling::with('selling')
                    ->where('discount_id', $discountCode->id)->count();

                if ($discountQuota >= $discountCode->quota) {
                    return $this->responseJson(400, 'Discound quota limit');
                }

                if ($discountCode) {
                    return $this->responseJson(200, 'Success using voucher');
                } else {
                    return $this->responseJson(404, 'Discount voucher not valid');
                }
            }

            return $this->responseJson(404, 'Something went wrong');
        }

        return response(null, ResponseAlias::HTTP_FORBIDDEN);
    }

    public function checkout(Request $request)
    {
        if (Auth::check()) {
            $user = User::where('id', Auth::id())->first();
            if ($user) {
                $discount = null;

                if ($request->has('discount_code')) {
                    $discountCode = Discount::where('code', $request->discount_code)
                        ->first();

                    if (!$discountCode) {
                        return redirect()->route('customers.cas.cart')
                            ->with('errors', 'Discount not found.');
                    }

                    $discountQuota = DiscountSelling::with('selling')
                        ->where('discount_id', $discountCode->id)->count();


                    if ($discountQuota >= $discountCode->quota) {
                        return redirect()->route('customers.cas.cart')
                            ->with('errors', 'Discount quota limit.');
                    } else {
                        $discount = $discountCode;
                    }
                }

                $to_selling = $this->toSelling($user, $discount ? $discount : null);
                if ($to_selling) {
                    return redirect()->route('customers.cas.cart')
                        ->with('success', 'Success place orders, please contact our admin.');
                }
            }

            return redirect()->route('customers.cas.cart')
                ->with('errors', 'Something went wrong.');
        }

        return response(null, ResponseAlias::HTTP_FORBIDDEN);
    }
}
