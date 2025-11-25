<div>
    @use('App\Models\tool')
    <x-app-layout>
        <style>
            img:hover {
                transform: scale(1.2);
                transition: transform 0.3s ease-in-out;
            }
            
            #card:hover {
                transform: translateY(-5px);
                transition: all 0.3s ease-in-out;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }
            
            select option:disabled {
                color: #9CA3AF;
            }
            
            .grid-cols-auto-fit {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
        </style>

        <!-- Header Section -->
        <div class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <!-- Page Title -->
                <div class="flex items-center justify-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                        Job Offers List
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" class="text-indigo-600">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path stroke-dasharray="2" stroke-dashoffset="2" d="M4 5h0.01">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.1s" values="2;0" />
                                </path>
                                <path stroke-dasharray="14" stroke-dashoffset="14" d="M8 5h12">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.1s" dur="0.2s" values="14;0" />
                                </path>
                                <path stroke-dasharray="2" stroke-dashoffset="2" d="M4 10h0.01">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.1s" values="2;0" />
                                </path>
                                <path stroke-dasharray="14" stroke-dashoffset="14" d="M8 10h12">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.2s" values="14;0" />
                                </path>
                                <path stroke-dasharray="2" stroke-dashoffset="2" d="M4 15h0.01">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.1s" values="2;0" />
                                </path>
                                <path stroke-dasharray="14" stroke-dashoffset="14" d="M8 15h12">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="14;0" />
                                </path>
                                <path stroke-dasharray="2" stroke-dashoffset="2" d="M4 20h0.01">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s" dur="0.1s" values="2;0" />
                                </path>
                                <path stroke-dasharray="14" stroke-dashoffset="14" d="M8 20h12">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="1s" dur="0.2s" values="14;0" />
                                </path>
                            </g>
                        </svg>
                    </h1>
                </div>

                <!-- Search and Filter Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
                    <!-- Search Form -->
                    <div class="w-full">
                        <form method="GET">
                            <div class="relative">
                                <x-text-input 
                                    id="search" 
                                    wire:model.debounce.500ms="search" 
                                    class="w-full pl-12 pr-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200" 
                                    type="text" 
                                    name="search" 
                                    :value="old('search')" 
                                    required 
                                    autofocus 
                                    autocomplete="search" 
                                    placeholder="Search for offers..." 
                                />
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l5.6 5.6q.275.275.275.7t-.275.7t-.7.275t-.7-.275l-5.6-5.6q-.75.6-1.725.95T9.5 16m0-2q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14"/>
                                    </svg>
                                </div>
                                <x-input-error :messages="$errors->get('search')" class="mt-2" />
                            </div>
                        </form>
                    </div>

                    <!-- Category Filter -->
                    <div class="w-full">
                        <form id="categoryForm" method="get">
                            <select 
                                wire:model="category" 
                                name="category" 
                                id="category" 
                                class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-gray-700 dark:text-gray-300 transition-all duration-200"
                                onchange="this.form.submit()"
                            >
                                <option disabled selected value="" class="text-gray-400">Filter By Categories</option>
                                <option value="">All Categories</option>
                                @foreach ($catigories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <!-- Region Filter -->
                    <div class="w-full">
                        <select 
                            wire:model="region" 
                            name="region" 
                            class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-gray-700 dark:text-gray-300 transition-all duration-200"
                            onchange="this.form.submit()"
                        >
                            <option disabled selected class="text-gray-400">Filter By Region</option>
                            <option value="">All Regions</option>
                            <option value="Alger" {{ request('region') == "Alger" ? 'selected' : '' }}>Alger</option>
                            <option value="Boumerdes" {{ request('region') == "Boumerdes" ? 'selected' : '' }}>Boumerdes</option>
                            <option value="Annaba" {{ request('region') == "Annaba" ? 'selected' : '' }}>Annaba</option>
                            <option value="Oran" {{ request('region') == "Oran" ? 'selected' : '' }}>Oran</option>
                            <option value="Bejaia" {{ request('region') == "Bejaia" ? 'selected' : '' }}>Bejaia</option>
                            <option value="Setif" {{ request('region') == "Setif" ? 'selected' : '' }}>Setif</option>
                            <option value="Tizi Ouzou" {{ request('region') == "Tizi Ouzou" ? 'selected' : '' }}>Tizi Ouzou</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Job Offers Grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div 
                id="work-offers-list" 
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"
                wire:poll.1s
            >
                @foreach($offres as $offre)
                    <x-card 
                        id="card" 
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-lg transition-all duration-300"
                    >
                        <!-- Card Header with Tools and Dropdown -->
                        <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                            <!-- Tools Icons -->
                            @php
                                $tools = DB::table('tools')
                                    ->join('offer_tools', 'tools.id', '=', 'offer_tools.tool_id')
                                    ->where('offer_tools.offer_id', $offre->id)
                                    ->select('tools.*')
                                    ->get();
                            @endphp
                            
                            <div class="flex gap-2">
                                @php $count = 0; @endphp
                                @foreach ($tools as $tool)
                                    @if($tool && $tool->path)
                                        <img 
                                            src="{{ asset('storage/' . $tool->path) }}" 
                                            alt="{{ $tool->name }}" 
                                            class="w-6 h-6 rounded" 
                                            title="{{ $tool->name }}"
                                        >
                                    @else
                                        <div class="w-6 h-6 bg-gray-200 dark:bg-gray-600 rounded flex items-center justify-center">
                                            <span class="text-xs text-gray-500">?</span>
                                        </div>
                                    @endif
                                    @php $count++; @endphp
                                    @if ($count >= 4)
                                        @break
                                    @endif
                                @endforeach
                            </div>

                            <!-- Dropdown Menu -->
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('offre.workerinput', $offre->id)">
                                        {{ __('Send CV') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </div>

                        <!-- Job Image -->
                        <div class="p-4 flex justify-center">
                            <a href="{{ route('offre.detaille', $offre) }}">
                                <img 
                                    title="Show Offer Details" 
                                    class="w-48 h-32 object-cover rounded-lg"
                                    src="{{ $offre->image ? asset('storage/' . $offre->image) : asset('/images/no-image.png') }}" 
                                    alt="{{ $offre->titre }}"
                                />
                            </a>
                        </div>

                        <!-- Job Details -->
                        <div class="p-4 space-y-3">
                            <!-- Title and Company -->
                            <div class="text-center space-y-2">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white line-clamp-2">
                                    {{ $offre->titre }}
                                </h3>
                                <p class="text-md font-medium text-indigo-600 dark:text-indigo-400">
                                    {{ $offre->company }}
                                </p>
                            </div>

                            <!-- Location -->
                            <div class="flex items-center justify-center gap-2 text-gray-600 dark:text-gray-400">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <circle cx="12" cy="10" r="3"></circle>
                                        <path d="M12 2a8 8 0 0 0-8 8c0 1.892.402 3.13 1.5 4.5L12 22l6.5-7.5c1.098-1.37 1.5-2.608 1.5-4.5a8 8 0 0 0-8-8"></path>
                                    </g>
                                </svg>
                                <span class="text-sm">{{ $offre->lieu }}</span>
                            </div>

                            <!-- Timestamp -->
                            <div class="flex items-center justify-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 2048 2048">
                                    <path fill="currentColor" d="M1792 993q60 41 107 93t81 114t50 131t18 141q0 119-45 224t-124 183t-183 123t-224 46q-91 0-176-27t-156-78t-126-122t-85-157H128V128h256V0h128v128h896V0h128v128h256zM256 256v256h1408V256h-128v128h-128V256H512v128H384V256zm643 1280q-3-31-3-64q0-86 24-167t73-153h-97v-128h128v86q41-51 91-90t108-67t121-42t128-15q100 0 192 33V640H256v896zm573 384q93 0 174-35t142-96t96-142t36-175q0-93-35-174t-96-142t-142-96t-175-36q-93 0-174 35t-142 96t-96 142t-36 175q0 93 35 174t96 142t142 96t175 36m64-512h192v128h-320v-384h128z"/>
                                </svg>
                                <span>{{ $offre->created_at->format('j M Y') }}</span>
                                @unless ($offre->created_at->eq($offre->updated_at))
                                    <span class="flex items-center gap-1">
                                        • <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path fill="currentColor" d="m5 16l-1 4l4-1L18 9l-3-3z" opacity="0.16"/>
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 16l-1 4l4-1L19.586 7.414a2 2 0 0 0 0-2.828l-.172-.172a2 2 0 0 0-2.828 0zM15 6l3 3m-5 11h8"/>
                                            </g>
                                        </svg>
                                        edited
                                    </span>
                                @endunless
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-2 gap-3 pt-4">
                                <a href="mailto:{{ App\Models\User::find($offre->workowner)->email ?? '#' }}"
                                   class="inline-flex items-center justify-center gap-2 px-3 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" fill-rule="evenodd" d="M356.3 234.667q48.224 0 79.707 25.985q15.665 12.992 24.419 31.92q8.907 19.568 8.907 43.147q0 37.374-20.733 59.67q-18.582 19.89-41.926 19.89q-24.88 0-27.337-22.617q-15.358 22.616-41.466 22.616q-21.04 0-33.326-12.19q-13.362-13.154-13.362-36.09q0-15.239 6.067-29.915q6.067-14.678 16.816-25.424q20.426-20.37 52.524-20.37q24.266 0 45.305 7.859l-10.29 66.727q-1.535 9.784-1.535 14.275q0 11.068 9.368 11.068q12.285 0 21.962-14.917q11.825-18.126 11.825-42.988q0-34.166-23.037-53.253q-25.493-21.012-63.274-21.012q-29.18 0-53.137 14.436q-22.577 13.635-33.941 36.892q-9.06 18.928-9.061 42.025q0 43.79 30.408 69.454q26.722 22.616 67.882 22.616q23.496 0 49.759-8.982l4.453 24.701q-27.796 9.144-56.67 9.143q-53.137 0-86.464-30.957q-35.476-32.722-35.476-86.617q0-50.847 33.633-83.569q34.71-33.523 88-33.523m10.75 78.917q-8.753 0-17.354 4.571q-8.6 4.572-14.743 12.592q-12.594 16.2-12.593 36.25q0 11.229 5.528 17.725q5.53 6.495 15.05 6.496q13.823 0 22.884-11.87q4.76-6.095 7.525-23.579l6.45-39.94q-7.832-2.245-12.746-2.245M448 64l.003 187.94a138.8 138.8 0 0 0-42.668-27.978L405.333 128L289.171 228.35a139.1 139.1 0 0 0-35.913 26.293L106.667 128v192l110.377-.001a139 139 0 0 0-3.71 32.001q.001 5.386.404 10.668L64 362.667V64zm-80 42.667H144l112 96z"/>
                                    </svg>
                                    Contact
                                </a>
                                
                                <a href="{{ $offre->site }}" target="_blank"
                                   class="inline-flex items-center justify-center gap-2 px-3 py-2 bg-gray-800 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 text-white text-sm font-medium rounded-lg transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 2.05S16 6 16 12m-5 9.95S8 18 8 12s3-9.95 3-9.95M2.63 15.5H12m-9.37-7h18.74"></path>
                                            <path d="M21.879 17.917c.494.304.463 1.043-.045 1.101l-2.567.291l-1.151 2.312c-.228.459-.933.234-1.05-.334l-1.255-6.116c-.099-.48.333-.782.75-.525z" clip-rule="evenodd"></path>
                                        </g>
                                    </svg>
                                    Website
                                </a>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $offres->links() }}
            </div>
        </div>
    </x-app-layout>
</div>