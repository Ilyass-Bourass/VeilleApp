<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - VeillePro</title>
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
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Créer un compte
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="/register" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Nom complet</label>
                        <input id="name" name="name" type="text" required 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-400 focus:border-primary-400 focus:z-10 sm:text-sm" 
                            placeholder="Nom complet">
                    </div>
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" required 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-primary-400 focus:border-primary-400 focus:z-10 sm:text-sm" 
                            placeholder="Email">
                    </div>
                    <div>
                        <label for="role" class="sr-only">Rôle</label>
                        <select id="role" name="role" required 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-primary-400 focus:border-primary-400 focus:z-10 sm:text-sm">
                            <option value="">Sélectionnez votre rôle</option>
                            <option value="etudiant">Étudiant</option>
                            <option value="enseignant">Enseignant</option>
                        </select>
                    </div>
                    <div>
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input id="password" name="password" type="password" required 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-400 focus:border-primary-400 focus:z-10 sm:text-sm" 
                            placeholder="Mot de passe">
                    </div>
                </div>

                <div>
                    <button type="submit" name="signup"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-400 hover:bg-primary-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-400">
                        S'inscrire
                    </button>
                </div>
            </form>
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Déjà inscrit? 
                    <a href="/login" class="font-medium text-primary-400 hover:text-primary-300">
                        Se connecter
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>