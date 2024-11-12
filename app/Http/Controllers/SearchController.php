<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registries;

class SearchController extends Controller
{
    //
    public function searchsender()
    {
        return view('searchsender');
    }
    public function dashboard()
    {
        $sender = registries::all(['created_at', 'name', 'operator','country', 'status', 'date_sub','date_valid','commentaire']);
       
        return view('searchsender', compact('sender'));
    }
    public function show($id)
    {
        // Récupérer un enregistrement spécifique par ID
        $record = registries::findOrFail($id);
        
        // Retourne la vue partielle de la fenêtre modale avec les données
        return view('show', compact('record'));
    }
}
