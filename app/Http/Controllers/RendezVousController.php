<?php

namespace App\Http\Controllers;

use App\Models\RendezVouse;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Support\Facades\Session;

class RendezVousController extends Controller
{
    public function PriseRendezVous()
    {
        // Sélectionnez uniquement les utilisateurs avec le rôle 'user'

        $services = Service::all();
        $employes = User::where('role', 'user')->get();

        return view('client.PriseRendezVous')->with('services',$services)->with('employes' , $employes);
    }



    public function AddPriseRendezVous(Request $request)
    {
        // Vérifie si l'utilisateur est connecté
        if (Session::has('client')) {
            // L'utilisateur est connecté, continuez avec la logique de création du rendez-vous...

            // Validation des données du formulaire...
            $validatedData = $request->validate([
                'service' => 'required|exists:services,id',
                'employe_id' => 'required|exists:users,id',
                'fullname' => 'required|string',
                'email' => 'required|email',
                'date' => 'required|date',
                'heure' => 'required|date_format:H:i',
            ]);

            // Récupérez l'utilisateur connecté
            $client = Session::get('client');

            // Créez le rendez-vous avec les données validées
            $rendezVous = new RendezVouse($validatedData);
            $rendezVous->client_id = $client->id; // Utilisez l'ID du client directement
            $rendezVous->service_id = $request->input('service');
            $rendezVous->user_id = $request->input('employe_id');
            $rendezVous->date = $request->input('date');
            $rendezVous->start_time = $request->input('heure');

            $rendezVous->save();

            // Autres opérations...
            return back()->with('status', 'Rendez-vous créé avec succès!');
        } else {
            // L'utilisateur n'est pas un client, redirigez-le vers la page de connexion
            return redirect('/connexion')->with('error', 'Vous devez être connecté pour prendre un rendez-vous.');
        }
    }



}
