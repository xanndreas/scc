<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ledger;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $pageConfigs = ['myLayout' => 'vertical', 'displayCustomizer' => false];

//        dd(self::chartData());

        return view('content.admin.home', ['pageConfigs' => $pageConfigs]);
    }

    private function chartData()
    {
        $chartData = [];

        $ledgers = Ledger::whereYear('created_at', Carbon::now()->year)->get();

        return $ledgers;
    }
}
