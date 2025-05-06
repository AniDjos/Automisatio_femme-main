<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;

class SiteSettingsController extends Controller
{
    /**
     * Afficher la page des paramètres
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier le rôle de l'utilisateur
        if ($user->role !== 'admin' ) {
            return redirect()->route('login')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
        // Récupérer les paramètres existants depuis la base de données
        $settings = [
            'site_name' => setting('site_name'),
            'site_logo' => setting('site_logo'),
            'contact_email' => setting('contact_email'),
            'contact_phone' => setting('contact_phone'),
            'physical_address' => setting('physical_address'),
            'site_theme' => setting('site_theme', 'light'),
            'primary_color' => setting('primary_color', '#4f46e5'),
            'favicon' => setting('favicon'),
            'meta_title' => setting('meta_title'),
            'meta_description' => setting('meta_description'),
            'meta_keywords' => setting('meta_keywords'),
            'google_analytics' => setting('google_analytics'),
            'mail_from_address' => setting('mail_from_address'),
            'mail_from_name' => setting('mail_from_name'),
            'mail_host' => setting('mail_host'),
            'mail_port' => setting('mail_port'),
            'mail_username' => setting('mail_username'),
            'mail_password' => setting('mail_password'),
            'mail_encryption' => setting('mail_encryption'),
        ];

        return view('profile.setting', compact('settings'));
    }

    /**
     * Mettre à jour les paramètres généraux
     */
    public function update(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'physical_address' => 'nullable|string|max:500',
            'site_theme' => 'required|in:light,dark',
            'primary_color' => 'required|string|max:7',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'google_analytics' => 'nullable|string',
            'mail_from_address' => 'required|email|max:255',
            'mail_from_name' => 'required|string|max:255',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|integer',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|in:tls,ssl',
        ]);

        // Enregistrement des paramètres
        foreach ($validated as $key => $value) {
            setting([$key => $value])->save();
        }

        return redirect()->route('admin.settings')
            ->with('success', 'Les paramètres ont été mis à jour avec succès.');
    }

    /**
     * Upload du logo du site
     */
    public function uploadLogo(Request $request)
    {
        $request->validate([
            'site_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('site_logo')) {
            // Supprimer l'ancien logo s'il existe
            $oldLogo = setting('site_logo');
            if ($oldLogo && Storage::exists($oldLogo)) {
                Storage::delete($oldLogo);
            }

            // Stocker le nouveau logo
            $path = $request->file('site_logo')->store('public/settings');
            setting(['site_logo' => str_replace('public/', '', $path)])->save();

            return response()->json([
                'success' => true,
                'path' => Storage::url($path),
            ]);
        }

        return response()->json(['success' => false], 400);
    }

    /**
     * Upload du favicon
     */
    public function uploadFavicon(Request $request)
    {
        $request->validate([
            'favicon' => 'required|image|mimes:png,ico|dimensions:width=32,height=32',
        ]);

        if ($request->hasFile('favicon')) {
            // Supprimer l'ancien favicon s'il existe
            $oldFavicon = setting('favicon');
            if ($oldFavicon && Storage::exists($oldFavicon)) {
                Storage::delete($oldFavicon);
            }

            // Stocker le nouveau favicon
            $path = $request->file('favicon')->store('public/settings');
            setting(['favicon' => str_replace('public/', '', $path)])->save();

            return response()->json([
                'success' => true,
                'path' => Storage::url($path),
            ]);
        }

        return response()->json(['success' => false], 400);
    }
}