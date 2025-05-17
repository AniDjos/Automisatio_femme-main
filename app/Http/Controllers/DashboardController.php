<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appui;
use App\Models\Groupement;
use App\Models\Departement;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord général.
     */

    public function pre()
    {
        return view('dashboardEntete.dashboard');
    }

    public function index()
    {

        $groupements = DB::table('groupement')->get();
        $appuis = DB::table('appuis')->get();
        $equipements = DB::table('equipement')->get();
    
        // Exemple de données dynamiques à récupérer depuis la base de données

        // Données pour les graphiques
        $departements = Departement::pluck('departement_libelle');
        $groupementsParDepartement = DB::table('groupement')
        ->join('departement', 'groupement.departement_id', '=', 'departement.departement_id')
        ->select('departement.departement_libelle as departement', DB::raw('COUNT(groupement.groupement_id) as total'))
        ->groupBy('departement.departement_libelle')
        ->pluck('total', 'departement');

        $typesAppuis = DB::table('appuis')->select('type_appuis')->distinct()->get();
        $repartitionAppuis = DB::table('appuis')
            ->select(DB::raw('type_appuis, COUNT(*) as total'))
            ->groupBy('type_appuis')
            ->pluck('total', 'type_appuis');

        $etatsEquipements = DB::table('equipement')->select('stat_equipement')->distinct()->get();
        $repartitionEquipements = DB::table('equipement')
            ->select(DB::raw('stat_equipement, COUNT(*) as total'))
            ->groupBy('stat_equipement')
            ->pluck('total', 'stat_equipement');

        $revenusMensuels = DB::table('groupement')
            ->select(DB::raw('MONTH(date_creation) as mois, SUM(revenu_mens) as total'))
            ->groupBy(DB::raw('MONTH(date_creation)'))
            ->pluck('total', 'mois');

        // Retourner la vue avec les données
        return view('ADMIN.dash', compact(
            'departements',
            'groupementsParDepartement',
            'typesAppuis',
            'repartitionAppuis',
            'etatsEquipements',
            'repartitionEquipements',
            'revenusMensuels','groupements', 'appuis', 'equipements'
        ));


} 
   }