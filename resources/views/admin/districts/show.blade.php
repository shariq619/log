@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.show') }} {{ trans('cruds.destrict.title') }}
        </h4>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.district.fields.id') }}
                        </th>
                        <td>
                            {{ $district->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.district.fields.name') }}
                        </th>
                        <td>
                            {{ $district->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.district.fields.email') }}
                        </th>
                        <td>
                            {{ $district->region_id }}
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
