@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                {{ trans('global.show') }} {{ trans('cruds.land_status.title') }}
            </h4>
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.land_status.fields.id') }}
                        </th>
                        <td>
                            {{ $landStatus->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.land_status.fields.name') }}
                        </th>
                        <td>
                            {{ $landStatus->name }}
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
