<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;

class CheckDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $agent = new Agent();

        // Vérifier si l'appareil est un téléphone ou une tablette
        if ($agent->isMobile() || $agent->isTablet()) {
            // Afficher une vue ou un message d'erreur
            return response()->view('errors.device_not_supported');
        }

        return $next($request);
    }
}