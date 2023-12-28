<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    //
    public function SaveSlider(Request $request){

      $this->validate($request , [
        'description1'=>'required',
        'description2'=>'required',
        'image'=>'image|nullable|max:1999'
      ]);

      // obtenir le nom originale de l'image
      $fileNameWithExt = $request->file('image')->getClientOriginalName();

      // obtenir sans extention
      $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME);
     // print($fileName);

     //obtenir le nom de l'extention

     $ext =  $request->file('image')->getClientOriginalExtension();

     // obtenir le nom du file stocker
     $fileNameToStore = $fileName.'_'.time().".".$ext; // time est la pour rendre chaque image unique pour éviter des confusion
     print($fileNameToStore);

     $path =  $request->file('image')->storeAs("public/slider_images", $fileNameToStore);

      $slider = new Slider();
      $slider->description1 = $request->input("description1");
      $slider->description2 = $request->input("description2");
      $slider->image = $fileNameToStore;

      $slider->save();

        return redirect('/Slider')->with("status", "Votre slider a été crée avec succes");
    }

    public function deleteSlider($id){

        $slider = Slider :: find($id);
        Storage::delete("public/slider_images/$slider->image");

        $slider->delete();
        return back()->with("status", "Votre slider a été supprimé avec succes");
      }

      public function editeSlider($id){

        $slider = Slider :: find($id);

        return view('Dossier_admins/page_admin/editeSlider')->with("slider", $slider);
      }


      public function UpdateSlider($id , Request $request){

        $slider = Slider :: find($id);
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');

        if($request->file('image')){

            $this->validate($request , [
                'image'=>'image|nullable|max:1999'
              ]);

          $fileNameWithExt = $request->file('image')->getClientOriginalName();

          $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME);

         $ext =  $request->file('image')->getClientOriginalExtension();

         $fileNameToStore = $fileName.'_'.time().".".$ext;
         print($fileNameToStore);


         Storage::delete("public/slider_images/$slider->image");
         $path =  $request->file('image')->storeAs("public/slider_images", $fileNameToStore);

         $slider->image = $fileNameToStore;

        }

        $slider->update();

        return redirect('/Slider')->with("status", "Votre slider a été modifié avec succes");

      }




      public function DesactiverSlider($id){

        $slider = Slider :: find($id);
        $slider->status = 0 ;

        $slider->update();

        return back();
      }

      public function activerSlider($id){

        $slider = Slider :: find($id);
        $slider->status = 1 ;

        $slider->update();

        return back();
      }


}
