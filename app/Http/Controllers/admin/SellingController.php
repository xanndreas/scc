<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\InventoryTrait;
use App\Http\Controllers\traits\LedgerTrait;
use App\Http\Requests\UpdateSellingRequest;
use App\Models\DiscountSelling;
use App\Models\Selling;
use App\Models\SellingDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SellingController extends Controller
{
    use InventoryTrait, LedgerTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('selling_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Selling::with(['customer', 'selling_details'])->select(sprintf('%s.*', (new Selling)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'selling_show';
                $editGate = 'selling_edit';
                $deleteGate = 'selling_delete_disabled';
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
                    $selling_detail = $selling_detail->load('product');
                    $content = sprintf('<span class="label label-info label-many">%s</span>', $selling_detail->product->name);

                    if (!in_array($content, $labels)) {
                        $labels[] = $content;
                    }
                }

                return implode(' ', $labels);
            });
            $table->editColumn('selling_transaction_number', function ($row) {
                return $row->selling_transaction_number ? $row->selling_transaction_number : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'customer', 'selling_detail']);

            return $table->make(true);
        }
        $customers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $selling_detail = SellingDetail::pluck('subtotal', 'id');

        $users = User::get();
        $selling_details = SellingDetail::get();

        return view('content.admin.sellings.index', compact('users', 'selling_details', 'customers', 'selling_detail'));
    }

    public function update(UpdateSellingRequest $request, Selling $selling)
    {
        if ($request->has('description')) {
            $selling->update($request->only('description'));
        } else if ($request->has('additional_cost')) {
            $selling->update($request->only('additional_cost'));
        } else {
            $selling->update($request->only('status'));

            if ($request->status == 'confirmed') {
                $selling->load('selling_details', 'selling_details.product');
                $sellingOut = [];

                foreach ($selling->selling_details as $selling_detail) {
                    if (isset($sellingOut[$selling_detail->product->id]['qty']))
                        $sellingOut[$selling_detail->product->id]['qty'] += $selling_detail->quantity;
                    else
                        $sellingOut[$selling_detail->product->id]['qty'] = $selling_detail->quantity;
                    $sellingOut[$selling_detail->product->id]['product'] = $selling_detail->product;
                }

                foreach ($sellingOut as $index => $items) {
                    $this->appending_invent($items['qty'], $items['product'], $selling, 'out');
                }

                $this->appending_ledger(($selling->grand_total + $selling->additional_cost), $selling, $selling->selling_transaction_number);
                $selling->update([
                    'grand_total' => $selling->grand_total + $selling->additional_cost,
                    'rounding_cost' => $selling->grand_total + $selling->additional_cost,
                ]);
            }
        }

        return redirect()->route('admin.sellings.show', ['selling' => $selling->id]);
    }

    public function show(Selling $selling)
    {
        abort_if(Gate::denies('selling_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $selling->load('customer', 'selling_details');

        return view('content.admin.sellings.show', compact('selling'));
    }

    public function destroy(Selling $selling)
    {
        abort_if(Gate::denies('selling_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $selling->delete();

        return back();
    }

}
