@extends('welcome')

@section('name', 'Paramètres du site')

@section('content')
<div class="lovable-container lovable-theme-modern">
    <div class="lovable-layout lovable-layout-centered">
        <div class="lovable-header lovable-text-center lovable-mb-8">
            <h1 class="lovable-heading lovable-heading-xl lovable-text-primary">Paramètres du Site</h1>
            <p class="lovable-text lovable-text-lg lovable-text-secondary">Gérez la configuration de votre plateforme</p>
        </div>

        <div class="lovable-card lovable-card-elevated">
            <!-- Navigation entre les sections -->
            <div class="lovable-settings-nav">
                <ul class="lovable-tabs">
                    <li class="lovable-tab lovable-tab-active">
                        <a href="#general-settings">
                            <i class="lovable-icon lovable-icon-cog"></i> Général
                        </a>
                    </li>
                    <li class="lovable-tab">
                        <a href="#appearance-settings">
                            <i class="lovable-icon lovable-icon-paint-brush"></i> Apparence
                        </a>
                    </li>
                    <li class="lovable-tab">
                        <a href="#seo-settings">
                            <i class="lovable-icon lovable-icon-search"></i> SEO
                        </a>
                    </li>
                    <li class="lovable-tab">
                        <a href="#email-settings">
                            <i class="lovable-icon lovable-icon-envelope"></i> E-mails
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contenu des paramètres -->
            <div class="lovable-card-body">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Section Paramètres Généraux -->
                    <div id="general-settings" class="lovable-settings-section">
                        <h2 class="lovable-form-section-title">
                            <i class="lovable-icon lovable-icon-cog lovable-mr-2"></i>
                            Paramètres Généraux
                        </h2>

                        <div class="lovable-grid lovable-grid-cols-1 lovable-gap-6 lovable-lg:grid-cols-2">
                            <!-- Nom du site -->
                            <div class="lovable-form-field">
                                <label for="site_name" class="lovable-form-label">Nom du site</label>
                                <input type="text" name="site_name" id="site_name" value="{{ $settings->site_name ?? '' }}" class="lovable-input">
                                <p class="lovable-form-hint">Le nom qui apparaîtra dans le titre et le pied de page</p>
                            </div>

                            <!-- Logo du site -->
                            <div class="lovable-form-field">
                                <label class="lovable-form-label">Logo du site</label>
                                <div class="lovable-file-upload">
                                    <div class="lovable-file-preview">
                                        @if($settings->site_logo ?? false)
                                            <img src="{{ asset('storage/'.$settings->site_logo) }}" alt="Logo actuel" class="lovable-file-preview-img">
                                        @else
                                            <div class="lovable-file-preview-placeholder">
                                                <i class="lovable-icon lovable-icon-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <label for="site_logo" class="lovable-file-upload-label">
                                        <span>Choisir un fichier</span>
                                        <input type="file" id="site_logo" name="site_logo" accept="image/*" class="lovable-hidden">
                                    </label>
                                </div>
                            </div>

                            <!-- Adresse email de contact -->
                            <div class="lovable-form-field">
                                <label for="contact_email" class="lovable-form-label">Email de contact</label>
                                <input type="email" name="contact_email" id="contact_email" value="{{ $settings->contact_email ?? '' }}" class="lovable-input">
                            </div>

                            <!-- Numéro de téléphone -->
                            <div class="lovable-form-field">
                                <label for="contact_phone" class="lovable-form-label">Téléphone</label>
                                <input type="tel" name="contact_phone" id="contact_phone" value="{{ $settings->contact_phone ?? '' }}" class="lovable-input">
                            </div>

                            <!-- Adresse physique -->
                            <div class="lovable-form-field lovable-col-span-2">
                                <label for="physical_address" class="lovable-form-label">Adresse physique</label>
                                <textarea name="physical_address" id="physical_address" rows="3" class="lovable-textarea">{{ $settings->physical_address ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Section Apparence -->
                    <div id="appearance-settings" class="lovable-settings-section lovable-hidden">
                        <h2 class="lovable-form-section-title">
                            <i class="lovable-icon lovable-icon-paint-brush lovable-mr-2"></i>
                            Apparence
                        </h2>

                        <div class="lovable-grid lovable-grid-cols-1 lovable-gap-6 lovable-lg:grid-cols-2">
                            <!-- Thème principal -->
                            <div class="lovable-form-field">
                                <label class="lovable-form-label">Thème principal</label>
                                <div class="lovable-theme-selector">
                                    <div class="lovable-theme-option">
                                        <input type="radio" id="theme_light" name="site_theme" value="light" {{ ($settings->site_theme ?? 'light') === 'light' ? 'checked' : '' }} class="lovable-hidden">
                                        <label for="theme_light" class="lovable-theme-label">
                                            <span class="lovable-theme-preview lovable-theme-light"></span>
                                            <span>Clair</span>
                                        </label>
                                    </div>
                                    <div class="lovable-theme-option">
                                        <input type="radio" id="theme_dark" name="site_theme" value="dark" {{ ($settings->site_theme ?? '') === 'dark' ? 'checked' : '' }} class="lovable-hidden">
                                        <label for="theme_dark" class="lovable-theme-label">
                                            <span class="lovable-theme-preview lovable-theme-dark"></span>
                                            <span>Sombre</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Couleur primaire -->
                            <div class="lovable-form-field">
                                <label for="primary_color" class="lovable-form-label">Couleur primaire</label>
                                <div class="lovable-color-picker">
                                    <input type="color" id="primary_color" name="primary_color" value="{{ $settings->primary_color ?? '#4f46e5' }}" class="lovable-color-input">
                                    <span class="lovable-color-value">{{ $settings->primary_color ?? '#4f46e5' }}</span>
                                </div>
                            </div>

                            <!-- Favicon -->
                            <div class="lovable-form-field">
                                <label class="lovable-form-label">Favicon</label>
                                <div class="lovable-file-upload lovable-file-upload-small">
                                    <div class="lovable-file-preview">
                                        @if($settings->favicon ?? false)
                                            <img src="{{ asset('storage/'.$settings->favicon) }}" alt="Favicon actuel" class="lovable-file-preview-img">
                                        @else
                                            <div class="lovable-file-preview-placeholder">
                                                <i class="lovable-icon lovable-icon-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <label for="favicon" class="lovable-file-upload-label">
                                        <span>Choisir un fichier</span>
                                        <input type="file" id="favicon" name="favicon" accept="image/*" class="lovable-hidden">
                                    </label>
                                </div>
                                <p class="lovable-form-hint">Taille recommandée : 32x32 pixels</p>
                            </div>
                        </div>
                    </div>

                    <!-- Section SEO -->
                    <div id="seo-settings" class="lovable-settings-section lovable-hidden">
                        <h2 class="lovable-form-section-title">
                            <i class="lovable-icon lovable-icon-search lovable-mr-2"></i>
                            Paramètres SEO
                        </h2>

                        <div class="lovable-grid lovable-grid-cols-1 lovable-gap-6">
                            <!-- Meta Title -->
                            <div class="lovable-form-field">
                                <label for="meta_title" class="lovable-form-label">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" value="{{ $settings->meta_title ?? '' }}" class="lovable-input">
                                <p class="lovable-form-hint">Titre qui apparaîtra dans les résultats de recherche (50-60 caractères)</p>
                            </div>

                            <!-- Meta Description -->
                            <div class="lovable-form-field">
                                <label for="meta_description" class="lovable-form-label">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" rows="3" class="lovable-textarea">{{ $settings->meta_description ?? '' }}</textarea>
                                <p class="lovable-form-hint">Description qui apparaîtra dans les résultats de recherche (150-160 caractères)</p>
                            </div>

                            <!-- Mots-clés -->
                            <div class="lovable-form-field">
                                <label for="meta_keywords" class="lovable-form-label">Mots-clés</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" value="{{ $settings->meta_keywords ?? '' }}" class="lovable-input">
                                <p class="lovable-form-hint">Séparés par des virgules</p>
                            </div>

                            <!-- Google Analytics -->
                            <div class="lovable-form-field">
                                <label for="google_analytics" class="lovable-form-label">Code Google Analytics</label>
                                <textarea name="google_analytics" id="google_analytics" rows="3" class="lovable-textarea">{{ $settings->google_analytics ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Section E-mails -->
                    <div id="email-settings" class="lovable-settings-section lovable-hidden">
                        <h2 class="lovable-form-section-title">
                            <i class="lovable-icon lovable-icon-envelope lovable-mr-2"></i>
                            Paramètres E-mails
                        </h2>

                        <div class="lovable-grid lovable-grid-cols-1 lovable-gap-6 lovable-lg:grid-cols-2">
                            <!-- Expéditeur par défaut -->
                            <div class="lovable-form-field">
                                <label for="mail_from_address" class="lovable-form-label">Email expéditeur</label>
                                <input type="email" name="mail_from_address" id="mail_from_address" value="{{ $settings->mail_from_address ?? '' }}" class="lovable-input">
                            </div>

                            <!-- Nom de l'expéditeur -->
                            <div class="lovable-form-field">
                                <label for="mail_from_name" class="lovable-form-label">Nom de l'expéditeur</label>
                                <input type="text" name="mail_from_name" id="mail_from_name" value="{{ $settings->mail_from_name ?? '' }}" class="lovable-input">
                            </div>

                            <!-- SMTP Host -->
                            <div class="lovable-form-field">
                                <label for="mail_host" class="lovable-form-label">SMTP Host</label>
                                <input type="text" name="mail_host" id="mail_host" value="{{ $settings->mail_host ?? '' }}" class="lovable-input">
                            </div>

                            <!-- SMTP Port -->
                            <div class="lovable-form-field">
                                <label for="mail_port" class="lovable-form-label">SMTP Port</label>
                                <input type="number" name="mail_port" id="mail_port" value="{{ $settings->mail_port ?? '' }}" class="lovable-input">
                            </div>

                            <!-- SMTP Username -->
                            <div class="lovable-form-field">
                                <label for="mail_username" class="lovable-form-label">SMTP Username</label>
                                <input type="text" name="mail_username" id="mail_username" value="{{ $settings->mail_username ?? '' }}" class="lovable-input">
                            </div>

                            <!-- SMTP Password -->
                            <div class="lovable-form-field">
                                <label for="mail_password" class="lovable-form-label">SMTP Password</label>
                                <input type="password" name="mail_password" id="mail_password" value="{{ $settings->mail_password ?? '' }}" class="lovable-input">
                            </div>

                            <!-- SMTP Encryption -->
                            <div class="lovable-form-field">
                                <label for="mail_encryption" class="lovable-form-label">Chiffrement</label>
                                <select name="mail_encryption" id="mail_encryption" class="lovable-select">
                                    <option value="">Aucun</option>
                                    <option value="tls" {{ ($settings->mail_encryption ?? '') === 'tls' ? 'selected' : '' }}>TLS</option>
                                    <option value="ssl" {{ ($settings->mail_encryption ?? '') === 'ssl' ? 'selected' : '' }}>SSL</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="lovable-form-actions lovable-mt-8">
                        <button type="button" class="lovable-button lovable-button-secondary" onclick="window.location.href='{{ route('admin.dashboard') }}'">
                            Annuler
                        </button>
                        <button type="submit" class="lovable-button lovable-button-primary">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Styles spécifiques pour la page des paramètres */
.lovable-settings-nav {
    border-bottom: 1px solid #e2e8f0;
}

.lovable-tabs {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.lovable-tab {
    padding: 1rem 1.5rem;
    cursor: pointer;
    border-bottom: 3px solid transparent;
    transition: all 0.2s ease;
}

.lovable-tab:hover {
    background-color: #f8fafc;
}

.lovable-tab-active {
    border-bottom-color: var(--lovable-primary);
    color: var(--lovable-primary);
}

.lovable-tab a {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    color: inherit;
}

.lovable-settings-section {
    padding: 1.5rem 0;
}

.lovable-file-upload {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.lovable-file-preview {
    width: 80px;
    height: 80px;
    border: 1px dashed #cbd5e1;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.lovable-file-preview-small {
    width: 40px;
    height: 40px;
}

.lovable-file-preview-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.lovable-file-preview-placeholder {
    color: #94a3b8;
    font-size: 1.5rem;
}

.lovable-file-upload-label {
    padding: 0.5rem 1rem;
    background-color: #f1f5f9;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.lovable-file-upload-label:hover {
    background-color: #e2e8f0;
}

.lovable-theme-selector {
    display: flex;
    gap: 1rem;
}

.lovable-theme-option {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.lovable-theme-label {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}

.lovable-theme-preview {
    width: 60px;
    height: 40px;
    border-radius: 6px;
    border: 2px solid #e2e8f0;
}

.lovable-theme-light {
    background: #ffffff;
    border-color: #cbd5e1;
}

.lovable-theme-dark {
    background: #1e293b;
}

.lovable-color-picker {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.lovable-color-input {
    width: 50px;
    height: 30px;
    padding: 0;
    border: none;
    cursor: pointer;
}

.lovable-color-value {
    font-family: monospace;
}

.lovable-form-hint {
    font-size: 0.875rem;
    color: #64748b;
    margin-top: 0.25rem;
}

.lovable-select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    font-size: 1rem;
    background-color: white;
}

.lovable-textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    font-size: 1rem;
    min-height: 100px;
    resize: vertical;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion des onglets
    const tabs = document.querySelectorAll('.lovable-tab');
    const sections = document.querySelectorAll('.lovable-settings-section');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Retirer la classe active de tous les onglets
            tabs.forEach(t => t.classList.remove('lovable-tab-active'));
            
            // Ajouter la classe active à l'onglet cliqué
            this.classList.add('lovable-tab-active');
            
            // Masquer toutes les sections
            sections.forEach(section => section.classList.add('lovable-hidden'));
            
            // Afficher la section correspondante
            const target = this.querySelector('a').getAttribute('href');
            document.querySelector(target).classList.remove('lovable-hidden');
        });
    });

    // Prévisualisation des images uploadées
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const preview = this.closest('.lovable-file-upload').querySelector('.lovable-file-preview');
                const reader = new FileReader();
                
                reader.onload = function(event) {
                    if (preview.querySelector('img')) {
                        preview.querySelector('img').src = event.target.result;
                    } else {
                        preview.innerHTML = `<img src="${event.target.result}" class="lovable-file-preview-img">`;
                    }
                };
                
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    // Mise à jour de la valeur de la couleur
    document.getElementById('primary_color').addEventListener('input', function() {
        this.nextElementSibling.textContent = this.value;
    });
});
</script>
@endsection