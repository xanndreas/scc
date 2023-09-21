<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchasingRequest;
use App\Http\Requests\UpdatePurchasingRequest;
use App\Http\Resources\admin\PurchasingResource;
use App\Models\Purchasing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchasingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchasing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurchasingResource(Purchasing::with(['supplier', 'purchasing_details'])->get());
    }

    public function store(StorePurchasingRequest $request)
    {
        $purchasing = Purchasing::create($request->all());
        $purchasing->purchasing_details()->sync($request->input('purchasing_details', []));

        return (new PurchasingResource($purchasing))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Purchasing $purchasing)
    {
        abort_if(Gate::denies('purchasing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurchasingResource($purchasing->load(['supplier', 'purchasing_details']));
    }

    public function update(UpdatePurchasingRequest $request, Purchasing $purchasing)
    {
        $purchasing->update($request->all());
        $purchasing->purchasing_details()->sync($request->input('purchasing_details', []));

        return (new PurchasingResource($purchasing))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Purchasing $purchasing)
    {
        abort_if(Gate::denies('purchasing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasing->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
