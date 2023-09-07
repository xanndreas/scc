<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchasingRequest;
use App\Http\Requests\StorePurchasingRequest;
use App\Http\Requests\UpdatePurchasingRequest;
use App\Models\Purchasing;
use App\Models\PurchasingDetail;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchasingController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('purchasing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Purchasing::with(['supplier', 'purchasing_details'])->select(sprintf('%s.*', (new Purchasing)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'purchasing_show';
                $editGate      = 'purchasing_edit';
                $deleteGate    = 'purchasing_delete';
                $crudRoutePart = 'purchasings';

                return view('partials.datatablesActions', compact(
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
            $table->addColumn('supplier_name', function ($row) {
                return $row->supplier ? $row->supplier->name : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Purchasing::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('purchasing_detail', function ($row) {
                $labels = [];
                foreach ($row->purchasing_details as $purchasing_detail) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $purchasing_detail->subtotal);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('purchasing_transaction_number', function ($row) {
                return $row->purchasing_transaction_number ? $row->purchasing_transaction_number : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'supplier', 'purchasing_detail']);

            return $table->make(true);
        }

        $users              = User::get();
        $purchasing_details = PurchasingDetail::get();

        return view('admin.purchasings.index', compact('users', 'purchasing_details'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchasing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchasing_details = PurchasingDetail::pluck('subtotal', 'id');

        return view('admin.purchasings.create', compact('purchasing_details', 'suppliers'));
    }

    public function store(StorePurchasingRequest $request)
    {
        $purchasing = Purchasing::create($request->all());
        $purchasing->purchasing_details()->sync($request->input('purchasing_details', []));

        return redirect()->route('admin.purchasings.index');
    }

    public function edit(Purchasing $purchasing)
    {
        abort_if(Gate::denies('purchasing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchasing_details = PurchasingDetail::pluck('subtotal', 'id');

        $purchasing->load('supplier', 'purchasing_details');

        return view('admin.purchasings.edit', compact('purchasing', 'purchasing_details', 'suppliers'));
    }

    public function update(UpdatePurchasingRequest $request, Purchasing $purchasing)
    {
        $purchasing->update($request->all());
        $purchasing->purchasing_details()->sync($request->input('purchasing_details', []));

        return redirect()->route('admin.purchasings.index');
    }

    public function show(Purchasing $purchasing)
    {
        abort_if(Gate::denies('purchasing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasing->load('supplier', 'purchasing_details');

        return view('admin.purchasings.show', compact('purchasing'));
    }

    public function destroy(Purchasing $purchasing)
    {
        abort_if(Gate::denies('purchasing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasing->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchasingRequest $request)
    {
        $purchasings = Purchasing::find(request('ids'));

        foreach ($purchasings as $purchasing) {
            $purchasing->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
