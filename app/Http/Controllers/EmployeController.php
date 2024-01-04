<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $employe = User::where('role', 'user')->get();

        return view('client.PriseRendezVous', compact('employe'));
    }
}
