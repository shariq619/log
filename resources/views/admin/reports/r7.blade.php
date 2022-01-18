@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                R7: Logs Production by Market
            </h4>
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Region</th>
                            <th>District</th>
                            <th>Licencee</th>
                            <th colspan="6" style="padding:0; text-align:center;">
                                Diameter (M3)
                                <table style="width:100%">
                                    <td style="width:105px;">60cm<</td>
                                    <td style="width:105px;">44cm-59cm</td>
                                    <td style="width:105px;">30cm-43cm</td>
                                    <td style="width:105px;">29cm></td>
                                    <td style="width:105px;">Others</td>
                                    <td style="width:105px;">Total<</td>
                                </table>
                            </th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="width:105px;"></td>
                            <td style="width:105px;"></td>
                            <td style="width:105px;"></td>
                            <td style="width:105px;"></td>
                            <td style="width:105px;"></td>
                            <td style="width:105px;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td></td>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
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
