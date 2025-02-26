<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Statistiques</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
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
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-800 text-white border-l-4 border-indigo-400 pr-6">
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
                    <h2 class="text-lg font-semibold ml-4">Tableau de bord</h2>
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
                    <!-- Page Title and Date -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-800">Statistiques</h1>
                            <p class="text-sm text-gray-600">Vue d'ensemble du processus de recrutement</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <select class="block appearance-none bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option>Aujourd'hui</option>
                                    <option>Cette semaine</option>
                                    <option>Ce mois</option>
                                    <option>Cette année</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded">
                                <i class="fas fa-download mr-2"></i>Exporter
                            </button>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Total Candidates Card -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Total Candidats</p>
                                    <p class="text-3xl font-bold text-gray-800">0</p>
                                </div>
                                <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                                    <i class="fas fa-users text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <span class="text-green-500 text-sm font-semibold flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i>0%
                                    </span>
                                    <span class="text-sm text-gray-500 ml-2">depuis le mois dernier</span>
                                </div>
                            </div>
                        </div>

                        <!-- Quiz Completed Card -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Quiz Complétés</p>
                                    <p class="text-3xl font-bold text-gray-800">0</p>
                                </div>
                                <div class="p-3 rounded-full bg-green-100 text-green-500">
                                    <i class="fas fa-check-circle text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <span class="text-green-500 text-sm font-semibold flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i>0%
                                    </span>
                                    <span class="text-sm text-gray-500 ml-2">depuis le mois dernier</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tests Scheduled Card -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Tests Planifiés</p>
                                    <p class="text-3xl font-bold text-gray-800">0</p>
                                </div>
                                <div class="p-3 rounded-full bg-purple-100 text-purple-500">
                                    <i class="fas fa-calendar-check text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <span class="text-red-500 text-sm font-semibold flex items-center">
                                        <i class="fas fa-arrow-down mr-1"></i>0%
                                    </span>
                                    <span class="text-sm text-gray-500 ml-2">depuis le mois dernier</span>
                                </div>
                            </div>
                        </div>

                        <!-- Success Rate Card -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Taux de Réussite</p>
                                    <p class="text-3xl font-bold text-gray-800">0%</p>
                                </div>
                                <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                                    <i class="fas fa-percentage text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <span class="text-green-500 text-sm font-semibold flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i>0%
                                    </span>
                                    <span class="text-sm text-gray-500 ml-2">depuis le mois dernier</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Candidate Progress Chart -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Progression des Candidats</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-700">Inscription (0)</span>
                                        <span class="text-sm font-medium text-gray-700">0%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 0%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-700">Soumission de Documents (0)</span>
                                        <span class="text-sm font-medium text-gray-700">0%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 0%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-700">Quiz Réussi (0)</span>
                                        <span class="text-sm font-medium text-gray-700">0%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 0%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-700">Test Présentiel Planifié (0)</span>
                                        <span class="text-sm font-medium text-gray-700">0%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 0%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-700">Test Présentiel Réussi (0)</span>
                                        <span class="text-sm font-medium text-gray-700">0%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quiz Results Chart -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Résultats des Quiz</h3>
                            <div class="flex items-center justify-center h-64">
                                <div class="text-center text-gray-500">
                                    <i class="fas fa-chart-pie text-4xl mb-2"></i>
                                    <p>Aucune donnée disponible</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activities Section -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Activités Récentes</h3>
                            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Voir tout</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Candidat</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-center" colspan="4">
                                            <div class="text-sm text-gray-500">Aucune activité récente</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
    </script>
</body>
</html>