<?php

namespace App\Http\Controllers\Admin;

use App\Amenity2;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAmenity2Request;
use App\Http\Requests\StoreAmenity2Request;
use App\Http\Requests\UpdateAmenity2Request;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Amenities2Controller extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('amenity2_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $amenities2 = Amenity2::all();

        return view('admin.amenities2.index', compact('amenities2'));
    }

    public function create()
    {
        abort_if(Gate::denies('amenity2_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.amenities2.create');
    }

    public function store(StoreAmenity2Request $request)
    {
        $amenity2 = Amenity2::create($request->all());

        return redirect()->route('admin.amenities2.index');
    }

    public function edit(Amenity2 $amenity2)
    {
        abort_if(Gate::denies('amenity2_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.amenities2.edit', compact('amenity2'));
    }

    public function update(UpdateAmenity2Request $request, Amenity2 $amenity2)
    {
        $amenity2->update($request->all());

        return redirect()->route('admin.amenities2.index');
    }

    public function show(Amenity2 $amenity2)
    {
        abort_if(Gate::denies('amenity2_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        echo $amenity2;
        return view('admin.amenities2.show', compact('amenity2'));
    }

    public function destroy(Amenity2 $amenity2)
    {
        abort_if(Gate::denies('amenity2_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $amenity2->delete();

        return back();
    }

    public function massDestroy(MassDestroyAmenityRequest $request)
    {
        Amenity2::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
