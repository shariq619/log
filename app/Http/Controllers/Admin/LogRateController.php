<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Role;
use App\LogRate;
use App\LogSize;
use App\Species;
use App\LandStatus;
use App\User;

class LogRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('lograte_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $logrates = LogRate::all();

        return view('admin.logrates.index', compact('logrates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('lograte_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $species = Species::all();
        $landstatus = LandStatus::all();
        $logsizes = LogSize::all();
        return view('admin.logrates.create',compact('species','landstatus','logsizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'markete' => 'required',
            'class' => 'required',
            'specie_id' => 'required',
            'land_status_id' => 'required',
            'log_size_id' => 'required',
            'method' => 'required',
            'price' => 'required',
        ]);

        $lograte = logRate::create($request->except('_token'));
        return redirect()->route('admin.logrates.index')->with('message', 'logRate created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('lograte_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $lograte = LogRate::find($id);
        $species = Species::all();
        $landstatus = LandStatus::all();
        $logsizes = LogSize::all();
        return view('admin.logrates.edit', compact('species','landstatus','logsizes','lograte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lograte = logRate::find($id);
        $lograte->update($request->all());

        return redirect()->route('admin.logrates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('lograte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $lograte = logRate::find($id);
        $lograte->delete();

        return back();
    }
    public function massDestroy(Request $request)
    {
        logRate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
