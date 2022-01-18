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
                        <tr>
                            <th>
                                R2 Accumulated Production by Licensee
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r2')}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                R3: Type of Land-used by Region, District Licensee, Diameter, Volume
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r3')}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                R4: Type of land-used by Region, District Licensee, Volume, Royalty
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r4')}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                R5: Type of land-used by Region, District Licensee, Species, Volume
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r5')}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                R6: Logs Production
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r6')}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                R7: Logs Production by Market
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r7')}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                R8: Logs Production by Revenue
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r8')}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                R9: Summary Logs Production by Land
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r9')}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                R10: Production Helicopter Logging
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r10')}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                R11: Type of land-used by Region, District Licensee, Volume, Royalty, Destination
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r11')}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                R12: Type of Land-used and Region
                            </th>
                            <td>
                                <a href="{{route('admin.reports.r12')}}" class="btn btn-primary">View</a>
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
