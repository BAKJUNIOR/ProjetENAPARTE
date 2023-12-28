<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthenController extends Controller
{
    //
      function index(){
        return view('Page_authen/login');
    }

     function login(Request $request){

        //valider & vérification  les champs requis ou non
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ],
            [
                'email.required' => 'e-mail est requis',
                'password.required' => 'password est requis',
                'password.min' => 'password mininum 6 caractere',

            ]);
        // stocker les donner du formulaire
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // vérifier si le compte existe dans la Bd
        if (Auth::attempt($infologin)) {

            if (Auth::user()->email_verified_at != null) {

                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin')->with('success', 'Hola admin , Vous vous êtes connecté avec succès');

                } else if (Auth::user()->role === 'user') {
                    return redirect()->route('user')->with('success', ' vous êtes connecté avec succès');

                }

            }else  {
                Auth::logout();
                return redirect()->route('auth')->withErrors("Votre compte n'est pas encore actif. Veuillez d'abord valider dépuis votre courrier électronique ");

            }
        }else {
            return redirect()->route('auth')->withErrors('Email ou le mot de passe incorrect ');
        }

     }

        public function create(){
            return view('Page_authen/inscription');
        }

    public  function register(Request $request) {

        $str = Str::random(100);

        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'image' => 'required|image|file',

        ],
            [
                'fullname.required' => 'fullname est requis',
                'fullname.min' => 'fullname mininum 5 caractere ',
                'email.required' => 'email est requis',
                'email.unique' => 'email déja inscrit',
                'password.required' => 'password est requis',
                'password.min' => 'password mininum 6 caractere',
                'image.required' => 'image doit être téléchargé',
                'image.image' => 'image Ce qui est téléchargé doit être une image',
                'image.file' => 'image ça doit être un fichier',
            ]);
        //traiter l'image
        $image_file = $request->file('image');
        $image_extension = $image_file->extension();
        $nom_image = date('ymdhis') . "." . $image_extension;
        $image_file->move(public_path('picture/accounts'), $nom_image);

        $infoinscription = [

            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $nom_image,
            'verify_key' => $str,
        ];

        // Ajouter ces données a la Bd de l'utilisateur
        User::create($infoinscription);

        // Message a recevoir par mail
        $details = [
            'name' => $infoinscription['fullname'],
            'role' => 'user',
            'datetime'=> date('Y-m-d H-i-s'),
            'website' => 'EN Aparte la maison de beauté & de bien-etre ',
            'url' => 'http://' . request()->getHttpHost() . "/" . "verify/" . $infoinscription['verify_key'],
        ];

        //envoie du mail a la cible
        Mail::to($infoinscription ['email'])->send(new AuthMail($details));

        return redirect()->route('auth')->with('success', 'Un lien de vérification a été envoyé à votre adresse e-mail. Vérifiez votre courrier électronique pour Valider');

    }

    function verify($verify_key){
        $keyCheck = User::select('verify_key')
            ->where('verify_key', $verify_key)
            ->exists();

        if ($keyCheck){
            $user = User::where('verify_key', $verify_key)->update(['email_verified_at'=> date('Y-m-d H:i:s')]);
            return redirect()->route('auth')->with('success', 'Vérification réussie. votre compte est actif');
        }else{
            return redirect()->route('auth')->withErrors('les clés ne sont pas valides. Assurez-vous d être inscrit')->withInput();

        }
    }

    function logout(){
          Auth::logout();
          return redirect('/');

    }

}
