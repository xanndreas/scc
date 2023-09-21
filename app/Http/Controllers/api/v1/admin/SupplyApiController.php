<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplyRequest;
use App\Http\Requests\UpdateSupplyRequest;
use App\Http\Resources\Admin\SupplyResource;
use App\Models\Supply;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupplyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('supply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SupplyResource(Supply::with(['product'])->get());
    }

    public function store(StoreSupplyRequest $request)
    {
        $supply = Supply::create($request->all());

        return (new SupplyResource($supply))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Supply $supply)
    {
        abort_if(Gate::denies('supply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SupplyResource($supply->load(['product']));
    }

    public function update(UpdateSupplyRequest $request, Supply $supply)
    {
        $supply->update($request->all());

        return (new SupplyResource($supply))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Supply $supply)
    {
        abort_if(Gate::denies('supply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supply->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
