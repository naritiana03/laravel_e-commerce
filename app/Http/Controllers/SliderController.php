<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Slider;

class SliderController extends Controller
{
    //

    public function ajouterslider(){
        return view('admin.ajouterslider');
    }

    public function sauveslider(Request $request){

        $request->validate([
            'description1' => 'required',
            'description2' => 'required',
            'slider_image' => 'image|nullable|max:2048', // Optionnel : ajout de règles spécifiques pour l'image
        ]);
    
        // Gestion de l'upload de l'image
        if ($request->hasFile('slider_image')) {
            // 1. Récupérer le nom complet du fichier avec l'extension
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
    
            // 2. Récupérer uniquement le nom du fichier sans l'extension
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    
            // 3. Récupérer uniquement l'extension du fichier
            $extension = $request->file('slider_image')->getClientOriginalExtension();
    
            // 4. Créer un nom unique pour le fichier à stocker
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
    
            // 5. Uploader l'image dans le dossier 'public/image_produit'
            $path = $request->file('slider_image')->storeAs('public/slider_image', $fileNameToStore);
        } else {
            // Si aucune image n'est uploadée, définir une image par défaut
            $fileNameToStore = 'noimage.jpg';
        }
    
        // Créer un nouvel objet Produit
        $slider = new Slider();
    
        // Affecter les valeurs aux propriétés de l'objet Produit

        $slider ->description1 = $request->input('description1');

        $slider ->description = $request->input('description2');

        $slider->image_slider = $fileNameToStore;

        $slider-> status = 1;
    
        // Sauvegarder l'objet en base de données
        $slider->save();
    
        // Rediriger avec un message de succès
        return redirect('/ajouterslider')->with('status', 'Le slider  a été ajouté avec succès');

    }

    public function slider(){

        $slider = Slider::get();

        return view('admin.sliders')->with('slider', $slider);
    }

    public function editslider($id){

        $slider = Slider::find($id);

        return view('admin.editslider')->with('slider',$slider);
    }

    public function modifierslider(Request $request){
         // Valider les données de la requête
         $request->validate([
            'description1' => 'required',
            'description2' => 'required',
            'image_produit' => 'image|nullable|max:2048', // Optionnel : ajout de règles spécifiques pour l'image
        ]);
    
        $slider = Slider::find($request->input('id'));
    
        // Affecter les valeurs aux propriétés de l'objet Produit
        $slider->description1 = $request->input('description1');

        $slider->description = $request->input('description2');
    
    



        // Gestion de l'upload de l'image
        if ($request->hasFile('slider_image')) {
            // 1. Récupérer le nom complet du fichier avec l'extension
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
    
            // 2. Récupérer uniquement le nom du fichier sans l'extension
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    
            // 3. Récupérer uniquement l'extension du fichier
            $extension = $request->file('slider_image')->getClientOriginalExtension();
    
            // 4. Créer un nom unique pour le fichier à stocker
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
    
            // 5. Uploader l'image dans le dossier 'public/image_produit'
            $path = $request->file('slider_image')->storeAs('public/slider_image', $fileNameToStore);
        }



        if ($slider->image_slider != 'noimage') {
            # code...

            Storage::delete('public/slider_image/' .$slider->image_slider); 

            $slider ->image_slider= $fileNameToStore;
        }

        $slider ->update();

        return redirect('/slider')->with('status', 'Le slider  a été modifié avec succès');
    }


    public function deleteslider($id){

        $slider = Slider::find($id);

        if ($slider->image_slider != 'noimage') {
            # code...

            Storage::delete('public/slider_image/' .$slider->image_slider); 

            
        }

        $slider->delete();

        return redirect('/slider')->with('status', 'Le slider a été supprimé avec succès' );

    }

    public function activerslider($id){

        $slider = Slider::find($id);

        $slider->status = 1;

        $slider->update();

        return redirect('/slider')->with('produit', 'Le produit a été activé avec succès' );
    }

    public function desactiverslider($id){

        $slider = Slider::find($id);

        $slider->status = 0;

        $slider->update();

        return redirect('/slider')->with('produit', 'Le produit a été activé avec succès' );
    }

}
