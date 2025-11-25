<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title id="title">{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <style>
        img:hover {
            transform: scale(1.2);
            transition: transform 0.3s ease-in-out;
        }
        
        .remove-autocomplete-styles:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px #1f2937 inset !important;
            -webkit-text-fill-color: white !important;
            border: 1px solid #374151 !important;
        }
    </style>
    
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" />
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.jsx') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    
    @viteReactRefresh 
    @php $page = ["one" => 1]; @endphp
    @inertiaHead
    @viteReactRefresh
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="font-sans antialiased dark:bg-gray-900">
    @inertia

    <div id="page" class="min-h-screen bg-gray-50 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-gradient-to-r from-purple-100 to-blue-100 dark:from-gray-800 dark:to-gray-700 shadow-sm">
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Main Content Area -->
        <div class="relative">
            <!-- Back Button & User Welcome -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <!-- Back Button -->
                    <button onclick="window.history.back(); return false;" 
                            title="Go back" 
                            class="inline-flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 text-white rounded-lg transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-fit">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048">
                            <path fill="currentColor" d="M2048 1088H250l787 787l-90 90L6 1024L947 83l90 90l-787 787h1798z"/>
                        </svg>
                        Back
                    </button>

                    <!-- User Welcome & Auth Buttons -->
                    <div class="flex items-center gap-4">
                        @auth
                            <div class="flex items-center gap-3 bg-white dark:bg-gray-800 px-4 py-2 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                                <svg class="w-8 h-8 text-purple-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M22.62 3.783c-1.115-1.811-4.355-2.604-6.713-.265c-.132.135-.306.548.218 1.104c1.097 1.149 6.819 7.046 4.702 12.196c-1.028 2.504-3.953 2.073-5.052-2.076a23.2 23.2 0 0 1-.473-9.367s.105-.394-.065-.52c-.117-.087-.305-.05-.547.33c-.06.096-.048.076-.106.178l-.003.002c-1.622 2.688-3.272 5.874-4.049 7.07c.38-1.803-.101-4.283-.85-6.359l-.142-.375c-.692-1.776-1.524-2.974-1.776-3.245c-.03-.033-.105-.094-.353-.094H.398c-.49 0-.448.412-.293.561c1.862 2.178 7.289 10.343 4.773 18.355c-.194.619.11.944.612.305c2.206-2.81 4.942-7.598 6.925-11.187c-.437 1.245-.822 2.63-1.028 4.083c-.435 3.064.487 5.37 1.162 6.58c.345.619.803.998 1.988.824c6.045-.885 8.06-6.117 8.805-8.77c1.357-4.839.363-7.568-.722-9.33"/>
                                </svg>
                                <span class="font-semibold text-gray-700 dark:text-gray-300">Welcome {{ auth()->user()->name }}</span>
                            </div>
                        @endauth

                        @guest
                            <div class="flex items-center gap-3">
                                <button x-data x-on:click.prevent="$dispatch('open-modal', 'register')" 
                                        title="Create new account" 
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 text-white rounded-lg transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <x-register class="w-5 h-5"/>
                                    Register
                                </button>

                                <button x-data x-on:click.prevent="$dispatch('open-modal', 'login')" 
                                        title="Sign in" 
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 21v-2h7V5h-7V3h7q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm-2-4l-1.375-1.45l2.55-2.55H3v-2h8.175l-2.55-2.55L10 7l5 5z"/>
                                    </svg>
                                    Login
                                </button>
                            </div>
                        @endguest
                    </div>
                </div>

                <!-- Notification & Email Subscription Section -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-8">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                        <!-- Notification Toggle -->
                        <div class="flex items-center gap-4">
                            @auth
                                @php $id = auth()->user()->id @endphp
                                @if(auth()->user()->notified == false)
                                    <div x-data="{ showAccept: true }" class="flex items-center gap-4">
                                        <button x-show="showAccept" 
                                                @click="showAccept = false" 
                                                title="Accept email notifications" 
                                                id="notify"
                                                class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/>
                                                    <path fill="currentColor" d="M12 2a7 7 0 0 0-7 7v3.528a1 1 0 0 1-.105.447l-1.717 3.433A1.1 1.1 0 0 0 4.162 18h15.676a1.1 1.1 0 0 0 .984-1.592l-1.716-3.433a1 1 0 0 1-.106-.447V9a7 7 0 0 0-7-7m0 19a3 3 0 0 1-2.83-2h5.66A3 3 0 0 1 12 21"/>
                                                </g>
                                            </svg>
                                            Enable Notifications
                                        </button>
                                        <button x-show="!showAccept" 
                                                @click="showAccept = true" 
                                                title="Disable email notifications" 
                                                id="unnotify"
                                                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path d="M0 0h24v24H0z"/>
                                                    <path fill="currentColor" d="M14.83 19a3.001 3.001 0 0 1-5.66 0zM12 2a7 7 0 0 1 7 7v3.528a1 1 0 0 0 .106.447l1.716 3.433A1.1 1.1 0 0 1 19.838 18h-.424l1.071 1.071a1 1 0 0 1-1.414 1.414L3.515 4.93a1 1 0 1 1 1.414-1.414l1.392 1.392A6.99 6.99 0 0 1 12.001 2M5.023 8.427L14.596 18H4.162a1.1 1.1 0 0 1-.984-1.592l1.717-3.433A1 1 0 0 0 5 12.528V9q0-.29.023-.573"/>
                                                </g>
                                            </svg>
                                            Disable Notifications
                                        </button>
                                    </div>
                                @else
                                    <button id="unnotify"
                                            title="Disable email notifications" 
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path d="M0 0h24v24H0z"/>
                                                <path fill="currentColor" d="M14.83 19a3.001 3.001 0 0 1-5.66 0zM12 2a7 7 0 0 1 7 7v3.528a1 1 0 0 0 .106.447l1.716 3.433A1.1 1.1 0 0 1 19.838 18h-.424l1.071 1.071a1 1 0 0 1-1.414 1.414L3.515 4.93a1 1 0 1 1 1.414-1.414l1.392 1.392A6.99 6.99 0 0 1 12.001 2M5.023 8.427L14.596 18H4.162a1.1 1.1 0 0 1-.984-1.592l1.717-3.433A1 1 0 0 0 5 12.528V9q0-.29.023-.573"/>
                                            </g>
                                        </svg>
                                        Disable Notifications
                                    </button>
                                @endif
                            @endauth

                            <p class="text-sm text-gray-600 dark:text-gray-400 max-w-md">
                                @auth 
                                    Stay updated with the latest job offers - enable notifications 🔔
                                @else 
                                    Want to get notified about new job offers? Send us your email 💌
                                @endauth
                            </p>
                        </div>

                        <!-- Email Subscription Form -->
                        <form method="get" action="{{ route('mailing') }}" 
                              class="flex-1 max-w-md">
                            <div class="relative">
                                <input class="w-full h-12 px-4 pr-32 bg-gray-800 text-white placeholder-gray-300 rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent remove-autocomplete-styles" 
                                       name="not_email" 
                                       type="email" 
                                       placeholder="Your email..." 
                                       autocomplete="email" 
                                       required>
                                <button class="absolute right-2 top-1/2 -translate-y-1/2 inline-flex items-center gap-2 px-4 py-2 bg-white text-gray-800 hover:bg-gray-100 rounded-md transition-colors duration-200 font-medium text-sm"
                                        name="subscribe" 
                                        type="submit">
                                    <span class="hidden sm:inline">Subscribe</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4">
                                        <path fill="currentColor" d="M23.576 11.999a1.5 1.5 0 0 0-.858-1.354L2.566 1.099A1.498 1.498 0 0 0 .502 2.927l2.433 7.295L13.59 12 2.933 13.776.5 21.07a1.5 1.5 0 0 0 .363 1.535l.067.062a1.5 1.5 0 0 0 1.638.233l20.152-9.545c.522-.249.856-.778.856-1.357"/>
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('not_email')" class="mt-2" />
                        </form>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                {{ $slot }}
            </main>
        </div>

        <!-- Fixed Action Buttons -->
        <div class="fixed bottom-6 right-6 flex flex-col gap-3 z-50">
            <!-- Scroll to Top -->
            <a href="#page" 
               id="btn-scrollup" 
               class="inline-flex items-center justify-center w-12 h-12 bg-gray-800 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 text-white rounded-full shadow-lg transition-all duration-200 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M256 63.6L0 319.6l69.8 69.8L256 203.2l186.2 186.2l69.8-69.8z"/>
                </svg>
            </a>

            <!-- Post Job Button -->
            <a href="{{ route('publish') }}" 
               title="Post job offer" 
               class="inline-flex items-center justify-center gap-2 px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full shadow-lg transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h8q.425 0 .713.288T14 4t-.288.713T13 5H5v14h14v-8q0-.425.288-.712T20 10t.713.288T21 11v8q0 .825-.587 1.413T19 21zm4-4q-.425 0-.712-.288T8 16t.288-.712T9 15h6q.425 0 .713.288T16 16t-.288.713T15 17zm0-3q-.425 0-.712-.288T8 13t.288-.712T9 12h6q.425 0 .713.288T16 13t-.288.713T15 14zm0-3q-.425 0-.712-.288T8 10t.288-.712T9 9h6q.425 0 .713.288T16 10t-.288.713T15 11zm9-2q-.425 0-.712-.288T17 8V7h-1q-.425 0-.712-.288T15 6t.288-.712T16 5h1V4q0-.425.288-.712T18 3t.713.288T19 4v1h1q.425 0 .713.288T21 6t-.288.713T20 7h-1v1q0 .425-.288.713T18 9"/>
                </svg>
                <span class="hidden sm:inline">Post Job</span>
            </a>
        </div>

        <!-- About Us Link -->
        <div class="fixed bottom-6 left-6 z-50">
            <a href="/about" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 text-white rounded-full transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                About Us
            </a>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 dark:bg-gray-900 text-white py-8 mt-16 border-t border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <p class="text-gray-300 font-medium">Copyright &copy; 2025, All Rights reserved</p>
                    <div class="mt-4 md:mt-0">
                        <!-- Additional footer content can go here -->
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/images.js') }}"></script>
    
    <script>
        @auth
        $('#notify').click(function() {
            fetch('notify/{{ $id }}');
            window.alert('You are now subscribed to job offer notifications');
        });

        $('#unnotify').click(function() {
            fetch('unnotify/{{ $id }}');
            window.alert('You have unsubscribed from job offer notifications');
        });
        @endauth

        @if(Auth::check() && !Auth::user()->isworkowner)
        $("#publish").click(function(){
            alert("You are not allowed to post a job offer");
        });
        @endif
    </script>

    @guest
    <!-- Login Modal -->
    <x-modal name="login" :show="$errors->get('email') || $errors->get('password')">
        @include('auth.login')
    </x-modal>

    <!-- Register Modal -->
    <x-modal name="register" :show="$errors->get('Remail') || $errors->get('Rpassword')">
        @include('auth.register')
    </x-modal>
    @endguest

    @livewireScripts
</body>
</html>