@extends('welcome')

@section('name', 'Groupements')

@section('content')
<main class="content-groupement">
    <div class="recherche">
        <form action="{{ route('groupements.index') }}" method="GET" class="recherche-groupement">
            <div class="filter-wrapper">
                <div class="select-container">
                    <select name="arrondissement" id="arrondissement" class="filter-select">
                        <option value="">-- Sélectionner un arrondissement --</option>
                    </select>
                </div>

                <div class="select-container">
                    <select name="quartier" id="quartier" class="filter-select">
                        <option value="">-- Sélectionner un quartier --</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn-recherche">
                <span>Rechercher</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>
    </div>

    <!-- Liste des groupements -->
    <div class="container-prin">
        @forelse($groupements as $groupement)
        <div class="container-groupement" data-name="{{ strtolower($groupement->groupement_nom) }}">
            <div class="header-groupement">
                <!-- Génération de l'acronyme -->
                @php
                $acronyme = implode(
                '',
                array_map(function ($word) {
                return strtoupper($word[0]);
                }, explode(' ', $groupement->groupement_nom)),
                );
                @endphp

                <div class="acronyme-circle">
                    <span>{{ $acronyme }}</span>
                    <div class="circle-glow"></div>
                </div>
                <h2 class="title">{{ $groupement->groupement_nom }}</h2>
            </div>
            <div class="groupement-info">
                <p class="info-item" data-tooltip="Activité principale du groupement">
                    <i class="fas fa-briefcase"></i>
                    <span>Activité principale :
                        <strong>{{ $groupement->activite_principale_nom ?? 'Non spécifiée' }}</strong></span>
                </p>
                <p class="info-item" data-tooltip="Nombre total de membres">
                    <i class="fas fa-users"></i>
                    <span>Effectif : <strong>{{ $groupement->effectif }} membres</strong></span>
                </p>
                <p class="info-item" data-tooltip="Emplacement du groupement">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Localisation : 
                        <strong>{{ $groupement->departement_nom ?? 'Non spécifié' }},
                        {{ $groupement->commune_nom ?? 'Non spécifié' }},
                        {{ $groupement->arrondissement_nom ?? 'Non spécifié' }},
                        {{ $groupement->quartier_nom ?? 'Non spécifié' }}</strong>
                    </span>
                </p>
            </div>
        </div>
        @empty
        <p class="no-groupements">Aucun groupement trouvé.</p>
        @endforelse
    </div>
</main>
@endsection
@endsection