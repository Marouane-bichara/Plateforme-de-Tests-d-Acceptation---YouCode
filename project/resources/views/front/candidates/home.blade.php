<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail Candidat - Mon Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-indigo-600 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-white text-lg font-bold">Portail Candidat</h1>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button class="bg-indigo-700 p-1 rounded-full text-white hover:bg-indigo-800 focus:outline-none">
                                <span class="sr-only">Notifications</span>
                                <i class="fas fa-bell w-6 h-6 p-1"></i>
                            </button>
                            <div class="ml-3 relative">
                                <div>
                                    <button type="button" class="flex max-w-xs items-center text-sm rounded-full text-white focus:outline-none" id="user-menu-button">
                                        <span class="sr-only">Menu utilisateur</span>
                                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-indigo-800">
                                            <span class="text-sm font-medium leading-none text-white">JD</span>
                                        </span>
                                        <span class="ml-2">{{ $candidate->name }}</span>
                                        <i class="fas fa-chevron-down ml-1"></i>
                                    </button>
                                </div>
                                <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" id="user-menu">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mon Profil</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Paramètres</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Déconnexion</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex md:hidden">
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-indigo-700 focus:outline-none" id="mobile-menu-button">
                            <i class="fas fa-bars w-6 h-6"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-indigo-700">Mon Profil</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-indigo-700">Quiz</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-indigo-700">Test Présentiel</a>
            </div>
            <div class="pt-4 pb-3 border-t border-indigo-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-indigo-800">
                            <span class="text-sm font-medium leading-none text-white">JD</span>
                        </span>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{ $candidate->name }}</div>
                        <div class="text-sm font-medium leading-none text-indigo-200">{{ $candidate->email }}</div>
                    </div>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-indigo-700">Mon Profil</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-indigo-700">Paramètres</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-indigo-700">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Progress Tracker -->
        <div class="px-4 sm:px-0 mb-8">
            <div class="relative">
                <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                    <div class="w-1/4 shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-600"></div>
                </div>
                <div class="flex text-xs mt-2 justify-between">
                    <div class="text-indigo-700 font-semibold">Profil</div>
                    <div class="text-gray-500">Quiz</div>
                    <div class="text-gray-500">Test Présentiel</div>
                    <div class="text-gray-500">Résultat Final</div>
                </div>
            </div>
        </div>

    @if(!$candidateinfo)
        <div class="bg-white shadow overflow-hidden rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6 bg-indigo-50">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Informations personnelles
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Complétez vos informations pour pouvoir accéder au quiz.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                        <div class="sm:col-span-3">
                            <label for="birth_date" class="block text-sm font-medium text-gray-700">Date de naissance</label>
                            <div class="mt-1">
                                <input type="date" name="birth_date" id="birth_date" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <div class="mt-1">
                                <input type="tel" name="phone" id="phone" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                            <div class="mt-1">
                                <input type="text" name="address" id="address" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                    </div>

                    <div class="bg-white shadow overflow-hidden rounded-lg mb-6">
                        <div class="px-4 py-5 sm:px-6 bg-indigo-50">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Documents obligatoires
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Veuillez télécharger les documents requis (formats acceptés : JPEG, PNG, PDF).
                            </p>
                        </div>
                        <div class="border-t border-gray-200 p-6">
                            <div class="space-y-6">
                                <!-- ID Card Upload -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Carte d'identité</label>
                                    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <i class="fas fa-id-card text-gray-400 text-3xl mb-3"></i>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="id_card" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                                    <span>Télécharger un fichier</span>
                                                    <input id="id_card" name="image" type="file" class="sr-only" accept=".jpeg,.jpg,.png,.pdf">
                                                </label>
                                                <p class="pl-1">ou glisser-déposer</p>
                                            </div>
                                            <p class="text-xs text-gray-500">
                                                JPEG, PNG ou PDF jusqu'à 5MB
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="ml-3 inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                        Enregistrer et continuer
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </form>
            </div>
        </div>
    @endif 
    @if($candidateinfo)
    <form action="{{ route('questionsAndAnswers.index') }}" method="get" enctype="multipart/form-data" class="p-6">
        <button type="submit" class="ml-3 inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                Start the test
            <i class="fas fa-arrow-right ml-2"></i>
        </button>
    </form>
    @endif




        <!-- Next Steps Section -->
        <div class="bg-white shadow overflow-hidden rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6 bg-indigo-50">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Prochaines étapes
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Aperçu du processus de recrutement
                </p>
            </div>
            <div class="border-t border-gray-200 p-6">
                <div class="flow-root">
                    <ul class="-mb-8">
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-indigo-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-indigo-600 flex items-center justify-center">
                                            <i class="fas fa-user-edit text-white"></i>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-700">1. Profil <span class="font-medium text-indigo-600">(En cours)</span></p>
                                            <p class="text-xs text-gray-500 mt-1">Complétez vos informations personnelles et téléchargez les documents requis.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-indigo-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                                            <i class="fas fa-question text-white"></i>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-700">2. Quiz <span class="font-medium text-gray-500">(À venir)</span></p>
                                            <p class="text-xs text-gray-500 mt-1">Répondez à un questionnaire pour tester vos connaissances (timer limité).</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-indigo-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                                            <i class="fas fa-calendar-check text-white"></i>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-700">3. Test Présentiel <span class="font-medium text-gray-500">(À venir)</span></p>
                                            <p class="text-xs text-gray-500 mt-1">Participez à un test technique, administratif et entretien CME en présentiel.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="relative">
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                                            <i class="fas fa-flag-checkered text-white"></i>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-700">4. Résultat Final <span class="font-medium text-gray-500">(À venir)</span></p>
                                            <p class="text-xs text-gray-500 mt-1">Recevez le résultat final de votre candidature.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Form Submission Button -->

    </main>

    <!-- Footer -->
    <footer class="bg-white">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-500">© 2025 Tous droits réservés</div>
                <div class="text-sm text-gray-500">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">Aide</a> |
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">Contact</a> |
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">Confidentialité</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Toggle user menu
        document.getElementById('user-menu-button').addEventListener('click', function() {
            document.getElementById('user-menu').classList.toggle('hidden');
        });

        // Toggle mobile menu
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Close dropdowns when clicking outside
        window.addEventListener('click', function(e) {
            if (!document.getElementById('user-menu-button').contains(e.target)) {
                document.getElementById('user-menu').classList.add('hidden');
            }
        });

        // File upload preview functionality
        document.getElementById('id_card').addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const parent = e.target.closest('div.space-y-1');
                const iconEl = parent.querySelector('i.fas');
                iconEl.classList.remove('fa-id-card', 'text-gray-400');
                iconEl.classList.add('fa-check-circle', 'text-green-500');

                // Show file name
                const fileNameEl = document.createElement('p');
                fileNameEl.classList.add('text-xs', 'text-green-600', 'mt-1');
                fileNameEl.textContent = `Fichier sélectionné: ${e.target.files[0].name}`;
                
                // Remove old file name if exists
                const oldFileName = parent.querySelector('p.text-green-600');
                if (oldFileName) parent.removeChild(oldFileName);
                
                parent.appendChild(fileNameEl);
            }
        });

        document.getElementById('cv').addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const parent = e.target.closest('div.space-y-1');
                const iconEl = parent.querySelector('i.fas');
                iconEl.classList.remove('fa-file-alt', 'text-gray-400');
                iconEl.classList.add('fa-check-circle', 'text-green-500');

                // Show file name
                const fileNameEl = document.createElement('p');
                fileNameEl.classList.add('text-xs', 'text-green-600', 'mt-1');
                fileNameEl.textContent = `Fichier sélectionné: ${e.target.files[0].name}`;
                
                // Remove old file name if exists
                const oldFileName = parent.querySelector('p.text-green-600');
                if (oldFileName) parent.removeChild(oldFileName);
                
                parent.appendChild(fileNameEl);
            }
        });
    </script>
</body>
</html>