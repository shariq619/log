@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.edit') }} Log Size
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("admin.logsizes.update", [$logsize->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.species.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($logsize) ? $logsize->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.species.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('from_size') ? 'has-error' : '' }}">
                <label for="name">From Size*</label>
                <input type="text" id="from_size" name="from_size" class="form-control" value="{{ old('from_size', isset($logsize) ? $logsize->from_size : '') }}" >
                @if($errors->has('from_size'))
                    <p class="help-block">
                        {{ $errors->first('from_size') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('to_size') ? 'has-error' : '' }}">
                <label for="name">To Size*</label>
                <input type="text" id="to_size" name="to_size" class="form-control" value="{{ old('to_size', isset($logsize) ? $logsize->to_size : '') }}" >
                @if($errors->has('to_size'))
                    <p class="help-block">
                        {{ $errors->first('to_size') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('unit_size') ? 'has-error' : '' }}">
                <label for="name">Unit*</label>
                <input type="text" id="unit_size" name="unit_size" class="form-control" value="{{ old('unit_size', isset($logsize) ? $logsize->unit_size : '') }}" >
                @if($errors->has('unit_size'))
                    <p class="help-block">
                        {{ $errors->first('unit_size') }}
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
