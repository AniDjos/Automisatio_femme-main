@extends('welcome')

@section('name', 'Modifier un Groupement')

@section('content')
<div class="form-container">
    <!-- Barre de progression -->
    <div class="progress-tracker">
        <div class="steps">
            <div class="step">
                <div class="step-bubble">1</div>
                <span class="step-label">Informations générales</span>
            </div>
            <div class="step">
                <div class="step-bubble">2</div>
                <span class="step-label">Activités et Finances</span>
            </div>
            <div class="step">
                <div class="step-bubble">3</div>
                <span class="step-label">Appui et Soutien</span>
            </div>
            <div class="step">
                <div class="step-bubble">4</div>
                <span class="step-label">Équipement et Documentation</span>
            </div>
        </div>
        <div class="progress-bar">
            <div class="progress-bar-fill"></div>
        </div>
    </div>

    <form id="groupement-form" action="{{ route('groupements.update', $groupement->groupement_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Étape 1 -->
        <div class="form-step active">
            <div class="step-header">
                <h2 class="step-title">Informations générales</h2>
                <p class="step-description">Complétez les informations de base concernant le groupement</p>
            </div>
            
            <div class="form-card">
                <div class="form-row">
                    <div class="form-group">
                        <label for="nom" class="form-label">Nom du Groupement</label>
                        <input type="text" id="nom" name="nom" class="form-input" value="{{ $groupement->nom }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="date_creation" class="form-label">Date de Création</label>
                        <input type="date" id="date_creation" name="date_creation" class="form-input" value="{{ $groupement->date_creation }}" required>
                    </div>
                </div>
                
                <div class="section-divider">
                    <h3 class="section-title">Localisation</h3>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="departement" class="form-label">Département</label>
                        <select id="departement" name="departement" class="form-select" required>
                            @foreach($departements as $departement)
                            <option value="{{ $departement->departement_id }}"
                                {{ $groupement->departement_id == $departement->departement_id ? 'selected' : '' }}>
                                {{ $departement->departement_libelle }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="commune" class="form-label">Commune</label>
                        <select id="commune" name="commune" class="form-select" required>
                            @foreach($communes as $commune)
                            <option value="{{ $commune->commune_id }}"
                                {{ $groupement->commune_id == $commune->commune_id ? 'selected' : '' }}>
                                {{ $commune->commune_libelle }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="arrondissement" class="form-label">Arrondissement</label>
                        <select id="arrondissement" name="arrondissement" class="form-select" required>
                            @foreach($arrondissements as $arrondissement)
                            <option value="{{ $arrondissement->arrondissement_id }}"
                                {{ $groupement->arrondissement_id == $arrondissement->arrondissement_id ? 'selected' : '' }}>
                                {{ $arrondissement->arrondissement_libelle }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="quartier" class="form-label">Quartier</label>
                        <select id="quartier" name="quartier" class="form-select">
                            @foreach($quartiers as $quartier)
                            <option value="{{ $quartier->quartier_id }}"
                                {{ $groupement->quartier_id == $quartier->quartier_id ? 'selected' : '' }}>
                                {{ $quartier->quartier_libelle }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="button" class="btn btn-next">
                    <span>Continuer</span>
                    <svg class="icon" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></svg>
                </button>
            </div>
        </div>

        <!-- Étape 2 -->
        <div class="form-step">
            <div class="step-header">
                <h2 class="step-title">Activités et Finances</h2>
                <p class="step-description">Détaillez les activités économiques et la situation financière</p>
            </div>
            
            <div class="form-card">
                <div class="section-divider">
                    <h3 class="section-title">Activités</h3>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="activite_principale" class="form-label">Activité Principale</label>
                        <select id="activite_principale" name="activite_principale" class="form-select" required>
                            @foreach($activites as $activite)
                            <option value="{{ $activite->activite_id }}"
                                {{ $groupement->activite_principale_id == $activite->activite_id ? 'selected' : '' }}>
                                {{ $activite->activite }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="activite_secondaire" class="form-label">Activité Secondaire</label>
                        <select id="activite_secondaire" name="activite_secondaire" class="form-select">
                            <option value="">Aucune</option>
                            @foreach($activites as $activite)
                            <option value="{{ $activite->activite_id }}"
                                {{ $groupement->activite_secondaire_id == $activite->activite_id ? 'selected' : '' }}>
                                {{ $activite->activite }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="filiere" class="form-label">Filière</label>
                        <select id="filiere" name="filiere" class="form-select" required>
                            @foreach($filieres as $filiere)
                            <option value="{{ $filiere->filiere_id }}"
                                {{ $groupement->filiere_id == $filiere->filiere_id ? 'selected' : '' }}>
                                {{ $filiere->filiere_nom }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="effectif" class="form-label">Effectif</label>
                        <input type="number" id="effectif" name="effectif" class="form-input" value="{{ $groupement->effectif }}" min="1" required>
                    </div>
                </div>
                
                <div class="section-divider">
                    <h3 class="section-title">Situation Financière</h3>
                </div>
                
                <div class="finance-card">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="revenu" class="form-label">Revenu mensuel</label>
                            <div class="input-with-icon">
                                <svg class="input-icon" viewBox="0 0 24 24"><path d="M2 17h2.5a2 2 0 0 0 1.8-1.1l7.3-14.2a2 2 0 0 1 1.8-1.1h4.6a2 2 0 0 1 2 2.5l-2.2 9.9a2 2 0 0 1-2 1.5H8"/><circle cx="5" cy="20" r="2"/><circle cx="16" cy="20" r="2"/></svg>
                                <input type="number" id="revenu" name="revenu" class="form-input" value="{{ $groupement->revenu_mens }}" min="0" step="0.01" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="depense" class="form-label">Dépense mensuelle</label>
                            <div class="input-with-icon">
                                <svg class="input-icon" viewBox="0 0 24 24"><path d="M20.2 7.8l-7.7 7.7-4-4-5.7 5.7"/><path d="M15 7h6v6"/></svg>
                                <input type="number" id="depense" name="depense" class="form-input" value="{{ $groupement->depense_mens }}" min="0" step="0.01" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="benefice" class="form-label">Bénéfice mensuel</label>
                            <div class="input-with-icon">
                                <svg class="input-icon" viewBox="0 0 24 24"><path d="M20.2 17.2l-7.7-7.7-4 4-5.7-5.7"/><path d="M15 18h6v-6"/></svg>
                                <input type="number" id="benefice" name="benefice" class="form-input" value="{{ $groupement->benefice_mens }}" min="0" step="0.01" required>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="section-divider">
                    <h3 class="section-title">Financement</h3>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="finance" class="form-label">Source de Financement</label>
                        <input type="text" id="finance" name="source_financement" class="form-input" value="{{ $groupement->source_financement }}" required>
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="button" class="btn btn-prev">
                    <svg class="icon" viewBox="0 0 24 24"><path d="m15 18-6-6 6-6"/></svg>
                    <span>Retour</span>
                </button>
                <button type="button" class="btn btn-next">
                    <span>Continuer</span>
                    <svg class="icon" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></svg>
                </button>
            </div>
        </div>

        <!-- Étape 3 -->
        <div class="form-step">
            <div class="step-header">
                <h2 class="step-title">Appui et Soutien</h2>
                <p class="step-description">Indiquez les appuis dont bénéficie le groupement</p>
            </div>

            <div class="form-card">
                <div class="toggle-group">
                    <label class="toggle-label">Bénéficiez-vous d'un appui ?</label>
                    <label class="toggle-switch">
                        <input type="checkbox" id="appui" name="appui" value="1" {{ $groupement->appui ? 'checked' : '' }}>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div id="appui-details" class="{{ $groupement->appui ? '' : 'hidden' }}">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="type_appui" class="form-label">Type d'Appui</label>
                            <select id="type_appui" name="type_appui" class="form-select" required>
                                <option value="" disabled>Choisissez un type d'appui</option>
                                <option value="financier" {{ $groupement->type_appui == 'financier' ? 'selected' : '' }}>Financier</option>
                                <option value="materiel" {{ $groupement->type_appui == 'materiel' ? 'selected' : '' }}>Matériel</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="structure_appui" class="form-label">Structure Responsable</label>
                            <select id="structure_appui" name="structure" class="form-select">
                                <option value="" disabled>Choisissez une structure</option>
                                @foreach($structures as $structure)
                                    <option value="{{ $structure->structure_id }}" {{ $groupement->structure_id == $structure->structure_id ? 'selected' : '' }}>
                                        {{ $structure->structure }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @foreach($appuis as $appui)
                    <div class="form-row">
                        <div class="form-group">
                        <label for="annee_appui_{{ $appui->id }}" class="form-label">Année d'Appui</label>
                        <input type="date" id="annee_appui_{{ $appui->id }}" name="annee_appui" value="{{ $appui->date_appuis }}" class="form-input" required>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="description_appui_{{ $appui->id }}" class="form-label"> Description de l'Appui</label>
                    <textarea id="description_appui_{{ $appui->id }}" name="description_appui" rows="4" class="form-textarea">{{ $appui->description }}</textarea>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="form-actions">
                <button type="button" class="btn btn-prev">
                    <svg class="icon" viewBox="0 0 24 24"><path d="m15 18-6-6 6-6"/></svg>
                    <span>Retour</span>
                </button>
                <button type="button" class="btn btn-next">
                    <span>Continuer</span>
                    <svg class="icon" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></svg>
                </button>
            </div>
        </div>

        <!-- Étape 4 -->
        <div class="form-step">
            <div class="step-header">
                <h2 class="step-title">Équipement et Documentation</h2>
                <p class="step-description">Complétez les informations sur l'équipement et la documentation</p>
            </div>

            <div class="form-card">
                <div class="section-divider">
                    <h3 class="section-title">Équipement</h3>
                </div>
                
                <div class="form-row">
                    @foreach($equipements as $equipement)
                        <div class="form-group">
                            <label for="nom_equipement_{{ $equipement->id }}" class="form-label">Équipement</label>
                            <input type="text" id="nom_equipement_{{ $equipement->id }}" name="equipement[{{ $equipement->id }}][nom]" class="form-input" value="{{ $equipement->equipment_libelle }}" required>
                        </div>

                        <div class="form-group">
                            <label for="etat_equipement_{{ $equipement->id }}" class="form-label">État de l'Équipement</label>
                            <select id="etat_equipement_{{ $equipement->id }}" name="equipement[{{ $equipement->id }}][etat]" class="form-select" required>
                                <option value="neuf" {{ $equipement->stat_equipement == 'neuf' ? 'selected' : '' }}>Neuf</option>
                                <option value="use" {{ $equipement->stat_equipement == 'use' ? 'selected' : '' }}>Usé</option>
                            </select>
                        </div>
                    @endforeach
                </div>

                <div class="section-divider">
                    <h3 class="section-title">Difficultés et Besoins</h3>
                </div>
                
                <div class="form-group">
                <label for="description_difficulte_{{ $equipement->id }}" class="form-label">Difficultés rencontrées</label>
                <textarea id="description_difficulte_{{ $equipement->id }}" name="description_difficulte" rows="3" class="form-textarea">{{ $equipement->description_difficultie }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description_besoin_{{ $equipement->id }}" class="form-label">Besoins</label>
                    <textarea id="description_besoin_{{ $equipement->id }}" name="description_besoin" class="form-textarea" rows="3">{{ $equipement->description_besoin }}</textarea>
                </div>

                <div class="section-divider">
                    <h3 class="section-title">Documentation</h3>
                </div>
                
                <div class="form-row">
                    @foreach($agrements as $agrement)
                        <div class="form-group">
                            <label for="reference_agrement_{{ $agrement->id }}" class="form-label">Référence de l'agrément</label>
                            <input type="text" id="reference_agrement_{{ $agrement->id }}" name="agrements[{{ $agrement->id }}][reference]" class="form-input" value="{{ $agrement->reference }}" required>
                        </div>

                        <div class="form-group">
                            <label for="date_agrement_{{ $agrement->id }}" class="form-label">Année de Délivrance</label>
                            <input type="date" id="date_agrement_{{ $agrement->id }}" name="agrements[{{ $agrement->id }}][date]" class="form-input" value="{{ $agrement->date_deliver }}" required>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="form-actions">
                <button type="button" class="btn btn-prev">
                    <svg class="icon" viewBox="0 0 24 24"><path d="m15 18-6-6 6-6"/></svg>
                    <span>Retour</span>
                </button>
                <button type="submit" class="btn btn-submit">
                    <span>Valider les modifications</span>
                    <svg class="icon" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
                </button>
            </div>
        </div>
    </form>
</div>

<style>
    /* Variables de couleur */
    :root {
        --primary-color: #6D5BD0;
        --primary-light: #F2F0FF;
        --text-dark: #25213B;
        --text-medium: #6E6893;
        --text-light: #8B83BA;
        --border-color: #D9D5EC;
        --background-light: #F8F8F8;
        --white: #FFFFFF;
        --success-color: #007F5F;
        --danger-color: #D30000;
        --warning-color: #FFC107;
    }

    /* Reset et styles de base */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        color: var(--text-dark);
        line-height: 1.6;
        background-color: var(--background-light);
    }

    /* Conteneur principal */
    .form-container {
        max-width: 1200px;
        margin: 5rem 1rem 1rem 19rem;
        padding: 2rem;
        background-color: var(--white);
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    /* Barre de progression */
    .progress-tracker {
        margin-bottom: 3rem;
        position: relative;
    }

    .steps {
        display: flex;
        justify-content: space-between;
        position: relative;
        z-index: 2;
    }

    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        width: 25%;
    }

    .step-bubble {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--border-color);
        color: var(--text-light);
        font-weight: 600;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }

    .step-label {
        font-size: 0.875rem;
        color: var(--text-medium);
        text-align: center;
        font-weight: 500;
        max-width: 100px;
    }

    .step.active .step-bubble {
        background-color: var(--primary-color);
        color: var(--white);
    }

    .step.active .step-label {
        color: var(--text-dark);
        font-weight: 600;
    }

    .progress-bar {
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        height: 4px;
        background-color: var(--border-color);
        z-index: 1;
    }

    .progress-bar-fill {
        height: 100%;
        width: 0;
        background-color: var(--primary-color);
        transition: width 0.3s ease;
    }

    /* En-tête des étapes */
    .step-header {
        margin-bottom: 2rem;
    }

    .step-title {
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--text-dark);
    }

    .step-description {
        color: var(--text-medium);
        font-size: 1rem;
    }

    /* Carte de formulaire */
    .form-card {
        background-color: var(--white);
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        border: 1px solid var(--border-color);
    }

    /* Séparateurs de section */
    .section-divider {
        margin: 2rem 0 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid var(--border-color);
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-dark);
    }

    /* Disposition des formulaires */
    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    /* Groupes de formulaire */
    .form-group {
        margin-bottom: 1rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--text-dark);
        font-size: 0.9375rem;
    }

    .form-input, .form-select, .form-textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 0.9375rem;
        background-color: var(--white);
        transition: all 0.2s ease;
    }

    .form-input:focus, .form-select:focus, .form-textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(109, 91, 208, 0.15);
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    /* Cartes spéciales */
    .finance-card {
        background-color: var(--primary-light);
        padding: 1.5rem;
        border-radius: 8px;
        border-left: 4px solid var(--primary-color);
        margin-bottom: 1.5rem;
    }

    /* Input avec icône */
    .input-with-icon {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-color);
        width: 18px;
        height: 18px;
    }

    .input-with-icon .form-input {
        padding-left: 40px;
    }

    /* Toggle switch */
    .toggle-group {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .toggle-label {
        margin-right: 1rem;
        font-weight: 500;
        color: var(--text-dark);
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 26px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: var(--border-color);
        transition: .4s;
        border-radius: 34px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 3px;
        bottom: 3px;
        background-color: var(--white);
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .toggle-slider {
        background-color: var(--primary-color);
    }

    input:checked + .toggle-slider:before {
        transform: translateX(24px);
    }

    /* Boutons */
    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 2rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        font-size: 0.9375rem;
        font-weight: 500;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
        gap: 0.5rem;
    }

    .btn-prev {
        background-color: var(--white);
        color: var(--text-medium);
        border: 1px solid var(--border-color);
    }

    .btn-prev:hover {
        background-color: #f5f5f5;
    }

    .btn-next, .btn-submit {
        background-color: var(--primary-color);
        color: var(--white);
    }

    .btn-next:hover, .btn-submit:hover {
        background-color: #5a4bb1;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(109, 91, 208, 0.25);
    }

    .btn-submit {
        background-color: var(--success-color);
    }

    .btn-submit:hover {
        background-color: #006a50;
        box-shadow: 0 4px 12px rgba(0, 127, 95, 0.25);
    }

    .icon {
        width: 18px;
        height: 18px;
    }

    /* Gestion des étapes */
    .form-step {
        display: none;
        animation: fadeIn 0.3s ease-out;
    }

    .form-step.active {
        display: block;
    }

    .hidden {
        display: none;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-container {
            padding: 1.5rem;
            margin: 1rem;
        }

        .steps {
            padding: 0;
        }

        .step-label {
            font-size: 0.75rem;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
            gap: 1rem;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const steps = document.querySelectorAll('.form-step');
        const nextButtons = document.querySelectorAll('.btn-next');
        const prevButtons = document.querySelectorAll('.btn-prev');
        const progressBarFill = document.querySelector('.progress-bar-fill');
        const stepBubbles = document.querySelectorAll('.step-bubble');

        let currentStep = 0;

        // Fonction pour afficher l'étape actuelle
        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.classList.toggle('active', index === stepIndex);
            });

            // Mettre à jour la barre de progression
            const progressWidth = ((stepIndex + 1) / steps.length) * 100;
            progressBarFill.style.width = `${progressWidth}%`;

            // Mettre à jour les bulles
            stepBubbles.forEach((bubble, index) => {
                bubble.classList.toggle('active', index <= stepIndex);
            });
        }

        // Boutons Suivant
        nextButtons.forEach(button => {
            button.addEventListener('click', () => {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });
        });

        // Boutons Précédent
        prevButtons.forEach(button => {
            button.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });
        });

        // Afficher la première étape au chargement
        showStep(currentStep);
    });

    document.addEventListener('DOMContentLoaded', function () {
        const appuiCheckbox = document.getElementById('appui');
        const appuiDetails = document.getElementById('appui-details');

        // Fonction pour afficher ou masquer les détails de l'appui
        function toggleAppuiDetails() {
            if (appuiCheckbox.checked) {
                appuiDetails.classList.remove('hidden');
            } else {
                appuiDetails.classList.add('hidden');
            }
        }

        // Écouter les changements sur la case à cocher
        appuiCheckbox.addEventListener('change', toggleAppuiDetails);

        // Appeler la fonction au chargement pour gérer l'état initial
        toggleAppuiDetails();
    });
</script>
@endsection