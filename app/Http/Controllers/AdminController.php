<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Order;

class AdminController extends Controller
{
    function index(){
        return view('Dossier_admins/Home');
    }

    public function addCategorie(){
        return view('Dossier_admins/page_admin/addCategorie');
    }

    public function Categorie(){

        $categories = Categories::get();
        return view('Dossier_admins/page_admin/Categorie')->with( 'categories',$categories);
    }

    public function addSlider(){
        return view('Dossier_admins/page_admin/addSlider');
    }

    public function Slider(){

        $sliders = Slider::get();
        return view('Dossier_admins/page_admin/slider')->with("sliders" , $sliders);
    }

    public function addproduct(){
        $categories = Categories :: get();
        return view('Dossier_admins/page_admin/addproduct')->with('categories', $categories);
    }

    public function product(){

        $products = Product :: get();
        return view('Dossier_admins/page_admin/product')->with('products' , $products);

    }

    public function order(){

        $orders = Order::All();

        $orders-> transform(function($order , $key){

            $order->panier = unserialize($order->panier);
            return $order;
        });


        return view('Dossier_admins/page_admin/order')->with('orders', $orders);
    }
}
