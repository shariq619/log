<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDistrictRequest;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateDistrictRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Notifications\UserNotify;
use App\Region;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DistrictController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('district_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all();

        return view('admin.districts.index', compact('districts'));
    }

    public function create()
    {
        abort_if(Gate::denies('district_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('name', 'id');
        $dfos = User::whereHas('roles', function($q){$q->where('title', 'DFO');})->get();

        return view('admin.districts.create', compact('regions','dfos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'region_id' => 'required',
        ]);


        $district = District::create($request->except('_token'));

        return redirect()->route('admin.districts.index')->with('message', 'District created successfully');

    }

    public function edit(District $district)
    {
        abort_if(Gate::denies('district_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('name', 'id');
        $dfos = User::whereHas('roles', function($q){$q->where('title', 'DFO');})->get();
        return view('admin.districts.edit', compact('regions', 'district','dfos'));
    }

    public function update(UpdateDistrictRequest $request, District $district)
    {
        $district->update($request->all());

        return redirect()->route('admin.districts.index');

    }

    public function show(District $district)
    {
        abort_if(Gate::denies('district_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.districts.show', compact('district'));
    }

    public function destroy(District $district)
    {
        abort_if(Gate::denies('district_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $district->delete();

        return back();

    }

    public function massDestroy(MassDestroyDistrictRequest $request)
    {
        District::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
