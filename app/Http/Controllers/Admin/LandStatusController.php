<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLandStatusRequest;
use App\Http\Requests\MassDestroyRegionRequest;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateLandStatusRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Http\Requests\UpdateUserRequest;
use App\LandStatus;
use App\Notifications\UserNotify;
use App\Region;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LandStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('land_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landStatus = LandStatus::all();

        return view('admin.land_status.index', compact('landStatus'));
    }

    public function create()
    {
        abort_if(Gate::denies('land_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.land_status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $land_status = LandStatus::create($request->except('_token'));
        return redirect()->route('admin.land_status.index')->with('message', 'Land Status created successfully');

    }

    public function edit(LandStatus $landStatus)
    {
        abort_if(Gate::denies('land_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.land_status.edit', compact('landStatus'));
    }

    public function update(UpdateLandStatusRequest $request, LandStatus $landStatus)
    {
        $landStatus->update($request->all());

        return redirect()->route('admin.land_status.index');

    }

    public function show(LandStatus $landStatus)
    {
        abort_if(Gate::denies('land_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.land_status.show', compact('landStatus'));
    }

    public function destroy(LandStatus $landStatus)
    {
        abort_if(Gate::denies('land_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landStatus->delete();

        return back();

    }

    public function massDestroy(MassDestroyLandStatusRequest $request)
    {
        LandStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
