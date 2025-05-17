<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Structure;

use Illuminate\Support\Facades\DB;

class StructureController extends Controller
{
    /**
     * Afficher la liste des structures.
     */
    public function index()
    {
        $structures = Structure::all();
        return view('structure.index', compact('structures'));
    }

    /**
     * Afficher le formulaire pour créer une nouvelle structure.
     */
    public function create()
    {
        return view('structure.create');
    }

    /**
     * Enregistrer une nouvelle structure dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'structure' => 'required|string|max:255|unique:structures,structure',
        ]);

        Structure::create([
            'structure' => $request->input('structure'),
        ]);

        return redirect()->route('structure.index')->with('success', 'Structure créée avec succès.');
    }

    /**
     * Afficher les détails d'une structure spécifique.
     */
    public function show($id)
    {
        $structure = Structure::findOrFail($id);
        return view('structure.show', compact('structure'));
    }

    /**
     * Afficher le formulaire pour modifier une structure existante.
     */
    public function edit($id)
    {
        $structure = Structure::findOrFail($id);
        return view('structure.edit', compact('structure'));
    }

    /**
     * Mettre à jour une structure existante dans la base de données.
     */
    public function update(Request $request, $id)
    {

        // Validation des données
        $request->validate([
            'structure' => 'required|string|max:100',
        ]);

        // Mise à jour de la filière
        DB::table('structure')->where('structure_id', $id)->update([
            'structure' => $request->input('structure'),
        ]);
        return redirect()->route('structures.index')->with('success', 'Structure mise à jour avec succès.');
    }

    /**
     * Supprimer une structure de la base de données.
     */
    public function destroy($id)
    {
        $structure = Structure::findOrFail($id);
        $structure->delete();

        return redirect()->route('structure.index')->with('success', 'Structure supprimée avec succès.');
    }
}
