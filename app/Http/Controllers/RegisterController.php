<?php

namespace App\Http\Controllers;


use App\Models\registries;
use App\Models\registry;
use App\Models\country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
//  ********************************************************************************************  

public function store(Request $request)
{
    // Règles de validation
    $rules = [
        'name' => 'required|max:11',
        'operator_id' => 'required|exists:operators,id',
        'country_id' => 'required|exists:countries,id',
        'status' => 'required|in:close,pending,valide',
        'date_sub' => 'required|date|before_or_equal:today',
    ];

    // Logique conditionnelle
    if ($request->status === 'valide') {
        $rules['date_valid'] = 'required|date|after_or_equal:date_sub';
        $rules['commentaire'] = 'nullable|string';
    } elseif ($request->status === 'close') {
        $rules['commentaire'] = 'required|string';
        $rules['date_valid'] = 'nullable|date';
    } elseif ($request->status === 'pending') {
        $rules['date_valid'] = 'nullable|date';
        $rules['commentaire'] = 'nullable|string';
    }

    // Messages personnalisés
    $messages = [
        'name.required' => 'Le nom est obligatoire.',
        'name.max' => 'Le nom ne doit pas dépasser 11 caractères.',
        'operator_id.required' => 'L\'opérateur est obligatoire.',
        'operator_id.exists' => 'L\'opérateur sélectionné est invalide.',
        'country_id.required' => 'Le pays est obligatoire.',
        'country_id.exists' => 'Le pays sélectionné est invalide.',
        'status.required' => 'Le statut est obligatoire.',
        'status.in' => 'Le statut doit être close, pending ou valide.',
        'date_sub.required' => 'La date de soumission est obligatoire.',
        'date_sub.date' => 'La date de soumission doit être une date valide.',
        'date_valid.required' => 'La date de validation est obligatoire pour le statut valide.',
        'date_valid.date' => 'La date de validation doit être une date valide.',
        'commentaire.required' => 'Le commentaire est obligatoire pour le statut close.',
    ];

    // Validation
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    try {
        $sender = new Registry();
        $sender->name = $request->name;
        $sender->operator_id = $request->operator_id; // 🛠 Correction ici
        $sender->country_id = $request->country_id;   // 🛠 Correction ici
        $sender->status = $request->status;
        $sender->date_sub = $request->date_sub;
        $sender->date_valid = $request->date_valid;
        $sender->commentaire = $request->commentaire;
        $sender->save();

        return redirect()->route('form')
            ->with('success', 'Enregistrement réussi!');
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Une erreur est survenue lors de la création',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
