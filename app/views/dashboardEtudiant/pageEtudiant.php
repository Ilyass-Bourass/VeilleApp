<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            100: '#FEFFD2',
                            200: '#FFEEA9',
                            300: '#FFBF78',
                            400: '#FF7D29',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-primary-100 to-white">
    <div class="flex min-h-screen">
        <!-- Sidebar améliorée -->
        <div class="fixed h-screen w-80 bg-white shadow-2xl">
            <div class="p-8 bg-gradient-to-r from-primary-400 to-primary-300">
                <div class="text-3xl font-bold text-white">VeillePro</div>
                <div class="mt-2 text-lg text-white opacity-90">Espace Étudiant</div>
            </div>
            
            <!-- Profile Section améliorée -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=FF7D29&color=fff" 
                             alt="Profile" 
                             class="w-16 h-16 rounded-full border-4 border-primary-100">
                        <div class="absolute bottom-0 right-0 w-4 h-4 bg-green-400 border-2 border-white rounded-full"></div>
                    </div>
                    <div>
                        <div class="text-xl font-semibold text-gray-800">John Doe</div>
                        <div class="text-sm text-gray-500">Étudiant en informatique</div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation améliorée -->
            <nav class="mt-6 px-4">
                <a href="#" onclick="showSection('dashboard')" 
                   class="flex items-center px-6 py-4 mb-3 rounded-xl hover:bg-primary-100 text-gray-700 hover:text-primary-400 transition-all duration-300 group">
                    <i class="fas fa-home w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3">Tableau de bord</span>
                </a>
                <a href="#" onclick="showSection('presentations')" 
                   class="flex items-center px-6 py-4 mb-3 rounded-xl hover:bg-primary-100 text-gray-700 hover:text-primary-400 transition-all duration-300 group">
                    <i class="fas fa-chalkboard-teacher w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3">Mes présentations</span>
                </a>
                <a href="#" onclick="showSection('suggestion')" 
                   class="flex items-center px-6 py-4 mb-3 rounded-xl hover:bg-primary-100 text-gray-700 hover:text-primary-400 transition-all duration-300 group">
                    <i class="fas fa-lightbulb w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3">Suggérer un sujet</span>
                </a>
                <a href="#" onclick="showSection('calendrier')" 
                   class="flex items-center px-6 py-4 mb-3 rounded-xl hover:bg-primary-100 text-gray-700 hover:text-primary-400 transition-all duration-300 group">
                    <i class="fas fa-calendar w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3">Calendrier</span>
                </a>
            </nav>

            <!-- Bouton déconnexion amélioré -->
            <div class="absolute bottom-0 w-full p-6">
                <form action="logout" method="POST">
                    <button type="submit" 
                            class="w-full flex items-center justify-center px-6 py-3 text-red-600 hover:bg-red-50 rounded-xl transition-all duration-300 group">
                        <i class="fas fa-sign-out-alt w-5 group-hover:scale-110 transition-transform"></i>
                        <span class="ml-3">Déconnexion</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-80 flex-1 p-8">
            <!-- Section Dashboard -->
            <div id="dashboard-section" class="space-y-8">
                <div class="flex justify-between items-center">
                    <h2 class="text-3xl font-bold text-gray-800">Tableau de bord</h2>
                    <div class="text-sm text-gray-500">
                        <i class="far fa-calendar"></i>
                        <span><?php echo date('Y/m/d'); ?></span>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total présentations</p>
                                <p class="text-3xl font-bold text-primary-400 mt-1">12</p>
                            </div>
                            <div class="bg-primary-100 p-3 rounded-full">
                                <i class="fas fa-chalkboard-teacher text-primary-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Sujets suggérés</p>
                                <p class="text-3xl font-bold text-primary-400 mt-1">8</p>
                            </div>
                            <div class="bg-primary-100 p-3 rounded-full">
                                <i class="fas fa-lightbulb text-primary-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Taux de participation</p>
                                <p class="text-3xl font-bold text-primary-400 mt-1">92%</p>
                            </div>
                            <div class="bg-primary-100 p-3 rounded-full">
                                <i class="fas fa-users text-primary-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Présentations -->
            <div id="presentations-section" class="hidden space-y-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-800">Mes Présentations</h2>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-primary-100 text-primary-400 rounded-lg hover:bg-primary-200 transition-colors">
                            <i class="fas fa-filter mr-2"></i>Filtrer
                        </button>
                    </div>
                </div>
                
                <!-- Liste des présentations -->
                <div class="grid gap-6">
                    <!-- Carte de présentation -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Introduction à Docker</h3>
                                <p class="text-gray-500 mt-1">
                                    <i class="far fa-calendar mr-2"></i>15 Mai 2024
                                </p>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                Confirmé
                            </span>
                        </div>
                        
                        <div class="mt-4">
                            <p class="text-sm text-gray-600 font-medium mb-2">Équipe :</p>
                            <div class="flex -space-x-2">
                                <img src="https://ui-avatars.com/api/?name=John&background=FF7D29&color=fff" 
                                     class="w-8 h-8 rounded-full border-2 border-white" title="John">
                                <img src="https://ui-avatars.com/api/?name=Marie&background=FFBF78&color=fff" 
                                     class="w-8 h-8 rounded-full border-2 border-white" title="Marie">
                                <img src="https://ui-avatars.com/api/?name=Alex&background=FFEEA9&color=fff" 
                                     class="w-8 h-8 rounded-full border-2 border-white" title="Alex">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Autres cartes de présentation... -->
                </div>
            </div>

            <!-- Section Suggestion simplifiée -->
            <div id="suggestion-section" class="hidden">
                <div class="max-w-2xl mx-auto">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8">Suggérer un sujet</h2>
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <form action="/suggestion" method="POST" class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Titre du sujet
                                </label>
                                <input type="text" 
                                       name="titre" 
                                       required
                                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary-400 focus:border-primary-400 transition-all duration-300"
                                       placeholder="Entrez le titre de votre sujet">
                            </div>
                            <button type="submit" name="suggestionSujet" 
                                    class="w-full bg-primary-400 text-white py-3 px-4 rounded-xl hover:bg-primary-300 transition-colors duration-300 flex items-center justify-center space-x-2">
                                <i class="fas fa-paper-plane"></i>
                                <span>Soumettre la suggestion</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Section Calendrier -->
            <div id="calendrier-section" class="hidden space-y-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-800">Calendrier des présentations</h2>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="grid gap-4">
                        <!-- Événement du calendrier -->
                        <div class="border-l-4 border-primary-400 pl-4 py-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Introduction à React Native</h3>
                                    <p class="text-gray-500 mt-1">2024/05/15</p>
                                    <div class="flex items-center mt-2">
                                        <div class="flex -space-x-2">
                                            <img src="https://ui-avatars.com/api/?name=Sarah&background=FF7D29&color=fff" 
                                                 class="w-6 h-6 rounded-full border-2 border-white" title="Sarah">
                                            <img src="https://ui-avatars.com/api/?name=Tom&background=FFBF78&color=fff" 
                                                 class="w-6 h-6 rounded-full border-2 border-white" title="Tom">
                                        </div>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">
                                    À venir
                                </span>
                            </div>
                        </div>

                        <div class="border-l-4 border-green-400 pl-4 py-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">DevOps et CI/CD</h3>
                                    <p class="text-gray-500 mt-1">2024/05/20</p>
                                    <div class="flex items-center mt-2">
                                        <div class="flex -space-x-2">
                                            <img src="https://ui-avatars.com/api/?name=Alex&background=FFEEA9&color=fff" 
                                                 class="w-6 h-6 rounded-full border-2 border-white" title="Alex">
                                            <img src="https://ui-avatars.com/api/?name=Marie&background=FEFFD2&color=fff" 
                                                 class="w-6 h-6 rounded-full border-2 border-white" title="Marie">
                                        </div>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                    Confirmé
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showSection(sectionName) {
            // Cacher toutes les sections
            document.getElementById('dashboard-section').classList.add('hidden');
            document.getElementById('presentations-section').classList.add('hidden');
            document.getElementById('suggestion-section').classList.add('hidden');
            document.getElementById('calendrier-section').classList.add('hidden');
            
            // Afficher la section demandée
            document.getElementById(sectionName + '-section').classList.remove('hidden');
        }

        // Afficher le dashboard par défaut
        showSection('dashboard');
    </script>
</body>
</html>