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


    public function sauveproduit(Request $request)
{
    // Validation des données
    $request->validate([
        'nom_produit' => 'required|string|max:255',
        'prix_produit' => 'required|numeric',
        'produit_categorie' => 'required|exists:categories,id', // Assurez-vous que 'categories' est le nom de la table des catégories et 'id' est la colonne
        'image_produit' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validation pour les images
    ]);

    // Gestion du fichier image
    if ($request->hasFile('image_produit')) {
        $fileNameWithExt = $request->file('image_produit')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image_produit')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $request->file('image_produit')->storeAs('public/image_produit', $fileNameToStore);
    } else {
        $fileNameToStore = 'noimage.jpg';
    }

    // Création d'une nouvelle instance de produit
    $produit = new Produit();
    $produit->nom_produit = $request->input('nom_produit');
    $produit->prix_produit = $request->input('prix_produit'); // Utilisez le prix et non la catégorie ici
    $produit->produit_categorie = $request->input('produit_categorie');
    $produit->produit_image = $fileNameToStore;
    $produit->status = 1;

    // Sauvegarde dans la base de données
    $produit->save();

    // Redirection avec un message de succès
    return redirect('/ajouterproduit')->with('status', 'Le produit ' . $produit->nom_produit . ' a été ajouté avec succès');
}


    public function produit(){

        return view('admin.produit');
    }
}
