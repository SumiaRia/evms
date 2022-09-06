<?php

namespace App\Http\Requests;

use App\Price2;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPrice2Request extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('price2_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:prices2,id',
        ];
    }
}
