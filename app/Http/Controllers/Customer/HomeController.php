<?php

namespace App\Http\Controllers\Customer;

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

        return view('content.customer.marketplace', ['pageConfigs' => $pageConfigs]);
    }


}
