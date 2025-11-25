<x-app-layout>


<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-700 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Connecting Tech Talent with Innovation</h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Bridging the gap between exceptional IT professionals and forward-thinking companies
            </p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('register') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                    Find Talent
                </a>
                <a href="{{ route('register') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                    Find Work
                </a>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Mission</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        To revolutionize IT recruitment by creating meaningful connections between top tech talent 
                        and innovative companies. We believe that the right match can transform businesses and 
                        accelerate careers.
                    </p>
                    <p class="text-lg text-gray-600">
                        Through our advanced platform and personalized approach, we're making the hiring process 
                        more efficient, transparent, and human-centric.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <div class="text-blue-600 text-3xl font-bold mb-2">5000+</div>
                        <div class="text-gray-600">Tech Professionals</div>
                    </div>
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <div class="text-purple-600 text-3xl font-bold mb-2">200+</div>
                        <div class="text-gray-600">Partner Companies</div>
                    </div>
                    <div class="bg-green-50 p-6 rounded-lg">
                        <div class="text-green-600 text-3xl font-bold mb-2">85%</div>
                        <div class="text-gray-600">Success Rate</div>
                    </div>
                    <div class="bg-orange-50 p-6 rounded-lg">
                        <div class="text-orange-600 text-3xl font-bold mb-2">24h</div>
                        <div class="text-gray-600">Avg. Response Time</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What Makes Us Different -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Why Choose TechRecruit?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We're not just another recruitment platform. Here's what sets us apart:
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">AI-Powered Matching</h3>
                    <p class="text-gray-600">
                        Our intelligent algorithm matches candidates with opportunities based on skills, culture fit, and career aspirations.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Expert Recruiters</h3>
                    <p class="text-gray-600">
                        Our team includes former tech professionals who understand the industry from the inside out.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Quality Guarantee</h3>
                    <p class="text-gray-600">
                        We thoroughly vet all candidates and companies to ensure only the highest quality opportunities.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Values</h2>
            </div>
            
            <div class="grid md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Transparency</h3>
                    <p class="text-gray-600 text-sm">Clear communication and honest relationships</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Innovation</h3>
                    <p class="text-gray-600 text-sm">Constantly improving our platform and processes</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">People First</h3>
                    <p class="text-gray-600 text-sm">Your success is our success</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Excellence</h3>
                    <p class="text-gray-600 text-sm">Striving for the best in everything we do</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Meet Our Leadership</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Experienced professionals passionate about technology and talent
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="text-center">
                    <div class="w-32 h-32 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white text-2xl font-bold">
                        SJ
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Sarah Johnson</h3>
                    <p class="text-blue-600 mb-2">CEO & Founder</p>
                    <p class="text-gray-600 text-sm">
                        Former Tech Lead with 10+ years in software development and talent management
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-32 h-32 bg-gradient-to-r from-green-400 to-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white text-2xl font-bold">
                        MC
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Mike Chen</h3>
                    <p class="text-blue-600 mb-2">CTO</p>
                    <p class="text-gray-600 text-sm">
                        Full-stack developer and AI enthusiast focused on platform innovation
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-32 h-32 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white text-2xl font-bold">
                        ED
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Elena Davis</h3>
                    <p class="text-blue-600 mb-2">Head of Recruitment</p>
                    <p class="text-gray-600 text-sm">
                        HR specialist with deep expertise in tech talent acquisition and retention
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-700 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your IT Recruitment?</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                Join thousands of companies and tech professionals who have found their perfect match through our platform.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('register') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                    Start Hiring
                </a>
                <a href="{{ route('register') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                    Find Your Next Role
                </a>
            </div>
        </div>
    </section>
</div>

</x-app-layout>