<?php

namespace App\Http\Controllers\Admin;

use App\Amenity2;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPrice2Request;
use App\Http\Requests\StorePrice2Request;
use App\Http\Requests\UpdatePrice2Request;
use App\Price2;
use App\Price;
use App\Amenity;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Prices2Controller extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('price2_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prices2 = Price2::all();
        echo $prices2;

        return view('admin.prices2.index', compact('prices2'));
    }

    public function create()
    {
        abort_if(Gate::denies('price2_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $amenities2 = Amenity2::all()->pluck('name', 'id');
        return view('admin.prices2.create', compact('amenities2'));
    }

    public function store(StorePrice2Request $request)
    {
        $price2 = Price2::create($request->all());
        $price2->amenities2()->sync($request->input('amenities2', []));

        return redirect()->route('admin.prices2.index');
    }

    public function edit(Price2 $price2)
    {
        abort_if(Gate::denies('price2_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $amenities2 = Amenity2::all()->pluck('name', 'id');
        echo $amenities2;

        $price2->load('amenities2');
        $id=$price2->id;
        return view('admin.prices2.edit', compact('amenities2', 'price2','id'));
    }

    public function update(UpdatePrice2Request $request, Price2 $price2)
    {
        $price2->update($request->all());
        $price2->amenities2()->sync($request->input('amenities2', []));

        return redirect()->route('admin.prices2.index');
    }

    public function show(Price $price)
    {
        abort_if(Gate::denies('price2_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price->load('amenities');
        echo $price;
        return view('admin.prices.show', compact('price','id'));
    }
    public function destroy(Price2 $price2)
    {
        abort_if(Gate::denies('price2_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price2->delete();

        return back();
    }

    public function massDestroy(MassDestroyPrice2Request $request)
    {
        Price2::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
