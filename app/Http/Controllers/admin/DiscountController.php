<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\CsvImportTrait;
use App\Http\Controllers\traits\MediaUploadingTrait;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DiscountController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('discount_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Discount::select(sprintf('%s.*', (new Discount)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'discount_show';
                $editGate = 'discount_edit';
                $deleteGate = 'discount_delete_disabled';
                $crudRoutePart = 'discounts';
                $otherCan = true;

                return view('_partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'otherCan',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->addColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });

            $table->editColumn('percentage', function ($row) {
                return $row->percentage ? $row->percentage : '';
            });

            $table->editColumn('max_discount_value', function ($row) {
                return $row->max_discount_value ? $row->max_discount_value : '';
            });

            $table->editColumn('quota', function ($row) {
                return $row->quota ? $row->quota : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('content.admin.discounts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('discount_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('content.admin.discounts.create');
    }

    public function store(StoreDiscountRequest $request)
    {
        $discount = Discount::create($request->all());

        return redirect()->route('admin.discounts.index');
    }

    public function edit(Discount $discount)
    {
        abort_if(Gate::denies('discount_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('content.admin.discounts.edit', compact('discount'));
    }

    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $discount->update($request->all());

        return redirect()->route('admin.discounts.index');
    }

    public function show(Discount $discount)
    {
        abort_if(Gate::denies('discount_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('content.admin.discounts.show', compact('discount'));
    }

    public function destroy(Discount $discount)
    {
        abort_if(Gate::denies('discount_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discount->delete();

        return back();
    }

}
