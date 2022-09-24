<?php

namespace App\Http\Controllers\Admin;

use App\Amenity2;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPrice2Request;
use App\Http\Requests\StorePrice2Request;
use App\Http\Requests\UpdatePrice2Request;
use App\Price2;
use App\Price;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Prices2Controller extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('price2_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prices = Price2::all();

        return view('admin.prices2.index', compact('prices'));
    }

    public function create()
    {
        abort_if(Gate::denies('price2_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $amenities2 = Amenity2::all()->value('name', 'id');

        return view('admin.prices2.create', compact('amenities2'));
    }

    public function store(StorePrice2Request $request)
    {
        $price2 = Price2::create($request->all());
        $price2->amenities2()->sync($request->input('amenities2', []));

        return redirect()->route('admin.prices2.index');
    }

    public function edit(Price2 $price)
    {
        abort_if(Gate::denies('price2_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $amenities2 = Amenity2::all()->pluck('name', 'id');
        $price->load('amenities2');
        echo $price;
        return view('admin.prices2.edit', compact('amenities2', 'price'));
    }

    public function update(UpdatePrice2Request $request, Price2 $price2)
    {
        $price2->update($request->all());
        $price2->amenities2()->sync($request->input('amenities2', []));

        return redirect()->route('admin.prices2.index');
    }

    public function show(Price2 $price2)
    {
        abort_if(Gate::denies('price2_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price2->load('amenities2');
        echo $price2;
        return view('admin.prices2.show', compact('price2'));
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
