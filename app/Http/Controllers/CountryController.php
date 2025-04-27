<?php

namespace App\Http\Controllers;

use App\Models\countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    //
    public function search(Request $request)
    {
        $search = $request->input('search', '');
        $page = $request->input('page', 1);
        $perPage = 10;
    
        $countries = countries::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate($perPage);
    
        return response()->json($countries);
    }

    
    public function show($id)
    {
        $country = countries::findOrFail($id);
        return response()->json($country);
    }

}
