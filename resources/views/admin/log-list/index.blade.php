@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                Log List Form
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route("admin.log.list") }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col">
                        <input type="text" id="user_id" placeholder="{{ auth()->user()->name }}" name="user_id" class="form-control"
                                >
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
                            <option value="">Select Land Status</option>
                            <option value="NFM">NFM</option>
                            <option value="ITP">ITP</option>

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
                        <input type="text" id="licensee_account_no" placeholder="Licensee Account No" name="licensee_account_no"
                               class="form-control" value="{{ old('licensee_account_no') }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="date_scaled" placeholder="Date Scaled" name="date_scaled"
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


                <div class="row mt-5">
                    <div class="col">
                        <input type="text" id="serial_no" placeholder="Serial No" name="serial_no" class="form-control"
                               value="{{ old('serial_no') }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="log_no" placeholder="Log  No" name="log_no"
                               class="form-control" value="{{ old('log_no') }}" >
                    </div>
                    <div class="col">
                        <select name="species" id="species" class="form-control" >
                            <option value="">Select Species </option>
                            <option value="aca"> Species </option>
                        </select>
                    </div>
                </div>


                <div class="row mt-5">
                    <div class="col">
                        <input type="text" id="length" placeholder="Length" name="length" class="form-control"
                               value="{{ old('length') }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="diameter_1" placeholder="Diameter 1" name="diameter_1"
                               class="form-control" value="{{ old('diameter_1') }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="diameter_2" placeholder="Diameter 2" name="diameter_2"
                               class="form-control" value="{{ old('diameter_2') }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="diameter_mean" placeholder="Diameter Mean" name="diameter_mean"
                               class="form-control" value="{{ old('diameter_mean') }}" >
                    </div>
                </div>





                <div class="row mt-5">
                    <div class="col">
                        <input type="text" id="symbol" placeholder="Symbol " name="symbol" class="form-control"
                               value="{{ old('symbol') }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="defect_length" placeholder="Defect Length" name="defect_length"
                               class="form-control" value="{{ old('defect_length') }}" >
                    </div>
                    <div class="col">
                        <input type="text" id="defect_diameter" placeholder="Diameter 2" name="defect_diameter"
                               class="form-control" value="{{ old('defect_diameter') }}" >
                    </div>
                </div>

                <div class="row mt-2">
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>

            </form>
        </div>
    </div>
@endsection
