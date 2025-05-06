@extends('welcome')

@section('name', 'Paramètres du site')

@section('content')
<div class="lovable-container lovable-theme-admin">
    <div class="lovable-settings-header">
        <h1 class="lovable-heading lovable-heading-xl lovable-text-primary">Paramètres du Site</h1>
        <p class="lovable-text lovable-text-lg lovable-text-secondary">Gérez la configuration de votre plateforme</p>
    </div>

    <div class="lovable-card lovable-card-elevated">
        <!-- Navigation entre les sections -->
        <nav class="lovable-settings-nav">
            <ul class="lovable-tabs">
                <li class="lovable-tab lovable-tab-active">
                    <a href="#general-settings" class="lovable-tab-link">
                        <i class="lovable-icon lovable-icon-settings"></i> Général
                    </a>
                </li>
                <li class="lovable-tab">
                    <a href="#appearance-settings" class="lovable-tab-link">
                        <i class="lovable-icon lovable-icon-palette"></i> Apparence
                    </a>
                </li>
                <li class="lovable-tab">
                    <a href="#seo-settings" class="lovable-tab-link">
                        <i class="lovable-icon lovable-icon-search"></i> SEO
                    </a>
                </li>
                <li class="lovable-tab">
                    <a href="#email-settings" class="lovable-tab-link">
                        <i class="lovable-icon lovable-icon-mail"></i> E-mails
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Formulaire -->
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="lovable-form">
            @csrf
            @method('PUT')

            <!-- Section Paramètres Généraux -->
            <div id="general-settings" class="lovable-settings-section">
                <h2 class="lovable-section-title">
                    <i class="lovable-icon lovable-icon-settings lovable-mr-2"></i>
                    Paramètres Généraux
                </h2>
                <div class="lovable-grid lovable-grid-cols-1 lovable-md:grid-cols-2 lovable-gap-6">
                    <div class="lovable-form-field">
                        <label for="site_name" class="lovable-form-label">Nom du site</label>
                        <input type="text" name="site_name" id="site_name" value="{{ $settings->site_name ?? '' }}" class="lovable-input">
                    </div>
                    <div class="lovable-form-field">
                        <label for="contact_email" class="lovable-form-label">Email de contact</label>
                        <input type="email" name="contact_email" id="contact_email" value="{{ $settings->contact_email ?? '' }}" class="lovable-input">
                    </div>
                </div>
            </div>

            <!-- Section Apparence -->
            <div id="appearance-settings" class="lovable-settings-section lovable-hidden">
                <h2 class="lovable-section-title">
                    <i class="lovable-icon lovable-icon-palette lovable-mr-2"></i>
                    Apparence
                </h2>
                <div class="lovable-grid lovable-grid-cols-1 lovable-md:grid-cols-2 lovable-gap-6">
                    <div class="lovable-form-field">
                        <label for="primary_color" class="lovable-form-label">Couleur primaire</label>
                        <div class="lovable-color-picker">
                            <input type="color" name="primary_color" id="primary_color" value="{{ $settings->primary_color ?? '#4f46e5' }}" class="lovable-color-input">
                            <span class="lovable-color-value">{{ $settings->primary_color ?? '#4f46e5' }}</span>
                        </div>
                    </div>
                    <div class="lovable-form-field">
                        <label for="site_logo" class="lovable-form-label">Logo du site</label>
                        <div class="lovable-file-upload">
                            @if($settings->site_logo ?? false)
                                <img src="{{ asset('storage/'.$settings->site_logo) }}" alt="Logo actuel" class="lovable-file-preview-img">
                            @else
                                <div class="lovable-file-preview-placeholder">
                                    <i class="lovable-icon lovable-icon-image"></i>
                                </div>
                            @endif
                            <label for="site_logo" class="lovable-file-upload-label">
                                <span>Choisir un fichier</span>
                                <input type="file" id="site_logo" name="site_logo" accept="image/*" class="lovable-hidden">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section SEO -->
            <div id="seo-settings" class="lovable-settings-section lovable-hidden">
                <h2 class="lovable-section-title">
                    <i class="lovable-icon lovable-icon-search lovable-mr-2"></i>
                    Paramètres SEO
                </h2>
                <div class="lovable-grid lovable-grid-cols-1 lovable-gap-6">
                    <div class="lovable-form-field">
                        <label for="meta_title" class="lovable-form-label">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ $settings->meta_title ?? '' }}" class="lovable-input">
                        <p class="lovable-form-hint">50-60 caractères recommandés</p>
                    </div>
                    <div class="lovable-form-field">
                        <label for="meta_description" class="lovable-form-label">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" rows="3" class="lovable-textarea">{{ $settings->meta_description ?? '' }}</textarea>
                        <p class="lovable-form-hint">150-160 caractères recommandés</p>
                    </div>
                </div>
            </div>

            <!-- Section E-mails -->
            <div id="email-settings" class="lovable-settings-section lovable-hidden">
                <h2 class="lovable-section-title">
                    <i class="lovable-icon lovable-icon-mail lovable-mr-2"></i>
                    Paramètres E-mails
                </h2>
                <div class="lovable-grid lovable-grid-cols-1 lovable-md:grid-cols-2 lovable-gap-6">
                    <div class="lovable-form-field">
                        <label for="mail_from_address" class="lovable-form-label">Email expéditeur</label>
                        <input type="email" name="mail_from_address" id="mail_from_address" value="{{ $settings->mail_from_address ?? '' }}" class="lovable-input">
                    </div>
                    <div class="lovable-form-field">
                        <label for="mail_from_name" class="lovable-form-label">Nom de l'expéditeur</label>
                        <input type="text" name="mail_from_name" id="mail_from_name" value="{{ $settings->mail_from_name ?? '' }}" class="lovable-input">
                    </div>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="lovable-form-actions">
                <button type="button" onclick="window.location.href=''" class="lovable-button lovable-button-secondary">Annuler</button>
                <button type="submit" class="lovable-button lovable-button-primary">
                    <i class="lovable-icon lovable-icon-save lovable-mr-2"></i>
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<style>
/* Theme Admin */
.lovable-theme-admin {
    --lovable-primary: #4f46e5;
    --lovable-primary-light: #818cf8;
    --lovable-primary-dark: #4338ca;
    --lovable-secondary: #a855f7;
    --lovable-secondary-light: #c084fc;
    --lovable-text-primary: #1e293b;
    --lovable-text-secondary: #64748b;
}

/* Layout */
.lovable-container {
    max-width: 1200px;
    margin: 5rem 1rem 1rem 17rem;
    padding: 0 1rem;
}

.lovable-settings-header {
    text-align: center;
    margin-bottom: 2rem;
}

/* Card */
.lovable-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
}

.lovable-card-elevated {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

/* Navigation */
.lovable-settings-nav {
    border-bottom: 1px solid #e2e8f0;
    padding: 0 1.5rem;
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

.lovable-tab-link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    color: inherit;
    font-weight: 500;
}

/* Sections */
.lovable-settings-section {
    padding: 1.5rem;
}

.lovable-hidden {
    display: none;
}

.lovable-section-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--lovable-text-primary);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

/* Form Elements */
.lovable-form {
    padding: 0 1.5rem 1.5rem;
}

.lovable-grid {
    display: grid;
}

.lovable-grid-cols-1 {
    grid-template-columns: repeat(1, minmax(0, 1fr));
}

.lovable-gap-6 {
    gap: 1.5rem;
}

@media (min-width: 768px) {
    .lovable-md\:grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

.lovable-form-field {
    margin-bottom: 1rem;
}

.lovable-form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--lovable-text-secondary);
}

.lovable-input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.2s ease;
}

.lovable-input:focus {
    border-color: var(--lovable-primary);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    outline: none;
}

.lovable-textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    min-height: 100px;
    resize: vertical;
}

.lovable-form-hint {
    font-size: 0.875rem;
    color: var(--lovable-text-secondary);
    margin-top: 0.25rem;
}

/* Color Picker */
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

/* File Upload */
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

/* Buttons */
.lovable-form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 2rem;
}

.lovable-button {
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 500;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
}

.lovable-button-primary {
    background-color: var(--lovable-primary);
    color: white;
    border: none;
}

.lovable-button-primary:hover {
    background-color: var(--lovable-primary-dark);
}

.lovable-button-secondary {
    background-color: white;
    color: var(--lovable-text-primary);
    border: 1px solid #e2e8f0;
}

.lovable-button-secondary:hover {
    background-color: #f8f9fa;
}

/* Icons */
.lovable-icon {
    width: 1.25rem;
    height: 1.25rem;
    display: inline-block;
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

    // Mise à jour de la valeur de la couleur
    const colorInput = document.getElementById('primary_color');
    if (colorInput) {
        colorInput.addEventListener('input', function() {
            const colorValue = this.nextElementSibling;
            if (colorValue) {
                colorValue.textContent = this.value;
            }
        });
    }

    // Prévisualisation de l'image uploadée
    const fileInput = document.getElementById('site_logo');
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
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
    }
});
</script>
@endsection