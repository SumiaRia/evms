<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrice2Request;
use App\Http\Requests\UpdatePrice2Request;
use App\Http\Resources\Admin\Price2Resource;
use App\Price2;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Prices2ApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('price2_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new Price2Resource(Price2::with(['amenities2'])->get());
    }

    public function store(StorePriceRequest $request)
    {
        $price2 = Price2::create($request->all());
        $price2->amenities2()->sync($request->input('amenities2', []));

        return (new Price2Resource($price2))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Price2 $price2)
    {
        abort_if(Gate::denies('price2_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //echo $price2;
        return new Price2Resource($price2->load(['amenities2']));
    }

    public function update(UpdatePriceRequest $request, Price2 $price2)
    {
        $price2->update($request->all());
        $price2->amenities2()->sync($request->input('amenities2', []));

        return (new Price2Resource($price2))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Price2 $price2)
    {
        abort_if(Gate::denies('price2_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price2->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
