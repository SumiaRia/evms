@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.price2.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.price2.fields.id') }}
                        </th>
                        <td>
                            {{ $price2->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.price2.fields.name') }}jjj
                        </th>
                        <td>
                            {{ $price2->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.price2.fields.price2') }}
                        </th>
                        <td>
                            ${{ $price2->price2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Amenities
                        </th>
                        <td>
                            @foreach($price2->amenities2 as $id => $amenities2)
                                <span class="label label-info label-many">{{ $amenities2->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection