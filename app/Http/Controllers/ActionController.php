<?php

namespace App\Http\Controllers;

use App\Models\registries;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    
    // public function dashboard()
    // {
    //     $user = registries::orderBy('created_at', 'desc')->get();
       
    //     return view('actions', compact('user'));
    // }
    public function show($id)
    {
        $user = registries::findOrFail($id);
        
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        
        $user = registries::findOrFail($id);
        $user->name = $request->name;
        $user->country = $request->country;
        $user->status = $request->status;
        $user->operator = $request->operator;
        $user->save();

        return response()->json(['success' => true]);
    }
    public function destroy($id)
    {
        $user = registries::findOrFail($id);
        $user->delete();

        return response()->json(['success' => true]);
    }
    public function index()
    {

        // Passer les utilisateurs paginés à la vue
        return view('actions', [
            'user' => registries::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
    
    public function search(Request $request)
{
    $query = registries::query();

    // Traitement uniquement des champs renseignés
    $filters = $request->only(['name', 'operator', 'country', 'status', 'created_at','date_to']);
    
    foreach ($filters as $field => $value) {
        if (!empty($value)) {
            switch ($field) {
                case 'name':
                    $query->where('name', 'like', '%' . $value . '%');
                    break;
                    case 'operator':
                        $query->where('operator', 'like', '%' . $value . '%');
                        break;
                    
                case 'country':
                    $query->where('country', 'like', '%' . $value . '%');
                    break;

                    case 'status':
                        $query->where('status', $value);
                        break;
                    
                case 'created_at':
                    $query->whereDate('created_at', '>=', $value);
                    break;

                    case 'date_to':
                        $query->whereDate('created_at', '<=', $value);
                        break;
            }
        }
    }

    $user = $query->latest()->paginate(5);
    return view('actions', compact('user'))->render();
}
}
