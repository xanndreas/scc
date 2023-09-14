<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchasingDetailRequest;
use App\Http\Requests\UpdatePurchasingDetailRequest;
use App\Http\Resources\admin\PurchasingDetailResource;
use App\Models\PurchasingDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchasingDetailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchasing_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurchasingDetailResource(PurchasingDetail::with(['product'])->get());
    }

    public function store(StorePurchasingDetailRequest $request)
    {
        $purchasingDetail = PurchasingDetail::create($request->all());

        return (new PurchasingDetailResource($purchasingDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PurchasingDetail $purchasingDetail)
    {
        abort_if(Gate::denies('purchasing_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurchasingDetailResource($purchasingDetail->load(['product']));
    }

    public function update(UpdatePurchasingDetailRequest $request, PurchasingDetail $purchasingDetail)
    {
        $purchasingDetail->update($request->all());

        return (new PurchasingDetailResource($purchasingDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PurchasingDetail $purchasingDetail)
    {
        abort_if(Gate::denies('purchasing_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasingDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
