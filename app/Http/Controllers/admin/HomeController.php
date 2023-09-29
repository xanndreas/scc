<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $pageConfigs = ['myLayout' => 'vertical', 'displayCustomizer' => false];

        return view('content.admin.home', ['pageConfigs' => $pageConfigs]);
    }
}
