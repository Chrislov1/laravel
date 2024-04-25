<?php

namespace App\Http\Controllers;
use App\Models\chauffeur;
use Illuminate\Http\Request;

class chauffeurController extends Controller
{
    public function create()
    {
        $chauffeurs = Chauffeur::where('disponible','oui')->get();
        return view('courses.create', compact('chauffeurs'));
    }
}
