<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\LandStatus;
use App\TdpList;
use App\Region;
use App\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TdpListController extends Controller
{

    public function index()
    {

        $logs = TdpList::all();

        return view('admin.tdp-list.index', compact('logs'));
    }

    public function show(TdpList $logList)
    {
        abort_if(Gate::denies('tdp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tdp-list.show', compact('logList'));
    }

    public function create()
    {
        abort_if(Gate::denies('tdp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['regions'] = Region::all();
        $data['districts'] = District::all();

        $data['land_status'] = LandStatus::all();
        $data['species'] = Species::all();

        return view('admin.tdp-list.create',$data);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
           'name' => 'required',
           'license_no' => 'required',
           'region_id' => 'required',
           'district_id' => 'required',
           'land_status' => 'required',
           'reduced_impact_logging' => 'required',
           'market' => 'required',
           'place_of_scalling' => 'required',
           'license_account_no' => 'required',
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
           'registered_property_hammer_mark' => 'required',
           'length' => 'required',
        ]);

        if($request->has('registered_property_hammer_mark')){
            $fileName = time().'_'.$request->registered_property_hammer_mark->getClientOriginalName();
            $filePath = $request->file('registered_property_hammer_mark')->storeAs('admin', $fileName, 'public');
            $data['registered_property_hammer_mark'] = $filePath;
        }


        $data['user_id'] = auth()->user()->id;

        TdpList::create($data);

        $data['regions'] = Region::all();
        $data['districts'] = District::all();

        $data['land_status'] = LandStatus::all();
        $data['species'] = Species::all();

        return redirect()->route('admin.tdp.list.index')->with('message','Log created successfully');

    }

    public function destroy(TdpList $tdpList)
    {
        abort_if(Gate::denies('tdp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tdpList->delete();

        return back();

    }
}
