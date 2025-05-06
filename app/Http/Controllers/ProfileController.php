<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Affiche la page du profil de l'utilisateur connecté.
     */
    public function show()
    {
        return view('profile.show');
    }

    /**
     * Met à jour les informations personnelles de l'utilisateur.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Vos informations ont été mises à jour avec succès.');
    }

    /**
     * Met à jour la photo de profil de l'utilisateur.
     */
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Supprime l'ancienne photo si elle existe
        if ($user->profile_photo && file_exists(public_path('images/' . $user->profile_photo))) {
            unlink(public_path('images/' . $user->profile_photo));
        }

        // Enregistre la nouvelle photo dans le dossier public/images
        $fileName = $user->id . '_' . time() . '.' . $request->file('profile_photo')->getClientOriginalExtension();
        $request->file('profile_photo')->move(public_path('images'), $fileName);

        // Met à jour le chemin de la photo dans la base de données
        $user->profile_photo = $fileName;
        $user->save();

        return redirect()->back()->with('success', 'Votre photo de profil a été mise à jour avec succès.');
    }
}
