<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $pageConfigs = ['myLayout' => 'blank', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customer.index', ['pageConfigs' => $pageConfigs]);
    }

    public function marketplace(Request $request)
    {
        $pageConfigs = ['myLayout' => 'blank', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customer.marketplace2', ['pageConfigs' => $pageConfigs]);
    }

    public function marketplaceDetail(Request $request)
    {
        $pageConfigs = ['myLayout' => 'blank', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customer.marketplace-detail', ['pageConfigs' => $pageConfigs]);
    }

    public function marketplaceCart(Request $request)
    {
        $pageConfigs = ['myLayout' => 'blank', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customer.cart', ['pageConfigs' => $pageConfigs]);
    }


}
