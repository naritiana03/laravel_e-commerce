<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function dashbord(){
        return view('admin.dashbord');
    }

    public function table(){
        return view('admin.data_table');
    }

    public function validation(){
        return view('admin.validation');
    }

    public function log(){
        return view('admin.login_admin');
    }
}

