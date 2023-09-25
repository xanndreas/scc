<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Selling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CustomerAreasController extends Controller
{
    public function cart(Request $request)
    {
        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        $cart = Cart::with('product', 'product.category')->where('user_id', Auth::id())->get();

        $cartDetail = ['subtotal' => 0];
        foreach ($cart as $item) {
            $cartDetail['subtotal'] += $item->product->price_sell;
        }

        $cartDetail['grand_total'] = $cartDetail['subtotal'];

        return view('content.customers.cas.cart', ['pageConfigs' => $pageConfigs], compact('cart', 'cartDetail'));
    }

    public function profile(Request $request)
    {
        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.cas.profile', ['pageConfigs' => $pageConfigs]);
    }

    public function transactionHistory(Request $request)
    {
        if ($request->ajax()) {
            $query = Selling::with(['customer', 'selling_details'])->whereRelation('customer', 'id', Auth::id())
                ->select(sprintf('%s.*', (new Selling)->table));

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'selling_show';
                $editGate = 'selling_edit';
                $deleteGate = 'selling_delete';
                $crudRoutePart = 'sellings';

                return view('_partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('batch_code', function ($row) {
                return $row->batch_code ? $row->batch_code : '';
            });
            $table->editColumn('grand_total', function ($row) {
                return $row->grand_total ? $row->grand_total : '';
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->editColumn('rounding_cost', function ($row) {
                return $row->rounding_cost ? $row->rounding_cost : '';
            });
            $table->editColumn('additional_cost', function ($row) {
                return $row->additional_cost ? $row->additional_cost : '';
            });
            $table->editColumn('price_discounts', function ($row) {
                return $row->price_discounts ? $row->price_discounts : '';
            });
            $table->addColumn('customer_name', function ($row) {
                return $row->customer ? $row->customer->name : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Selling::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('selling_detail', function ($row) {
                $labels = [];
                foreach ($row->selling_details as $selling_detail) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $selling_detail->subtotal);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('selling_transaction_number', function ($row) {
                return $row->selling_transaction_number ? $row->selling_transaction_number : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'customer', 'selling_detail']);

            return $table->make(true);
        }

        $pageConfigs = ['myLayout' => 'customer', 'navbarFixed' => true, 'displayCustomizer' => false];

        return view('content.customers.cas.transaction', ['pageConfigs' => $pageConfigs]);
    }

    public function transactionDetail(Request $request, Selling $selling)
    {
        if ($request->ajax()) {
            $selling->load('selling_details');

            return response()->json([
                'html' => view('content.customers.cas._partials.showItems', compact('selling'))->render()
            ]);
        }

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
