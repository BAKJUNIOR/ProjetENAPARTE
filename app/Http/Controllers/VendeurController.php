<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class VendeurController extends Controller
{

    function index(){
        return view('Dossier_admins/Home');
    }

    public function addCategorie(){
        return view('Dossier_admins/page_vendeur/addCategorie');
    }

    public function Categorie(){

        $categories = Categories::get();
        return view('Dossier_admins/page_vendeur/Categorie')->with( 'categories',$categories);
    }

    public function addSlider(){
        return view('Dossier_admins/page_vendeur/addSlider');
    }

    public function Slider(){

        $sliders = Slider::get();
        return view('Dossier_admins/page_vendeur/slider')->with("sliders" , $sliders);
    }

    public function addproduct(){
        $categories = Categories :: get();
        return view('Dossier_admins/page_vendeur/addproduct')->with('categories', $categories);
    }

    public function product(){

        $products = Product :: get();
        return view('Dossier_admins/page_vendeur/product')->with('products' , $products);

    }



    public function order(){

        $orders = Order::All();

        $orders-> transform(function($order , $key){

            $order->panier = unserialize($order->panier);
            return $order;
        });


        return view('Dossier_admins/page_vendeur/order')->with('orders', $orders);
    }
}
