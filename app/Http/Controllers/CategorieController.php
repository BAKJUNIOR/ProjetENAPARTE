<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function SaveCategorie(Request $request)// Crée un objet $request qui nous permettra de récupérer les valeur des champs du formulaire
    {
       $categories = new Categories();
       $categories->categorie_name = $request->input('category_name');

       $categories->save();

        return redirect('/Categorie')->with("status", "Votre catégorie a été crée avec succes ");

    }

    public function deleteCategorie($id){

       $categories = Categories :: find($id);
       $categories->delete();

       return back()->with("status", "Votre catégorie a été supprimer avec succes ");

    }

    public function editeCategorie($id){

        $categories = Categories :: find($id);

        return view('Dossier_admins/page_admin/editeCategorie')->with("categorie", $categories);

     }

     public function UpdateCategorie($id , Request $request){

        $categories = Categories :: find($id);
        $categories->categorie_name = $request->input('category_name');

        $categories->update();

        return redirect('/Categorie')->with("status", "Votre catégorie a été modifier avec succes ");

     }





}
