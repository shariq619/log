@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                {{ trans('global.create') }} {{ trans('cruds.district.title_singular') }}
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route("admin.districts.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="name">Name*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif


                    <label for="name">Region.*</label>
                    <select name="region_id" id="region_id" class="form-control">
                        @foreach($regions as $id => $region)
                            <option value="{{ $id }}">{{ $region }}</option>
                        @endforeach
                    </select>

                    <label for="name">DFO.*</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach($dfos as $dfo)
                            <option value="{{ $dfo->id }}">{{ $dfo->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
