<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Categorie;

use App\Models\Produit;

class ProduitController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ajouterproduit(){

        $categorie = Categorie::pluck('nom_categorie' ,'nom_categorie');

        return view('admin.ajouterproduit')->with('categorie', $categorie );
    }


    public function sauveproduit(Request $request)
{
   
        // Valider les données de la requête
        $request->validate([
            'nom_produit' => 'required|unique:Produits',
            'prix_produit' => 'required',
            'produit_categorie' => 'required',
            'image_produit' => 'image|nullable|max:2048', // Optionnel : ajout de règles spécifiques pour l'image
        ]);
    
        // Gestion de l'upload de l'image
        if ($request->hasFile('image_produit')) {
            // 1. Récupérer le nom complet du fichier avec l'extension
            $fileNameWithExt = $request->file('image_produit')->getClientOriginalName();
    
            // 2. Récupérer uniquement le nom du fichier sans l'extension
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    
            // 3. Récupérer uniquement l'extension du fichier
            $extension = $request->file('image_produit')->getClientOriginalExtension();
    
            // 4. Créer un nom unique pour le fichier à stocker
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
    
            // 5. Uploader l'image dans le dossier 'public/image_produit'
            $path = $request->file('image_produit')->storeAs('public/image_produit', $fileNameToStore);
        } else {
            // Si aucune image n'est uploadée, définir une image par défaut
            $fileNameToStore = 'noimage.jpg';
        }
    
        // Créer un nouvel objet Produit
        $produit = new Produit();
    
        // Affecter les valeurs aux propriétés de l'objet Produit
        $produit->nom_produit = $request->input('nom_produit');
        $produit->prix_produit = $request->input('prix_produit');
        $produit->produit_categorie = $request->input('produit_categorie');
        $produit->produit_image = $fileNameToStore;
        $produit->status = 1;
    
        // Sauvegarder l'objet en base de données
        $produit->save();
    
        // Rediriger avec un message de succès
        return redirect('/ajouterproduit')->with('status', 'Le produit ' . $produit->nom_produit . ' a été ajouté avec succès');
    }
    


    public function produit(){

        $produit = Produit::get();

        return view('admin.produit')->with('produit', $produit);
    }

    public function editproduit($id){

        $produit = Produit::find($id);

        $categorie = Categorie::pluck('nom_categorie' ,'nom_categorie');

        return view('admin.editproduit')->with('produit' ,$produit)->with('categorie',$categorie);
    }

    public function modifierproduit(Request $request){


        
        // Valider les données de la requête
        $request->validate([
            'nom_produit' => 'required',
            'prix_produit' => 'required',
            'produit_categorie' => 'required',
            'image_produit' => 'image|nullable|max:2048', // Optionnel : ajout de règles spécifiques pour l'image
        ]);
    
        $produit = Produit::find($request->input('id'));
    
        // Affecter les valeurs aux propriétés de l'objet Produit
        $produit->nom_produit = $request->input('nom_produit');
        $produit->prix_produit = $request->input('prix_produit');
        $produit->produit_categorie = $request->input('produit_categorie');
    



        // Gestion de l'upload de l'image
        if ($request->hasFile('image_produit')) {
            // 1. Récupérer le nom complet du fichier avec l'extension
            $fileNameWithExt = $request->file('image_produit')->getClientOriginalName();
    
            // 2. Récupérer uniquement le nom du fichier sans l'extension
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    
            // 3. Récupérer uniquement l'extension du fichier
            $extension = $request->file('image_produit')->getClientOriginalExtension();
    
            // 4. Créer un nom unique pour le fichier à stocker
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
    
            // 5. Uploader l'image dans le dossier 'public/image_produit'
            $path = $request->file('image_produit')->storeAs('public/image_produit', $fileNameToStore);
        }



        if ($produit->produit_image != 'noimage') {
            # code...

            Storage::delete('public/image_produit/' .$produit->produit_image); 

            $produit->produit_image =$fileNameToStore;
        }

        $produit ->update();

        return redirect('/produit')->with('status', 'Le produit ' . $produit->nom_produit . ' a été modifié avec succès');
    }

    public function deleteproduit($id){

        $produit = Produit::find($id);

        if ($produit->produit_image != 'noimage') {
            # code...

            Storage::delete('public/image_produit/' .$produit->produit_image); 

            
        }

        $produit->delete();

        return redirect('/produit')->with('produit', 'Le produit ' .$produit->nom_produit. 'a été supprimé avec succès' );
    }

    public function activer($id){

        $produit = Produit::find($id);

        $produit->status = 1;

        $produit->update();

        return redirect('/produit')->with('produit', 'Le produit ' .$produit->nom_produit. 'a été activé avec succès' );
    }

    public function desactiver($id){

        $produit = Produit::find($id);

        $produit->status = 0;

        $produit->update();

        return redirect('/produit')->with('produit', 'Le produit ' .$produit->nom_produit. 'a été desactivé avec succès' );
    }
}
