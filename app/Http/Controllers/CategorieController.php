<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    //

    public function ajoutercategorie(){
        return view('admin.ajoutcatégorie');
    }

    public function sauvecategorie(Request $request){
    
            $categorie = new Categorie();

            $categorie->nom_categorie = $request->categorie;
            $categorie->save();
            return redirect('/ajoutercategorie')->with('status', 'La catégorie'.$categorie->nom_categorie. 'a été ajoutée avec succes');
           
    }

    public function categorie(){
        $categorie = Categorie::get();
        return view('admin.categories')->with('categorie', $categorie);
    }
}
