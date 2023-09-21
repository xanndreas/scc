<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferDetailRequest;
use App\Http\Requests\UpdateOfferDetailRequest;
use App\Http\Resources\admin\OfferDetailResource;
use App\Models\OfferDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferDetailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('offer_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfferDetailResource(OfferDetail::with(['product'])->get());
    }

    public function store(StoreOfferDetailRequest $request)
    {
        $offerDetail = OfferDetail::create($request->all());

        return (new OfferDetailResource($offerDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OfferDetail $offerDetail)
    {
        abort_if(Gate::denies('offer_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfferDetailResource($offerDetail->load(['product']));
    }

    public function update(UpdateOfferDetailRequest $request, OfferDetail $offerDetail)
    {
        $offerDetail->update($request->all());

        return (new OfferDetailResource($offerDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OfferDetail $offerDetail)
    {
        abort_if(Gate::denies('offer_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offerDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
