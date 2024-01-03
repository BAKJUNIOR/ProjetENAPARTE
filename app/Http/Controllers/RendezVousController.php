<?php

namespace App\Http\Controllers;

use App\Models\RendezVouse;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    public function PriseRendezVous()
    {
        $services = Service::all();
        $employes = User::all();

        return view('client.PriseRendezVous', compact('services', 'employes'));
    }

    public function AddPriseRendezVous(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'service' => 'required|exists:services,id',
            'employe_id' => 'required|exists:users,id',
            'fullname' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
        ]);

        // Création d'un nouveau rendez-vous
        $rendezVous = new RendezVouse();
        $rendezVous->client()->associate(auth()->user()); // Exemple : associer au client actuellement connecté
        $rendezVous->service_id = $request->input('service');
        $rendezVous->user_id = $request->input('employe_id');
        $rendezVous->date = $request->input('date');
        $rendezVous->start_time = $request->input('heure');


        // Sauvegarde du rendez-vous
        $rendezVous->save();

        // Redirection ou retour d'une réponse
        return redirect()->route('/Home')->with('success', 'Rendez-vous créé avec succès.');
    }

}
