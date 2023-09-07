<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSellingDetailRequest;
use App\Http\Requests\UpdateSellingDetailRequest;
use App\Http\Resources\admin\SellingDetailResource;
use App\Models\SellingDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellingDetailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('selling_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SellingDetailResource(SellingDetail::with(['product'])->get());
    }

    public function store(StoreSellingDetailRequest $request)
    {
        $sellingDetail = SellingDetail::create($request->all());

        return (new SellingDetailResource($sellingDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SellingDetail $sellingDetail)
    {
        abort_if(Gate::denies('selling_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SellingDetailResource($sellingDetail->load(['product']));
    }

    public function update(UpdateSellingDetailRequest $request, SellingDetail $sellingDetail)
    {
        $sellingDetail->update($request->all());

        return (new SellingDetailResource($sellingDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SellingDetail $sellingDetail)
    {
        abort_if(Gate::denies('selling_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sellingDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
