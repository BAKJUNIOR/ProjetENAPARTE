<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class clientController extends Controller
{
    //
  public function Home(){

    $sliders = Slider :: where('status',1)->get();
    $products = Product :: where('status',1)->get();
   return view('client.Home')->with('sliders',$sliders)->with('products' , $products);
  }

  public function boutique(){
    $products = Product :: where('status',1)->get();
    return view('client.boutique')->with('products' , $products);
   }

   public function panier(){
    return view('client.panier');
   }

   public function checkout(){

    if(Session :: has('client') ) return view('client.checkout');
    return redirect('/connexion');

   }


   public function connexion(){
    return view('client.connexion');
   }


   public function logout(){
     Session :: forget('client');
     return back();
   }


   public function createCompte(Request $request){

    $this->validate($request, [
      'nom'=> 'required',
      'prenom'=> 'required',
      'adresse'=> 'required',
      'email'=> 'email|required|unique:clients',
      'password'=> 'required|min:6'
    ]);

    $client = new Client();
    $client->nom = $request->input('nom');
    $client->prenom = $request->input('prenom');
    $client->adresse = $request->input('adresse');
    $client->email = $request->input('email');
    $client->password = bcrypt($request->input('password')) ;

    $client->save();

    return back()->with('status' , 'Votre Compte a été crée avec succes !!');



   }

   public function connexionCompte(Request $request){

    $this->validate($request, [
      'email'=> 'email|required',
    ]);

    $client = Client::where('email', $request->email)->first();

    if ( $client) {
        if(Hash ::check($request->input('password'), $client->password)){
          Session:: put('client' , $client);
          return redirect('/boutique');
        }
        return back()->with('error' , "Échec d'authentification Veillez bien saisir email ou le password");

    }

    return back()->with('error' , "Email n'existe pas veuillez vous inscrivez ");



   }




   public function inscription(){
    return view('client.inscription');
   }



   public function AjouterPanier($id){

    $product = Product :: find($id);

    $oldCard = Session :: has ('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCard);
    $cart->add($product);

    Session :: put ('cart', $cart);
    Session :: put('topCart', $cart->items);

    return back();


   }

   public function modifierQte($id , Request $request){

    $oldCard = Session :: has ('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCard);
    $cart->updateQty($id , $request->qty );

    Session :: put ('cart', $cart);
    Session :: put('topCart', $cart->items);

  return back();


   }

   public function supprimerItem($id){

    $oldCard = Session :: get ('cart');
    $cart = new Cart($oldCard);
    $cart->removeItem($id);

    Session :: put ('cart', $cart);
    Session :: put('topCart', $cart->items);

  return back();


   }

   public function payer(Request $request){

    $oldCard = Session :: has ('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCard);

       $order = new Order(); // Crée une instance order
       $order->names = $request->input('nom').' '.$request->input('prenoms'); // Appelons le nom&prenom dépuis la base de donnée
       $order->adress = $request->input('adresse');
       $order->panier = serialize($cart);// serialize permet d'entregistrer tout cequ'on a dans le panier dans la BD dns le champs panier

       $order->save();

       Session::forget('topCart');
       Session::forget('cart');//effacer tout cequi est dans mon panier : le vider
       return redirect('/panier')->with('status','Votre Commande a été effectuer avec succes !!');

   }


    function RDV(){
        return view('client.PriseRendezVous');
    }


}
