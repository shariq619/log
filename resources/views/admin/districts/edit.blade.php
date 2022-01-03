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

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.district.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control"
                           value="{{ old('name', isset($district) ? $district->name : '') }}" required>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif


                    <label for="name">Region.*</label>
                    <select name="region_id" id="region_id" class="form-control">
                        @foreach($regions as $id => $region)
                            <option value="{{ $id }}" {{ (in_array($id, old('region_id', [])) || isset($district) && $district->region_id == $id) ? 'selected' : '' }}>{{ $region }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('region_id'))
                        <p class="help-block">
                            {{ $errors->first('region_id') }}
                        </p>
                    @endif

                    <label for="name">DFO.*</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach($dfos as $dfo)
                            <option value="{{ $dfo->id }}" {{ $district->user_id == $dfo->$id ? 'selected' : '' }}>{{ $dfo->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
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
