<?php

namespace App\Http\Controllers;

use App\Models\registries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    //
    // public function dashboard()
    // {
    //     $sender = registries::orderBy('created_at', 'desc')->take(5)->get(['created_at', 'name', 'country', 'status', 'date_sub']);
      
    //     return view('dashboard', compact('sender'));
    // }
    

    // public function getStatusStatisticss(Request $request)
    // {
    //     $startDate = $request->input('start_date') 
    //         ? Carbon::parse($request->input('start_date')) 
    //         : null;
    //     $endDate = $request->input('end_date') 
    //         ? Carbon::parse($request->input('end_date')) 
    //         : null;

    //     $query = registries::query();

    //     if ($startDate && $endDate) {
    //         $query->whereBetween('created_at', [$startDate, $endDate]);
    //     }

    //     $statistics = $query->groupBy('status')
    //         ->selectRaw('status, COUNT(*) as count')
    //         ->pluck('count', 'status')
    //         ->toArray();

    //     return response()->json([
    //         'labels' => array_keys($statistics),
    //         'data' => array_values($statistics)
    //     ]);
    // }
    public function getStatusCounts()
{

    
    $statusCounts = registries::select('status', DB::raw('count(*) as count'))
        ->groupBy('status')
        ->pluck('count', 'status')
        ->toArray();

    return response()->json([
        'pending' => $statusCounts['pending'] ?? 0,
        'valide' => $statusCounts['valide'] ?? 0,
        'close' => $statusCounts['close'] ?? 0
    ]);
}

public function getStatusStatistics()
{
    $sender = registries::orderBy('created_at', 'desc')->take(5)->get(['created_at', 'name', 'country', 'status', 'date_sub']);
    // Calculer le nombre total de senders
    $totalSenders = DB::table('registries')->count();
    
    // Calculer les statistiques par statut
    $statusStats = DB::table('registries')
    ->selectRaw('status, COUNT(*) as count')
    ->groupBy('status')
    ->pluck('count', 'status')
    ->toArray();
    // Calculer les pourcentages
  
    $stats = [
        'total' => [
            'count' => $totalSenders,
            'percentage' => 100
        ],
        'pending' => [
            'count' => $statusStats['pending'] ?? 0,
            'percentage' => round(($statusStats['pending'] ?? 0) / $totalSenders * 100, 2)
        ],
        'valide' => [
            'count' => $statusStats['valide'] ?? 0,
            'percentage' => round(($statusStats['valide'] ?? 0) / $totalSenders * 100, 2)
        ],
        'close' => [
            'count' => $statusStats['close'] ?? 0,
            'percentage' => round(($statusStats['close'] ?? 0) / $totalSenders * 100, 2)
        ]
    ];

    return view('dashboard', compact('stats', 'sender'));
}
}
