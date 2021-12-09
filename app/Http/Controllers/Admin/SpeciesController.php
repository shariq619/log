<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRegionRequest;
use App\Http\Requests\MassDestroySpeciesRequest;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Http\Requests\UpdateSpeciesRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Notifications\UserNotify;
use App\Region;
use App\Role;
use App\Species;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpeciesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('species_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $species = Species::all();

        return view('admin.species.index', compact('species'));
    }

    public function create()
    {
        abort_if(Gate::denies('species_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.species.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $species = Species::create($request->except('_token'));
        return redirect()->route('admin.species.index')->with('message', 'Species created successfully');

    }

    public function edit(Species $species)
    {
        abort_if(Gate::denies('species_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.species.edit', compact('species'));
    }

    public function update(UpdateSpeciesRequest $request, Species $species)
    {
        $species->update($request->all());

        return redirect()->route('admin.species.index');

    }

    public function show(Species $species)
    {
        abort_if(Gate::denies('species_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.species.show', compact('species'));
    }

    public function destroy(Species $species)
    {
        abort_if(Gate::denies('species_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $species->delete();

        return back();

    }

    public function massDestroy(MassDestroySpeciesRequest $request)
    {
        Species::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
