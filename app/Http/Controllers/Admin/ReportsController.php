<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //
    public function index(){
        return view('admin.reports.list');
    }

    public function rilnonril(){
        return view('admin.reports.rilnonril');
    }
}
