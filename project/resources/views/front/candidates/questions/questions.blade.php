<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EvalPro - Évaluation des Candidats</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
    }
    
    .answer-option:hover {
      border-color: #4F46E5;
      background-color: #F5F7FF;
    }
    
    .answer-option.selected {
      border-color: #4F46E5;
      background-color: #F5F7FF;
    }
    
    .animation-pulse {
      animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes pulse {
      0%, 100% {
        opacity: 1;
      }
      50% {
        opacity: 0.7;
      }
    }
    
    .progress-container {
      position: relative;
    }
    
    .progress-marker {
      position: absolute;
      top: -10px;
      transform: translateX(-50%);
      z-index: 10;
    }
    
    .progress-label {
      position: absolute;
      top: 15px;
      transform: translateX(-50%);
      font-size: 0.75rem;
      white-space: nowrap;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen">
  <!-- Top Navigation Bar -->
  <nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <!-- Logo -->
          <div class="flex-shrink-0 flex items-center">
            <div class="flex items-center">
              <div class="bg-indigo-600 text-white p-1.5 rounded-md mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <span class="font-bold text-xl text-gray-800">EvalPro</span>
            </div>
          </div>
          
          <!-- Desktop Navigation Links -->
          <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-6">
            <a href="#" class="text-indigo-600 border-b-2 border-indigo-600 px-2 py-5 text-sm font-medium">Évaluation</a>
            <a href="#" class="text-gray-500 hover:text-indigo-600 hover:border-indigo-300 border-b-2 border-transparent px-2 py-5 text-sm font-medium transition-colors">Documents</a>
            <a href="#" class="text-gray-500 hover:text-indigo-600 hover:border-indigo-300 border-b-2 border-transparent px-2 py-5 text-sm font-medium transition-colors">Calendrier</a>
            <a href="#" class="text-gray-500 hover:text-indigo-600 hover:border-indigo-300 border-b-2 border-transparent px-2 py-5 text-sm font-medium transition-colors">Aide</a>
          </div>
        </div>
        
        <!-- User Profile Section -->
        <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
          <button class="bg-gray-50 p-2 rounded-full text-gray-400 hover:text-indigo-500 focus:outline-none transition-colors">
            <span class="sr-only">Notifications</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>
          
          <!-- Profile dropdown -->
          <div class="relative flex items-center">
            <button class="flex text-sm rounded-full focus:outline-none" id="user-menu" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center">
                <span class="text-indigo-800 font-medium">JD</span>
              </div>
            </button>
            <span class="ml-2 text-sm font-medium text-gray-700">{{ $candidate->name ?? 'John Doe' }}</span>
          </div>
        </div>
        
        <!-- Mobile menu button -->
        <div class="flex items-center sm:hidden">
          <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    
    <!-- Mobile menu, show/hide based on menu state -->
    <div class="sm:hidden hidden" id="mobile-menu">
      <div class="pt-2 pb-3 space-y-1">
        <a href="#" class="bg-indigo-50 border-l-4 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 text-base font-medium">Évaluation</a>
        <a href="#" class="border-l-4 border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 text-base font-medium">Documents</a>
        <a href="#" class="border-l-4 border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 text-base font-medium">Calendrier</a>
        <a href="#" class="border-l-4 border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 text-base font-medium">Aide</a>
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
          <button class="ml-auto flex-shrink-0 bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none">
            <span class="sr-only">Notifications</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <div class="container mx-auto px-4 py-8 sm:py-12">
    <!-- Main Content Container -->
    <div class="max-w-4xl mx-auto">
      <!-- Assessment Header with Title and Timer -->
      <div class="mb-10">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
          <div class="flex items-center mb-4 sm:mb-0">
            <div class="bg-indigo-600 text-white p-2 rounded-lg mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Évaluation de Compétences</h1>
          </div>
          <div class="flex items-center">
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded-lg flex items-center animation-pulse">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="font-semibold" id="timer">10:00</span>
            </div>
          </div>
        </div>
        
        <!-- Enhanced Progress Tracking -->
        <div class="mb-8">
          <div class="relative pt-5 pb-8">
            <div class="mb-4 progress-container">
              <!-- Progress Bar -->
              <div class="overflow-hidden h-2 bg-gray-200 rounded-full">
                <div class="h-full bg-indigo-600 rounded-full" style="width: 25%"></div>
              </div>
              
              <!-- Progress Markers -->
              <div class="progress-marker" style="left: 0%">
                <div class="w-5 h-5 rounded-full border-2 border-indigo-600 bg-white"></div>
                <div class="progress-label text-indigo-600 font-medium">Q1</div>
              </div>
              
              <div class="progress-marker" style="left: 33.33%">
                <div class="w-5 h-5 rounded-full border-2 border-gray-300 bg-white"></div>
                <div class="progress-label text-gray-500">Q2</div>
              </div>
              
              <div class="progress-marker" style="left: 66.66%">
                <div class="w-5 h-5 rounded-full border-2 border-gray-300 bg-white"></div>
                <div class="progress-label text-gray-500">Q3</div>
              </div>
              
              <div class="progress-marker" style="left: 100%">
                <div class="w-5 h-5 rounded-full border-2 border-gray-300 bg-white"></div>
                <div class="progress-label text-gray-500">Q4</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Form Wrapper -->
      <form action="{{ route('questionsAndAnswers.store') }}" method="POST" id="quiz-form" class="w-full">
        @csrf
        <input type="hidden" name="question_id" value="{{ $questions->id }}">
        <input type="hidden" name="time_spent" id="time-spent" value="0">
        
        <!-- Question Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8 transition-all hover:shadow-md">
          <!-- Question Header -->
          <div class="p-6 sm:p-8 border-b border-gray-100">
            <div class="flex items-start">
              <div class="flex-shrink-0 bg-indigo-600 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-4">
                1
              </div>
              <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-3">{{$questions->content}}</h2>
                <p class="text-gray-600">Choisissez la meilleure réponse parmi les options ci-dessous.</p>
              </div>
            </div>
          </div>
          
          <!-- Answer Options -->
          <div class="p-6 sm:p-8">
            <div class="space-y-3">
              @foreach($questions->answers as $answer)
                <label class="answer-option block border-2 border-gray-200 rounded-lg p-4 cursor-pointer transition-all hover:shadow-sm">
                  <input type="radio" name="answer_id" value="{{$answer->id}}" class="hidden" required />
                  <div class="flex items-center">
                    <div class="radio-indicator w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center mr-3 transition-colors">
                      <div class="radio-circle w-2.5 h-2.5 bg-indigo-600 rounded-full hidden"></div>
                    </div>
                    <span class="text-gray-800">{{$answer->content}}</span>
                  </div>
                </label>
              @endforeach
            </div>
          </div>
          
          <!-- Question Navigation Footer -->
          <div class="bg-gray-50 p-6 sm:p-8 border-t border-gray-100">
            <div class="flex flex-col sm:flex-row justify-between items-center">
              
              <button type="submit" id="submit-btn" class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg transition-colors font-medium flex items-center justify-center">
                Suivant
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </form>
      
      <!-- Info Card -->
      <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-5 flex">
        <div class="flex-shrink-0 text-indigo-500 mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div>
          <h4 class="text-sm font-medium text-indigo-800 mb-1">Information</h4>
          <p class="text-sm text-indigo-700">
            Votre score sera calculé automatiquement à la fin du quiz. Un score minimum de 70% est requis pour passer à l'étape suivante.
          </p>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenu.classList.toggle('hidden');
    });

    // Answer selection functionality
    const answerOptions = document.querySelectorAll('.answer-option');
    const radioIndicators = document.querySelectorAll('.radio-indicator');
    const radioCircles = document.querySelectorAll('.radio-circle');
    
    document.querySelectorAll('input[name="answer_id"]').forEach(function(radio, index) {
      radio.addEventListener('change', function() {
        // Reset all options
        answerOptions.forEach(option => {
          option.classList.remove('selected');
          option.classList.remove('border-indigo-600');
        });
        
        radioIndicators.forEach(indicator => {
          indicator.classList.remove('border-indigo-600');
        });
        
        radioCircles.forEach(circle => {
          circle.classList.add('hidden');
        });
        
        // Style the selected option
        if (this.checked) {
          answerOptions[index].classList.add('selected');
          answerOptions[index].classList.add('border-indigo-600');
          radioIndicators[index].classList.add('border-indigo-600');
          radioCircles[index].classList.remove('hidden');
        }
      });
    });

    // Timer functionality
    let startTime = Date.now();
    let timerInterval;

    function startTimer(duration, display) {
      let timer = duration, minutes, seconds;
      timerInterval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;
        
        // Update hidden time spent field (in seconds)
        const timeSpent = Math.floor((Date.now() - startTime) / 1000);
        document.getElementById('time-spent').value = timeSpent;

        if (--timer < 0) {
          clearInterval(timerInterval);
          display.textContent = "00:00";
          // Auto-submit when time runs out
          document.getElementById('quiz-form').submit();
        }
        
        // Change timer color when less than 2 minutes remain
        if (timer < 120) {
          display.parentElement.classList.add('bg-red-100');
          display.parentElement.classList.add('border-red-200');
          display.parentElement.classList.add('text-red-700');
          display.parentElement.classList.remove('bg-red-50');
        }
      }, 1000);
    }

    // Start a 10-minute timer (600 seconds)
    window.onload = function () {
      const timerDisplay = document.getElementById('timer');
      startTimer(600, timerDisplay);
    };

    // Form validation and submission
    document.getElementById('quiz-form').addEventListener('submit', function(e) {
      const selectedAnswer = document.querySelector('input[name="answer_id"]:checked');
      
      if (!selectedAnswer) {
        e.preventDefault();
        
        // Create and show a notification
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md shadow-md flex items-center z-50';
        notification.innerHTML = `
          <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
          </svg>
          Veuillez sélectionner une réponse avant de continuer.
        `;
        document.body.appendChild(notification);
        
        // Remove the notification after 3 seconds
        setTimeout(() => {
          notification.style.opacity = '0';
          notification.style.transition = 'opacity 0.5s ease';
          setTimeout(() => {
            notification.remove();
          }, 500);
        }, 3000);
        
        return false;
      }
      
      // Stop the timer when form is submitted
      clearInterval(timerInterval);
      
      // Update final time spent
      const timeSpent = Math.floor((Date.now() - startTime) / 1000);
      document.getElementById('time-spent').value = timeSpent;
      
      return true;
    });
  </script>
</body>
</html>