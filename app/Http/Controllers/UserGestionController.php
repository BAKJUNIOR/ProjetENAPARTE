<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserGestionController extends Controller
{
    function index()
    {
        $data = User::all();
        return view('Dossier_admins/page_admin/user_control/userGestion', ['uc' => $data]);
    }

    function AjouterUtilisateur()
    {
        return view('Dossier_admins/page_admin/user_control.AjouterUtilisateur');
    }
    function create(Request $request)
    {
        $str = Str::random(100);
        $image = '';

        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
        ], [
            'fullname.required' => 'fullname est requis',
            'fullname.min' => 'fullname mininum 5 caractere ',
            'email.required' => 'email est requis',
            'email.unique' => 'email déja inscrit',
            'email.email' => 'Format Email Invalid',
            'password.required' => 'password est requis',
            'password.min' => 'password mininum 6 caractere',
        ]);


        if ($request->hasFile('image')) {

            $request->validate(['image' => 'mimes:jpeg,jpg,png,gif|image|file|max:1024']);

            $image_file = $request->file('image');
            $foto_ekstensi = $image_file->extension();
            $nama_foto = date('ymdhis') . "." . $foto_ekstensi;
            $image_file->move(public_path('picture/accounts'), $nama_foto);
            $image = $nama_foto;
        } else {
            $image = "user.jpeg";
        }

        $accounts = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verify_key' => $str,
            'image' => $image,
        ]);

        $details = [
            'name' => $accounts->fullname,
            'role' => 'user',
            'datetime' => date('Y-m-d H:i:s'),
            'website' => 'EN Aparte la maison de beauté & de bien-etre',
            'url' => 'http://' . request()->getHttpHost() . "/" . "verify/" . $accounts->verify_key,
        ];

        Mail::to($request->email)->send(new AuthMail($details));

        Session::flash('success', 'Utilisateur ajouté avec succès, veuillez vérifier le compte avant utilisation.');

        return redirect('/userGestion');
    }

    function editUtilisateur($id)
    {
        $data = User::where('id', $id)->get();
        return view('Dossier_admins/page_admin/user_control.editUtilisateur', ['uc' => $data]);
    }
    function ModifierUser(Request $request)
    {
        $request->validate([
            'image' => 'image|file|max:1024',
            'fullname' => 'required|min:4',
        ], [
            'image.image' => 'File Wajib Image',
            'image.file' => 'Wajib File',
            'image.max' => 'Bidang image tidak boleh lebih besar dari 1024 kilobyte',
            'fullname.required' => 'Nama Wajib Di isi',
            'fullname.min' => 'Bidang nama minimal harus 4 karakter.',
        ]);



        $user = User::find($request->id);

        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $foto_ekstensi = $image_file->extension();
            $nama_foto = date('ymdhis') . "." . $foto_ekstensi;
            $image_file->move(public_path('picture/accounts'), $nama_foto);
            $user->image = $nama_foto;
        }

        $user->fullname = $request->fullname;
        $user->password = $request->password;
        $user->save();

        Session::flash('success', "L'utilisateur a été modifié avec succès");

        return redirect('/userGestion');
    }
    function deleteUtilisateur(Request $request)
    {
        User::where('id', $request->id)->delete();

        Session::flash('success', "L'utilisateur  supprimé avec succès");

        return redirect('/userGestion');
    }
}


