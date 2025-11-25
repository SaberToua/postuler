<?php use Illuminate\Support\Facades\Auth; ?>

<nav x-data="{ open: false }" aria-label="Main navigation" class="bg-white border-b border-gray-100 shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <x-nav-link :href="route('dashboard')" class="p-2">
                        <x-application-logo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </x-nav-link>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:flex sm:ms-8">
                    <x-nav-link :href="route('dashboard')" 
                               title="Dashboard" 
                               class="flex items-center gap-2 px-3 py-2 rounded-lg transition-all duration-200 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                               :active="request()->routeIs('dashboard')">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6z"/>
                        </svg>
                        <span class="font-medium">{{ __('Dashboard') }}</span>
                    </x-nav-link>

                    <x-nav-link :href="route('offre.create')"
                               title="Home" 
                               class="flex items-center gap-2 px-3 py-2 rounded-lg transition-all duration-200 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                               :active="request()->routeIs('offre.create')">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M4 21V9l8-6l8 6v12h-6v-7h-4v7z"/>
                        </svg>
                        <span class="font-medium">{{ __('Home') }}</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side Navigation -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                @auth
                <div class="hidden sm:block">
                    @include('notifications')
                </div>
                @endauth

                <!-- Dark Mode Toggle -->
                <div class="hidden sm:block">
                    @include('mode')
                </div>

                <!-- Admin/Workowner Links - Desktop -->
                @if(Auth::check() && Auth::user()->isworkowner)
                    @php $id = auth()->user()->id @endphp
                    <div class="hidden sm:flex items-center space-x-3">
                        <a href="{{ route('offre.show', $id) }}" 
                           title="Show candidates for your offers"
                           class="flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                                <circle cx="22" cy="24" r="2" fill="currentColor"/>
                                <path fill="currentColor" d="M29.777 23.479A8.64 8.64 0 0 0 22 18a8.64 8.64 0 0 0-7.777 5.479L14 24l.223.522A8.64 8.64 0 0 0 22 30a8.64 8.64 0 0 0 7.777-5.478L30 24zM22 28a4 4 0 1 1 4-4a4.005 4.005 0 0 1-4 4M7 17h5v2H7zm0-5h12v2H7zm0-5h12v2H7z"/>
                                <path fill="currentColor" d="M22 2H4a2.006 2.006 0 0 0-2 2v24a2.006 2.006 0 0 0 2 2h8v-2H4V4h18v11h2V4a2.006 2.006 0 0 0-2-2"/>
                            </svg>
                            <span>Candidates</span>
                        </a>

                        <a href="{{ route('offre.youroffres', $id) }}"
                           title="View your offers"
                           class="flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M39.546 13.97L19.17 6.553a1.606 1.606 0 0 0-2.058.96h0L7.497 33.928a1.606 1.606 0 0 0 .96 2.058q0 0 0 0l20.377 7.417a1.606 1.606 0 0 0 2.058-.96q0 0 0 0l9.614-26.415a1.606 1.606 0 0 0-.96-2.058q0 0 0 0m-3.194-1.163l.469-2.656a1.606 1.606 0 0 0-1.303-1.86h0L14.163 4.524a1.606 1.606 0 0 0-1.861 1.303h0L7.421 33.51c-.04.227-.03.46.027.682m4.737-27.71H9.003c-.887 0-1.607.72-1.607 1.607v28.109c0 .887.72 1.606 1.607 1.606h4.448M32.25 7.712a1.606 1.606 0 0 0-1.562-1.23h-5.424"/>
                            </svg>
                            <span>Your Offers</span>
                        </a>
                    </div>
                @endif

                @if(Auth::check() && auth()->user()->role == 'admin')
                    <div class="hidden sm:flex items-center space-x-3">
                        <a href="{{ route('all-users') }}"
                           title="Managing Users"
                           class="flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <circle cx="10" cy="8" r="2" fill="currentColor" opacity="0.3"/>
                                <path fill="currentColor" d="M10 16c0-.34.03-.67.08-.99c-.03-.01-.05-.01-.08-.01c-1.97 0-3.9.53-5.59 1.54c-.25.14-.41.46-.41.81V18h6.29c-.19-.63-.29-1.3-.29-2" opacity="0.3"/>
                                <path fill="currentColor" d="M4 18v-.65c0-.34.16-.66.41-.81C6.1 15.53 8.03 15 10 15c.03 0 .05 0 .08.01c.1-.7.3-1.37.59-1.98c-.22-.02-.44-.03-.67-.03c-2.42 0-4.68.67-6.61 1.82c-.88.52-1.39 1.5-1.39 2.53V20h9.26c-.42-.6-.75-1.28-.97-2zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4m0-6c1.1 0 2 .9 2 2s-.9 2-2 2s-2-.9-2-2s.9-2 2-2m10.83 6.63l-1.45.49q-.48-.405-1.08-.63L18 11h-2l-.3 1.49q-.6.225-1.08.63l-1.45-.49l-1 1.73l1.14 1c-.03.21-.06.41-.06.63s.03.42.06.63l-1.14 1l1 1.73l1.45-.49q.48.405 1.08.63L16 21h2l.3-1.49q.6-.225 1.08-.63l1.45.49l1-1.73l-1.14-1c.03-.21.06-.41.06-.63s-.03-.42-.06-.63l1.14-1zM17 18c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2"/>
                            </svg>
                            <span>Manage Users</span>
                        </a>

                        <a href="{{ route('offre.all') }}"
                           title="Managing Offers"
                           class="flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path fill="currentColor" d="M16 21a5 5 0 1 1 0-10a5 5 0 0 1 0 10m0-8a3 3 0 1 0 0 6a3 3 0 0 0 0-6"/>
                                <path fill="currentColor" d="M20 32h-8v-4.06a1 1 0 0 0-1.61-.67l-2.88 2.87l-5.65-5.65l2.87-2.87a.92.92 0 0 0 .2-1a.93.93 0 0 0-.86-.6H0V12h4.06a.92.92 0 0 0 .85-.58a.94.94 0 0 0-.19-1L1.86 7.51l5.65-5.65l2.87 2.87A1 1 0 0 0 12 4.06V0h8v4.06a1 1 0 0 0 1.61.67l2.87-2.87l5.66 5.66l-2.87 2.87a.92.92 0 0 0-.2 1a.93.93 0 0 0 .86.6H32v8h-4.06a.92.92 0 0 0-.85.58a.94.94 0 0 0 .19 1l2.87 2.87l-5.66 5.66l-2.87-2.87a1 1 0 0 0-1.61.67zm-6-2h4v-2.06a3 3 0 0 1 5-2.08l1.46 1.46l2.83-2.83L25.86 23a3 3 0 0 1 2.08-5H30v-4h-2.06a3 3 0 0 1-2.08-5l1.46-1.46l-2.83-2.85L23 6.14a3 3 0 0 1-5-2.08V2h-4v2.06a3 3 0 0 1-5 2.08L7.51 4.69L4.69 7.51L6.14 9a3 3 0 0 1-2.08 5H2v4h2.06a3 3 0 0 1 2.08 5l-1.45 1.49l2.83 2.83L9 25.86a3 3 0 0 1 5 2.08z"/>
                            </svg>
                            <span>Manage Offers</span>
                        </a>

                        <a href="{{ route('cvs') }}"
                           title="Filter CVs and candidates"
                           class="flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path fill="currentColor" d="M15 20H9a3 3 0 0 0-3 3v2h2v-2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2h2v-2a3 3 0 0 0-3-3m-3-1a4 4 0 1 0-4-4a4 4 0 0 0 4 4m0-6a2 2 0 1 1-2 2a2 2 0 0 1 2-2"/>
                                <path fill="currentColor" d="M28 19v9H4V8h12V6H4a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h24a2 2 0 0 0 2-2v-9Z"/>
                                <path fill="currentColor" d="M20 19h6v2h-6zm2 4h4v2h-4zm10-13V8h-2.101a5 5 0 0 0-.732-1.753l1.49-1.49l-1.414-1.414l-1.49 1.49A5 5 0 0 0 26 4.101V2h-2v2.101a5 5 0 0 0-1.753.732l-1.49-1.49l-1.414 1.414l1.49 1.49A5 5 0 0 0 20.101 8H18v2h2.101a5 5 0 0 0 .732 1.753l-1.49 1.49l1.414 1.414l1.49-1.49a5 5 0 0 0 1.753.732V16h2v-2.101a5 5 0 0 0 1.753-.732l1.49 1.49l1.414-1.414l-1.49-1.49A5 5 0 0 0 29.899 10zm-7 2a3 3 0 1 1 3-3a3.003 3.003 0 0 1-3 3"/>
                            </svg>
                            <span>CVs Filter</span>
                        </a>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-2">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white dark:bg-gray-800 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                @auth <div class="font-medium">{{ Auth::user()->name }}</div> @endauth
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.update')" class="flex items-center gap-2">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" fill-rule="evenodd" d="M256 42.667A213.333 213.333 0 0 1 469.334 256c0 117.821-95.513 213.334-213.334 213.334c-117.82 0-213.333-95.513-213.333-213.334C42.667 138.18 138.18 42.667 256 42.667m21.334 234.667h-42.667c-52.815 0-98.158 31.987-117.715 77.648c30.944 43.391 81.692 71.685 139.048 71.685s108.104-28.294 139.049-71.688c-19.557-45.658-64.9-77.645-117.715-77.645M256 106.667c-35.346 0-64 28.654-64 64s28.654 64 64 64s64-28.654 64-64s-28.653-64-64-64"/>
                                </svg>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" 
                                               class="flex items-center gap-2"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M3 21V3h9v2H5v14h7v2zm13-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z"/>
                                    </svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            @endauth
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden">
                    <button @click="open = ! open" 
                            aria-controls="responsive-menu" 
                            :aria-expanded="open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        <span class="sr-only">Toggle navigation</span>
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div id="responsive-menu" 
         :aria-hidden="!open" 
         :class="{'block': open, 'hidden': ! open}" 
         class="hidden sm:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
         
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('offre.create')" :active="request()->routeIs('offre.create')">
                {{ __('Home') }}
            </x-responsive-nav-link>

            <!-- Mobile Notifications & Dark Mode -->
            <div class="px-4 py-2 flex items-center justify-between border-t border-gray-200 dark:border-gray-700">
                @auth
                <div class="flex-1">
                    @include('notifications')
                </div>
                @endauth
                <div class="flex-1 flex justify-end">
                    @include('mode')
                </div>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
            </div>
            @endauth

            <div class="mt-3 space-y-1 px-2">
                @auth
                <x-responsive-nav-link :href="route('profile.update')" class="flex items-center gap-2">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" fill-rule="evenodd" d="M256 42.667A213.333 213.333 0 0 1 469.334 256c0 117.821-95.513 213.334-213.334 213.334c-117.82 0-213.333-95.513-213.333-213.334C42.667 138.18 138.18 42.667 256 42.667m21.334 234.667h-42.667c-52.815 0-98.158 31.987-117.715 77.648c30.944 43.391 81.692 71.685 139.048 71.685s108.104-28.294 139.049-71.688c-19.557-45.658-64.9-77.645-117.715-77.645M256 106.667c-35.346 0-64 28.654-64 64s28.654 64 64 64s64-28.654 64-64s-28.653-64-64-64"/>
                    </svg>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" 
                                         class="flex items-center gap-2"
                                         onclick="event.preventDefault(); this.closest('form').submit();">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M3 21V3h9v2H5v14h7v2zm13-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z"/>
                        </svg>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Mobile Admin/Workowner Links -->
                @if(Auth::user()->isworkowner)
                    @php $id = auth()->user()->id @endphp
                    <x-responsive-nav-link :href="route('offre.show', $id)" class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                            <circle cx="22" cy="24" r="2" fill="currentColor"/>
                            <path fill="currentColor" d="M29.777 23.479A8.64 8.64 0 0 0 22 18a8.64 8.64 0 0 0-7.777 5.479L14 24l.223.522A8.64 8.64 0 0 0 22 30a8.64 8.64 0 0 0 7.777-5.478L30 24zM22 28a4 4 0 1 1 4-4a4.005 4.005 0 0 1-4 4M7 17h5v2H7zm0-5h12v2H7zm0-5h12v2H7z"/>
                            <path fill="currentColor" d="M22 2H4a2.006 2.006 0 0 0-2 2v24a2.006 2.006 0 0 0 2 2h8v-2H4V4h18v11h2V4a2.006 2.006 0 0 0-2-2"/>
                        </svg>
                        Candidates
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('offre.youroffres', $id)" class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M39.546 13.97L19.17 6.553a1.606 1.606 0 0 0-2.058.96h0L7.497 33.928a1.606 1.606 0 0 0 .96 2.058q0 0 0 0l20.377 7.417a1.606 1.606 0 0 0 2.058-.96q0 0 0 0l9.614-26.415a1.606 1.606 0 0 0-.96-2.058q0 0 0 0m-3.194-1.163l.469-2.656a1.606 1.606 0 0 0-1.303-1.86h0L14.163 4.524a1.606 1.606 0 0 0-1.861 1.303h0L7.421 33.51c-.04.227-.03.46.027.682m4.737-27.71H9.003c-.887 0-1.607.72-1.607 1.607v28.109c0 .887.72 1.606 1.607 1.606h4.448M32.25 7.712a1.606 1.606 0 0 0-1.562-1.23h-5.424"/>
                        </svg>
                        Your Offers
                    </x-responsive-nav-link>
                @endif

                @if(auth()->user()->role == 'admin')
                    <x-responsive-nav-link :href="route('all-users')" class="flex items-center gap-2">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <circle cx="10" cy="8" r="2" fill="currentColor" opacity="0.3"/>
                            <path fill="currentColor" d="M10 16c0-.34.03-.67.08-.99c-.03-.01-.05-.01-.08-.01c-1.97 0-3.9.53-5.59 1.54c-.25.14-.41.46-.41.81V18h6.29c-.19-.63-.29-1.3-.29-2" opacity="0.3"/>
                            <path fill="currentColor" d="M4 18v-.65c0-.34.16-.66.41-.81C6.1 15.53 8.03 15 10 15c.03 0 .05 0 .08.01c.1-.7.3-1.37.59-1.98c-.22-.02-.44-.03-.67-.03c-2.42 0-4.68.67-6.61 1.82c-.88.52-1.39 1.5-1.39 2.53V20h9.26c-.42-.6-.75-1.28-.97-2zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4m0-6c1.1 0 2 .9 2 2s-.9 2-2 2s-2-.9-2-2s.9-2 2-2m10.83 6.63l-1.45.49q-.48-.405-1.08-.63L18 11h-2l-.3 1.49q-.6.225-1.08.63l-1.45-.49l-1 1.73l1.14 1c-.03.21-.06.41-.06.63s.03.42.06.63l-1.14 1l1 1.73l1.45-.49q.48.405 1.08.63L16 21h2l.3-1.49q.6-.225 1.08-.63l1.45.49l1-1.73l-1.14-1c.03-.21.06-.41.06-.63s-.03-.42-.06-.63l1.14-1zM17 18c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2"/>
                        </svg>
                        Manage Users
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('offre.all')" class="flex items-center gap-2">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path fill="currentColor" d="M16 21a5 5 0 1 1 0-10a5 5 0 0 1 0 10m0-8a3 3 0 1 0 0 6a3 3 0 0 0 0-6"/>
                            <path fill="currentColor" d="M20 32h-8v-4.06a1 1 0 0 0-1.61-.67l-2.88 2.87l-5.65-5.65l2.87-2.87a.92.92 0 0 0 .2-1a.93.93 0 0 0-.86-.6H0V12h4.06a.92.92 0 0 0 .85-.58a.94.94 0 0 0-.19-1L1.86 7.51l5.65-5.65l2.87 2.87A1 1 0 0 0 12 4.06V0h8v4.06a1 1 0 0 0 1.61.67l2.87-2.87l5.66 5.66l-2.87 2.87a.92.92 0 0 0-.2 1a.93.93 0 0 0 .86.6H32v8h-4.06a.92.92 0 0 0-.85.58a.94.94 0 0 0 .19 1l2.87 2.87l-5.66 5.66l-2.87-2.87a1 1 0 0 0-1.61.67zm-6-2h4v-2.06a3 3 0 0 1 5-2.08l1.46 1.46l2.83-2.83L25.86 23a3 3 0 0 1 2.08-5H30v-4h-2.06a3 3 0 0 1-2.08-5l1.46-1.46l-2.83-2.85L23 6.14a3 3 0 0 1-5-2.08V2h-4v2.06a3 3 0 0 1-5 2.08L7.51 4.69L4.69 7.51L6.14 9a3 3 0 0 1-2.08 5H2v4h2.06a3 3 0 0 1 2.08 5l-1.45 1.49l2.83 2.83L9 25.86a3 3 0 0 1 5 2.08z"/>
                        </svg>
                        Manage Offers
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('cvs')" class="flex items-center gap-2">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path fill="currentColor" d="M15 20H9a3 3 0 0 0-3 3v2h2v-2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2h2v-2a3 3 0 0 0-3-3m-3-1a4 4 0 1 0-4-4a4 4 0 0 0 4 4m0-6a2 2 0 1 1-2 2a2 2 0 0 1 2-2"/>
                            <path fill="currentColor" d="M28 19v9H4V8h12V6H4a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h24a2 2 0 0 0 2-2v-9Z"/>
                            <path fill="currentColor" d="M20 19h6v2h-6zm2 4h4v2h-4zm10-13V8h-2.101a5 5 0 0 0-.732-1.753l1.49-1.49l-1.414-1.414l-1.49 1.49A5 5 0 0 0 26 4.101V2h-2v2.101a5 5 0 0 0-1.753.732l-1.49-1.49l-1.414 1.414l1.49 1.49A5 5 0 0 0 20.101 8H18v2h2.101a5 5 0 0 0 .732 1.753l-1.49 1.49l1.414 1.414l1.49-1.49a5 5 0 0 0 1.753.732V16h2v-2.101a5 5 0 0 0 1.753-.732l1.49 1.49l1.414-1.414l-1.49-1.49A5 5 0 0 0 29.899 10zm-7 2a3 3 0 1 1 3-3a3.003 3.003 0 0 1-3 3"/>
                        </svg>
                        CVs Filter
                    </x-responsive-nav-link>
                @endif
                @endauth
            </div>
        </div>
    </div>
</nav>