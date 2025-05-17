<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer - Gestion de Groupements</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#4F46E5',secondary:'#8B5CF6'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .footer-wrapper {
            margin-top: auto;
        }
        input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col">


        <!-- Footer -->
        <footer class="footer-wrapper bg-white border-t border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Première colonne -->
                    <div class="flex flex-col space-y-4">
                        <div class="font-['Pacifico'] text-2xl text-primary"><img src="{{ asset('images/logo-masm.png') }}" alt="" srcset=""></div>
                        <p class="text-gray-600 mt-2">Votre solution complète pour la gestion efficace des groupements professionnels et communautaires.</p>
                        <div class="flex flex-col space-y-3 mt-4">
                            <button class="flex items-center space-x-2 text-primary hover:text-primary/80 transition-colors">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-customer-service-2-line"></i>
                                </div>
                                <span>Assistance 24/7</span>
                            </button>
                            <button class="flex items-center space-x-2 text-primary hover:text-primary/80 transition-colors">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-mail-line"></i>
                                </div>
                                <span>Nous contacter</span>
                            </button>
                        </div>
                    </div>

                    <!-- Deuxième colonne -->
                    <div>
                        <h3 class="text-gray-900 font-semibold text-lg mb-4">Fonctionnalités</h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Tableau de bord</a>
                            </li>
                            <li>
                                <a href="{{ route('App_groupement') }}" class="text-gray-600 hover:text-primary transition-colors">Gestion des groupements</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Gestion des membres</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Rapports et statistiques</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Calendrier des événements</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Ressources partagées</a>
                            </li>
                            <li>
                                <a href="{{ route('App_contact') }}" class="text-gray-600 hover:text-primary transition-colors">Contact </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Troisième colonne -->
                    <div>
                        <h3 class="text-gray-900 font-semibold text-lg mb-4">Contact</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start space-x-3">
                                <div class="w-5 h-5 flex items-center justify-center mt-0.5">
                                    <i class="ri-map-pin-line text-primary"></i>
                                </div>
                                <span class="text-gray-600">Immeuble DIBOUSSE en vitre de couleur verte qui abrite le siège de MTN et qui est non loin de NOVOTEL</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-phone-line text-primary"></i>
                                </div>
                                <span class="text-gray-600">+229 0160420202</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-mail-line text-primary"></i>
                                </div>
                                <span class="text-gray-600">masm.info@gouv.bj</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-time-line text-primary"></i>
                                </div>
                                <span class="text-gray-600">Lun-Ven: 8h-17h30</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Quatrième colonne -->
                    <div>
                        <h3 class="text-gray-900 font-semibold text-lg mb-4">Restez connecté</h3>
                        <div class="flex space-x-4 mb-6">
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-all">
                                <i class="ri-linkedin-fill ri-lg"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-all">
                                <i class="ri-twitter-x-fill ri-lg"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-all">
                                <i class="ri-facebook-fill ri-lg"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-all">
                                <i class="ri-instagram-fill ri-lg"></i>
                            </a>
                        </div>
                        
                        <!-- <h3 class="text-gray-900 font-semibold text-lg mb-3">Newsletter</h3>
                        <p class="text-gray-600 mb-3">Recevez nos actualités et mises à jour</p>
                        <div class="flex">
                            <input type="email" placeholder="Votre email" class="px-4 py-2 border border-gray-300 rounded-l-button w-full text-sm" />
                            <button class="bg-primary text-white px-4 py-2 rounded-r-button whitespace-nowrap hover:bg-primary/90 transition-colors">
                                S'abonner
                            </button>
                        </div> -->
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-col md:flex-row md:justify-between items-center">
                        <p class="text-gray-500 text-sm mb-4 md:mb-0">© 2025 Gestion Groupements. Tous droits réservés.</p>
                        <div class="flex flex-wrap justify-center gap-4 md:gap-6">
                            <a href="#" class="text-gray-500 hover:text-primary text-sm whitespace-nowrap">Conditions d'utilisation</a>
                            <a href="#" class="text-gray-500 hover:text-primary text-sm whitespace-nowrap">Politique de confidentialité</a>
                            <a href="#" class="text-gray-500 hover:text-primary text-sm whitespace-nowrap">Mentions légales</a>
                            <a href="#" class="text-gray-500 hover:text-primary text-sm whitespace-nowrap">Plan du site</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>