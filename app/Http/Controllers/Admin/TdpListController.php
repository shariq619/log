<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\LandStatus;
use App\TdpList;
use App\TdpStatusLog;
use App\Region;
use App\User;
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
    public function edit(TdpList $logList)
    {
        abort_if(Gate::denies('tdp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['regions'] = Region::all();
        $data['districts'] = District::all();

        $data['land_status'] = LandStatus::all();
        $data['species'] = Species::all();

        return view('admin.tdp-list.edit',compact('logList'))->with($data);
    }

    public function update(Request $request){
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
           //'registered_property_hammer_mark' => 'required',
           'length' => 'required',
        ]);

        if($request->has('registered_property_hammer_mark')){
            $fileName = time().'_'.$request->registered_property_hammer_mark->getClientOriginalName();
            $filePath = $request->file('registered_property_hammer_mark')->storeAs('admin', $fileName, 'public');
            $data['registered_property_hammer_mark'] = $filePath;
        }
        $data = $request->all();
        unset($data['id']);
        $tdpList = TdpList::find($request->id);
        //dd($tdpList);
        $tdpList->update($data);
        
        $statusData = ['status'=>'Submitted','reason'=>'','user_id'=>$data['user_id'],'tdp_list_id'=>$tdpList->id];
        TdpStatusLog::create($statusData);

        return redirect()->route('admin.tdp.list.index')->with('message','Log updated successfully');
    }
    
    public function assignTo(TdpList $logList)
    {
        abort_if(Gate::denies('tdp_assignto'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $kppms = User::whereHas('roles', function($q){$q->where('title', 'KPPM');})->get();
        return view('admin.tdp-list.assignto', compact('logList','kppms'));
    }
    public function assignedTo(Request $request)
    {
        abort_if(Gate::denies('tdp_assignto'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $statusData = ['status'=>'Assigned','reason'=>'','user_id'=>auth()->user()->id,'assignto_id'=>$request->assignto_id,'tdp_list_id'=>$request->tdp_list_id];
        TdpStatusLog::create($statusData);
        
        return redirect()->route('admin.tdp.list.index')->with('message','Log assigned successfully');
    }

    public function statuslog(Request $request)
    {
        abort_if(Gate::denies('tdp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $statusData = ['status'=>$request->status,'reason'=>$request->reason,'user_id'=>auth()->user()->id,'tdp_list_id'=>$request->tdp_list_id];
        TdpStatusLog::create($statusData);
        
        return redirect()->route('admin.tdp.list.index')->with('message',"Log $request->status");
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

        $tdpList = TdpList::create($data);

        $statusData = ['status'=>'Submitted','reason'=>'','user_id'=>$data['user_id'],'tdp_list_id'=>$tdpList->id];
        TdpStatusLog::create($statusData);

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
