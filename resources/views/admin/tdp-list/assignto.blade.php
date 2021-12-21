@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                TDP
            </h4>
        </div>

        <div class="card-body">
            <div>
                <form method="post" action="{{route('admin.tdp.list.assignedto')}}">
                    @csrf
                    <div class="form-group">
                        <label id="assignto_id" class="form-label">Assign To</label>
                        <select name="assignto_id" id="assignto_id" class="form-control" >
                            <option value="">Select KPPM</option>
                            @foreach($kppms as $k )
                                <option value="{{$k->id}}">{{$k->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Remarks:</label>
                        <textarea name="reason" class="form-control" id="reason"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tdp_list_id" value="{{ $logList->id }}">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $logList->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Username
                        </th>
                        <td>
                            {{ $logList->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            License no
                        </th>
                        <td>
                            {{ $logList->license_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Reduced Impact Logging
                        </th>
                        <td>
                            {{ $logList->reduced_impact_logging }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Markete
                        </th>
                        <td>
                            {{ $logList->market }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Place of scalling
                        </th>
                        <td>
                            {{ $logList->place_of_scalling }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            License account no
                        </th>
                        <td>
                            {{ $logList->license_account_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date scaled
                        </th>
                        <td>
                            {{ $logList->date_scaled }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name of scaler
                        </th>
                        <td>
                            {{ $logList->name_of_scaler }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Registered Property Hammer Mark
                        </th>
                        <td>
                            <img src="{{ asset($logList->registered_property_hammer_mark) }}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Owner of property hammer mark
                        </th>
                        <td>
                            {{ $logList->owner_of_property_hammer_mark }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Serial no
                        </th>
                        <td>
                            {{ $logList->serial_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Log no
                        </th>
                        <td>
                            {{ $logList->log_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Length
                        </th>
                        <td>
                            {{ $logList->length }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Diameter 1
                        </th>
                        <td>
                            {{ $logList->diameter_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Diameter 2
                        </th>
                        <td>
                            {{ $logList->diameter_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Diameter mean
                        </th>
                        <td>
                            {{ $logList->diameter_mean }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Symbol
                        </th>
                        <td>
                            {{ $logList->symbol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Defect length
                        </th>
                        <td>
                            {{ $logList->defect_length }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Defect diameter
                        </th>
                        <td>
                            {{ $logList->defect_diameter }}
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
