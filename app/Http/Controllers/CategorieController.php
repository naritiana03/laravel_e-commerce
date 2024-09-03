<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Support\Facades\Storage;

use App\Models\Categorie;

class CategorieController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function editcategorie($id){

        $categorie = Categorie::find($id);

        return view('admin.editcategorie')->with('categorie', $categorie);
    }

    public function modifiercategorie(Request $request){

        $categorie = Categorie::find($request->input('id'));
    
        $categorie->nom_categorie = $request->input('categorie');
        
        $categorie->update();

        return redirect('/categorie')->with('status', 'La catégorie'. $categorie->nom_categorie. 'a été modifiée avec succes');
       
    }

    public function deletecategorie($id){

        $categorie = Categorie::find($id);

        $categorie->delete();

        return redirect('/categorie')->with('status' ,'La catégorie'.$categorie->nom_categorie. 'a été supprimée avec succès');
    }
}
