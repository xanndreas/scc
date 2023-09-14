<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySellingDetailRequest;
use App\Http\Requests\StoreSellingDetailRequest;
use App\Http\Requests\UpdateSellingDetailRequest;
use App\Models\Product;
use App\Models\SellingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('selling_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sellingDetails.index', compact('products'));
    }

    public function update(UpdateSellingDetailRequest $request, SellingDetail $sellingDetail)
    {
        $sellingDetail->update($request->all());

        return redirect()->route('admin.selling-details.index');
    }

}
