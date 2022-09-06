<?php

namespace App\Http\Requests;

use App\Amenity2;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAmenity2Request extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('amenity2_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
