<?php

namespace App\Http\Controllers\admin;

use App\Exports\IncomeExport;
use App\Exports\StockExport;
use App\Exports\SupplyExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('selling_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('content.admin.transactions.index');
    }

    public function export(Request $request)
    {
        if ($request->has('data_type') && $request->has('start_date') && $request->has('end_date')) {
            if ($request->data_type == 'supply') {
                return Excel::download(new SupplyExport($request->start_date, $request->end_date), 'supplies.xlsx');
            } elseif ($request->data_type == 'income') {
                return Excel::download(new IncomeExport($request->start_date, $request->end_date), 'income.xlsx');
            } elseif ($request->data_type == 'stock_under') {
                return Excel::download(new StockExport($request->start_date, $request->end_date), 'stock.xlsx');
            }
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
