<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function Termwind\render;

class SupplyController extends Controller
{
    public function index(Request $request)
    {
        $supplies = Supply::with('product', 'product.category')
            ->orderBy('created_at', 'desc')
            ->whereRelation('product', 'name', 'like', '%' . $request->q . '%')
            ->paginate(4);

        if ($request->ajax()) {
            $view = view('content.customers.supplies._partials.items', compact('supplies'))->render();

            return response()->json(['html' => $view]);
        }

        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.supplies.index', ['pageConfigs' => $pageConfigs], compact('supplies'));
    }

    public function show(Request $request, Supply $supply)
    {
        if ($request->ajax()) {
            return response()->json([
                'html' => view('content.customers.supplies._partials.showItems', compact('supply'))->render()
            ]);
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
