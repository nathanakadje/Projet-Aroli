<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\operators;

class OperatorController extends Controller
{
    //
    // public function search(Request $request)
    // {
    //     $search = $request->input('search', '');
    //     $page = $request->input('page', 1);
    //     $perPage = 10;
    
    //     $operators = operators::when($search, function ($query) use ($search) {
    //             $query->where('name', 'like', "%{$search}%");
    //         })
    //         ->paginate($perPage);
    
    //     return response()->json($operators);
    // }
    public function search(Request $request)
    {
        $search = $request->input('search', '');
        $page = $request->input('page', 1);
        $perPage = 10;
    
        $operators = operators::when($search, function ($query) use ($search) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%']);
            })
            ->paginate($perPage);
    
        return response()->json($operators);
    }
   
    public function show($id)
    {
        $operator = operators::findOrFail($id);
        return response()->json($operator);
    }


 
}
