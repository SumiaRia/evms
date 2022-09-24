@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.price.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.prices2.update', [$price->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.price.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($price2) ? $price2->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.price.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('cruds.price.fields.price') }}*</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($price) ? $price->price : '') }}" step="0.01" required>
                @if($errors->has('price'))
                    <p class="help-block">
                        {{ $errors->first('price') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.price.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('amenities') ? 'has-error' : '' }}">
                <label for="amenities">{{ trans('cruds.price.fields.amenities') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="amenities[]" id="amenities" class="form-control select2" multiple="multiple">
                    @foreach($amenities2 as $id => $amenities2)
                        <option value="{{ $id }}" {{ (in_array($id, old('amenities2', [])) || isset($price) && $price->amenities2->contains($id)) ? 'selected' : '' }}>{{ $amenities2 }}</option>
                    @endforeach
                </select>
                @if($errors->has('amenities'))
                    <p class="help-block">
                        {{ $errors->first('amenities') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.price.fields.amenities_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection