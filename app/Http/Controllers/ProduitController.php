<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //

    public function ajouterproduit(){
        return view('admin.ajouterproduit');
    }
    public function sauveproduit(Request $request){

    }

    public function produit(){
        return view('admin.produit');
    }
}
