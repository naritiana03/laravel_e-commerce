<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function home(){
        return view('clients.home');
    }

    public function cart(){
        return view('clients.cart');
    }

    public function checkout(){
        return view('clients.checkout');
    }

    public function shop(){
        return view('clients.shop');
    }

    public function login(){
        return view('clients.login');
    }

    public function signup(){
        return view('clients.signup');
    }

  
}
