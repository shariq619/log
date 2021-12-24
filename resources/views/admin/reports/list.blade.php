@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                Reports
            </h4>
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                Report
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        <tr>
                            <th>
                                R1: RIL and Non RIL
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r1')}}" class="btn btn-primary">View</a>
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
