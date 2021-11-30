<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LogListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('log_list'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.log-list.index');
    }

    public function store(Request $request)
    {

        /*$request->validate([
           'name' => 'required',
           'email' => 'email|required',
           'position' => 'required',
           'contact_person' => 'required',
           'contact_no' => 'required',
           'id_no' => 'required',
           'district' => 'required',
           'applicant_or_internal' => 'required',
        ]);*/

    }
}
