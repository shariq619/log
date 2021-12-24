@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                R1: RIL and Non RIL (RIL = Reduced Impact Logging) 
            </h4>
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Year</th>
                            <th>Month</th>
                            <th>RIL(M3)</th>
                            <th>Non RIL(M3)</th>
                            <th>Total(M3)</th>
                        </tr>
                        <tr>
                            <td>2019</td>
                            <td>January</td>
                            <td>10,000.00</td>
                            <td>20,000.00</td>
                            <td>30,000.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>February</td>
                            <td>12,000.00</td>
                            <td>15,000.00</td>
                            <td>27,000.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>March</td>
                            <td>15,000.00</td>
                            <td>18,000.00</td>
                            <td>33,000.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>April</td>
                            <td>11,000.00</td>
                            <td>10,000.00</td>
                            <td>21,000.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td></td>
                            <th>48,000.00</th>
                            <th>53,000.00</th>
                            <th>111,000.00</th>
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
