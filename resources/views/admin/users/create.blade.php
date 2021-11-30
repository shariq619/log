@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif

                <label for="email">Email*</label>
                <input type="email" id="name" name="email" class="form-control" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif

                <label for="name">Position*</label>
                <input type="text" id="position" name="position" class="form-control" value="{{ old('position') }}" required>
                @if($errors->has('position'))
                    <p class="help-block">
                        {{ $errors->first('position') }}
                    </p>
                @endif

                <label for="name">Contact Person*</label>
                <input type="text" id="contact_person" name="contact_person" class="form-control" value="{{ old('contact_person') }}" required>
                @if($errors->has('contact_person'))
                    <p class="help-block">
                        {{ $errors->first('contact_person') }}
                    </p>
                @endif

                <label for="name">Contact No.*</label>
                <input type="text" id="contact_no" name="contact_no" class="form-control" value="{{ old('contact_no') }}" required>
                @if($errors->has('contact_no'))
                    <p class="help-block">
                        {{ $errors->first('contact_no') }}
                    </p>
                @endif

                <label for="name">ID No.*</label>
                <input type="text" id="id_no" name="id_no" class="form-control" value="{{ old('id_no') }}" required>
                @if($errors->has('id_no'))
                    <p class="help-block">
                        {{ $errors->first('id_no') }}
                    </p>
                @endif

                <label for="name">District.*</label>
                <input type="text" id="district" name="district" class="form-control" value="{{ old('district') }}" required>
                @if($errors->has('district'))
                    <p class="help-block">
                        {{ $errors->first('district') }}
                    </p>
                @endif

                <label for="name">Applicant OR Internal.*</label>
                <select name="applicant_or_internal" id="applicant_or_internal" class="form-control"  required>
                    <option value="applicant">Applicant</option>
                    <option value="internal">Internal</option>
                </select>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
