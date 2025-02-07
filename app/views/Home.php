<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Veille Pédagogique</title>
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
                    <a href="/calendar" class="text-gray-600 hover:text-primary-400 px-3 py-2 rounded-md">Calendrier</a>
                    <a href="/login" class="text-gray-600 hover:text-primary-400 px-3 py-2 rounded-md">Connexion</a>
                    <a href="/register" class="bg-primary-400 text-white px-4 py-2 rounded-md hover:bg-primary-300">Inscription</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section avec fond dégradé -->
    <div class="bg-gradient-to-b from-primary-100 to-primary-200">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block">Plateforme de</span>
                    <span class="block text-primary-400">Veille Pédagogique</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-600 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Facilitez la gestion des présentations techniques et le partage de connaissances entre étudiants.
                </p>
                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                    <div class="rounded-md shadow">
                        <a href="/register" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-400 hover:bg-primary-300 md:py-4 md:text-lg md:px-10">
                            Commencer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-primary-200 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-primary-400 mb-4">
                        <!-- Icône SVG ou Font Awesome peut être ajouté ici -->
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Gestion des Présentations</h3>
                    <p class="mt-2 text-gray-600">Planifiez et organisez facilement vos présentations techniques.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-lg font-medium text-gray-900">Suivi des Progrès</h3>
                    <p class="mt-2 text-gray-600">Suivez votre progression et celle de vos pairs.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-lg font-medium text-gray-900">Collaboration</h3>
                    <p class="mt-2 text-gray-600">Travaillez en équipe sur des sujets techniques passionnants.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary-400">
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
</body>
</html>