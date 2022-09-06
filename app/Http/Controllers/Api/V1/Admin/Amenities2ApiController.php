<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Amenity2;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAmenity2Request;
use App\Http\Requests\UpdateAmenity2Request;
use App\Http\Resources\Admin\Amenity2Resource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Amenities2ApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('amenity2_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new Amenity2Resource(Amenity2::all());
    }

    public function store(StoreAmenity2Request $request)
    {
        $amenity2 = Amenity2::create($request->all());

        return (new Amenity2Resource($amenity2))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Amenity2 $amenity2)
    {
        abort_if(Gate::denies('amenity2_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new Amenity2Resource($amenity2);
    }

    public function update(UpdateAmenity2Request $request, Amenity2 $amenity2)
    {
        $amenity2->update($request->all());

        return (new Amenity2Resource($amenity2))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Amenity2 $amenity2)
    {
        abort_if(Gate::denies('amenity2_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $amenity2->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
