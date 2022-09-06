<?php

namespace App\Http\Requests;

use App\Price2;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePrice2Request extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('price2_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
                'required',
            ],
            'price2'       => [
                'required',
            ],
            'amenities2.*' => [
                'integer',
            ],
            'amenities2'   => [
                'array',
            ],
        ];
    }
}
