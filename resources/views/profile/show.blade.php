@extends('welcome')

@section('name', 'Profil de l\'utilisateur')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#4f46e5',secondary:'#a855f7'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        .profile-container {
            max-width: 1024px;
            margin: 0 auto;
        }
        .form-input {
            border: 1px solid #e5e7eb;
            transition: all 0.2s;
            background-color: white;
        }
        .form-input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            outline: none;
        }
        .form-label {
            font-weight: 500;
            color: #374151;
        }
        .edit-photo-overlay {
            opacity: 0;
            transition: opacity 0.2s;
        }
        .photo-container:hover .edit-photo-overlay {
            opacity: 1;
        }
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(0.5);
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body class="min-h-screen"><br><br>

    <!-- Messages d'alerte -->
    @if($errors->any())
        <div class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded flex items-center z-50">
            <div class="w-5 h-5 flex items-center justify-center mr-2">
                <i class="ri-close-line"></i>
            </div>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    @if(session('success'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded flex items-center z-50">
            <div class="w-5 h-5 flex items-center justify-center mr-2">
                <i class="ri-check-line"></i>
            </div>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <main class="profile-container px-4 sm:px-6 py-12">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <!-- Photo de profil -->
            <div class="relative bg-gradient-to-r from-primary/10 to-secondary/10 py-10 px-4 text-center">
                <div class="photo-container relative inline-block">
                    <div class="w-32 h-32 rounded-full border-4 border-white shadow-md overflow-hidden mx-auto">
                    @if(Auth::user()->profile_photo && file_exists(public_path('images/' . Auth::user()->profile_photo)))
                                <img src="{{ asset('images/' . Auth::user()->profile_photo) }}" alt="Photo de profil" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-indigo-100 text-indigo-600 text-4xl font-bold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                    </div>
                    <div class="edit-photo-overlay absolute inset-0 bg-black/50 rounded-full flex items-center justify-center cursor-pointer">
                        <div class="w-8 h-8 flex items-center justify-center text-white">
                            <i class="ri-camera-line"></i>
                        </div>
                    </div>
                    <form id="profilePhotoForm" action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="hidden" name="profile_photo" id="profile-photo-input" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                    </form>
                </div>
                <h1 class="mt-4 text-2xl font-bold text-gray-800">{{ Auth::user()->name }}</h1>
            </div>

            <!-- Contenu du profil -->
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Informations du profil</h2>
                    <div class="flex space-x-3">
                        <button id="edit-profile-btn" class="px-4 py-2 text-sm font-medium text-primary border border-primary !rounded-button hover:bg-primary/5 whitespace-nowrap flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-1">
                                <i class="ri-edit-line"></i>
                            </div>
                            Modifier le profil
                        </button>
                    </div>
                </div>

                <form id="profile-form" action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Informations personnelles -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-700 mb-4 pb-2 border-b">Informations personnelles</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nom" class="form-label block mb-1">Nom</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                                            <i class="ri-user-line"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="nom" name="nom" value="{{ old('nom', Auth::user()->nom) }}" class="form-input w-full pl-10 pr-3 py-2 rounded" disabled>
                                </div>
                                @error('nom')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="prenom" class="form-label block mb-1">Prénom</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                                            <i class="ri-user-line"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="prenom" name="prenom" value="{{ old('prenom', Auth::user()->prenom) }}" class="form-input w-full pl-10 pr-3 py-2 rounded" disabled>
                                </div>
                                @error('prenom')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Coordonnées -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-700 mb-4 pb-2 border-b">Coordonnées</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="form-label block mb-1">Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                                            <i class="ri-mail-line"></i>
                                        </div>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="form-input w-full pl-10 pr-3 py-2 rounded" disabled>
                                </div>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="role" class="form-label block mb-1">Statut</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                                            <i class="ri-account-circle-line"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="role" value="{{ Auth::user()->role }}" class="form-input w-full pl-10 pr-3 py-2 rounded" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Métadonnées -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-700 mb-4 pb-2 border-b">Métadonnées</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Date de création</label>
                                <div class="mt-1 p-2 bg-gray-50 rounded-md text-gray-600">
                                    {{ Auth::user()->created_at->format('d/m/Y H:i') }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Dernière mise à jour</label>
                                <div class="mt-1 p-2 bg-gray-50 rounded-md text-gray-600">
                                    {{ Auth::user()->updated_at->format('d/m/Y H:i') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="flex justify-end space-x-3 mt-8 hidden" id="action-buttons">
                        <button type="button" id="cancel-btn" class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 !rounded-button hover:bg-gray-50 whitespace-nowrap">Annuler</button>
                        <button type="submit" id="save-btn" class="px-4 py-2 text-sm font-medium text-white bg-primary !rounded-button hover:bg-primary/90 whitespace-nowrap flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-1">
                                <i class="ri-save-line"></i>
                            </div>
                            Sauvegarder
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editProfileBtn = document.getElementById('edit-profile-btn');
            const cancelBtn = document.getElementById('cancel-btn');
            const saveBtn = document.getElementById('save-btn');
            const actionButtons = document.getElementById('action-buttons');
            const formInputs = document.querySelectorAll('#profile-form input:not([type="file"]), #profile-form select');
            const photoContainer = document.querySelector('.photo-container');
            const photoInput = document.getElementById('profile-photo-input');
            
            let originalValues = {};
            
            // Sauvegarder les valeurs originales
            formInputs.forEach(input => {
                originalValues[input.id] = input.value;
            });
            
            // Activer le mode édition
            editProfileBtn.addEventListener('click', function() {
                formInputs.forEach(input => {
                    if (input.id !== 'role') { // Ne pas activer le champ statut
                        input.disabled = false;
                    }
                });
                actionButtons.classList.remove('hidden');
                editProfileBtn.classList.add('hidden');
            });
            
            // Annuler les modifications
            cancelBtn.addEventListener('click', function() {
                formInputs.forEach(input => {
                    input.value = originalValues[input.id];
                    input.disabled = true;
                });
                actionButtons.classList.add('hidden');
                editProfileBtn.classList.remove('hidden');
            });
            
            // Changer la photo de profil
            photoContainer.addEventListener('click', function() {
                photoInput.click();
            });
            
            photoInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    // Prévisualisation de l'image
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const imgPreview = photoContainer.querySelector('img');
                        if (imgPreview) {
                            imgPreview.src = event.target.result;
                        } else {
                            const placeholder = photoContainer.querySelector('div');
                            placeholder.innerHTML = `<img src="${event.target.result}" class="w-full h-full object-cover object-top">`;
                        }
                    };
                    reader.readAsDataURL(e.target.files[0]);
                    
                    // Soumission automatique du formulaire
                    document.getElementById('profilePhotoForm').submit();
                }
            });

            // Fermer les messages d'alerte après 5 secondes
            setTimeout(() => {
                const alerts = document.querySelectorAll('[class*="bg-red-100"], [class*="bg-green-100"]');
                alerts.forEach(alert => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                });
            }, 5000);
        });
    </script>
</body>
</html>
@endsection