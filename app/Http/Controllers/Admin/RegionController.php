<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRegionRequest;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Notifications\UserNotify;
use App\Region;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('region_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all();

        return view('admin.region.index', compact('regions'));
    }

    public function create()
    {
        abort_if(Gate::denies('region_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.region.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $region = Region::create($request->except('_token'));
        return redirect()->route('admin.regions.index')->with('message', 'Region created successfully');

    }

    public function edit(Region $region)
    {
        abort_if(Gate::denies('region_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.region.edit', compact('region'));
    }

    public function update(UpdateRegionRequest $request, Region $region)
    {
        $region->update($request->all());

        return redirect()->route('admin.regions.index');

    }

    public function show(Region $region)
    {
        abort_if(Gate::denies('region_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.region.show', compact('region'));
    }

    public function destroy(Region $region)
    {
        abort_if(Gate::denies('region_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $region->delete();

        return back();

    }

    public function massDestroy(MassDestroyRegionRequest $request)
    {
        Region::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
