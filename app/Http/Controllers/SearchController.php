<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SenderExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{  

    public function searchs(Request $request)
    {
        // Validation des entrées utilisateur
        $validated = $request->validate([
            'name' => 'nullable|string',
            'operator' => 'nullable|string', 
            'country' => 'nullable|string',
            'status' => 'nullable|in:pending,valide,close',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);
    
        // Requête principale
        $query = DB::table('registries')
            ->join('operators', 'registries.operator_id', '=', 'operators.id')  // Jointure avec la table operators
            ->join('countries', 'registries.country_id', '=', 'countries.id')  // Jointure avec la table countries
            ->select(
                'registries.id',
                'registries.created_at', 
                'registries.name', 
                'registries.status', 
                'registries.commentaire',
                'registries.date_sub',
                'registries.date_valid',
                'registries.updated_at',
                'operators.name as operator_name', // Récupérer le nom de l'opérateur
                'countries.name as country_name'  // Récupérer le nom du pays
            );
    
        // Filtres de recherche
        if (!empty($validated['name'])) {
            $query->where('registries.name', 'LIKE', '%' . $validated['name'] . '%');
        }
    
        if (!empty($validated['operator'])) {
            $query->where('operators.id', $validated['operator']);
        }
        
        if (!empty($validated['country'])) {
            $query->where('countries.id', $validated['country']);
        }
    
        if (!empty($validated['status'])) {
            $query->where('registries.status', $validated['status']);
        }
    
        if (!empty($validated['start_date'])) {
            $query->whereDate('registries.created_at', '>=', $validated['start_date']);
        }
    
        if (!empty($validated['end_date'])) {
            $query->whereDate('registries.created_at', '<=', $validated['end_date']);
        }
    
        // Activer la pagination
        $results = $query->paginate(10); // 10 résultats par page
    
        // Vérifier si des résultats existent
        $noResults = $results->isEmpty();
    
        session(['results' => $results]);
    
        // Retourner la vue avec les résultats et l'option de pagination
        return view('search', compact('results', 'noResults'));
    }
    
    public function index()
    {
        // Récupérer les données récentes avec jointures pour les noms des opérateurs et pays
        $results = DB::table('registries')
            ->join('operators', 'registries.operator_id', '=', 'operators.id')
            ->join('countries', 'registries.country_id', '=', 'countries.id')
            ->orderBy('registries.created_at', 'desc')
            ->limit(10)
            ->select(
                'registries.id',
                'registries.created_at', 
                'registries.name',
                'registries.status', 
                'registries.date_sub', 
                'registries.date_valid',
                'registries.updated_at',
                'registries.commentaire',
                'operators.name as operator_name', 
                'countries.name as country_name'
            )
            ->get();
    
        // Pagination manuelle
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 5; // Nombre d'éléments par page
        $currentItems = $results->slice(($currentPage - 1) * $perPage, $perPage)->values();
    
        $paginatedResults = new LengthAwarePaginator(
            $currentItems,
            $results->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    
        return view('search', ['results' => $paginatedResults, 'noResults' => false]);
    }
    

    public function getOperators(Request $request)
    {
        $term = $request->q ?? '';
        $operators = DB::table('operators')
                        ->select('id', 'name as text')
                        ->where('name', 'LIKE', '%' . $term . '%')
                        ->get();
        
        return response()->json($operators);
    }


    
    public function getCountries(Request $request)
{
    $term = $request->q ?? '';
    $countries = DB::table('countries')
                    ->select('id', 'name as text')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->get();
    
    return response()->json($countries);
}


    
    public function export(string $type)
    {
        $results = session('results');
    
        // Convertir les résultats en tableau
        $exportData = $results->map(function($item) {
            return [
                'Created At' => $item->created_at,
                'Name' => $item->name,
                'Operator' => $item->operator_name,
                'Status' => $item->status,
                'Country' => $item->country_name,
                'Commentaire' => $item->commentaire
            ];
        })->toArray();

        $filename = 'sender_export_' . date('Y-m-d_H-i-s');

        // Export Excel
        if ($type === 'excel') {
            return Excel::download(new SenderExport($exportData), $filename . '.xlsx');
        }

        // Export CSV
        if ($type === 'csv') {
            return Excel::download(new SenderExport($exportData), $filename . '.csv');
        }
        

    }

    
    //***********************************Original */
//     public function searchs(Request $request)
// {
//     $validated = $request->validate([
//         'name' => 'nullable|string',
//         'operator' => 'nullable|string', 
//         'country' => 'nullable|string',
//         'status' => 'nullable|in:pending,valide,close',
//         'start_date' => 'nullable|date',
//         'end_date' => 'nullable|date',
//     ]);

//     $query = DB::table('registries')->select(
//         'id',
//         'created_at', 
//         'name', 
//         'operator', 
//         'status', 
//         'country', 
//         'commentaire',
//         'date_sub',
//         'date_valid',
//         'updated_at'
//     );

//     if (!empty($validated['name'])) {
//         $query->where('name', 'LIKE', '%' . $validated['name'] . '%');
//     }

//     if (!empty($validated['operator'])) {
//         $query->where('operator', $validated['operator']);
//     }

//     if (!empty($validated['country'])) {
//         $query->where('country', $validated['country']);
//     }

//     if (!empty($validated['status'])) {
//         $query->where('status', $validated['status']);
//     }

//     if (!empty($validated['start_date'])) {
//         $query->whereDate('created_at', '>=', $validated['start_date']);
//     }

//     if (!empty($validated['end_date'])) {
//         $query->whereDate('created_at', '<=', $validated['end_date']);
//     }

//     // Activer la pagination
//     $results = $query->paginate(10); // 10 résultats par page

//     // Vérifiez si des résultats existent
//     $noResults = $results->isEmpty();

//     session(['results' => $results]);

//     return view('search', compact('results', 'noResults'));
// }

// public function index()
// {
//     // Récupérer les données récentes
//     $results = DB::table('registries')
//         ->orderBy('created_at', 'desc')
//         ->limit(10)
//         ->get();

//     // Pagination manuelle
//     $currentPage = LengthAwarePaginator::resolveCurrentPage();
//     $perPage = 5; // Nombre d'éléments par page
//     $currentItems = $results->slice(($currentPage - 1) * $perPage, $perPage)->values();

//     $paginatedResults = new LengthAwarePaginator(
//         $currentItems,
//         $results->count(),
//         $perPage,
//         $currentPage,
//         ['path' => LengthAwarePaginator::resolveCurrentPath()]
//     );

//     return view('search', ['results' => $paginatedResults, 'noResults' => false]);
// }
//************************************************************************FIN */

//     public function searchs(Request $request)
//     {
        
//         $validated = $request->validate([
//             'name' => 'nullable|string',
//             'operator' => 'nullable|string', 
//             'country' => 'nullable|string',
//             'status' => 'nullable|in:pending,valide,close',
//             'start_date' => 'nullable|date',
//             'end_date' => 'nullable|date',
//         ]);

        
//         $query = DB::table('registries')->select(
//             'id',
//             'created_at', 
//             'name', 
//             'operator', 
//             'status', 
//             'country', 
//             'commentaire',
//             'date_sub',
//             'date_valid',
//             'updated_at'
//         );

//         if (!empty($validated['name'])) {
//             $query->where('name', 'LIKE', '%' . $validated['name'] . '%');
//         }

//         if (!empty($validated['operator'])) {
//             $query->where('operator', $validated['operator']);
//         }

//         if (!empty($validated['country'])) {
//             $query->where('country', $validated['country']);
//         }

//         if (!empty($validated['status'])) {
//             $query->where('status', $validated['status']);
//         }
//         if (!empty($validated['date_sub'])) {
//             $query->whereDate('date_sub', $validated['date_sub']);
//         }
//         if (!empty($validated['date_valid'])) {
//             $query->whereDate('date_valid', $validated['date_valid']);
//         }
//         if (!empty($validated['updated_at'])) {
//             $query->whereDate('updated_at', $validated['updated_at']);
//         }
        
        
        
//         $results = $query->get();
//         session(['results' => $results]);
//         $showForm = true;
       
      
//         return view('search', compact('results', 'showForm'));
//     }
//     }
//     public function index()
//     {
//         $results = collect([]);
//         return view('search', compact('results'));
//     }
//     // public function show($id)
//     // {
//     //     $record = DB::table('registries')->where('id', $id)->first();

//     //     if (request()->ajax()) {
//     //         return response()->json($record);
//     //     }

//     //     return view('search', compact('record'));
//     // }
//     public function getRegistryDetails($id)
// {
//     $registry = DB::table('registries')->find($id);
    
//     return response()->json($registry);
// }

// public function searchs(Request $request)
// {
//     $validated = $request->validate([
//         'name' => 'nullable|string',
//         'operator' => 'nullable|string', 
//         'country' => 'nullable|string',
//         'status' => 'nullable|in:pending,valide,close',
//         'start_date' => 'nullable|date',
//         'end_date' => 'nullable|date',
//     ]);

//     $query = DB::table('registries')->select(
//         'id',
//         'created_at', 
//         'name', 
//         'operator', 
//         'status', 
//         'country', 
//         'commentaire',
//         'date_sub',
//         'date_valid',
//         'updated_at'
//     );

//     if (!empty($validated['name'])) {
//         $query->where('name', 'LIKE', '%' . $validated['name'] . '%');
//     }

//     if (!empty($validated['operator'])) {
//         $query->where('operator', $validated['operator']);
//     }

//     if (!empty($validated['country'])) {
//         $query->where('country', $validated['country']);
//     }

//     if (!empty($validated['status'])) {
//         $query->where('status', $validated['status']);
//     }

//     if (!empty($validated['start_date'])) {
//         $query->whereDate('created_at', '>=', $validated['start_date']);
//     }

//     if (!empty($validated['end_date'])) {
//         $query->whereDate('created_at', '<=', $validated['end_date']);
//     }

//     // Activer la pagination
//     $results = $query->paginate(10); // 10 résultats par page
//     session(['results' => $results]);

//     return view('search', compact('results'));
// }

// public function index()
// {
//     // Récupérer les données avec `get()`
//     $results = DB::table('registries')
//         ->orderBy('created_at', 'desc')
//         ->limit(10) // Récupérer un nombre maximum d'enregistrements
//         ->get();

//     // Pagination manuelle
//     $currentPage = LengthAwarePaginator::resolveCurrentPage();
//     $perPage = 5; // Nombre d'éléments par page
//     $currentItems = $results->slice(($currentPage - 1) * $perPage, $perPage)->values();

//     $paginatedResults = new LengthAwarePaginator(
//         $currentItems, // Éléments pour la page actuelle
//         $results->count(), // Nombre total d'éléments
//         $perPage, // Nombre d'éléments par page
//         $currentPage, // Page actuelle
//         ['path' => LengthAwarePaginator::resolveCurrentPath()] // URL actuelle
//     );

//     return view('search', ['results' => $paginatedResults]);
// }

// public function export(string $type)
// {
//     $results = session('results');

//     // Convertir les résultats en tableau
//     $exportData = $results->map(function($item) {
//         return [
//             'Created At' => $item->created_at,
//             'Name' => $item->name,
//             'Operator' => $item->operator,
//             'Status' => $item->status,
//             'Country' => $item->country,
//             'Commentaire' => $item->commentaire
//         ];
//     })->toArray();

//     $filename = 'sender_export_' . date('Y-m-d_H-i-s');

//     // Export Excel
//     if ($type === 'excel') {
//         return Excel::download(new SenderExport($exportData), $filename . '.xlsx');
//     }

//     // Export CSV
//     if ($type === 'csv') {
//         return Excel::download(new SenderExport($exportData), $filename . '.csv');
//     }
// }

// public function getRegistryDetails($id)
// {
//     $registry = DB::table('registries')->find($id);
    
//     return response()->json($registry);
// }
// ************************************************************************************



    // public function sender()
    // {
    //     return view('searchsender');
    // }
    
    //     public function dashboard()
    // {
    //     $sender = registries::orderBy('created_at', 'desc')->paginate(10);
       
    //     return view('searchsender', compact('sender'));
    // }
    
    // public function show($id)
    // {
    //     $record = registries::findOrFail($id);
    //     return view('show', compact('record'));
    // }
// ****************************************** search Bouton**************************
    // public function search(Request $request)
    // {
    //     $query = registries::query();

    //     // Traitement uniquement des champs renseignés
    //     $filters = $request->only(['name', 'operator', 'country', 'status', 'created_at','date_to']);
        
    //     foreach ($filters as $field => $value) {
    //         if (!empty($value)) {
    //             switch ($field) {
    //                 case 'name':
    //                     $query->where('name', 'like', '%' . $value . '%');
    //                     break;
    //                     case 'operator':
    //                         $query->where('operator', 'like', '%' . $value . '%');
    //                         break;
                        
    //                 case 'country':
    //                     $query->where('country', 'like', '%' . $value . '%');
    //                     break;

    //                     case 'status':
    //                         $query->where('status', $value);
    //                         break;
                        
    //                 case 'created_at':
    //                     $query->whereDate('created_at', '>=', $value);
    //                     break;

    //                     case 'date_to':
    //                         $query->whereDate('created_at', '<=', $value);
    //                         break;
    //             }
    //         }
    //     }

    //     $sender = $query->latest()->paginate(10);
    //     return view('searchsender', compact('sender'))->render();
    // }
}
