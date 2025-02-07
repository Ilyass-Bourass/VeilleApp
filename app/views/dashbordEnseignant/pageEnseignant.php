

<?php var_dump($suggestions)?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Enseignant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            100: '#E3F2FD',
                            200: '#BBDEFB',
                            300: '#90CAF9',
                            400: '#2196F3',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-primary-100 to-white">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="fixed h-screen w-80 bg-white shadow-2xl">
            <div class="p-8 bg-gradient-to-r from-primary-400 to-primary-300">
                <div class="text-3xl font-bold text-white">VeillePro</div>
                <div class="mt-2 text-lg text-white opacity-90">Espace Enseignant</div>
            </div>
            
            <!-- Profile Section -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <img src="https://ui-avatars.com/api/?name=Prof+Smith&background=2196F3&color=fff" 
                             alt="Profile" 
                             class="w-16 h-16 rounded-full border-4 border-primary-100">
                        <div class="absolute bottom-0 right-0 w-4 h-4 bg-green-400 border-2 border-white rounded-full"></div>
                    </div>
                    <div>
                        <div class="text-xl font-semibold text-gray-800">Prof. Smith</div>
                        <div class="text-sm text-gray-500">Enseignant</div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-6 px-4">
                <a href="#" onclick="showSection('dashboard')" 
                   class="flex items-center px-6 py-4 mb-3 rounded-xl hover:bg-primary-100 text-gray-700 hover:text-primary-400 transition-all duration-300 group">
                    <i class="fas fa-home w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3">Tableau de bord</span>
                </a>
                <a href="#" onclick="showSection('presentations')" 
                   class="flex items-center px-6 py-4 mb-3 rounded-xl hover:bg-primary-100 text-gray-700 hover:text-primary-400 transition-all duration-300 group">
                    <i class="fas fa-chalkboard-teacher w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3">Gérer présentations</span>
                </a>
                <a href="#" onclick="showSection('suggestions')" 
                   class="flex items-center px-6 py-4 mb-3 rounded-xl hover:bg-primary-100 text-gray-700 hover:text-primary-400 transition-all duration-300 group">
                    <i class="fas fa-lightbulb w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3">Suggestions reçues</span>
                </a>
                <a href="#" onclick="showSection('etudiants')" 
                   class="flex items-center px-6 py-4 mb-3 rounded-xl hover:bg-primary-100 text-gray-700 hover:text-primary-400 transition-all duration-300 group">
                    <i class="fas fa-users w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3">Gérer étudiants</span>
                </a>
                <div class="bottom-0 w-full p-6">
                <form action="/logout" method="POST">
                    <button type="submit" 
                            class="w-full flex items-center justify-center px-6 py-3 text-red-600 hover:bg-red-50 rounded-xl transition-all duration-300 group">
                        <i class="fas fa-sign-out-alt w-5 group-hover:scale-110 transition-transform"></i>
                        <span class="ml-3">Déconnexion</span>
                    </button>
                </form>
            </div>
            </nav>

            <!-- Bouton déconnexion -->
            
        </div>

        <!-- Main Content -->
        <div class="ml-80 flex-1 p-8">
            <!-- Dashboard Section -->
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
                                <p class="text-sm text-gray-500">Présentations à venir</p>
                                <p class="text-3xl font-bold text-primary-400 mt-1">5</p>
                            </div>
                            <div class="bg-primary-100 p-3 rounded-full">
                                <i class="fas fa-calendar text-primary-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Suggestions en attente</p>
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
                                <p class="text-sm text-gray-500">Étudiants actifs</p>
                                <p class="text-3xl font-bold text-primary-400 mt-1">24</p>
                            </div>
                            <div class="bg-primary-100 p-3 rounded-full">
                                <i class="fas fa-users text-primary-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prochaines présentations -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Prochaines présentations</h3>
                    <div class="grid gap-4">
                        <div class="border-l-4 border-primary-400 pl-4 py-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Intelligence Artificielle</h4>
                                    <p class="text-gray-500 mt-1">2024/05/15</p>
                                    <div class="flex -space-x-2 mt-2">
                                        <img src="https://ui-avatars.com/api/?name=Alex" class="w-8 h-8 rounded-full border-2 border-white">
                                        <img src="https://ui-avatars.com/api/?name=Sarah" class="w-8 h-8 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">
                                    À valider
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Autres sections (cachées par défaut) -->
            <div id="presentations-section" class="hidden">
                <!-- Contenu de la gestion des présentations -->
            </div>

            <div id="suggestions-section" class="hidden">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Suggestions des Étudiants</h2>
        
    </div>

    <!-- Table des suggestions -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titre du sujet</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Étudiant</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date de soumission</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach($suggestions as $suggestion):?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900"><?= $suggestion['titre']?></div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500"><?= $suggestion['name']?></div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500"><?= $suggestion['created_at']?></div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            <?= $suggestion['statut']?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <?php if($suggestion['statut']!=='approuvé'):?>
                                <a href="/enseignant/approuver/<?= $suggestion['id_sujet'] ?>" class="text-green-600 hover:text-green-900 mr-4">
                                    Approuver
                                </a>
                            <?php endif;?>
                            <a href="/enseignant/rejeter/<?= $suggestion['id_sujet'] ?>" class="text-red-600 hover:text-red-900">
                                Rejeter
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

            <div id="etudiants-section" class="hidden">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Gestion des Étudiants</h2>
        <div class="flex gap-4">
            <select class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-400">
                <option value="tous">Tous les étudiants</option>
                <option value="en_attente">En attente</option>
                <option value="activer">Activés</option>
            </select>
        </div>
    </div>

    <!-- Table des étudiants -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">État</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date d'inscription</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Exemple d'étudiant -->
                 <?php foreach($users as $user):?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900"><?= $user['name']?></div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500"><?= $user['email']?></div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            <?= $user['etat']?>
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500"><?= $user['created_at']?></div>
                        </td>
                        <td class="px-6 py-4 text-right">
                        <td class="px-6 py-4 text-right">
                        <?php if($user['etat']=="en_attente"):?>
                            <a href="/enseignant/activer/<?= $user['id'] ?>" class="text-green-600 hover:text-green-900 mr-4">
                                Activer
                            </a>
                        <?php endif;?>
                        <a href="/enseignant/supprimer/<?= $user['id'] ?>" class="text-red-600 hover:text-red-900">
                            Supprimer
                        </a>
                    </td>

                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div
        </div>
    </div>

    <script>
        function showSection(sectionName) {
            // Cacher toutes les sections
            document.getElementById('dashboard-section').classList.add('hidden');
            document.getElementById('presentations-section').classList.add('hidden');
            document.getElementById('suggestions-section').classList.add('hidden');
            document.getElementById('etudiants-section').classList.add('hidden');
            
            // Afficher la section demandée
            document.getElementById(sectionName + '-section').classList.remove('hidden');
        }

        // Afficher le dashboard par défaut
        showSection('dashboard');
    </script>
</body>
</html>