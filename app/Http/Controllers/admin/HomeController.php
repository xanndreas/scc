<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\LedgerTrait;
use App\Models\Ledger;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    use LedgerTrait;

    public function index()
    {
        $pageConfigs = ['myLayout' => 'vertical', 'displayCustomizer' => false];

        return view('content.admin.home', ['pageConfigs' => $pageConfigs]);
    }

    public function chartData()
    {
        $chartData = [];

        for ($month = 1; $month <= 12; $month++) {
            $chartData[1]['chart_data'][] = (int)Ledger::where('model_type', 'App\Models\Selling')
                    ->whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', $month)
                    ->sum('value') / 1000;
        }

        for ($month = 1; $month <= 12; $month++) {
            $firstOfMonth = Carbon::createFromFormat('Y-m-d H:i:s',
                Carbon::now()->year . '-' . sprintf("%02d", $month) . '-' . '01' . ' 12:00:00');
            $endOfMonth = Carbon::createFromFormat('Y-m-d H:i:s',
                Carbon::now()->year . '-' . sprintf("%02d", $month) . '-' . '01' . ' 12:00:00')->endOfMonth();

            $chartData[3]['chart_data'][] = (int)$this->summaries([$firstOfMonth, $endOfMonth]) / 1000;
        }

        return response()->json($chartData);
    }
}
