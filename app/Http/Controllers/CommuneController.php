<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Commune;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommuneController extends Controller
{
    public function create()
    {
                        // Récupérer l'utilisateur connecté
                        $user = Auth::user();
    
                        // Vérifier le rôle de l'utilisateur
                        if ($user->role !== 'admin' && $user->role !== 'Gestionnaire du ministere') {
                            return redirect()->route('login')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
                        }
        $departements = Departement::all(); // Récupère tous les départements
        return view('communes.create', compact('departements'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'commune_libelle' => 'required|string|max:255',
            'departement_id' => 'required|exists:departement,departement_id',
        ]);

        // Création de la commune
        Commune::create($request->all());

        // Redirection avec un message de succès
        return redirect()->route('communes.index')->with('success', 'Commune enregistrée avec succès.');
    }

   

    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
    
        // Vérifier le rôle de l'utilisateur
        if ($user->role !== 'admin' && $user->role !== 'gestionnaire') {
            return redirect()->route('login')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    
        // Récupérer les communes avec leur département
        $communes = Commune::with('departement')->orderBy('commune_id', 'desc')->paginate(10);
    
        // Retourner la vue avec les communes
        return view('communes.index', compact('communes'));
    }

    public function edit($id)
    {
        // Récupérer la commune par son ID
        $commune = Commune::findOrFail($id);

        // Récupérer tous les départements
        $departements = Departement::all();

        // Retourner la vue d'édition
        return view('communes.edit', compact('commune', 'departements'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'commune_libelle' => 'required|string|max:255',
            'departement_id' => 'required|exists:departement,departement_id',
        ]);

        // Récupérer la commune à modifier
        $commune = Commune::findOrFail($id);

        // Mise à jour des données
        $commune->update($request->all());

        // Redirection avec un message de succès
        return redirect()->route('communes.index')->with('success', 'Commune mise à jour avec succès.');
    }
    
    public function destroy($id)
    {
        // Récupérer la commune par son ID
        $commune = Commune::findOrFail($id);

        // Supprimer la commune
        $commune->delete();

        // Redirection avec un message de succès
        return redirect()->route('communes.index')->with('success', 'Commune supprimée avec succès.');
    }
}
