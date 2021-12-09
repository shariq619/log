<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\LogList;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LogListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('log_list'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['regions'] = Region::all();
        $data['districts'] = District::all();

        return view('admin.log-list.index',$data);
    }

    public function store(Request $request)
    {

        $request->validate([
          // 'username' => 'required',
           'license_no' => 'required',
           'region_id' => 'required',
           'district_id' => 'required',
           'land_status' => 'required',
           'reduced_impact_logging' => 'required',
           'market' => 'required',
           'place_of_scalling' => 'required',
           'date_scaled' => 'required',
           'name_of_scaler' => 'required',
           'owner_of_property_hammer_mark' => 'required',
           'serial_no' => 'required',
           'log_no' => 'required',
           'species' => 'required',
           'diameter_1' => 'required',
           'diameter_2' => 'required',
           'diameter_mean' => 'required',
           'symbol' => 'required',
           'defect_length' => 'required',
           'defect_diameter' => 'required',
        ]);

        if($request->has('registered_property_hammer_mark')){
            $fileName = time().'_'.$request->registered_property_hammer_mark->getClientOriginalName();
            $filePath = $request->file('registered_property_hammer_mark')->storeAs('admin', $fileName, 'public');
            $request->registered_property_hammer_mark = $filePath;
        }

        LogList::create($request->all());

        $data['regions'] = Region::all();
        $data['districts'] = District::all();
        return view('admin.log-list.index',$data);

    }
}
