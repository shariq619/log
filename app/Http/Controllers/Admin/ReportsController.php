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

    public function r2(){
        return view('admin.reports.r2');
    }

    public function r3(){
        return view('admin.reports.r3');
    }

    public function r4(){
        return view('admin.reports.r4');
    }
    public function r5(){
        return view('admin.reports.r5');
    }
    public function r6(){
        return view('admin.reports.r6');
    }
    public function r7(){
        return view('admin.reports.r7');
    }
    public function r8(){
        return view('admin.reports.r8');
    }
    public function r9(){
        return view('admin.reports.r9');
    }
    public function r10(){
        return view('admin.reports.r10');
    }
    public function r11(){
        return view('admin.reports.r11');
    }
    public function r12(){
        return view('admin.reports.r12');
    }


}
