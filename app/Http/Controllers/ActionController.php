<?php

namespace App\Http\Controllers;

use App\Models\registries;
use App\Exports\ActionExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ActionController extends Controller
{
    // Recover the details of a recording
public function getRegistryDetails($id)
{
    $registry = registries::findOrFail($id);
    return response()->json($registry);
}

// Update recording
public function updateRegistry(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|exists:registries,id',
        'name' => 'required|string',
        'operator' => 'required|string',
        'country' => 'required|string',
        'status' => 'required|in:pending,valide,close'
    ]);

    try {
        $registry = registries::findOrFail($validated['id']);
        $registry->update($validated);
        
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

// Delete recording
public function deleteRegistry($id)
{
    try {
        $registry = registries::findOrFail($id);
        $registry->delete();
        
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}
//delete a record on the table
public function destroy($id)
{
    $sender = registries::findOrFail($id);
    $sender->delete();

    return response()->json(['success' => true, 'message' => 'Sender supprimé avec succès']);
}




// *************************************Edite modal pour modifier enregistrement ***************************
//  Example of update method in SenderController


public function edit($id)
{
    $sender = registries::with(['operator', 'country'])->findOrFail($id);
    return response()->json($sender);
}

public function update(Request $request, $id)
{
    $sender = registries::findOrFail($id);
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'operator_id' => 'nullable|exists:operators,id',
        'country_id' => 'nullable|exists:countries,id',
        'status' => 'required|in:valide,pending,close',
    ]);
    
    $sender->update($validated);
    
    return response()->json(['message' => 'Enregistrement mis à jour avec succès', 'data' => $sender]);
}

    public function index()
    {

        // Passer les utilisateurs paginés à la vue
        return view('actions', [
            'user' => registries::orderBy('created_at', 'desc')->paginate(15)
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

    $user = $query->latest()->paginate(15);
    return view('actions', compact('user'))->render();
}

}
