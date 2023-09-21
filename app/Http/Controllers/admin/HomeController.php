<?php

namespace App\Http\Controllers\admin;

class HomeController
{
    public function index()
    {
        $pageConfigs = ['myLayout' => 'vertical', 'displayCustomizer' => false];

        return view('content.admin.home', ['pageConfigs' => $pageConfigs]);
    }
}
