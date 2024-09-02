<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slider;

use App\Models\Categorie;

use Illuminate\Support\Facades\Hash;

use App\Models\Produit;

use App\Models\Client;

use App\Cart;

use Session;

class ClientController extends Controller
{
    //
    public function home(){

        $slider = Slider::where('status', 1)->get();

        $produit = Produit::where('status', 1)->get();
        
        return view('clients.home')->with('slider', $slider)->with('produit', $produit);
    }

    public function ajoutercart($id){

            $produit = Produit::find($id);

            $oldCart = Session::has('cart')? Session::get('cart'):null;

            $cart = new Cart($oldCart);

            $cart->add($produit, $id);

            Session::put('cart', $cart);

            //dd(Session::get('cart'));

            return redirect('/shop');



    }

    public function cart(){

        if (!Session::has('cart')) {
            # code...

            return view('clients.shop');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;

        $cart = new Cart($oldCart);

        return view('clients.cart', ['produit' => $cart ->items]);

      
    }

    public function retirerproduit($id){

        $oldCart = Session::has('cart')? Session::get('cart'):null;

        $cart = new Cart($oldCart);

        $cart->removeItem($id);

        if (count($cart->items) > 0) {

            Session::put('cart', $cart);
            # code...
        }else{
            Session::forget('cart');
        }

        return redirect('/cart');

    }

    public function modifiercart(Request $request ,$id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;

        $cart = new Cart($oldCart);

        $cart ->updateQty($id, $request->quantity);

        Session::put('cart',$cart);

        return redirect('/cart');
    }

    public function checkout(){

        if (!Session::has('client')) {
            # code...

            return view('clients.login');
        }

        
        if (!Session::has('cart')) {
            # code...

            return view('clients.shop');
        }

        return view('clients.checkout');
    }

    public function shop(){

        $slider = Slider::where('status', 1)->get();

        $categorie = Categorie::get();

        $produit = Produit::where('status', 1)->get();

        return view('clients.shop')->with('categorie', $categorie)->with('produit', $produit)->with('slider', $slider);
    }

    public function logout(){
        Session::forget('client');

        return back();
    }

    public function accedercompte(Request $request){

        $request->validate(['email' => 'email|required',
        'password' => 'required']); 

        $client = Client::where('email', $request->input('email'))->first();

        if ($client) {
            # code...

            if (Hash::check($request->input('password'),$client->password )) {
                # code...

                Session::put('client',$client);

                 

                return redirect('/shop');
            } else {
                # code...

                return back()->with('status','Mauvais mot de passe ou email' );
            }
           
        } else {
            # code...

            return back()->with('status', 'vous n'."'".'avez pas de compte');
        }
        
    }

    public function login(){
        return view('clients.login');
    }

    public function creercompte(Request $request){
        $request->validate(['email' => 'email|required|unique:clients',
                                'password' => 'required|min:4']); 

        $client = new Client();
          $client->email = $request->input('email');
           $client->password =bcrypt( $request->input('password'));

           $client->save();

           return back()->with('status', 'votre compte a été crée avec succes'); 
    }

    public function signup(){
        return view('clients.signup');

      
    }


    public function select($nom){

        $categorie = Categorie::get();

        $produit = Produit::where('produit_categorie', $nom)->where('status',1)->get();

        return view('clients.shop')->with('produit', $produit)->with('categorie', $categorie);

    }
  
}
