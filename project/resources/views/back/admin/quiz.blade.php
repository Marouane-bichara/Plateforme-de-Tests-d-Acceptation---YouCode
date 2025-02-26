<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Gestion des Quiz</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="hidden md:flex flex-col w-64 bg-indigo-900">
            <div class="flex items-center justify-between h-20 bg-indigo-800 shadow-md">
                <h1 class="text-white text-2xl font-semibold ml-6">Admin Panel</h1>
                <button id="closeSidebar" class="text-white mr-4 md:hidden">
                    <i class="fas fa-times w-6 h-6"></i>
                </button>
            </div>
            <div class="overflow-y-auto overflow-x-hidden flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-indigo-200 uppercase">Menu</div>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-800 text-indigo-200 hover:text-white border-l-4 border-transparent hover:border-indigo-400 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-chart-line w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Statistiques</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-800 text-indigo-200 hover:text-white border-l-4 border-transparent hover:border-indigo-400 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Candidats</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-800 text-white border-l-4 border-indigo-400 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-question-circle w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Quiz</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-800 text-indigo-200 hover:text-white border-l-4 border-transparent hover:border-indigo-400 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-calendar-alt w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Tests Présentiels</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-800 text-indigo-200 hover:text-white border-l-4 border-transparent hover:border-indigo-400 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-user-tie w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Staff</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" id="settingsDropdownToggle" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-800 text-indigo-200 hover:text-white border-l-4 border-transparent hover:border-indigo-400 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-cog w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Paramètres</span>
                            <span class="inline-flex justify-center items-center ml-auto">
                                <i class="fas fa-chevron-down w-3 h-3"></i>
                            </span>
                        </a>
                        <div id="settingsDropdown" class="hidden pl-10 pr-4 py-2 bg-indigo-800">
                            <a href="#" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-indigo-700 text-indigo-200 hover:text-white rounded pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <i class="fas fa-user-cog w-4 h-4"></i>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Mon Compte</span>
                            </a>
                            <a href="#" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-indigo-700 text-indigo-200 hover:text-white rounded pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <i class="fas fa-sliders-h w-4 h-4"></i>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Préférences</span>
                            </a>
                            <a href="#" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-indigo-700 text-red-400 hover:text-red-300 rounded pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <i class="fas fa-sign-out-alt w-4 h-4"></i>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Déconnexion</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Mobile sidebar overlay -->
        <div id="sidebarOverlay" class="hidden fixed inset-0 z-20"></div>

        <!-- Main Content -->
        <div class="flex flex-col flex-grow w-full">
            <!-- Top Navigation -->
            <div class="flex items-center justify-between h-16 bg-white shadow-md px-4">
                <div class="flex items-center">
                    <button id="sidebarToggle" class="text-gray-500 focus:outline-none lg:hidden">
                        <i class="fas fa-bars w-6 h-6"></i>
                    </button>
                    <h2 class="text-lg font-semibold ml-4">Gestion des Quiz</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button id="profileDropdown" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="/api/placeholder/40/40" alt="Admin profile">
                        </button>
                        <div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Paramètres</a>
                            <div class="border-t border-gray-100"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="flex-grow p-6 overflow-y-auto bg-gray-100">
                <div class="flex flex-col space-y-6">
                    <!-- Page Title and Create Button -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-800">Liste des Quiz</h1>
                            <p class="text-sm text-gray-600">Gérez tous les quiz du processus de recrutement</p>
                        </div>
                        <button id="createQuizBtn" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded flex items-center">
                            <i class="fas fa-plus mr-2"></i>Créer un Quiz
                        </button>
                    </div>

                    <!-- Quiz Cards Grid - Laravel Blade Implementation -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- This section will be populated from Laravel Backend -->
                        <!-- Blade Syntax for displaying quiz cards from 'cards' array -->
                        @forelse ($cards as $card)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="p-5">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $card->title }}</h3>
                                        @if($card->status == 'active')
                                            <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full">Actif</span>
                                        @elseif($card->status == 'draft')
                                            <span class="bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded-full">Brouillon</span>
                                        @else
                                            <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">Inactif</span>
                                        @endif
                                    </div>
                                    <p class="text-gray-600 mb-3">{{ $card->description }}</p>
                                    <div class="flex items-center text-sm text-gray-500 mb-4">
                                        <i class="fas fa-clock mr-2"></i>
                                        <span>Durée: {{ $card->duration }} minutes</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500 mb-4">
                                        <i class="fas fa-question-circle mr-2"></i>
                                        <span>{{ $card->question_count }} questions</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-trophy mr-2"></i>
                                        <span>Score de réussite: {{ $card->passing_score }}%</span>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-5 py-3 flex justify-between">
                                    <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium editQuizBtn" data-id="{{ $card->id }}">
                                        <i class="fas fa-edit mr-1"></i>Modifier
                                    </button>
                                    <button class="text-red-600 hover:text-red-800 text-sm font-medium deleteQuizBtn" data-id="{{ $card->id }}">
                                        <i class="fas fa-trash-alt mr-1"></i>Supprimer
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white rounded-lg shadow-md p-8 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="text-indigo-400 mb-4">
                                        <i class="fas fa-question-circle text-6xl"></i>
                                    </div>
                                    <h3 class="text-xl font-medium text-gray-700 mb-2">Aucun quiz disponible</h3>
                                    <p class="text-gray-500 mb-6">Vous n'avez pas encore créé de quiz. Commencez en cliquant sur le bouton ci-dessous.</p>
                                    <button id="emptyStateCreateBtn" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded flex items-center">
                                        <i class="fas fa-plus mr-2"></i>Créer votre premier Quiz
                                    </button>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create/Edit Quiz Modal -->
    <div id="quizModal" class="hidden fixed inset-0 overflow-y-auto z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Modal backdrop -->
            <div class="fixed inset-0 bg-black opacity-50"></div>
            
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-xl max-w-3xl w-full z-50">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b">
                    <h3 id="modalTitle" class="text-xl font-semibold text-gray-900">Créer un Nouveau Quiz</h3>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <!-- Modal body -->
                <div class="p-6">
                    <!-- Form Steps Indicator -->
                    <div class="mb-8">
                        <div class="flex items-center">
                            <div class="step-item active flex flex-col items-center flex-1">
                                <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">1</div>
                                <p class="mt-2 text-sm font-medium">Page 1</p>
                            </div>
                            <div class="flex-1 h-1 bg-gray-200">
                                <div class="h-full bg-indigo-600 step-bar-1" style="width: 0%"></div>
                            </div>
                            <div class="step-item flex flex-col items-center flex-1">
                                <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold">2</div>
                                <p class="mt-2 text-sm font-medium text-gray-500">Page 2</p>
                            </div>
                            <div class="flex-1 h-1 bg-gray-200">
                                <div class="h-full bg-indigo-600 step-bar-2" style="width: 0%"></div>
                            </div>
                            <div class="step-item flex flex-col items-center flex-1">
                                <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold">3</div>
                                <p class="mt-2 text-sm font-medium text-gray-500">Page 3</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Page 1 -->
                    <div id="formPage1" class="form-page">
                        <form>
                            <div class="grid grid-cols-1 gap-6">
                                <div class="mb-4">
                                    <label for="quizTitle" class="block text-sm font-medium text-gray-700 mb-1">Titre du Quiz</label>
                                    <input type="text" id="quizTitle" name="quizTitle" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: Quiz Technique">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="quizDescription" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea id="quizDescription" name="quizDescription" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Décrivez le but de ce quiz..."></textarea>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="quizCategory" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                                    <select id="quizCategory" name="quizCategory" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="">Sélectionnez une catégorie</option>
                                        <option value="technical">Technique</option>
                                        <option value="logic">Logique</option>
                                        <option value="language">Langue</option>
                                        <option value="culture">Culture d'entreprise</option>
                                        <option value="other">Autre</option>
                                    </select>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="quizLevel" class="block text-sm font-medium text-gray-700 mb-1">Niveau de difficulté</label>
                                    <select id="quizLevel" name="quizLevel" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="">Sélectionnez un niveau</option>
                                        <option value="beginner">Débutant</option>
                                        <option value="intermediate">Intermédiaire</option>
                                        <option value="advanced">Avancé</option>
                                        <option value="expert">Expert</option>
                                    </select>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="quizTags" class="block text-sm font-medium text-gray-700 mb-1">Tags (séparés par des virgules)</label>
                                    <input type="text" id="quizTags" name="quizTags" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: développement, web, programmation">
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Form Page 2 -->
                    <div id="formPage2" class="form-page hidden">
                        <form>
                            <div class="grid grid-cols-1 gap-6">
                                <div class="mb-4">
                                    <label for="quizDuration" class="block text-sm font-medium text-gray-700 mb-1">Durée (en minutes)</label>
                                    <input type="number" id="quizDuration" name="quizDuration" min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: 30">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="passingScore" class="block text-sm font-medium text-gray-700 mb-1">Score de réussite (%)</label>
                                    <input type="number" id="passingScore" name="passingScore" min="1" max="100" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: 70">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="maxAttempts" class="block text-sm font-medium text-gray-700 mb-1">Nombre d'essais maximum</label>
                                    <input type="number" id="maxAttempts" name="maxAttempts" min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: 2">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="totalQuestions" class="block text-sm font-medium text-gray-700 mb-1">Nombre total de questions</label>
                                    <input type="number" id="totalQuestions" name="totalQuestions" min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: 15">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="quizStatus" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                                    <select id="quizStatus" name="quizStatus" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="draft">Brouillon</option>
                                        <option value="active">Actif</option>
                                        <option value="inactive">Inactif</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Form Page 3 -->
                    <div id="formPage3" class="form-page hidden">
                        <form>
                            <div class="grid grid-cols-1 gap-6">
                                <div class="mb-4">
                                    <label for="timeLimit" class="block text-sm font-medium text-gray-700 mb-1">Limite de temps par question (en secondes)</label>
                                    <input type="number" id="timeLimit" name="timeLimit" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ex: 60 (0 pour aucune limite)">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="randomOrder" class="block text-sm font-medium text-gray-700 mb-1">Options avancées</label>
                                    <div class="mt-2">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="randomOrder" name="randomOrder" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                            <label for="randomOrder" class="ml-2 block text-sm text-gray-700">Questions en ordre aléatoire</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="instantFeedback" name="instantFeedback" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="instantFeedback" class="ml-2 block text-sm text-gray-700">Feedback instantané après chaque question</label>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="requireAllQuestions" name="requireAllQuestions" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="requireAllQuestions" class="ml-2 block text-sm text-gray-700">Exiger que toutes les questions soient répondues</label>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="completionMessage" class="block text-sm font-medium text-gray-700 mb-1">Message de fin de quiz</label>
                                    <textarea id="completionMessage" name="completionMessage" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Message affiché lorsque le candidat termine le quiz..."></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="flex items-center justify-between p-5 border-t">
                    <button id="prevBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 hidden">
                        <i class="fas fa-arrow-left mr-2"></i>Précédent
                    </button>
                    <div class="flex-grow"></div>
                    <button id="nextBtn" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Suivant<i class="fas fa-arrow-right ml-2"></i>
                    </button>
                    <button id="doneBtn" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 hidden">
                        Terminer<i class="fas fa-check ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 overflow-y-auto z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black opacity-50"></div>
            <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full z-50 p-6">
                <div class="flex flex-col items-center text-center">
                    <div class="text-red-500 mb-4">
                        <i class="fas fa-exclamation-triangle text-5xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Confirmer la suppression</h3>
                    <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer ce quiz ? Cette action est irréversible.</p>
                    <div class="flex space-x-4">
                        <button id="cancelDeleteBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                            Annuler
                        </button>
                        <button id="confirmDeleteBtn" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile sidebar functionality
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.hidden.md\\:flex.flex-col.w-64');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (sidebar.classList.contains('hidden')) {
                // Show sidebar for mobile
                sidebar.classList.remove('hidden');
                sidebar.classList.add('flex', 'fixed', 'left-0', 'top-0', 'h-full', 'z-30');
                // Show overlay
                overlay.classList.remove('hidden');
            } else {
                // Hide sidebar
                sidebar.classList.add('hidden');
                sidebar.classList.remove('flex', 'fixed', 'left-0', 'top-0', 'h-full', 'z-30');
                // Hide overlay
                overlay.classList.add('hidden');
            }
        });

        // Close sidebar with X button
        // Close sidebar with X button
document.getElementById('closeSidebar').addEventListener('click', function() {
    const sidebar = document.querySelector('.md\\:flex.flex-col.w-64');
    const overlay = document.getElementById('sidebarOverlay');
    
    sidebar.classList.add('hidden');
    sidebar.classList.remove('flex', 'fixed', 'left-0', 'top-0', 'h-full', 'z-30');
    overlay.classList.add('hidden');
});

// Profile dropdown toggle
document.getElementById('profileDropdown').addEventListener('click', function() {
    const dropdown = document.getElementById('profileMenu');
    dropdown.classList.toggle('hidden');
});

// Settings dropdown toggle in sidebar
document.getElementById('settingsDropdownToggle').addEventListener('click', function(e) {
    e.preventDefault();
    const dropdown = document.getElementById('settingsDropdown');
    dropdown.classList.toggle('hidden');
});

// Close the dropdowns when clicking outside
document.addEventListener('click', function(event) {
    // For profile dropdown
    const profileDropdown = document.getElementById('profileMenu');
    const profileButton = document.getElementById('profileDropdown');
    if (profileDropdown && !profileDropdown.contains(event.target) && !profileButton.contains(event.target)) {
        profileDropdown.classList.add('hidden');
    }
    
    // For settings dropdown in sidebar
    const settingsDropdown = document.getElementById('settingsDropdown');
    const settingsButton = document.getElementById('settingsDropdownToggle');
    if (settingsDropdown && !settingsDropdown.contains(event.target) && !settingsButton.contains(event.target)) {
        settingsDropdown.classList.add('hidden');
    }
});

// Variables for quiz modal
let currentPage = 1;
const totalPages = 3;

// Create Quiz button opens modal
document.getElementById('createQuizBtn').addEventListener('click', function() {
    openModal();
});

// Empty state create button
const emptyStateBtn = document.getElementById('emptyStateCreateBtn');
if (emptyStateBtn) {
    emptyStateBtn.addEventListener('click', function() {
        openModal();
    });
}

// Close Modal button
document.getElementById('closeModalBtn').addEventListener('click', function() {
    closeModal();
});

// Next button in modal
document.getElementById('nextBtn').addEventListener('click', function() {
    if (currentPage < totalPages) {
        goToPage(currentPage + 1);
    }
});

// Previous button in modal
document.getElementById('prevBtn').addEventListener('click', function() {
    if (currentPage > 1) {
        goToPage(currentPage - 1);
    }
});

// Done button in modal
document.getElementById('doneBtn').addEventListener('click', function() {
    // Here you would normally submit the form
    // For now, just close the modal
    alert('Quiz créé avec succès!');
    closeModal();
});

// Edit Quiz buttons
const editButtons = document.querySelectorAll('.editQuizBtn');
editButtons.forEach(button => {
    button.addEventListener('click', function() {
        const quizId = this.getAttribute('data-id');
        // In a real application, you would fetch the quiz data here
        document.getElementById('modalTitle').textContent = 'Modifier un Quiz';
        openModal();
    });
});

// Delete Quiz buttons
const deleteButtons = document.querySelectorAll('.deleteQuizBtn');
deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
        const quizId = this.getAttribute('data-id');
        document.getElementById('deleteModal').classList.remove('hidden');
        
        // Store the ID for the confirm button to use
        document.getElementById('confirmDeleteBtn').setAttribute('data-id', quizId);
    });
});

// Cancel Delete button
document.getElementById('cancelDeleteBtn').addEventListener('click', function() {
    document.getElementById('deleteModal').classList.add('hidden');
});

// Confirm Delete button
document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    const quizId = this.getAttribute('data-id');
    // In a real application, you would send a DELETE request here
    
    // For demonstration, let's just hide the modal
    document.getElementById('deleteModal').classList.add('hidden');
    alert('Quiz supprimé avec succès!');
    // In a real app, you would refresh the list or remove the element
});

// Helper functions
function openModal() {
    document.getElementById('quizModal').classList.remove('hidden');
    goToPage(1); // Always start at page 1
}

function closeModal() {
    document.getElementById('quizModal').classList.add('hidden');
    // Reset the form when closing
    document.querySelectorAll('.form-page form').forEach(form => {
        form.reset();
    });
}

function goToPage(pageNumber) {
    // Hide all pages
    document.querySelectorAll('.form-page').forEach(page => {
        page.classList.add('hidden');
    });
    
    // Show the current page
    document.getElementById(`formPage${pageNumber}`).classList.remove('hidden');
    
    // Update current page indicator
    document.querySelectorAll('.step-item').forEach((item, index) => {
        if (index + 1 < pageNumber) {
            item.classList.add('active');
            item.querySelector('div').classList.remove('bg-gray-300');
            item.querySelector('div').classList.add('bg-indigo-600');
            item.querySelector('p').classList.remove('text-gray-500');
        } else if (index + 1 === pageNumber) {
            item.classList.add('active');
            item.querySelector('div').classList.remove('bg-gray-300');
            item.querySelector('div').classList.add('bg-indigo-600');
            item.querySelector('p').classList.remove('text-gray-500');
        } else {
            item.classList.remove('active');
            item.querySelector('div').classList.add('bg-gray-300');
            item.querySelector('div').classList.remove('bg-indigo-600');
            item.querySelector('p').classList.add('text-gray-500');
        }
    });
    
    // Update progress bars
    if (pageNumber > 1) {
        document.querySelector('.step-bar-1').style.width = '100%';
    } else {
        document.querySelector('.step-bar-1').style.width = '0%';
    }
    
    if (pageNumber > 2) {
        document.querySelector('.step-bar-2').style.width = '100%';
    } else {
        document.querySelector('.step-bar-2').style.width = '0%';
    }
    
    // Show/hide Previous button
    if (pageNumber > 1) {
        document.getElementById('prevBtn').classList.remove('hidden');
    } else {
        document.getElementById('prevBtn').classList.add('hidden');
    }
    
    // Show/hide Next button & Done button
    if (pageNumber === totalPages) {
        document.getElementById('nextBtn').classList.add('hidden');
        document.getElementById('doneBtn').classList.remove('hidden');
    } else {
        document.getElementById('nextBtn').classList.remove('hidden');
        document.getElementById('doneBtn').classList.add('hidden');
    }
    
    // Update the current page variable
    currentPage = pageNumber;
}
        </script>
        </body>
        </html>