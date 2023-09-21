<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStockOpnameRequest;
use App\Http\Requests\UpdateStockOpnameRequest;
use App\Http\Resources\admin\StockOpnameResource;
use App\Models\StockOpname;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StockOpnameApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_opname_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StockOpnameResource(StockOpname::with(['product'])->get());
    }

    public function store(StoreStockOpnameRequest $request)
    {
        $stockOpname = StockOpname::create($request->all());

        return (new StockOpnameResource($stockOpname))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StockOpname $stockOpname)
    {
        abort_if(Gate::denies('stock_opname_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StockOpnameResource($stockOpname->load(['product']));
    }

    public function update(UpdateStockOpnameRequest $request, StockOpname $stockOpname)
    {
        $stockOpname->update($request->all());

        return (new StockOpnameResource($stockOpname))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StockOpname $stockOpname)
    {
        abort_if(Gate::denies('stock_opname_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockOpname->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
