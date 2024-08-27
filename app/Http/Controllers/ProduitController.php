<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;

use App\Models\Produit;

class ProduitController extends Controller
{
    //

    public function ajouterproduit(){

        $categorie = Categorie::All();

        return view('admin.ajouterproduit')->with('categorie', $categorie );
    }
    public function sauveproduit(Request $request){

        if ($request->hasFile('produit_image')) {
            # 1 : get file name with ext

            $fileNameWithExt = $request->file('produit_image')->getClientOriginalName();
            # 2 get just file name
            $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            # 3 get just file extension

            $extension= $request-> file('produit_image')->getClientOriginalExtension();

            # 4 file name to store

            $fileNameToStore = $fileName. '_' .time().'.'.$extension;

            #uploader

            $path = $request-> file('produit_image')->storeAs('public/produit_image', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

            $produit = new Produit();

            $produit -> nom_produit = $request->input('produit_name');

            $produit -> prix_produit = $request->input('produit_price');

            $produit -> produit_categorie = $request->input('produit_categorie');

            $produit -> produit_image = $fileNameToStore;

            $produit ->status = 1;

            $produit->save();

            return redirect('/ajouterproduit')->with('status',  'Le produit' .$produit->produit_name. 'a été ajouté avec succès'); 

    }

    public function produit(){
        return view('admin.produit');
    }
}
