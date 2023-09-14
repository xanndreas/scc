<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    public function index(Request $request)
    {
        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.supplies.index', ['pageConfigs' => $pageConfigs]);
    }
}
