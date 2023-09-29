<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        $newProducts = Product::with('category')->orderByDesc('created_at')->limit(10)->get();

        $page_settings = Setting::first();

        return view('content.customers.home.index', ['pageConfigs' => $pageConfigs], compact('newProducts', 'page_settings'));
    }

    public function contacts(Request $request) {
        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.home.contact', ['pageConfigs' => $pageConfigs]);
    }

}
