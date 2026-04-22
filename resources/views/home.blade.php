<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['name'] ?? 'Portfolio' }} - {{ $settings['title'] ?? 'Developer' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-gradient { animation: gradient 15s ease infinite; background-size: 200% 200%; }
        .fade-in-up { animation: fadeInUp 0.6s ease-out forwards; }
        .glass { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.2); }
        .text-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .blob { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        .skill-bar { transition: width 1s ease-out; }
        
        /* Project Filter Styles */
        .tech-filter {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .tech-filter:hover {
            background: rgba(139, 92, 246, 0.3);
        }
        .tech-filter.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: transparent;
        }
        .project-card {
            transition: all 0.3s ease;
        }
        .project-card.hidden {
            display: none;
        }
        
        /* Light Theme */
        body.light-theme {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #1a202c;
        }
        body.light-theme .glass {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        body.light-theme .text-gray-300,
        body.light-theme .text-gray-400 {
            color: #4a5568 !important;
        }
        body.light-theme .bg-gray-800 {
            background-color: #e2e8f0 !important;
        }
        body.light-theme .border-gray-700 {
            border-color: #cbd5e0 !important;
        }
        body.light-theme input,
        body.light-theme textarea {
            color: #1a202c !important;
        }
        body.light-theme input::placeholder,
        body.light-theme textarea::placeholder {
            color: #718096 !important;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-gray-900 text-white">
    <!-- Floating Navigation -->
    <nav class="fixed top-0 w-full z-50 glass">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gradient">{{ $settings['name'] ?? 'Portfolio' }}</h1>
            <div class="hidden md:flex space-x-6 items-center">
                <a href="#home" class="hover:text-purple-400 transition">Home</a>
                <a href="#about" class="hover:text-purple-400 transition">About</a>
                <a href="#skills" class="hover:text-purple-400 transition">Skills</a>
                <a href="#projects" class="hover:text-purple-400 transition">Projects</a>
                <a href="#experience" class="hover:text-purple-400 transition">Experience</a>
                <a href="{{ route('blog.index') }}" class="hover:text-purple-400 transition">Blog</a>
                <a href="#contact" class="hover:text-purple-400 transition">Contact</a>
                <button id="themeToggle" class="glass px-3 py-2 rounded-lg hover:bg-purple-500 transition" title="Toggle Theme">
                    <i class="fas fa-moon" id="themeIcon"></i>
                </button>
            </div>
            <button id="menuBtn" class="md:hidden text-2xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="fixed inset-0 bg-black bg-opacity-90 z-40 hidden">
        <div class="flex flex-col items-center justify-center h-full space-y-8 text-2xl">
            <a href="#home" class="hover:text-purple-400 transition mobile-link">Home</a>
            <a href="#about" class="hover:text-purple-400 transition mobile-link">About</a>
            <a href="#skills" class="hover:text-purple-400 transition mobile-link">Skills</a>
            <a href="#projects" class="hover:text-purple-400 transition mobile-link">Projects</a>
            <a href="#experience" class="hover:text-purple-400 transition mobile-link">Experience</a>
            <a href="{{ route('blog.index') }}" class="hover:text-purple-400 transition mobile-link">Blog</a>
            <a href="#contact" class="hover:text-purple-400 transition mobile-link">Contact</a>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden pt-20">
        <!-- Animated Background Blobs -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500 opacity-20 blob animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-500 opacity-20 blob animate-float" style="animation-delay: 1s;"></div>
        
        <div class="container mx-auto px-4 z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Side - Text Content -->
                <div class="fade-in-up text-center md:text-left">
                    <p class="text-purple-400 text-lg mb-2">👋 Hello, I'm</p>
                    <h1 class="text-5xl md:text-7xl font-bold mb-4">
                        <span class="text-gradient">{{ $settings['name'] ?? 'Your Name' }}</span>
                    </h1>
                    <h2 class="text-3xl md:text-4xl mb-6 text-purple-300 font-semibold">{{ $settings['title'] ?? 'Your Title' }}</h2>
                    
                    <!-- USP - Unique Selling Point -->
                    <p class="text-xl md:text-2xl mb-4 text-gray-300 leading-relaxed">
                        {{ $settings['tagline'] ?? 'I help businesses build powerful digital solutions that drive growth and innovation.' }}
                    </p>
                    <p class="text-lg mb-8 text-gray-400 leading-relaxed">{{ $settings['bio'] ?? 'Your bio here' }}</p>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-wrap gap-4 mb-8 justify-center md:justify-start">
                        <a href="#projects" class="inline-flex items-center bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-4 rounded-full text-lg font-semibold hover:shadow-2xl transition transform hover:scale-105">
                            <i class="fas fa-briefcase mr-2"></i> View My Work
                        </a>
                        <a href="#contact" class="inline-flex items-center glass px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-purple-900 transition transform hover:scale-105">
                            <i class="fas fa-envelope mr-2"></i> Hire Me
                        </a>
                        @if(isset($settings['cv_file']) && $settings['cv_file'])
                        <a href="{{ asset('storage/' . $settings['cv_file']) }}" download class="inline-flex items-center glass px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-purple-900 transition transform hover:scale-105">
                            <i class="fas fa-download mr-2"></i> Download CV
                        </a>
                        @endif
                    </div>
                    
                    <!-- Social Links -->
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                        @if(isset($settings['github']))
                        <a href="{{ $settings['github'] }}" target="_blank" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-purple-500 transition transform hover:scale-110" title="GitHub">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        @endif
                        @if(isset($settings['linkedin']))
                        <a href="{{ $settings['linkedin'] }}" target="_blank" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-purple-500 transition transform hover:scale-110" title="LinkedIn">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        @endif
                        @if(isset($settings['twitter']))
                        <a href="{{ $settings['twitter'] }}" target="_blank" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-purple-500 transition transform hover:scale-110" title="Twitter">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        @endif
                        @if(isset($settings['instagram']))
                        <a href="{{ $settings['instagram'] }}" target="_blank" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-purple-500 transition transform hover:scale-110" title="Instagram">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        @endif
                    </div>
                </div>
                
                <!-- Right Side - Profile Image -->
                <div class="fade-in-up flex justify-center" style="animation-delay: 0.2s;">
                    <div class="relative">
                        <div class="w-80 h-80 md:w-96 md:h-96 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 p-2 animate-float">
                            @if(isset($settings['profile_image']) && $settings['profile_image'])
                            <img src="{{ asset('storage/' . $settings['profile_image']) }}" alt="{{ $settings['name'] }}" class="w-full h-full rounded-full object-cover">
                            @else
                            <div class="w-full h-full rounded-full bg-gray-900 flex items-center justify-center text-8xl">
                                <i class="fas fa-user"></i>
                            </div>
                            @endif
                        </div>
                        <!-- Floating Stats -->
                        <div class="absolute -bottom-4 -left-4 glass p-4 rounded-xl">
                            <p class="text-3xl font-bold text-purple-400">{{ \App\Models\Project::count() }}+</p>
                            <p class="text-sm text-gray-400">Projects Done</p>
                        </div>
                        <div class="absolute -top-4 -right-4 glass p-4 rounded-xl">
                            <p class="text-3xl font-bold text-pink-400">{{ \App\Models\Experience::count() }}+</p>
                            <p class="text-sm text-gray-400">Years Exp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-3xl text-purple-400"></i>
        </div>
    </section>

    <!-- About Me Section -->
    <section id="about" class="py-20 relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold mb-4">
                    <span class="text-gradient">About Me</span>
                </h2>
                <p class="text-gray-400 text-lg">Get to know me better</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Story -->
                <div class="glass p-8 rounded-2xl">
                    <h3 class="text-2xl font-bold mb-4 flex items-center">
                        <i class="fas fa-user-circle text-purple-400 mr-3"></i>
                        My Story
                    </h3>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        {{ $settings['about_story'] ?? 'Share your professional journey here. Talk about what drives you, your passion for your work, and what makes you unique in your field.' }}
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        {{ $settings['about_passion'] ?? 'Explain what you love most about your work and how you approach challenges.' }}
                    </p>
                </div>
                
                <!-- Quick Facts -->
                <div class="space-y-4">
                    <div class="glass p-6 rounded-2xl flex items-center gap-4">
                        <div class="bg-gradient-to-br from-purple-500 to-pink-500 p-4 rounded-xl">
                            <i class="fas fa-briefcase text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-sm">Experience</p>
                            <p class="text-xl font-bold">{{ $settings['years_experience'] ?? '5+' }} Years</p>
                        </div>
                    </div>
                    
                    <div class="glass p-6 rounded-2xl flex items-center gap-4">
                        <div class="bg-gradient-to-br from-purple-500 to-pink-500 p-4 rounded-xl">
                            <i class="fas fa-project-diagram text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-sm">Projects Completed</p>
                            <p class="text-xl font-bold">{{ \App\Models\Project::count() }}+ Projects</p>
                        </div>
                    </div>
                    
                    <div class="glass p-6 rounded-2xl flex items-center gap-4">
                        <div class="bg-gradient-to-br from-purple-500 to-pink-500 p-4 rounded-xl">
                            <i class="fas fa-map-marker-alt text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-sm">Location</p>
                            <p class="text-xl font-bold">{{ $settings['address'] ?? 'Your Location' }}</p>
                        </div>
                    </div>
                    
                    <div class="glass p-6 rounded-2xl flex items-center gap-4">
                        <div class="bg-gradient-to-br from-purple-500 to-pink-500 p-4 rounded-xl">
                            <i class="fas fa-envelope text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-sm">Email</p>
                            <p class="text-lg font-bold break-all">{{ $settings['email'] ?? 'email@example.com' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold mb-4">
                    <span class="text-gradient">My Skills</span>
                </h2>
                <p class="text-gray-400 text-lg">Technologies I work with</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($skills as $skill)
                <div class="glass p-6 rounded-2xl card-hover group cursor-pointer">
                    <div class="text-center">
                        <div class="text-5xl mb-4 transform group-hover:scale-110 transition">
                            @if($skill->icon)
                                <i class="{{ $skill->icon }}"></i>
                            @else
                                <i class="fas fa-code text-purple-400"></i>
                            @endif
                        </div>
                        <h3 class="font-bold text-xl mb-2">{{ $skill->name }}</h3>
                        @if($skill->category)
                        <p class="text-sm text-purple-300 mb-3">{{ $skill->category }}</p>
                        @endif
                        
                        <!-- Skill Level Bar -->
                        <div class="w-full bg-gray-700 rounded-full h-2 overflow-hidden">
                            <div class="skill-bar h-full bg-gradient-to-r from-purple-500 to-pink-500 rounded-full" 
                                 style="width: 0%" 
                                 data-width="{{ $skill->proficiency_level }}%"></div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">{{ $skill->proficiency_level }}%</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold mb-4">
                    <span class="text-gradient">Featured Projects</span>
                </h2>
                <p class="text-gray-400 text-lg">Some of my recent work</p>
            </div>
            
            <!-- Filter & Search Bar -->
            <div class="max-w-4xl mx-auto mb-12">
                <div class="glass p-6 rounded-2xl">
                    <!-- Search Bar -->
                    <div class="mb-6">
                        <div class="relative">
                            <input type="text" id="projectSearch" placeholder="Search projects..." 
                                   class="w-full px-6 py-4 bg-gray-800 bg-opacity-50 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-white placeholder-gray-500 pl-12">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <!-- Technology Filter -->
                    <div class="mb-4">
                        <p class="text-sm text-gray-400 mb-3">Filter by Technology:</p>
                        <div class="flex flex-wrap gap-2" id="techFilters">
                            <button class="tech-filter active px-4 py-2 rounded-full text-sm font-semibold transition" data-tech="all">
                                All Projects
                            </button>
                            @php
                                $allTechs = [];
                                foreach($projects as $project) {
                                    if($project->technologies) {
                                        $techs = array_map('trim', explode(',', $project->technologies));
                                        $allTechs = array_merge($allTechs, $techs);
                                    }
                                }
                                $uniqueTechs = array_unique($allTechs);
                                sort($uniqueTechs);
                            @endphp
                            @foreach($uniqueTechs as $tech)
                            <button class="tech-filter px-4 py-2 rounded-full text-sm font-semibold transition" data-tech="{{ strtolower($tech) }}">
                                {{ $tech }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Sort Options -->
                    <div class="flex items-center gap-4">
                        <p class="text-sm text-gray-400">Sort by:</p>
                        <select id="projectSort" class="px-4 py-2 bg-gray-800 bg-opacity-50 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-white text-sm">
                            <option value="default">Default Order</option>
                            <option value="title-asc">Title (A-Z)</option>
                            <option value="title-desc">Title (Z-A)</option>
                            <option value="newest">Newest First</option>
                        </select>
                        <span id="projectCount" class="ml-auto text-sm text-purple-400 font-semibold"></span>
                    </div>
                </div>
            </div>
            
            <!-- Projects Grid -->
            <div id="projectsGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="project-card glass rounded-2xl overflow-hidden card-hover group" 
                     data-title="{{ strtolower($project->title) }}" 
                     data-description="{{ strtolower($project->description) }}"
                     data-technologies="{{ strtolower($project->technologies) }}"
                     data-created="{{ $project->created_at->timestamp }}">
                    <div class="relative overflow-hidden h-56">
                        @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" 
                             alt="{{ $project->title }}" 
                             class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                        @else
                        <div class="w-full h-full bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center">
                            <i class="fas fa-project-diagram text-6xl opacity-50"></i>
                        </div>
                        @endif
                        
                        @if($project->is_featured)
                        <div class="absolute top-4 right-4 bg-yellow-500 text-black px-3 py-1 rounded-full text-xs font-bold">
                            <i class="fas fa-star"></i> Featured
                        </div>
                        @endif
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                            <div class="absolute bottom-4 left-4 right-4 flex gap-2">
                                @if($project->link)
                                <a href="{{ $project->link }}" target="_blank" class="flex-1 bg-white text-black px-4 py-2 rounded-lg text-center hover:bg-purple-500 hover:text-white transition">
                                    <i class="fas fa-external-link-alt"></i> Live
                                </a>
                                @endif
                                @if($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank" class="flex-1 bg-white text-black px-4 py-2 rounded-lg text-center hover:bg-purple-500 hover:text-white transition">
                                    <i class="fab fa-github"></i> Code
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 group-hover:text-purple-400 transition">{{ $project->title }}</h3>
                        <p class="text-gray-400 mb-4 line-clamp-3">{{ $project->description }}</p>
                        
                        @if($project->technologies)
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(explode(',', $project->technologies) as $tech)
                            <span class="bg-purple-900 bg-opacity-50 px-3 py-1 rounded-full text-xs text-purple-300">
                                {{ trim($tech) }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                        
                        <a href="{{ route('project.detail', $project->id) }}" class="inline-flex items-center text-purple-400 hover:text-purple-300 transition">
                            View Case Study <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- No Results Message -->
            <div id="noResults" class="hidden text-center py-20">
                <i class="fas fa-search text-6xl text-gray-600 mb-4"></i>
                <p class="text-gray-400 text-xl">No projects found matching your criteria</p>
                <button onclick="resetFilters()" class="mt-4 glass px-6 py-3 rounded-lg hover:bg-purple-500 transition">
                    <i class="fas fa-redo mr-2"></i> Reset Filters
                </button>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-20 relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold mb-4">
                    <span class="text-gradient">Experience</span>
                </h2>
                <p class="text-gray-400 text-lg">My professional journey</p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                @foreach($experiences as $index => $exp)
                <div class="relative pl-8 pb-12 border-l-2 border-purple-500 last:pb-0">
                    <!-- Timeline Dot -->
                    <div class="absolute -left-3 top-0 w-6 h-6 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full border-4 border-gray-900"></div>
                    
                    <div class="glass p-6 rounded-2xl card-hover ml-4">
                        <div class="flex flex-wrap justify-between items-start mb-3">
                            <div>
                                <h3 class="text-2xl font-bold text-purple-300">{{ $exp->position }}</h3>
                                <p class="text-xl text-gray-300">{{ $exp->company }}</p>
                            </div>
                            <span class="bg-purple-900 bg-opacity-50 px-4 py-2 rounded-full text-sm">
                                <i class="far fa-calendar-alt mr-2"></i>
                                {{ $exp->start_date->format('M Y') }} - {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}
                            </span>
                        </div>
                        <p class="text-gray-400 leading-relaxed">{{ $exp->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section class="py-20 relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold mb-4">
                    <span class="text-gradient">Education</span>
                </h2>
                <p class="text-gray-400 text-lg">Academic background</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                @foreach($educations as $edu)
                <div class="glass p-8 rounded-2xl card-hover">
                    <div class="flex items-start gap-4">
                        <div class="bg-gradient-to-br from-purple-500 to-pink-500 p-4 rounded-xl">
                            <i class="fas fa-graduation-cap text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold mb-2">{{ $edu->degree }} in {{ $edu->field }}</h3>
                            <p class="text-purple-300 mb-2">{{ $edu->institution }}</p>
                            <p class="text-sm text-gray-400">
                                <i class="far fa-calendar mr-2"></i>
                                {{ $edu->start_date->format('Y') }} - {{ $edu->end_date ? $edu->end_date->format('Y') : 'Present' }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold mb-4">
                    <span class="text-gradient">What Clients Say</span>
                </h2>
                <p class="text-gray-400 text-lg">Testimonials from people I've worked with</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @forelse($testimonials as $testimonial)
                <div class="glass p-8 rounded-2xl card-hover">
                    <div class="flex items-center mb-4">
                        @for($i = 0; $i < $testimonial->rating; $i++)
                        <i class="fas fa-star text-yellow-400"></i>
                        @endfor
                    </div>
                    <p class="text-gray-300 mb-6 italic leading-relaxed">
                        "{{ $testimonial->testimonial }}"
                    </p>
                    <div class="flex items-center gap-4">
                        @if($testimonial->client_image)
                        <img src="{{ asset('storage/' . $testimonial->client_image) }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 rounded-full object-cover">
                        @else
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-xl"></i>
                        </div>
                        @endif
                        <div>
                            <p class="font-bold">{{ $testimonial->client_name }}</p>
                            <p class="text-sm text-gray-400">{{ $testimonial->client_position }}{{ $testimonial->client_company ? ', ' . $testimonial->client_company : '' }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center text-gray-400">
                    <p>No testimonials yet</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold mb-4">
                    <span class="text-gradient">Get In Touch</span>
                </h2>
                <p class="text-gray-400 text-lg">Let's create something amazing together</p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <div class="glass p-6 rounded-2xl">
                            <div class="flex items-center gap-4">
                                <div class="bg-gradient-to-br from-purple-500 to-pink-500 p-4 rounded-xl">
                                    <i class="fas fa-envelope text-2xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Email</p>
                                    <p class="font-semibold">{{ $settings['email'] ?? 'email@example.com' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        @if(isset($settings['phone']))
                        <div class="glass p-6 rounded-2xl">
                            <div class="flex items-center gap-4">
                                <div class="bg-gradient-to-br from-purple-500 to-pink-500 p-4 rounded-xl">
                                    <i class="fas fa-phone text-2xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Phone</p>
                                    <p class="font-semibold">{{ $settings['phone'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if(isset($settings['address']))
                        <div class="glass p-6 rounded-2xl">
                            <div class="flex items-center gap-4">
                                <div class="bg-gradient-to-br from-purple-500 to-pink-500 p-4 rounded-xl">
                                    <i class="fas fa-map-marker-alt text-2xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Location</p>
                                    <p class="font-semibold">{{ $settings['address'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="flex gap-4 pt-4">
                            @if(isset($settings['github']))
                            <a href="{{ $settings['github'] }}" target="_blank" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-purple-500 transition transform hover:scale-110">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                            @endif
                            @if(isset($settings['linkedin']))
                            <a href="{{ $settings['linkedin'] }}" target="_blank" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-purple-500 transition transform hover:scale-110">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            @endif
                            @if(isset($settings['twitter']))
                            <a href="{{ $settings['twitter'] }}" target="_blank" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-purple-500 transition transform hover:scale-110">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            @endif
                            @if(isset($settings['instagram']))
                            <a href="{{ $settings['instagram'] }}" target="_blank" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-purple-500 transition transform hover:scale-110">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Contact Form -->
                    <div class="glass p-8 rounded-2xl">
                        @if(session('success'))
                        <div class="bg-green-500 bg-opacity-20 border border-green-500 text-green-300 px-4 py-3 rounded-lg mb-6 animate-pulse">
                            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                        </div>
                        @endif
                        
                        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <input type="text" name="name" placeholder="Your Name" required 
                                       class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-white placeholder-gray-500">
                                @error('name')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Your Email" required 
                                       class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-white placeholder-gray-500">
                                @error('email')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <input type="text" name="subject" placeholder="Subject" 
                                       class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-white placeholder-gray-500">
                                @error('subject')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <textarea name="message" rows="5" placeholder="Your Message" required 
                                          class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-white placeholder-gray-500 resize-none"></textarea>
                                @error('message')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                            </div>
                            <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 py-3 rounded-lg font-semibold hover:shadow-2xl transition transform hover:scale-105">
                                <i class="fas fa-paper-plane mr-2"></i> Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-50 py-8 border-t border-gray-800">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 mb-4 md:mb-0">
                    &copy; {{ date('Y') }} {{ $settings['name'] ?? 'Portfolio' }}. Made with <i class="fas fa-heart text-red-500"></i> using Laravel
                </p>
                <div class="flex gap-4">
                    <a href="#home" class="text-gray-400 hover:text-purple-400 transition">Back to Top <i class="fas fa-arrow-up ml-1"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Interactivity -->
    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const body = document.body;
        
        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'dark';
        if (savedTheme === 'light') {
            body.classList.add('light-theme');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
        }
        
        themeToggle.addEventListener('click', () => {
            body.classList.toggle('light-theme');
            const isLight = body.classList.contains('light-theme');
            
            if (isLight) {
                themeIcon.classList.replace('fa-moon', 'fa-sun');
                localStorage.setItem('theme', 'light');
            } else {
                themeIcon.classList.replace('fa-sun', 'fa-moon');
                localStorage.setItem('theme', 'dark');
            }
        });
        
        // Mobile Menu Toggle
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileLinks = document.querySelectorAll('.mobile-link');
        
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
        
        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
        
        // Skill Bar Animation on Scroll
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const skillBars = entry.target.querySelectorAll('.skill-bar');
                    skillBars.forEach(bar => {
                        setTimeout(() => {
                            bar.style.width = bar.getAttribute('data-width');
                        }, 200);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        const skillsSection = document.getElementById('skills');
        if (skillsSection) {
            observer.observe(skillsSection);
        }
        
        // Fade in elements on scroll
        const fadeElements = document.querySelectorAll('.card-hover');
        const fadeObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    fadeObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        fadeElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease-out';
            fadeObserver.observe(el);
        });
        
        // Parallax effect for blobs
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const blobs = document.querySelectorAll('.blob');
            blobs.forEach((blob, index) => {
                const speed = (index + 1) * 0.5;
                blob.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
        
        // ===== PROJECT FILTERING & SEARCH =====
        const projectCards = document.querySelectorAll('.project-card');
        const searchInput = document.getElementById('projectSearch');
        const techFilters = document.querySelectorAll('.tech-filter');
        const sortSelect = document.getElementById('projectSort');
        const projectsGrid = document.getElementById('projectsGrid');
        const noResults = document.getElementById('noResults');
        const projectCount = document.getElementById('projectCount');
        
        let currentTech = 'all';
        let currentSearch = '';
        
        // Update project count
        function updateCount() {
            const visible = document.querySelectorAll('.project-card:not(.hidden)').length;
            projectCount.textContent = `${visible} project${visible !== 1 ? 's' : ''}`;
            
            if (visible === 0) {
                noResults.classList.remove('hidden');
                projectsGrid.classList.add('hidden');
            } else {
                noResults.classList.add('hidden');
                projectsGrid.classList.remove('hidden');
            }
        }
        
        // Filter projects
        function filterProjects() {
            projectCards.forEach(card => {
                const title = card.dataset.title;
                const description = card.dataset.description;
                const technologies = card.dataset.technologies;
                
                // Check search
                const matchesSearch = currentSearch === '' || 
                    title.includes(currentSearch) || 
                    description.includes(currentSearch) ||
                    technologies.includes(currentSearch);
                
                // Check technology filter
                const matchesTech = currentTech === 'all' || 
                    technologies.includes(currentTech);
                
                // Show/hide card
                if (matchesSearch && matchesTech) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
            
            updateCount();
        }
        
        // Search functionality
        searchInput.addEventListener('input', (e) => {
            currentSearch = e.target.value.toLowerCase();
            filterProjects();
        });
        
        // Technology filter
        techFilters.forEach(filter => {
            filter.addEventListener('click', () => {
                // Remove active class from all
                techFilters.forEach(f => f.classList.remove('active'));
                // Add active to clicked
                filter.classList.add('active');
                
                currentTech = filter.dataset.tech;
                filterProjects();
            });
        });
        
        // Sort functionality
        sortSelect.addEventListener('change', (e) => {
            const sortType = e.target.value;
            const cardsArray = Array.from(projectCards);
            
            cardsArray.sort((a, b) => {
                switch(sortType) {
                    case 'title-asc':
                        return a.dataset.title.localeCompare(b.dataset.title);
                    case 'title-desc':
                        return b.dataset.title.localeCompare(a.dataset.title);
                    case 'newest':
                        return b.dataset.created - a.dataset.created;
                    default:
                        return 0;
                }
            });
            
            // Re-append in new order
            cardsArray.forEach(card => projectsGrid.appendChild(card));
        });
        
        // Reset filters function
        window.resetFilters = function() {
            searchInput.value = '';
            currentSearch = '';
            currentTech = 'all';
            sortSelect.value = 'default';
            
            techFilters.forEach(f => f.classList.remove('active'));
            techFilters[0].classList.add('active');
            
            filterProjects();
        };
        
        // Initialize count
        updateCount();
    </script>
</body>
</html>
