@extends('welcome')

@section('name', 'Profil de l\'utilisateur')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 to-purple-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Mon Profil</h1>
            <p class="mt-2 text-lg text-indigo-600">Gérez vos informations personnelles</p>
        </div>

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <!-- Header avec photo de profil -->
            <div class="bg-indigo-600 px-6 py-8 text-center relative">
                <div class="absolute -bottom-16 left-1/2 transform -translate-x-1/2">
                    <div class="relative group">
                        <div class="w-32 h-32 rounded-full border-4 border-white bg-gray-200 overflow-hidden shadow-lg">
                            @if(Auth::user()->profile_photo && file_exists(public_path('images/' . Auth::user()->profile_photo)))
                                <img src="{{ asset('images/' . Auth::user()->profile_photo) }}" alt="Photo de profil" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-indigo-100 text-indigo-600 text-4xl font-bold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <button onclick="document.getElementById('profilePhotoInput').click()" class="absolute bottom-0 right-0 bg-indigo-500 text-white p-2 rounded-full shadow-md hover:bg-indigo-700 transition-all opacity-0 group-hover:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </button>
                        <form id="profilePhotoForm" action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data" class="hidden">
                            @csrf
                            <input type="file" id="profilePhotoInput" name="profile_photo" accept="image/*" onchange="document.getElementById('profilePhotoForm').submit()">
                        </form>
                    </div>
                </div>
            </div>

            <!-- Corps du profil -->
            <div class="pt-20 pb-8 px-6 sm:px-10">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <!-- Section Informations personnelles -->
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Informations personnelles
                            </h2>
                            
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                            </div>
                        </div>

                        <!-- Section Autres informations -->
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Autres informations
                            </h2>
                            
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
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
                    </div>

                    <!-- Boutons d'action -->
                    <div class="mt-10 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                        <button type="button" onclick="window.location.href='{{ route('dashboard') }}'" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Annuler
                        </button>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Animation pour le chargement de la photo de profil
    document.getElementById('profilePhotoInput').addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const profileImage = document.querySelector('.group img');
                if (profileImage) {
                    profileImage.src = event.target.result;
                } else {
                    const initialDiv = document.querySelector('.group div div');
                    if (initialDiv) {
                        initialDiv.innerHTML = `<img src="${event.target.result}" class="w-full h-full object-cover">`;
                    }
                }
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endpush