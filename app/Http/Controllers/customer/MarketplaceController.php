<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MarketplaceController extends Controller
{
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

}
