<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Role;
use App\LogSize;
use App\User;

class LogSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('logsize_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $logsizes = LogSize::all();

        return view('admin.logsizes.index', compact('logsizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('logsize_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.logsizes.create');
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
            'name' => 'required',
            'from_size' => 'required',
            'to_size' => 'required',
            'unit_size' => 'required',
        ]);

        $logsize = LogSize::create($request->except('_token'));
        return redirect()->route('admin.logsizes.index')->with('message', 'LogSize created successfully');
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
        abort_if(Gate::denies('logsize_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $logsize = LogSize::find($id);
        return view('admin.logsizes.edit', compact('logsize'));
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
        $logsize = LogSize::find($id);
        $logsize->update($request->all());

        return redirect()->route('admin.logsizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('logsize_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $logsize = LogSize::find($id);
        $logsize->delete();

        return back();
    }
    public function massDestroy(Request $request)
    {
        LogSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
