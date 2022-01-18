@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.edit') }} Log Size
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("admin.logrates.update", [$lograte->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('markete') ? 'has-error' : '' }}">
                <label for="markete">Market*</label>
                <select name="markete" class="form-control">
                    <option value="Export" {{($lograte->markete == 'Export') ? 'selected="selected"' : ''}}>Export</option>
                    <option value="Local" {{($lograte->markete == 'Local') ? 'selected="selected"' : ''}}>Local</option>
                </select>
                @if($errors->has('markete'))
                    <p class="help-block">
                        {{ $errors->first('markete') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
                <label for="class">Class*</label>
                <input type="text" id="class" name="class" class="form-control" value="{{ $lograte->class }}" >
                @if($errors->has('class'))
                    <p class="help-block">
                        {{ $errors->first('class') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('specie_id') ? 'has-error' : '' }}">
                <label for="name">Species*</label>
                <select name="species_id" class="form-control">
                    @foreach($species as $sp)
                    <option value="{{$sp->id}}" {{($lograte->species_id == $sp->id) ? 'selected="selected"' : ''}}>{{$sp->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('specie_id'))
                    <p class="help-block">
                        {{ $errors->first('specie_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('land_status_id') ? 'has-error' : '' }}">
                <label for="name">Land Type*</label>
                <select name="land_status_id" class="form-control">
                    @foreach($landstatus as $lt)
                    <option value="{{$lt->id}}" {{($lograte->land_status_id == $lt->id) ? 'selected="selected"' : ''}}>{{$lt->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('land_status_id'))
                    <p class="help-block">
                        {{ $errors->first('land_status_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('method') ? 'has-error' : '' }}">
                <label for="name">Method*</label>
                <select name="method" class="form-control">
                    <option value="Ril" {{($lograte->method == 'Ril') ? 'selected="selected"' : ''}}>Ril</option>
                    <option value="Non-Ril" {{($lograte->method == 'Non-Ril') ? 'selected="selected"' : ''}}>Non-Ril</option>
                    <option value="Helicopter" {{($lograte->method == 'Helicopter') ? 'selected="selected"' : ''}}>Helicopter</option>
                </select>
                @if($errors->has('method'))
                    <p class="help-block">
                        {{ $errors->first('method') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('log_size_id') ? 'has-error' : '' }}">
                <label for="name">Log Size*</label>
                <select name="log_size_id" class="form-control">
                    @foreach($logsizes as $ls)
                    <option value="{{$ls->id}}" {{($lograte->log_size_id == $ls->id) ? 'selected="selected"' : ''}}>{{$ls->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('log_size_id'))
                    <p class="help-block">
                        {{ $errors->first('log_size_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="name">Price*</label>
                <input type="text" id="price" name="price" class="form-control" value="{{ $lograte->price }}" >
                @if($errors->has('price'))
                    <p class="help-block">
                        {{ $errors->first('price') }}
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
