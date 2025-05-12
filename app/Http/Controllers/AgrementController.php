<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groupement;
use App\Models\Agrement;
use App\Models\Structure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; // Importer Auth pour récupérer l'utilisateur connecté

class AgrementController extends Controller
{


    public function index(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
        $search = $request->input('search');

        // Construire la requête de base
        $query = DB::table('agrement')
            ->join('groupement', 'agrement.groupement_id', '=', 'groupement.groupement_id')
            ->select(
                'agrement.agrement_id',
                'agrement.reference',
                'agrement.document',
                'agrement.structure',
                'agrement.date_deliver',
                'groupement.nom as groupement_nom'
            );

        // Vérifier le rôle de l'utilisateur
        if ($user->role !== 'admin' && $user->role !== 'gestionnaire du ministere') {
            // Si l'utilisateur n'est pas admin ou gestionnaire, fi
            redirect()->route('login')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }

        // Appliquer la recherche si un terme est fourni
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('agrement.reference', 'like', "%$search%")
                    ->orWhere('groupement.nom', 'like', "%$search%");
            });
        }

        // Récupérer les agréments avec pagination
        $agrements = $query->orderBy('agrement.agrement_id', 'desc')->paginate(6);
        $groupements = Groupement::all();
        // Retourner la vue avec les agréments
        return view('agrements.index', compact('agrements','groupements'));
    }

    public function create()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier le rôle de l'utilisateur
        if ($user->role !== 'admin' && $user->role !== 'gestionnaire du ministere') {
            return redirect()->route('login')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
        $groupements = Groupement::all();
        return view('agrements.create', compact('groupements'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'structure' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'document' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', // Limite de 2 Mo
            'date_deliver' => 'required|date',
            'groupement_id' => 'required|exists:groupement,groupement_id',
        ]);
        $filename = null; 
        // Gestion du fichier
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('agrements'), $filename);
        }

        // Création de l'agrément avec l'ID de l'utilisateur connecté
        Agrement::create([
            'structure' => $request->input('structure'),
            'reference' => $request->input('reference'),
            'document' => $filename, // Nom du fichier enregistré
            'date_deliver' => $request->input('date_deliver'),
            'groupement_id' => $request->input('groupement_id'),
            'users_id' => Auth::id(), // Ajouter l'ID de l'utilisateur connecté
        ]);

        // Redirection avec un message de succès
        return redirect()->route('agrement.index')->with('success', 'Agrément créé avec succès.');
    }

    public function edit($id)
    {
        // Récupérer l'agrément par son ID
        $agrement = Agrement::findOrFail($id);

        // Récupérer tous les groupements pour le champ de sélection
        $groupements = Groupement::all();

        // Retourner la vue d'édition avec les données nécessaires
        return view('agrements.edit', compact('agrement', 'groupements'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $validatedData = $request->validate([
            'structure' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'document' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // Fichier facultatif
            'date_deliver' => 'required|date',
            'groupement_id' => 'required|exists:groupement,groupement_id',
        ]);

        // Récupérer l'agrément par son ID
        $agrement = Agrement::findOrFail($id);

        // Gestion du fichier
        if ($request->hasFile('document')) {
            // Supprimer l'ancien fichier s'il existe
            if ($agrement->document && file_exists(public_path('agrements/' . $agrement->document))) {
                unlink(public_path('agrements/' . $agrement->document));
            }

            // Enregistrer le nouveau fichier
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('agrements'), $filename);

            // Mettre à jour le champ `document` avec le nouveau nom de fichier
            $validatedData['document'] = $filename;
        }

        // Mise à jour des données de l'agrément
        $agrement->update($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('agrement.index')->with('success', 'Agrément modifié avec succès.');
    }

    public function destroy($id)
    {
        // Récupérer l'agrément par son ID
        $agrement = Agrement::findOrFail($id);

        // Supprimer le fichier associé s'il existe
        if ($agrement->document && file_exists(public_path('agrements/' . $agrement->document))) {
            unlink(public_path('agrements/' . $agrement->document));
        }

        // Supprimer l'agrément
        $agrement->delete();

        // Redirection avec un message de succès
        return redirect()->route('agrement.index')->with('success', 'Agrément supprimé avec succès.');
    }


    public function show($id)
    {

        $agrement = DB::table('agrement')
            ->join('groupement', 'agrement.groupement_id', '=', 'groupement.groupement_id')
            ->join('structure', 'agrement.structure', '=', 'structure.structure_id')
            ->select(
                'agrement.agrement_id',
                'agrement.reference',
                'structure.structure',
                'agrement.document',
                'agrement.date_deliver',
                'groupement.nom as groupement_nom'
            )
            ->where('agrement.agrement_id', '=', $id)
            ->first();


        return view('agrements.show', compact('agrement'));
    }
}
