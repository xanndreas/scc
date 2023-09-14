<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSellingRequest;
use App\Http\Requests\UpdateSellingRequest;
use App\Http\Resources\admin\SellingResource;
use App\Models\Selling;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('selling_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SellingResource(Selling::with(['customer', 'selling_details'])->get());
    }

    public function store(StoreSellingRequest $request)
    {
        $selling = Selling::create($request->all());
        $selling->selling_details()->sync($request->input('selling_details', []));

        return (new SellingResource($selling))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Selling $selling)
    {
        abort_if(Gate::denies('selling_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SellingResource($selling->load(['customer', 'selling_details']));
    }

    public function update(UpdateSellingRequest $request, Selling $selling)
    {
        $selling->update($request->all());
        $selling->selling_details()->sync($request->input('selling_details', []));

        return (new SellingResource($selling))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Selling $selling)
    {
        abort_if(Gate::denies('selling_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $selling->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
