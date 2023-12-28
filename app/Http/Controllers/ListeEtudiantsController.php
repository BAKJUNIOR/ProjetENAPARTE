<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Listetudiants;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class ListeEtudiantsController extends Controller
{
    //
    function index(){
        $data = Listetudiants::all();
        return view('Dossier_admins.listeEtudiant' , ['data'=>$data]);
    }


    function listeEtudiantEdit($id){
        $data = Listetudiants::find($id);
        return view('Dossier_admins.listeEtudiantEdit' , [ 'data'=> $data]);;
    }
    function listeEtudiantDelete($id){

        $data = Listetudiants :: find($id);
        $data->delete();

        return back()->with("status", "Votre catégorie a été supprimer avec succes ");

    }

    function AjouterlisteEtudiant(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'nim' => 'required|max:8',
            'angkatan' => 'required|min:2|max:2',
            'jurusan' => 'required',
        ], [
            'name.required' => 'Name Wajib Di isi',
            'name.min' => 'Bidang name minimal harus 3 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'nim.required' => 'Nim Wajib Di isi',
            'nim.max' => 'NIM max 8 Digit',
            'angkatan.required' => 'Angkatan Wajib Di isi',
            'angkatan.min' => 'Masukan 2 angka Akhir dari Tahun misal: 2022 (22)',
            'angkatan.max' => 'Masukan 2 angka Akhir dari Tahun misal: 2022 (22)',
            'jurusan.required' => 'Jurusan Wajib Di isi',
        ]);

        ModelsDataMahasiswa::insert([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'jurusan' => $request->jurusan,
        ]);

        Session::flash('success', 'Data berhasil ditambahkan');

        return redirect('Dossier_admins.AjouterlisteEtudiant')->with('success', 'Berhasil Menambahkan Data');
    }
    function change(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'nim' => 'required|min:8|max:8',
            'angkatan' => 'required|min:2|max:2',
            'jurusan' => 'required',
        ], [
            'name.required' => 'Name Wajib Di isi',
            'name.min' => 'Bidang name minimal harus 3 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'nim.required' => 'Nim Wajib Di isi',
            'nim.max' => 'NIM max 8 Digit',
            'nim.min' => 'NIM min 8 Digit',
            'angkatan.required' => 'Angkatan Wajib Di isi',
            'angkatan.min' => 'Masukan 2 angka Akhir dari Tahun misal: 2022 (22)',
            'angkatan.max' => 'Masukan 2 angka Akhir dari Tahun misal: 2022 (22)',
            'jurusan.required' => 'Jurusan Wajib Di isi',
        ]);

        $datamahasiswa = ModelsDataMahasiswa::find($request->id);

        $datamahasiswa->name = $request->name;
        $datamahasiswa->email = $request->email;
        $datamahasiswa->nim = $request->nim;
        $datamahasiswa->angkatan = $request->angkatan;
        $datamahasiswa->jurusan = $request->jurusan;
        $datamahasiswa->save();

        Session::flash('success', 'Berhasil Mengubah Data');

        return redirect('/datamahasiswa');
    }

}
