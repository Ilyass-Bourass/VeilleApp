<?php
var_dump($stats);
?>

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
                <a href="#" onclick="showSection('calendar')" 
                   class="flex items-center px-6 py-4 mb-3 rounded-xl hover:bg-primary-100 text-gray-700 hover:text-primary-400 transition-all duration-300 group">
                    <i class="fas fa-calendar w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3">Calendrier</span>
                </a>
                <a href="#" onclick="showSection('add-presentation')" 
                   class="flex items-center px-6 py-4 mb-3 rounded-xl hover:bg-primary-100 text-gray-700 hover:text-primary-400 transition-all duration-300 group">
                    <i class="fas fa-plus w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3">Ajouter Présentation</span>
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
            <div id="dashboard-section">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Total Étudiants</h3>
                            <i class="fas fa-users text-primary-400"></i>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-2"><?= $stats['active_students']?></div>
                        <div class="text-sm text-gray-500">étudiants inscrits</div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Présentations</h3>
                            <i class="fas fa-chalkboard-teacher text-primary-400"></i>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-2"><?= $stats['total_presentations']?></div>
                        <div class="text-sm text-gray-500">ce mois</div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800"> suggestions</h3>
                            <i class="fas fa-lightbulb text-primary-400"></i>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-2"><?= $stats['total_suggestions']?></div>
                        <div class="text-sm text-gray-500">en attente</div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Sujets approuvés</h3>
                            <i class="fas fa-comment-alt text-primary-400"></i>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-2"><?= $stats['total_sujets_approuves']?></div>
                        <div class="text-sm text-gray-500">taux d'acceptation</div>
                    </div>
                </div>
            </div>

            <!-- Nouvelle section pour ajouter une présentation -->
            <div id="add-presentation-section" class="hidden">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-800">Ajouter une Présentation</h2>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <form action="/enseignant/ajouter-presentation" method="POST" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Sélectionner un sujet approuvé
                            </label>
                            <select name="id_sujet" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400">
                                <option value="">Choisir un sujet</option>
                                <?php foreach($suggestions as $sujet): ?>
                                    <?php if($sujet['statut'] === 'approuvé'): ?>
                                        <option value="<?= $sujet['id_sujet'] ?>"><?= $sujet['titre'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Sélectionner les étudiants
                            </label>
                            <div class="max-h-60 overflow-y-auto border border-gray-300 rounded-lg p-4">
                                <?php foreach($users as $user): ?>
                                    <?php if($user['role'] === 'etudiant' && $user['etat'] === 'activer'): ?>
                                        <div class="flex items-center space-x-3 py-2">
                                            <input type="checkbox" 
                                                   id="student_<?= $user['id'] ?>" 
                                                   name="users_id[]" 
                                                   value="<?= $user['id'] ?>"
                                                   class="rounded border-gray-300">
                                            <label for="student_<?= $user['id'] ?>" class="text-sm text-gray-700">
                                                <?= $user['name'] ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Date de présentation
                            </label>
                            <input type="date" 
                                   name="date_presentation" 
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="px-6 py-2 bg-primary-400 text-white rounded-lg hover:bg-primary-500 transition-colors duration-200">
                                Créer la présentation
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Autres sections (cachées par défaut) -->
            <div id="presentations-section" class="hidden">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-800">Gestion des Présentations</h2>
                    <button onclick="openAddSubjectModal()" 
                            class="px-4 py-2 bg-primary-400 text-white rounded-lg hover:bg-primary-500 transition-colors duration-200 flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        Ajouter un sujet
                    </button>
                </div>
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sujet</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Participants</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach($presentations as $presentation): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            <?= $presentation['sujet_titre'] ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">
                                            <?= date('d/m/Y', strtotime($presentation['date_presentation'])) ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-2">
                                            <?php 
                                            $participants = explode(',', $presentation['participants']);
                                            $colors = ['bg-blue-500', 'bg-green-500', 'bg-purple-500', 'bg-pink-500', 'bg-indigo-500', 'bg-yellow-500'];
                                            foreach($participants as $index => $participant): 
                                                $colorIndex = $index % count($colors);
                                            ?>
                                                <span class="inline-flex items-center justify-center <?= $colors[$colorIndex] ?> text-white text-sm font-medium px-3 py-1 rounded-full" 
                                                      title="<?= trim($participant) ?>">
                                                    <?= trim($participant) ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            <?php
                                            switch($presentation['presentation_statut']) {
                                                case 'en_attente':
                                                    echo 'bg-yellow-100 text-yellow-800';
                                                    break;
                                                case 'validé':
                                                    echo 'bg-green-100 text-green-800';
                                                    break;
                                                case 'terminé':
                                                    echo 'bg-blue-100 text-blue-800';
                                                    break;
                                                case 'annulé':
                                                    echo 'bg-red-100 text-red-800';
                                                    break;
                                            }
                                            ?>">
                                            <?= $presentation['presentation_statut'] ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="/enseignant/modifier-presentation/<?= $presentation['id_presentation'] ?>" 
                                           class="text-primary-400 hover:text-primary-500 mr-4">
                                            Modifier
                                        </a>
                                        <a href="/enseignant/supprimer-presentation/<?= $presentation['id_presentation'] ?>" 
                                           class="text-red-600 hover:text-red-900">
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Modal Assigner Étudiants -->
                <div id="assignModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Assigner des étudiants</h3>
                            <div class="space-y-3 max-h-60 overflow-y-auto">
                                <!-- Liste des étudiants avec checkboxes -->
                                <?php foreach($users as $user):?>
                                    <div class="flex items-center space-x-3">
                                        <input type="checkbox" name="etudiant[]" id="student1" class="rounded border-gray-300" value=<?= $user['id']?>>
                                        <label for="student1" class="text-sm text-gray-700"><?= $user['name']?></label>
                                    </div>
                                <?php endforeach;?>
                            </div>
                            <div class="mt-4 flex justify-end space-x-3">
                                <button onclick="closeAssignModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                                    Annuler
                                </button>
                                <button onclick="saveAssignments()" class="px-4 py-2 bg-primary-400 text-white rounded-lg hover:bg-primary-500">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Ajouter Sujet -->
                <div id="addSubjectModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Ajouter un nouveau sujet</h3>
                            <form action="/enseignant/ajouter-sujet" method="POST">
                                <div class="space-y-4">
                                    <div>
                                        <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">
                                            Titre du sujet
                                        </label>
                                        <input type="text" 
                                               id="titre" 
                                               name="titre" 
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400"
                                               required>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end space-x-3">
                                    <button type="button" 
                                            onclick="closeAddSubjectModal()" 
                                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                                        Annuler
                                    </button>
                                    <button type="submit" 
                                            class="px-4 py-2 bg-primary-400 text-white rounded-lg hover:bg-primary-500">
                                        Soumettre
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calendar Section -->
            <div id="calendar-section" class="hidden">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-800">Calendrier des Présentations</h2>
                    <div class="flex gap-4">
                        <button onclick="changeMonth(-1)" class="p-2 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <h3 id="currentMonthYear" class="text-xl font-semibold"></h3>
                        <button onclick="changeMonth(1)" class="p-2 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="grid grid-cols-7 gap-4 mb-4">
                        <div class="text-center font-medium text-gray-500">Lun</div>
                        <div class="text-center font-medium text-gray-500">Mar</div>
                        <div class="text-center font-medium text-gray-500">Mer</div>
                        <div class="text-center font-medium text-gray-500">Jeu</div>
                        <div class="text-center font-medium text-gray-500">Ven</div>
                        <div class="text-center font-medium text-gray-500">Sam</div>
                        <div class="text-center font-medium text-gray-500">Dim</div>
                    </div>
                    <div id="calendar-days" class="grid grid-cols-7 gap-4">
                        <!-- Les jours seront générés en JavaScript -->
                    </div>
                </div>
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
            document.getElementById('calendar-section').classList.add('hidden');
            document.getElementById('presentations-section').classList.add('hidden');
            document.getElementById('suggestions-section').classList.add('hidden');
            document.getElementById('etudiants-section').classList.add('hidden');
            document.getElementById('add-presentation-section').classList.add('hidden');
            
            // Afficher la section demandée
            document.getElementById(sectionName + '-section').classList.remove('hidden');

            // Mettre à jour le calendrier uniquement si on est dans la section calendrier
            if (sectionName === 'calendar') {
                updateCalendar();
            }
        }

        // Afficher le dashboard par défaut
        showSection('dashboard');
          // Ajouter ces nouvelles fonctions avec les fonctions JavaScript existantes
    function openAssignModal(subjectId) {
        document.getElementById('assignModal').classList.remove('hidden');
    }

    function closeAssignModal() {
        document.getElementById('assignModal').classList.add('hidden');
    }

    function saveAssignments() {
        // Logique pour sauvegarder les assignations
        closeAssignModal();
    }

    function openAddSubjectModal() {
        document.getElementById('addSubjectModal').classList.remove('hidden');
    }

    function closeAddSubjectModal() {
        document.getElementById('addSubjectModal').classList.add('hidden');
    }

    // Mettre à jour la fonction window.onclick
    window.onclick = function(event) {
        const assignModal = document.getElementById('assignModal');
        const addSubjectModal = document.getElementById('addSubjectModal');
        
        if (event.target == assignModal) {
            closeAssignModal();
        }
        if (event.target == addSubjectModal) {
            closeAddSubjectModal();
        }
    }

    let currentDate = new Date();
    let presentations = <?= json_encode($presentations) ?>;

    function updateCalendar() {
        const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
            "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
        
        document.getElementById('currentMonthYear').textContent = 
            `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;

        const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
        
        let calendarHTML = '';
        
        // Ajouter les cases vides pour le début du mois
        for (let i = 1; i < firstDay.getDay() || i === 7; i++) {
            calendarHTML += '<div class="h-32 border rounded-lg bg-gray-50"></div>';
        }

        // Générer les jours du mois
        for (let day = 1; day <= lastDay.getDate(); day++) {
            const currentDateStr = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            
            const dayPresentations = presentations.filter(p => p.date_presentation === currentDateStr);
            const isPast = new Date(currentDateStr) < new Date().setHours(0,0,0,0);
            
            calendarHTML += `
                <div class="h-32 border rounded-lg ${isPast ? 'bg-gray-100' : dayPresentations.length ? 'bg-gradient-to-br from-blue-50 to-white' : 'bg-white'} hover:shadow-lg transition-all duration-200">
                    <div class="font-medium ${isPast ? 'text-gray-500' : 'text-gray-700'} p-2 border-b bg-white bg-opacity-50">
                        ${day}
                    </div>
                    ${dayPresentations.map(presentation => `
                        <div class="p-2">
                            <div class="text-sm font-bold ${isPast ? 'text-gray-500' : 'text-primary-400'} truncate mb-1">
                                ${presentation.sujet_titre}
                            </div>
                            <div class="flex flex-wrap gap-1">
                                ${presentation.participants.split(',').map(participant => `
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                        ${isPast ? 'bg-gray-100 text-gray-600' : 'bg-primary-100 text-primary-600'}">
                                        ${participant.trim()}
                                    </span>
                                `).join('')}
                            </div>
                        </div>
                    `).join('')}
                </div>
            `;
        }

        document.getElementById('calendar-days').innerHTML = calendarHTML;
    }

    function changeMonth(delta) {
        currentDate.setMonth(currentDate.getMonth() + delta);
        updateCalendar();
    }

    // Initialiser le calendrier
    updateCalendar();
    </script>
</body>
</html>