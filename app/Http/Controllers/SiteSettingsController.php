<?php

namespace App\Http\Controllers;

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
        // Récupérer les paramètres depuis le fichier .env
        $settings = [
            'site_name' => env('APP_NAME', 'Default Site Name'),
            'site_url' => env('APP_URL', 'http://localhost'),
            'app_env' => env('APP_ENV', 'local'),
            'app_debug' => env('APP_DEBUG', false),
            'db_connection' => env('DB_CONNECTION', 'mysql'),
            'db_host' => env('DB_HOST', '127.0.0.1'),
            'db_port' => env('DB_PORT', '3306'),
            'db_database' => env('DB_DATABASE', 'database_name'),
            'db_username' => env('DB_USERNAME', 'root'),
            'db_password' => env('DB_PASSWORD', ''),
            'mail_mailer' => env('MAIL_MAILER', 'smtp'),
            'mail_host' => env('MAIL_HOST', 'localhost'),
            'mail_port' => env('MAIL_PORT', '1025'),
            'mail_username' => env('MAIL_USERNAME', null),
            'mail_password' => env('MAIL_PASSWORD', null),
            'mail_encryption' => env('MAIL_ENCRYPTION', null),
            'mail_from_address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
            'mail_from_name' => env('MAIL_FROM_NAME', 'Default Name'),
        ];

        // Retourner les paramètres à la vue
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
            'site_url' => 'required|url|max:255',
            'app_env' => 'required|in:local,production,staging',
            'app_debug' => 'required|boolean',
            'db_connection' => 'required|string|max:50',
            'db_host' => 'required|string|max:255',
            'db_port' => 'required|integer',
            'db_database' => 'required|string|max:255',
            'db_username' => 'required|string|max:255',
            'db_password' => 'nullable|string|max:255',
            'mail_mailer' => 'required|string|max:50',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|integer',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|in:tls,ssl',
            'mail_from_address' => 'required|email|max:255',
            'mail_from_name' => 'required|string|max:255',
        ]);

        // Mettre à jour les valeurs dans le fichier .env
        foreach ($validated as $key => $value) {
            $this->updateEnvVariable(strtoupper($key), $value);
        }

        return redirect()->back()->with('success', 'Les paramètres ont été mis à jour avec succès.');
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

    /**
     * Mettre à jour une variable dans le fichier .env
     */
    private function updateEnvVariable($key, $value)
    {
        $envFile = base_path('.env');
        if (file_exists($envFile)) {
            $envContent = file_get_contents($envFile);
            $pattern = "/^{$key}=.*$/m";
            $replacement = "{$key}={$value}";
            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, $replacement, $envContent);
            } else {
                $envContent .= "\n{$replacement}";
            }
            file_put_contents($envFile, $envContent);
        }
    }
}