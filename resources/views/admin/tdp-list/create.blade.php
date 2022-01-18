@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                TDP Form
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route("admin.tdp.list") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" id="name" readonly placeholder="{{ auth()->user()->name }}" value="{{ auth()->user()->name }}" name="name" class="form-control">
                    </div>
                    <div class="col">
                        <input type="text" id="license_no" placeholder="License No./Coupe No" name="license_no"
                               class="form-control" value="{{ old('license_no') }}" >
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <select name="region_id" id="region_id" class="form-control" >
                            <option value="">Select Region</option>
                            @foreach($regions as $region )
                                <option value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select name="district_id" id="district_id" class="form-control" >
                            <option value="">Select District</option>
                            @foreach($districts as $district )
                                <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <select name="land_status" id="land_status" class="form-control" >
                            @foreach($land_status as $status )
                                <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label >Reduced Impact Logging</label>
                        <br>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reduced_impact_logging" id="reducedRadio1"
                                       value="yes"> Yes
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reduced_impact_logging" id="reducedRadio2"
                                       value="no"> No
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
                                       value="export_processing"> Export processing
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="market" id="markettRadio2"
                                       value="local_processing"> Local processing
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
                               value="{{ old('place_of_scalling') }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="license_account_no" placeholder="Licensee Account No" name="license_account_no"
                               class="form-control" value="{{ old('license_account_no') }}" >
                    </div>
                    <div class="col">
                        <input type="date" id="date_scaled" placeholder="Date Scaled" name="date_scaled"
                               class="form-control" value="{{ old('date_scaled') }}" >
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <input type="text" id="name_of_scaler" placeholder="Name of Scaler" name="name_of_scaler" class="form-control"
                               value="{{ old('name_of_scaler') }}" >
                    </div>
                    <div class="col">
                        <label>Registered Property Hammer Mark</label>
                        <input type="file" id="registered_property_hammer_mark"  name="registered_property_hammer_mark"
                               class="form-control" value="{{ old('registered_property_hammer_mark') }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="owner_of_property_hammer_mark" placeholder="Owner of Property Hammer Mark" name="owner_of_property_hammer_mark"
                               class="form-control" value="{{ old('owner_of_property_hammer_mark') }}" >
                    </div>
                </div>

                <table id="logs_table" class="table">
                    <thead>
                        <th>SN</th>
                        <th>Log No</th>
                        <th>Species</th>
                        <th>L(M)</th>
                        <th>D1(CM)</th>
                        <th>D2(CM)</th>
                        <th>Mean(CM)</th>
                        <th>DS</th>
                        <th>DL(M)</th>
                        <th>DD(CM)</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <input type="text" id="serial_no" placeholder="Serial No" name="serial_no[]" class="form-control" >
                        </td>
                        <td>
                            <input type="text" id="log_no" placeholder="Log  No" name="log_no[]"
                               class="form-control"  >
                        </td>
                        <td>
                            <select name="species[]" id="species" class="form-control" >
                                @foreach($species as $sp )
                                    <option value="{{$sp->id}}">{{$sp->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" id="length" placeholder="Length" name="length[]" class="form-control"   >
                        </td>
                        <td>
                            <input type="text" id="diameter_1" placeholder="Diameter 1" name="diameter_1[]" class="form-control"  >
                        </td>
                        <td>
                            <input type="text" id="diameter_2" placeholder="Diameter 2" name="diameter_2[]" class="form-control" >
                        </td>
                        <td>
                            <input type="text" id="diameter_mean" placeholder="Diameter Mean" name="diameter_mean[]" class="form-control"  >
                        </td>
                        <td>
                            <input type="text" id="symbol" placeholder="Symbol " name="symbol[]" class="form-control" >
                        </td>
                        <td>
                            <input type="text" id="defect_length" placeholder="Defect Length" name="defect_length[]" class="form-control"  >
                        </td>
                        <td>
                            <input type="text" id="defect_diameter" placeholder="Defect Diameter" name="defect_diameter[]" class="form-control" value="" >
                        </td>
                        </tr>
                    </tbody>
                </table>
                <a href="javascript:;" class="add_log">+Add another log</a>
                <p>Note: SN=Serial No., L=Length, D1=Diameter 1, D2=Diameter 2, DS=Defect Symbol, DL=Defect Length, DD=Defect Diameter</p>

                <div class="row mt-2">
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
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
                        <input type="text" id="serial_no" placeholder="Serial No" name="serial_no[]" class="form-control"  >
                    </td>
                    <td>
                        <input type="text" id="log_no" placeholder="Log  No" name="log_no[]"
                            class="form-control"  >
                    </td>
                    <td>
                        <select name="species[]" id="species" class="form-control" >
                            @foreach($species as $sp )
                                <option value="{{$sp->id}}">{{$sp->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" id="length" placeholder="Length" name="length[]" class="form-control"  >
                    </td>
                    <td>
                        <input type="text" id="diameter_1" placeholder="Diameter 1" name="diameter_1[]" class="form-control"  >
                    </td>
                    <td>
                        <input type="text" id="diameter_2" placeholder="Diameter 2" name="diameter_2[]" class="form-control"  >
                    </td>
                    <td>
                        <input type="text" id="diameter_mean" placeholder="Diameter Mean" name="diameter_mean[]" class="form-control" >
                    </td>
                    <td>
                        <input type="text" id="symbol" placeholder="Symbol " name="symbol[]" class="form-control"  >
                    </td>
                    <td>
                        <input type="text" id="defect_length" placeholder="Defect Length" name="defect_length[]" class="form-control"  >
                    </td>
                    <td>
                        <input type="text" id="defect_diameter" placeholder="Defect Diameter" name="defect_diameter[]" class="form-control"  >
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
