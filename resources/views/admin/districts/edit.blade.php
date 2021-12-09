@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                {{ trans('global.edit') }} {{ trans('cruds.district.title_singular') }}
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route("admin.districts.update", [$district->id]) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.district.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control"
                           value="{{ old('name', isset($district) ? $district->name : '') }}" required>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.district.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('region') ? 'has-error' : '' }}">
                    <label for="roles">{{ trans('cruds.district.fields.region') }}*
                        <select name="region_id" id="region_id" class="form-control"
                                required>

                            @foreach($regions as $id => $region)
                                <option value="{{ $id }}" {{ (in_array($id, old('region_id', [])) || isset($district) && $district->region_id == $id) ? 'selected' : '' }}>{{ $region }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('region'))
                            <p class="help-block">
                                {{ $errors->first('region') }}
                            </p>
                    @endif
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>


        </div>
    </div>
@endsection
