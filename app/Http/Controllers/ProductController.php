<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //

        public function SaveProduct(Request $request){

            $this->validate($request , [
                'product_name'=>'required',
                'product_price'=>'required',
                'product_categorie'=>'required',
                'product_detaille'=>'required',
                'product_image'=>'image|nullable|max:1999'

            ]);

            // obtenir le nom originale de l'image
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();

            // obtenir sans extention
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME);
           // print($fileName);

           //obtenir le nom de l'extention

           $ext =  $request->file('product_image')->getClientOriginalExtension();

           // obtenir le nom du file stocker
           $fileNameToStore = $fileName.'_'.time().".".$ext; // time est la pour rendre chaque image unique pour éviter des confusion
           print($fileNameToStore);

           $path =  $request->file('product_image')->storeAs("public/product_images", $fileNameToStore);

            $product = new Product();
            $product->product_name = $request->input("product_name");
            $product->product_price = $request->input("product_price");
            $product->product_categorie = $request->input("product_categorie");
            $product->product_detaille = $request->input("product_detaille");
            $product->product_image = $fileNameToStore;

            $product->save();

             return redirect('/product')->with("status", "Votre produit a été crée avec succes");
          }



          public function deleteProduct($id){

            $products = Product :: find($id);
            Storage::delete("public/product_images/$products->product_image");

            $products->delete();
            return back()->with("status", "Votre produit a été supprimé avec succes");
          }

          public function editeProduct($id){

            $products = Product:: find($id);
            $categories = Categories::where('categorie_name' , '!=' , $products->product_categorie)->get();

            return view('/Dossier_admins/page_admin/editeProduct')->with("products", $products)->with("categories", $categories);
          }


          public function UpdateProduct($id , Request $request){

            $products = Product :: find($id);
            $products->product_name = $request->input("product_name");
            $products->product_price = $request->input("product_price");
            $products->product_categorie = $request->input("product_categorie");

            if($request->file('product_image')){

                $this->validate($request , [
                    'product_image'=>'image|nullable|max:1999'
                  ]);

              $fileNameWithExt = $request->file('product_image')->getClientOriginalName();

              $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME);

             $ext =  $request->file('product_image')->getClientOriginalExtension();

             $fileNameToStore = $fileName.'_'.time().".".$ext;
             print($fileNameToStore);


             Storage::delete("public/product_images/$products->product_image");
             $path =  $request->file('product_image')->storeAs("public/product_images", $fileNameToStore);

             $products->product_image = $fileNameToStore;

            }

            $products->update();

            return redirect('/product')->with("status", "Votre produit a été modifié avec succes");

          }

          public function DesactiverProduct($id){

            $produits = Product :: find($id);
            $produits->status = 0 ;

            $produits->update();

            return back();
          }

          public function activerProduct($id){

            $produits = Product :: find($id);
            $produits->status = 1 ;

            $produits->update();

            return back();
          }






}
