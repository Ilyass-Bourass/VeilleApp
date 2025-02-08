<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des Présentations</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-primary-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="/" class="text-2xl font-bold text-primary-400">VeillePro</a>
                </div>
                <div class="flex space-x-4">
                    <a href="/home" class="text-gray-600 hover:text-primary-400 px-3 py-2 rounded-md">Accueil</a>
                    <a href="/calendar" class="text-primary-400 px-3 py-2 rounded-md">Calendrier</a>
                    <?php if (!isset($_SESSION['user_loged_in_id'])): ?>
                        <a href="/login" class="text-gray-600 hover:text-primary-400 px-3 py-2 rounded-md">Connexion</a>
                        <a href="/register" class="bg-primary-400 text-white px-4 py-2 rounded-md hover:bg-primary-300">Inscription</a>
                    <?php else: ?>
                        <?php if ($_SESSION['user_loged_in_role'] === 'enseignant'): ?>
                            <a href="/enseignant" class="text-gray-600 hover:text-primary-400 px-3 py-2 rounded-md">Espace Enseignant</a>
                        <?php elseif ($_SESSION['user_loged_in_role'] === 'etudiant'): ?>
                            <a href="/etudiant" class="text-gray-600 hover:text-primary-400 px-3 py-2 rounded-md">Espace Étudiant</a>
                        <?php endif; ?>
                        <form action="/logout" method="POST" class="inline">
                            <button type="submit" class="text-gray-600 hover:text-primary-400 px-3 py-2 rounded-md">Déconnexion</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu du calendrier -->
    <div class="max-w-7xl mx-auto p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-900">Calendrier des Présentations à Venir</h2>
            <div class="flex gap-4">
                <button onclick="changeMonth(-1)" class="p-2 hover:bg-primary-200 rounded-full text-gray-600">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <h3 id="currentMonthYear" class="text-xl font-semibold text-gray-900"></h3>
                <button onclick="changeMonth(1)" class="p-2 hover:bg-primary-200 rounded-full text-gray-600">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="grid grid-cols-7 gap-4 mb-4">
                <div class="text-center font-medium text-gray-600">Lun</div>
                <div class="text-center font-medium text-gray-600">Mar</div>
                <div class="text-center font-medium text-gray-600">Mer</div>
                <div class="text-center font-medium text-gray-600">Jeu</div>
                <div class="text-center font-medium text-gray-600">Ven</div>
                <div class="text-center font-medium text-gray-600">Sam</div>
                <div class="text-center font-medium text-gray-600">Dim</div>
            </div>
            <div id="calendar-days" class="grid grid-cols-7 gap-4">
                <!-- Les jours seront générés en JavaScript -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary-400 mt-12">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-white mb-4 md:mb-0">
                    <p>&copy; 2024 VeillePro. Tous droits réservés.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-white hover:text-primary-200">À propos</a>
                    <a href="#" class="text-white hover:text-primary-200">Contact</a>
                    <a href="#" class="text-white hover:text-primary-200">Mentions légales</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        let currentDate = new Date();
        let presentations = <?= isset($presentations) ? json_encode($presentations) : '[]' ?>;
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        function updateCalendar() {
            const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
            
            document.getElementById('currentMonthYear').textContent = 
                `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;

            const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
            const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
            
            let calendarHTML = '';
            
            for (let i = 1; i < firstDay.getDay() || i === 7; i++) {
                calendarHTML += '<div class="h-32 border rounded-lg bg-primary-100"></div>';
            }

            for (let day = 1; day <= lastDay.getDate(); day++) {
                const currentDateStr = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const dateToCheck = new Date(currentDateStr);
                
                const dayPresentations = presentations.filter(p => {
                    const presentationDate = new Date(p.date_presentation);
                    return p.date_presentation === currentDateStr && presentationDate >= today;
                });
                
                calendarHTML += `
                    <div class="h-32 border rounded-lg ${dayPresentations.length ? 'bg-gradient-to-br from-primary-100 to-white' : 'bg-white'} hover:shadow-lg transition-all duration-200">
                        <div class="font-medium text-gray-700 p-2 border-b bg-white bg-opacity-50">
                            ${day}
                        </div>
                        ${dayPresentations.map(presentation => `
                            <div class="p-2">
                                <div class="text-sm font-bold text-primary-400 truncate mb-1">
                                    ${presentation.sujet_titre}
                                </div>
                                <div class="flex flex-wrap gap-1">
                                    ${presentation.participants.split(',').map(participant => `
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-400">
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

        updateCalendar();
    </script>
</body>
</html>