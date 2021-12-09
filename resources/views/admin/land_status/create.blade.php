@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                {{ trans('global.create') }} {{ trans('cruds.land_status.title_singular') }}
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route("admin.land_status.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="name">Name*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
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
