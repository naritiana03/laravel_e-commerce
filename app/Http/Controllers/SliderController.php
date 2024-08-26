<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    //

    public function ajouterslider(){
        return view('admin.ajouterslider');
    }

    public function sauveslider(Request $request){

    }

    public function slider(){
        return view('admin.sliders');
    }
}
