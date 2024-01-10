<?php

namespace App\Http\Controllers;

use App\Mail\RendezVousConfirmMail;
use App\Models\RendezVouse;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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



    public function AddPriseRendezVous /*CLIENT*/(Request $request)
    {
        // Vérifie si l'utilisateur est connecté
        if (Session::has('client')) {
            // L'utilisateur est connecté, continuez avec la logique de création du rendez-vous...

            // Validation des données du formulaire...
            $validatedData = $request->validate([
                'service_id' => 'required|exists:services,id',
                'employe_id' => 'required|exists:users,id',
                'date' => 'required|date',
                'heure' => 'required|date_format:H:i',
            ]);

            // Récupérez l'utilisateur connecté
            $client = Session::get('client');
            // Créez le rendez-vous avec les données validées
            $rendezVous = new RendezVouse($validatedData);
            $rendezVous->client_id = $client->id; // Utilisez l'ID du client directement
            $rendezVous->service_id = $request->input('service_id');
            $rendezVous->user_id = $request->input('employe_id');
            $rendezVous->date = $request->input('date');
            $rendezVous->heure = $request->input('heure');

            $rendezVous->save();

            // Autres opérations...
            return back()->with('status','Votre rendez-vous a été effectuer avec succes !!');
        } else {
            // L'utilisateur n'est pas un client, redirigez-le vers la page de connexion
            return redirect('/connexion')->with('error', 'Vous devez être connecté pour prendre un rendez-vous.');
        }
    }

    public function AllUserRendezVous()/*ADMIN*/{
        $appointments = RendezVouse::where('status', 'en_attente')->get();
        return view('Dossier_admins/page_user/GestionRendezVous', ['appointment' => $appointments]);
    }




    public function ConfirmationRendezVous($id) {

        $appointment = RendezVouse::findOrFail($id);

        if ($appointment->status == 'en_attente') {
            $appointment->update(['status' => 'confirmer']);

            Mail::to($appointment->client->email)->send(new RendezVousConfirmMail($appointment));
            Log::info('Email sent successfully.'); // Ajoutez cette ligne pour les journaux

            return response()->json(['message' => 'Rendez-vous confirmé avec succès.']);


        } else {
            return response()->json(['message' => 'Le rendez-vous n\'est pas en attente, impossible de le confirmer.']);
        }

    }


    public function cancelRendezVous($id){

        $appointment = RendezVouse::findOrFail($id);

        if ($appointment->status == 'en_attente') {
            $appointment->update(['status' => 'annule']);
            return response()->json(['message' => 'Rendez-vous annulé avec succès.']);
        }

        return response()->json(['message' => "Impossible d'annuler ce rendez-vous."]);
    }

}
