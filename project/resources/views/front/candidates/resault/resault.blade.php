<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EvalPro - Résultat d'Évaluation</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          animation: {
            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            'spin-slow': 'spin 8s linear infinite',
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-50 min-h-screen">
  <!-- NavBar -->
  <header class="bg-white shadow-md fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Logo and Brand -->
        <div class="flex items-center">
          <a href="#" class="flex-shrink-0 flex items-center">
            <div class="bg-indigo-600 text-white p-1.5 rounded-md mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <span class="font-bold text-xl text-gray-800">EvalPro</span>
          </a>
          
          <!-- Desktop Navigation Menu -->
          <nav class="hidden sm:ml-8 sm:flex sm:space-x-6">
            <a href="#" class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Accueil</a>
            <a href="#" class="border-b-2 border-indigo-600 text-indigo-600 px-3 py-2 text-sm font-medium">Évaluations</a>
            <a href="#" class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Tableau de Bord</a>
            <a href="#" class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Historique</a>
          </nav>
        </div>
        
        <!-- User Profile and Mobile Menu Button -->
        <div class="flex items-center">
          <!-- Notification Icon -->
          <button class="hidden sm:flex p-2 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="sr-only">Voir les notifications</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>
          
          <!-- Profile Dropdown -->
          <div class="hidden sm:ml-4 sm:flex sm:items-center">
            <button class="bg-white flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center">
                <span class="text-indigo-800 font-medium">JD</span>
              </div>
            </button>
          </div>
          
          <!-- Mobile menu button -->
          <button type="button" class="inline-flex sm:hidden items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" id="mobile-menu-button">
            <span class="sr-only">Ouvrir le menu principal</span>
            <!-- Icon when menu is closed -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" id="menu-closed-icon">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Icon when menu is open -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" id="menu-open-icon">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    
    <!-- Mobile Menu, toggled on button click -->
    <div class="hidden sm:hidden" id="mobile-menu">
      <div class="pt-2 pb-3 space-y-1 border-t border-gray-200">
        <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-700">Accueil</a>
        <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-indigo-700 bg-indigo-50 border-l-4 border-indigo-500">Évaluations</a>
        <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-700">Tableau de Bord</a>
        <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-700">Historique</a>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-200">
        <div class="flex items-center px-4">
          <div class="flex-shrink-0">
            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
              <span class="text-indigo-800 font-medium">JD</span>
            </div>
          </div>
          <div class="ml-3">
            <div class="text-base font-medium text-gray-800">John Doe</div>
            <div class="text-sm font-medium text-gray-500">john.doe@example.com</div>
          </div>
          <button class="ml-auto flex-shrink-0 bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="sr-only">Voir les notifications</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-700">Mon Profil</a>
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-700">Paramètres</a>
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-700">Déconnexion</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="pt-20 pb-12 px-4 sm:px-6 lg:px-8">
    <!-- Page Header -->
    <div class="max-w-7xl mx-auto">
      <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
          <h1 class="text-2xl font-bold leading-tight text-gray-900">Résultat de l'évaluation</h1>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
          <a href="#" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Retour aux évaluations
          </a>
        </div>
      </div>
    </div>
    
    <!-- Result Card Container -->
    <div class="max-w-7xl mx-auto">
      <div class="flex justify-center">
        <div class="w-full max-w-lg lg:w-2/3">
          @if($passed ?? true)
            <!-- Success Result Card -->
            <div class="relative overflow-hidden bg-white rounded-2xl shadow-xl transition-all hover:shadow-2xl">
              <!-- Status Banner -->
              <div class="bg-green-600 h-3 w-full"></div>
              
              <!-- Decorative Elements -->
              <div class="absolute top-10 left-0 w-32 h-32 -ml-16 bg-green-500 opacity-10 rounded-full"></div>
              <div class="absolute bottom-10 right-0 w-32 h-32 -mr-16 bg-green-400 opacity-10 rounded-full"></div>
              
              <!-- Card Content -->
              <div class="px-6 py-8 sm:p-10">
                <div class="flex flex-col items-center text-center">
                  <!-- Result Icon -->
                  <div class="mb-6">
                    <div class="relative inline-flex">
                      <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </div>
                      <!-- Animated Ring -->
                      <div class="absolute inset-0 rounded-full border-4 border-green-200 opacity-30 animate-spin-slow"></div>
                    </div>
                  </div>
                  
                  <!-- Result Title -->
                  <h2 class="text-3xl font-extrabold text-gray-800 mb-2">Félicitations!</h2>
                  
                  <!-- Divider -->
                  <div class="w-16 h-1 bg-green-500 mx-auto my-4 rounded-full"></div>
                  
                  <!-- Result Message -->
                  <p class="text-gray-600 mb-8 text-lg max-w-md">
                    Vous avez réussi l'évaluation <strong class="text-green-600">« {{ $assessment->title ?? 'Compétences techniques' }} »</strong> avec succès.
                  </p>
                  
                  <!-- Score Display -->
                  <div class="mb-8 flex justify-center">
                    <div class="bg-gray-50 rounded-lg px-6 py-4 border border-gray-100 shadow-sm">
                      <div class="flex items-baseline">
                        <span class="text-3xl sm:text-4xl font-bold text-green-600">{{ $score ?? '85' }}</span>
                        <span class="text-xl text-green-600 font-bold">%</span>
                        <span class="ml-2 text-gray-500 text-sm">(Seuil: 70%)</span>
                      </div>
                      <div class="mt-1 text-sm text-gray-500">Score final</div>
                    </div>
                  </div>
                  
                  <!-- Assessment Info -->
                  <div class="grid grid-cols-2 gap-4 w-full max-w-sm mb-8 text-sm text-gray-600">
                    <div class="flex flex-col items-center p-3 bg-gray-50 rounded-lg">
                      <span class="font-medium text-gray-800">Date</span>
                      <span>{{ date('d/m/Y') }}</span>
                    </div>
                  </div>
                  
                  <!-- Action Buttons -->
                  <div class="flex flex-col sm:flex-row gap-3 w-full max-w-md">
                    <a href="#" class="w-full sm:w-1/2 inline-flex justify-center items-center px-5 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                      </svg>
                      Voir certificat
                    </a>
                    <a href="#" class="w-full sm:w-1/2 inline-flex justify-center items-center px-5 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                      </svg>
                      Partager
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @else
            <!-- Failure Result Card -->
            <div class="relative overflow-hidden bg-white rounded-2xl shadow-xl transition-all hover:shadow-2xl">
              <!-- Status Banner -->
              <div class="bg-red-600 h-3 w-full"></div>
              
              <!-- Decorative Elements -->
              <div class="absolute top-10 left-0 w-32 h-32 -ml-16 bg-red-500 opacity-10 rounded-full"></div>
              <div class="absolute bottom-10 right-0 w-32 h-32 -mr-16 bg-red-400 opacity-10 rounded-full"></div>
              
              <!-- Card Content -->
              <div class="px-6 py-8 sm:p-10">
                <div class="flex flex-col items-center text-center">
                  <!-- Result Icon -->
                  <div class="mb-6">
                    <div class="relative inline-flex">
                      <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </div>
                      <!-- Animated Ring -->
                      <div class="absolute inset-0 rounded-full border-4 border-red-200 opacity-30 animate-spin-slow"></div>
                    </div>
                  </div>
                  
                  <!-- Result Title -->
                  <h2 class="text-3xl font-extrabold text-gray-800 mb-2">Échec</h2>
                  
                  <!-- Divider -->
                  <div class="w-16 h-1 bg-red-500 mx-auto my-4 rounded-full"></div>
                  
                  <!-- Result Message -->
                  <p class="text-gray-600 mb-8 text-lg max-w-md">
                    Vous n'avez pas réussi l'évaluation <strong class="text-red-600">« {{ $assessment->title ?? 'Compétences techniques' }} »</strong>.
                  </p>
                  
                  <!-- Score Display -->
                  <div class="mb-8 flex justify-center">
                    <div class="bg-gray-50 rounded-lg px-6 py-4 border border-gray-100 shadow-sm">
                      <div class="flex items-baseline">
                        <span class="text-3xl sm:text-4xl font-bold text-red-600">{{ $score ?? '55' }}</span>
                        <span class="text-xl text-red-600 font-bold">%</span>
                        <span class="ml-2 text-gray-500 text-sm">(Seuil: 70%)</span>
                      </div>
                      <div class="mt-1 text-sm text-gray-500">Score final</div>
                    </div>
                  </div>
                  
                  <!-- Assessment Info -->
                  <div class="grid grid-cols-2 gap-4 w-full max-w-sm mb-8 text-sm text-gray-600">
                    <div class="flex flex-col items-center p-3 bg-gray-50 rounded-lg">
                      <span class="font-medium text-gray-800">Date</span>
                      <span>{{ date('d/m/Y') }}</span>
                    </div>
                    <div class="flex flex-col items-center p-3 bg-gray-50 rounded-lg">
                      <span class="font-medium text-gray-800">Durée</span>
                      <span>{{ $duration ?? '12:10' }}</span>
                    </div>
                  </div>
                  
                  <!-- Action Buttons -->
                  <div class="flex flex-col sm:flex-row gap-3 w-full max-w-md">
                    <a href="#" class="w-full sm:w-1/2 inline-flex justify-center items-center px-5 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                      </svg>
                      Réessayer
                    </a>
                    <a href="#" class="w-full sm:w-1/2 inline-flex justify-center items-center px-5 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      Voir ressources
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </main>
  
  <!-- Footer -->
  <footer class="bg-white border-t border-gray-200">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="flex items-center mb-4 md:mb-0">
          <div class="bg-indigo-600 text-white p-1 rounded-md mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <span class="font-medium text-gray-800">EvalPro</span>
        </div>
        <div class="text-center md:text-right text-sm text-gray-500">
          <p>&copy; 2025 EvalPro. Tous droits réservés.</p>
        </div>
      </div>
    </div>
  </footer>

  <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      const mobileMenu = document.getElementById('mobile-menu');
      const openIcon = document.getElementById('menu-open-icon');
      const closedIcon = document.getElementById('menu-closed-icon');
      
      mobileMenu.classList.toggle('hidden');
      openIcon.classList.toggle('hidden');
      closedIcon.classList.toggle('hidden');
    });
  </script>
</body>
</html>