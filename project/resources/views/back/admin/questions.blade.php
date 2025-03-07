<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Questions</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar from Statistics page -->
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
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-800 text-indigo-200 hover:text-white border-l-4 border-transparent hover:border-indigo-400 pr-6">
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
                        <a href="questions" id="questionsDropdownToggle" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-800 text-white border-l-4 border-indigo-400 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-clipboard-list w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Questions</span>
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
                    <h2 class="text-lg font-semibold ml-4">Questions</h2>
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
                    <!-- Page Title and Action -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-800">Gestion des Questions</h1>
                            <p class="text-sm text-gray-600">Liste et gestion des questions de quiz</p>
                        </div>
                        <button id="createQuestionBtn" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded">
                            <i class="fas fa-plus mr-2"></i>Créer une Question
                        </button>
                    </div>

                    <!-- Questions List -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($questions as $question)
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $question->content }}</h3>
                                    <div class="flex space-x-2">
                                        <button class="text-blue-500 hover:text-blue-600">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form method="POST" action="{{ route('questions.destroy', $question->id) }}" class="inline" 
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette question?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    @foreach($question->answers as $answer)
                                    <div class="flex items-center">
                                        <span class="inline-flex justify-center items-center mr-2 {{ $answer->is_correct ? 'text-green-500' : 'text-gray-400' }}">
                                            <i class="{{ $answer->is_correct ? 'fas fa-check' : 'fas fa-times' }}"></i>
                                        </span>
                                        <span class="text-gray-700">{{ $answer->content }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>

        <div id="createQuestionModal" class="fixed inset-0 z-50 hidden items-center justify-center">
            <div class="bg-white rounded-lg shadow-xl p-6 w-11/12 max-w-md">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Créer une Question</h2>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form method="POST" action="{{ route('questions.store') }}">
                        @csrf <!-- Protects against CSRF attacks -->

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                                Question
                            </label>
                            <input type="text" name="content" id="content" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre question">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Points
                            </label>
                            <input type="number" name="points" id="points" required min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nombre de points">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Réponses
                            </label>

                            <!-- Answer 1 -->
                            <div class="flex items-center">
                                <input type="text" name="answers[0][content]" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Première réponse">
                                <input type="radio" name="correct_answer" value="0" required class="ml-2"> <!-- Select correct answer -->
                            </div>

                            <!-- Answer 2 -->
                            <div class="flex items-center mt-2">
                                <input type="text" name="answers[1][content]" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Deuxième réponse">
                                <input type="radio" name="correct_answer" value="1" required class="ml-2">
                            </div>

                            <!-- Answer 3 -->
                            <div class="flex items-center mt-2">
                                <input type="text" name="answers[2][content]" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Troisième réponse">
                                <input type="radio" name="correct_answer" value="2" required class="ml-2">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Créer
                            </button>
                        </div>
                    </form>

            </div>
        </div>
    </div>

    <script>
        // Mobile sidebar functionality from Statistics page
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.hidden.md\\:flex.flex-col.w-64');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (sidebar.classList.contains('hidden')) {
                // Show sidebar for mobile
                sidebar.classList.remove('hidden');
                sidebar.classList.add('flex', 'fixed', 'left-0', 'top-0', 'h-full', 'z-30');
                // Show overlay (but don't darken content)
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
        document.getElementById('closeSidebar').addEventListener('click', function() {
            const sidebar = document.querySelector('.md\\:flex.flex-col.w-64');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.add('hidden');
            sidebar.classList.remove('flex', 'fixed', 'left-0', 'top-0', 'h-full', 'z-30');
            overlay.classList.add('hidden');
        });

        // Close sidebar when clicking on overlay
        document.getElementById('sidebarOverlay').addEventListener('click', function() {
            const sidebar = document.querySelector('.md\\:flex.flex-col.w-64');
            sidebar.classList.add('hidden');
            sidebar.classList.remove('flex', 'fixed', 'left-0', 'top-0', 'h-full', 'z-30');
            this.classList.add('hidden');
        });

        // Profile dropdown toggle
        document.getElementById('profileDropdown').addEventListener('click', function() {
            const dropdown = document.getElementById('profileMenu');
            dropdown.classList.toggle('hidden');
        });

        // Settings dropdown toggle in sidebar (from Statistics page)
        document.getElementById('settingsDropdownToggle').addEventListener('click', function(e) {
            e.preventDefault();
            const dropdown = document.getElementById('settingsDropdown');
            dropdown.classList.toggle('hidden');
        });

        // Create Question Modal
        const createQuestionBtn = document.getElementById('createQuestionBtn');
        const createQuestionModal = document.getElementById('createQuestionModal');
        const closeModalBtn = document.getElementById('closeModalBtn');

        createQuestionBtn.addEventListener('click', () => {
            createQuestionModal.classList.remove('hidden');
            createQuestionModal.classList.add('flex');
        });

        closeModalBtn.addEventListener('click', () => {
            createQuestionModal.classList.add('hidden');
            createQuestionModal.classList.remove('flex');
        });

        // Close modal when clicking outside
        createQuestionModal.addEventListener('click', (e) => {
            if (e.target === createQuestionModal) {
                createQuestionModal.classList.add('hidden');
                createQuestionModal.classList.remove('flex');
            }
        });

        // Close the dropdowns when clicking outside (from Statistics page)
        document.addEventListener('click', function(event) {
            // For profile dropdown
            const profileDropdown = document.getElementById('profileMenu');
            const profileButton = document.getElementById('profileDropdown');
            if (profileDropdown && !profileDropdown.contains(event.target) && !profileButton.contains(event.target)) {
                profileDropdown.classList.add('hidden');
            }
            
            // For settings dropdown in sidebar (from Statistics page)
            const settingsDropdown = document.getElementById('settingsDropdown');
            const settingsButton = document.getElementById('settingsDropdownToggle');
            if (settingsDropdown && !settingsDropdown.contains(event.target) && !settingsButton.contains(event.target)) {
                settingsDropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>