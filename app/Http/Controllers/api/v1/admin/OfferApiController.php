<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Http\Resources\admin\OfferResource;
use App\Models\Offer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('offer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfferResource(Offer::with(['supplier', 'offer_details'])->get());
    }

    public function store(StoreOfferRequest $request)
    {
        $offer = Offer::create($request->all());
        $offer->offer_details()->sync($request->input('offer_details', []));

        return (new OfferResource($offer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Offer $offer)
    {
        abort_if(Gate::denies('offer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfferResource($offer->load(['supplier', 'offer_details']));
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $offer->update($request->all());
        $offer->offer_details()->sync($request->input('offer_details', []));

        return (new OfferResource($offer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Offer $offer)
    {
        abort_if(Gate::denies('offer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
