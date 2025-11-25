<x-app-layout>
    <style>
        .form-section {
            transition: all 0.3s ease-in-out;
        }
        
        .form-section:hover {
            transform: translateY(-2px);
        }
        
        #map {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-600 dark:text-gray-400" />
                    </a>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Publish Job Offer</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Fill in the details below to create your job posting</p>
            </div>

            @php $id = auth()->user()->id; @endphp

            <!-- Main Form -->
            <form method="POST" action="{{ route('offre.store') }}" enctype="multipart/form-data" 
                  class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 lg:p-8">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Basic Information Section -->
                        <div class="form-section bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8t1.175-2.825T12 4t2.825 1.175T16 8t-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z"/>
                                </svg>
                                Basic Information
                            </h2>
                            
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="titre" :value="__('Job Title')" class="font-medium" />
                                    <x-text-input 
                                        id="titre" 
                                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                                        type="text" 
                                        maxlength="255" 
                                        name="titre" 
                                        :value="old('titre')" 
                                        required 
                                        autofocus 
                                        autocomplete="titre" 
                                        placeholder="Enter job title" 
                                    />
                                    <x-input-error :messages="$errors->get('titre')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="company" :value="__('Company Name')" class="font-medium" />
                                    <x-text-input 
                                        id="company" 
                                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                                        type="text" 
                                        name="company" 
                                        maxlength="255" 
                                        :value="old('company')" 
                                        required 
                                        autocomplete="company" 
                                        placeholder="Enter company name" 
                                    />
                                    <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <x-input-label for="category" :value="__('Category')" class="font-medium" />
                                        <select 
                                            name="category" 
                                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                            required
                                        >
                                            <option disabled selected class="text-gray-400">Select Category</option>
                                            @foreach($catigories as $catigory)
                                                <option value="{{ $catigory->id }}" {{ old('category') == $catigory->id ? 'selected' : '' }}>
                                                    {{ $catigory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <x-input-label for="nb_post" :value="__('Number of Posts')" class="font-medium" />
                                        <x-text-input 
                                            id="nb_post" 
                                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                                            type="number" 
                                            name="nb_post" 
                                            :value="old('nb_post')" 
                                            min="1" 
                                            required 
                                            autocomplete="nb_post" 
                                        />
                                        <x-input-error :messages="$errors->get('nb_post')" class="mt-2" />
                                    </div>
                                </div>

                                <div>
                                    <x-input-label for="lieu" :value="__('Region')" class="font-medium" />
                                    <select 
                                        name="lieu" 
                                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        required
                                    >
                                        <option disabled selected class="text-gray-400">Select Region</option>
                                        <option value="Alger" {{ old('lieu') == 'Alger' ? 'selected' : '' }}>Alger</option>
                                        <option value="Boumerdes" {{ old('lieu') == 'Boumerdes' ? 'selected' : '' }}>Boumerdes</option>
                                        <option value="Annaba" {{ old('lieu') == 'Annaba' ? 'selected' : '' }}>Annaba</option>
                                        <option value="Oran" {{ old('lieu') == 'Oran' ? 'selected' : '' }}>Oran</option>
                                        <option value="Bejaia" {{ old('lieu') == 'Bejaia' ? 'selected' : '' }}>Bejaia</option>
                                        <option value="Setif" {{ old('lieu') == 'Setif' ? 'selected' : '' }}>Setif</option>
                                        <option value="Tizi Ouzou" {{ old('lieu') == 'Tizi Ouzou' ? 'selected' : '' }}>Tizi Ouzou</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('lieu')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Job Description Section -->
                        <div class="form-section bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zm4 18H6V4h7v5h5z"/>
                                </svg>
                                Job Description
                            </h2>
                            
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="skills" :value="__('Recommended Skills')" class="font-medium" />
                                    <textarea 
                                        x-data="{ resize: () => { $el.style.height = '80px'; $el.style.height = $el.scrollHeight + 'px' } }"
                                        x-init="resize()"
                                        @input="resize()"
                                        id="skills"
                                        name="skills"
                                        placeholder="List the required skills and qualifications..."
                                        class="block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none"
                                        rows="3"
                                    >{{ old('skills') }}</textarea>
                                </div>

                                <div>
                                    <x-input-label for="works" :value="__('Responsibilities')" class="font-medium" />
                                    <textarea 
                                        x-data="{ resize: () => { $el.style.height = '80px'; $el.style.height = $el.scrollHeight + 'px' } }"
                                        x-init="resize()"
                                        @input="resize()"
                                        id="works"
                                        name="works"
                                        placeholder="Describe the main responsibilities and duties..."
                                        class="block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none"
                                        rows="3"
                                    >{{ old('works') }}</textarea>
                                </div>

                                <div>
                                    <x-input-label for="points" :value="__('Important Notes')" class="font-medium" />
                                    <textarea 
                                        x-data="{ resize: () => { $el.style.height = '80px'; $el.style.height = $el.scrollHeight + 'px' } }"
                                        x-init="resize()"
                                        @input="resize()"
                                        id="points"
                                        name="points"
                                        placeholder="Add any important notes or requirements..."
                                        class="block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none"
                                        rows="3"
                                    >{{ old('points') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Media & Tools Section -->
                        <div class="form-section bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2M8.5 13.5l2.5 3.01L14.5 12l4.5 6H5z"/>
                                </svg>
                                Media & Tools
                            </h2>
                            
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="website" :value="__('Company Website')" class="font-medium" />
                                    <x-text-input 
                                        id="website" 
                                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                                        type="url" 
                                        name="website" 
                                        :value="old('website')" 
                                        autocomplete="website" 
                                        placeholder="https://example.com" 
                                    />
                                    <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="image" :value="__('Company Image')" class="font-medium" />
                                    <div class="mt-1 flex items-center gap-4">
                                        <label for="image" class="cursor-pointer">
                                            <div class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors duration-200 font-medium text-sm">
                                                Choose Image
                                            </div>
                                            <x-text-input 
                                                id="image" 
                                                class="hidden" 
                                                type="file" 
                                                name="image" 
                                                accept=".jfif,.jpg,.png,.svg,.jpeg" 
                                                :value="old('image')" 
                                            />
                                        </label>
                                        <span class="text-sm text-gray-500">Max: 1MB</span>
                                    </div>
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>

                                <!-- Recommended Tools -->
                                <div>
                                    <x-input-label :value="__('Recommended Tools')" class="font-medium mb-2" />
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-48 overflow-y-auto p-2 border border-gray-200 dark:border-gray-600 rounded-lg">
                                        @foreach ($tools as $tool)
                                            <label for="tool-{{ $tool->id }}" class="flex items-center space-x-2 p-2 hover:bg-gray-100 dark:hover:bg-gray-600 rounded cursor-pointer">
                                                <input 
                                                    type="checkbox" 
                                                    name="tools[]" 
                                                    id="tool-{{ $tool->id }}" 
                                                    value="{{ $tool->id }}" 
                                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                >
                                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ $tool->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Additional Tools -->
                                <div class="space-y-3">
                                    <x-input-label :value="__('Additional Tools (Optional)')" class="font-medium" />
                                    <x-text-input 
                                        id="tool1" 
                                        class="block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                                        type="text" 
                                        name="tool1" 
                                        :value="old('tool1')" 
                                        placeholder="Tool 1" 
                                    />
                                    <x-text-input 
                                        id="tool2" 
                                        class="block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                                        type="text" 
                                        name="tool2" 
                                        :value="old('tool2')" 
                                        placeholder="Tool 2" 
                                    />
                                    <x-text-input 
                                        id="tool3" 
                                        class="block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                                        type="text" 
                                        name="tool3" 
                                        :value="old('tool3')" 
                                        placeholder="Tool 3" 
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Location Section -->
                        <div class="form-section bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7m0 9.5a2.5 2.5 0 0 1 0-5a2.5 2.5 0 0 1 0 5"/>
                                </svg>
                                Location
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                Click on the map to set the exact location of your company
                            </p>
                            <div id="map" style="height: 200px; width: 100%;"></div>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                        </div>

                        <!-- Hidden Fields & Submit -->
                        <input type="hidden" name="workowner" value="{{ $id }}">

                        <div class="flex justify-end pt-4">
                            <x-primary-button class="px-8 py-3 text-lg font-semibold rounded-lg">
                                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h8q.425 0 .713.288T14 4t-.288.713T13 5H5v14h14v-8q0-.425.288-.712T20 10t.713.288T21 11v8q0 .825-.587 1.413T19 21zm4-4q-.425 0-.712-.288T8 16t.288-.712T9 15h6q.425 0 .713.288T16 16t-.288.713T15 17zm0-3q-.425 0-.712-.288T8 13t.288-.712T9 12h6q.425 0 .713.288T16 13t-.288.713T15 14zm0-3q-.425 0-.712-.288T8 10t.288-.712T9 9h6q.425 0 .713.288T16 10t-.288.713T15 11zm9-2q-.425 0-.712-.288T17 8V7h-1q-.425 0-.712-.288T15 6t.288-.712T16 5h1V4q0-.425.288-.712T18 3t.713.288T19 4v1h1q.425 0 .713.288T21 6t-.288.713T20 7h-1v1q0 .425-.288.713T18 9"/>
                                </svg>
                                {{ __('Publish Job Offer') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Modal -->
    <x-modal name="seccess" x-data="" :show="session('success')">
        <div class="p-6 bg-green-50 border border-green-200 rounded-lg shadow-md">
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                <h2 class="text-green-700 font-semibold text-2xl">Success ✔</h2>
            </div>
            <p class="mt-3 text-lg text-green-600">
                {{ session('success') ?? 'Job offer published successfully!' }}
            </p>
        </div>
    </x-modal>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image size validation
            document.getElementById('image').addEventListener('change', function(event) {
                var file = event.target.files[0];
                if (file && file.size > 1024 * 1024) {
                    alert('Image size should not exceed 1 MB.');
                    event.target.value = '';
                }
            });

            // Set page title
            document.title = 'Publish Job Offer';
        });
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO_JbB75acgxNQNe7RikwXKqpQMLFd5co&libraries=places"></script>
    <script>
        let map;
        let marker;

        function initMap() {
            // Default center (Algeria)
            const defaultCenter = { lat: 36.7525, lng: 3.0420 };

            map = new google.maps.Map(document.getElementById('map'), {
                center: defaultCenter,
                zoom: 6,
                styles: [
                    {
                        featureType: "all",
                        elementType: "geometry",
                        stylers: [{ color: "#f5f5f5" }]
                    },
                    {
                        featureType: "poi",
                        elementType: "labels",
                        stylers: [{ visibility: "off" }]
                    }
                ]
            });

            // Add click listener to capture coordinates
            map.addListener('click', (e) => {
                const lat = e.latLng.lat();
                const lng = e.latLng.lng();

                // Update hidden inputs
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;

                // Add/update marker
                if (marker) marker.setMap(null);
                marker = new google.maps.Marker({
                    position: { lat, lng },
                    map: map,
                    icon: {
                        url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="%233b82f6" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5a2.5 2.5 0 0 1 0 5z"/></svg>'),
                        scaledSize: new google.maps.Size(32, 32)
                    }
                });

                // Pan to clicked location
                map.panTo({ lat, lng });
            });

            // Add search box functionality
            const input = document.createElement('input');
            input.placeholder = 'Search for location...';
            input.className = 'w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent';
            
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

            searchBox.addListener('places_changed', () => {
                const places = searchBox.getPlaces();
                if (places.length === 0) return;
                
                const place = places[0];
                if (!place.geometry) return;

                map.panTo(place.geometry.location);
                
                // Set coordinates
                const lat = place.geometry.location.lat();
                const lng = place.geometry.location.lng();
                
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;

                // Update marker
                if (marker) marker.setMap(null);
                marker = new google.maps.Marker({
                    position: place.geometry.location,
                    map: map,
                    icon: {
                        url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="%233b82f6" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5a2.5 2.5 0 0 1 0 5z"/></svg>'),
                        scaledSize: new google.maps.Size(32, 32)
                    }
                });
            });
        }

        initMap();
    </script>
</x-app-layout>