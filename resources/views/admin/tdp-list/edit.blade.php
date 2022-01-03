@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                TDP Form
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.tdp.list.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" id="name" readonly placeholder="{{ auth()->user()->name }}" value="{{ $logList->name }}" name="name" class="form-control">
                    </div>
                    <div class="col">
                        <input type="text" id="license_no" placeholder="License No./Coupe No" name="license_no"
                               class="form-control" value="{{ $logList->license_no }}" >
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <select name="region_id" id="region_id" class="form-control" >
                            <option value="">Select Region</option>
                            @foreach($regions as $region )
                                <option value="{{$region->id}}" <?php echo ($logList->region_id == $region->id) ? 'selected="selected"' : '';?>>{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select name="district_id" id="district_id" class="form-control" >
                            <option value="">Select District</option>
                            @foreach($districts as $district )
                                <option value="{{$district->id}}" <?php echo ($logList->district_id == $district->id) ? 'selected="selected"' : '';?>>{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <select name="land_status" id="land_status" class="form-control" >
                            @foreach($land_status as $status )
                                <option value="{{$status->id}}" <?php echo ($logList->land_status == $status->id) ? 'selected="selected"' : '';?>>{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label >Reduced Impact Logging</label>
                        <br>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reduced_impact_logging" id="reducedRadio1"
                                       value="yes" <?php echo ($logList->reduced_impact_logging == "yes") ? 'checked="checked"' : '';?>> Yes
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reduced_impact_logging" id="reducedRadio2"
                                       value="no" <?php echo ($logList->reduced_impact_logging == "no") ? 'checked="checked"' : '';?>> No
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>

                    </div>
                    <div class="col">
                        <label >Market</label>
                        <br>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="market" id="markettRadio1"
                                       value="export_processing" <?php echo ($logList->market == "export_processing") ? 'checked="checked"' : '';?>> Export processing
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="market" id="markettRadio2"
                                       value="local_processing" <?php echo ($logList->market == "local_processing") ? 'checked="checked"' : '';?>> Local processing
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <input type="text" id="place_of_scalling" placeholder="Place of Scaling" name="place_of_scalling" class="form-control"
                               value="{{ $logList->place_of_scalling }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="license_account_no" placeholder="Licensee Account No" name="license_account_no"
                               class="form-control" value="{{ $logList->license_account_no }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="date_scaled" placeholder="Date Scaled" name="date_scaled"
                               class="form-control" value="{{ $logList->date_scaled }}" >
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <input type="text" id="name_of_scaler" placeholder="Name of Scaler" name="name_of_scaler" class="form-control"
                               value="{{ $logList->name_of_scaler }}" >
                    </div>
                    <div class="col">
                        <label>Registered Property Hammer Mark</label>
                        <input type="file" id="registered_property_hammer_mark"  name="registered_property_hammer_mark"
                               class="form-control" value="{{ $logList->registered_property_hammer_mark }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="owner_of_property_hammer_mark" placeholder="Owner of Property Hammer Mark" name="owner_of_property_hammer_mark"
                               class="form-control" value="{{ $logList->owner_of_property_hammer_mark }}" >
                    </div>
                </div>


                <div class="row mt-5">
                    <div class="col">
                        <input type="text" id="serial_no" placeholder="Serial No" name="serial_no" class="form-control"
                               value="{{ $logList->serial_no }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="log_no" placeholder="Log  No" name="log_no"
                               class="form-control" value="{{ $logList->log_no }}" >
                    </div>
                    <div class="col">
                        <select name="species" id="species" class="form-control" >
                            @foreach($species as $sp )
                                <option value="{{$sp->id}}" <?php echo ($logList->species == $sp->id) ? 'selected="selected"' : '';?>>{{$sp->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row mt-5">
                    <div class="col">
                        <input type="text" id="length" placeholder="Length" name="length" class="form-control"
                               value="{{ $logList->length }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="diameter_1" placeholder="Diameter 1" name="diameter_1"
                               class="form-control" value="{{ $logList->diameter_1 }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="diameter_2" placeholder="Diameter 2" name="diameter_2"
                               class="form-control" value="{{ $logList->diameter_2 }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="diameter_mean" placeholder="Diameter Mean" name="diameter_mean"
                               class="form-control" value="{{ $logList->diameter_mean }}" >
                    </div>
                </div>





                <div class="row mt-5">
                    <div class="col">
                        <input type="text" id="symbol" placeholder="Symbol " name="symbol" class="form-control"
                               value="{{ $logList->symbol }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="defect_length" placeholder="Defect Length" name="defect_length"
                               class="form-control" value="{{ $logList->defect_length }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="defect_diameter" placeholder="Diameter 2" name="defect_diameter"
                               class="form-control" value="{{ $logList->defect_diameter }}" >
                    </div>
                </div>

                <div class="row mt-2">
                    <input type="hidden" name="id" value="{{$logList->id}}">
                    <input type="hidden" name="user_id" value="{{$logList->user_id}}">
                    <input class="btn btn-primary" type="submit" value="{{ trans('global.save') }}">
                </div>

            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function($){
            $(".add_log").on('click',function(){
                $("#logs_table tbody").append(`
                    <tr>
                    <td>
                        <input type="text" id="serial_no" placeholder="Serial No" name="serial_no[]" class="form-control" value="{{ old('serial_no') }}" >
                    </td>
                    <td>
                        <input type="text" id="log_no" placeholder="Log  No" name="log_no[]"
                            class="form-control" value="{{ old('log_no') }}" >
                    </td>
                    <td>
                        <select name="species[]" id="species" class="form-control" >
                            @foreach($species as $sp )
                                <option value="{{$sp->id}}">{{$sp->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" id="length" placeholder="Length" name="length[]" class="form-control"  value="{{ old('length') }}" >
                    </td>
                    <td>
                        <input type="text" id="diameter_1" placeholder="Diameter 1" name="diameter_1[]" class="form-control" value="{{ old('diameter_1') }}" >
                    </td>
                    <td>
                        <input type="text" id="diameter_2" placeholder="Diameter 2" name="diameter_2[]" class="form-control" value="{{ old('diameter_2') }}" >
                    </td>
                    <td>
                        <input type="text" id="diameter_mean" placeholder="Diameter Mean" name="diameter_mean[]" class="form-control" value="{{ old('diameter_mean') }}" >
                    </td>
                    <td>
                        <input type="text" id="symbol" placeholder="Symbol " name="symbol[]" class="form-control" value="{{ old('symbol') }}" >
                    </td>
                    <td>
                        <input type="text" id="defect_length" placeholder="Defect Length" name="defect_length[]" class="form-control" value="{{ old('defect_length') }}" >
                    </td>
                    <td>
                        <input type="text" id="defect_diameter" placeholder="Defect Diameter" name="defect_diameter[]" class="form-control" value="{{ old('defect_diameter') }}" >
                    </td>
                    <td><a href="javascript:;" class="delete_log">Delete</a></td>
                    </tr>
                `)
            });

            $(document).on('click','.delete_log',function(){
                $(this).parents('tr').remove();
            })

        })
    </script>
@endsection