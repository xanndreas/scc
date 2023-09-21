<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySellingRequest;
use App\Http\Requests\StoreSellingRequest;
use App\Http\Requests\UpdateSellingRequest;
use App\Models\Selling;
use App\Models\SellingDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SellingController extends Controller
{
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
        $customers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $selling_detail = SellingDetail::pluck('subtotal', 'id');

        $users = User::get();
        $selling_details = SellingDetail::get();

        return view('content.admin.sellings.index', compact('users', 'selling_details', 'customers', 'selling_detail'));
    }

    public function create()
    {
        abort_if(Gate::denies('selling_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $selling_details = SellingDetail::pluck('subtotal', 'id');

        return view('content.sellings.create', compact('customers', 'selling_details'));
    }

    public function store(StoreSellingRequest $request)
    {
        $selling = Selling::create($request->all());
        $selling->selling_details()->sync($request->input('selling_details', []));

        return redirect()->route('admin.sellings.index');
    }

    public function edit(Selling $selling)
    {
        abort_if(Gate::denies('selling_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $selling_details = SellingDetail::pluck('subtotal', 'id');

        $selling->load('customer', 'selling_details');

        return view('content.sellings.edit', compact('customers', 'selling', 'selling_details'));
    }

    public function update(UpdateSellingRequest $request, Selling $selling)
    {
        $selling->update($request->only('status'));

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

    public function massDestroy(MassDestroySellingRequest $request)
    {
        $sellings = Selling::find(request('ids'));

        foreach ($sellings as $selling) {
            $selling->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
