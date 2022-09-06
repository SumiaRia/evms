@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.price2.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.prices2.update", [price2->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.price2.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($price2) ? $price2->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.price2.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price2') ? 'has-error' : '' }}">
                <label for="price2">{{ trans('cruds.price2.fields.price2') }}*</label>
                <input type="number" id="price2" name="price2" class="form-control" value="{{ old('price2', isset($price2) ? $price2->price2 : '') }}" step="0.01" required>
                @if($errors->has('price2'))
                    <p class="help-block">
                        {{ $errors->first('price2') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.price2.fields.price2_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('amenities2') ? 'has-error' : '' }}">
                <label for="amenities2">{{ trans('cruds.price2.fields.amenities2') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="amenities2[]" id="amenities2" class="form-control select2" multiple="multiple">
                    @foreach($amenities2 as $id => $amenities2)
                        <option value="{{ $id }}" {{ (in_array($id, old('amenities2', [])) || isset($price2) && $price2->amenities2->contains($id)) ? 'selected' : '' }}>{{ $amenities2 }}</option>
                    @endforeach
                </select>
                @if($errors->has('amenities2'))
                    <p class="help-block">
                        {{ $errors->first('amenities2') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.price2.fields.amenities2_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection