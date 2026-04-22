<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - {{ $settings['name'] ?? 'Portfolio' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .glass { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
        .text-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-gray-900 text-white">
    
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gradient">
                <i class="fas fa-arrow-left mr-2"></i> Back to Portfolio
            </a>
        </div>
    </nav>

    <!-- Project Hero -->
    <section class="pt-32 pb-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-12">
                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                    <span class="text-gradient">{{ $project->title }}</span>
                </h1>
                
                @if($project->technologies)
                <div class="flex flex-wrap justify-center gap-2 mb-8">
                    @foreach(explode(',', $project->technologies) as $tech)
                    <span class="bg-purple-900 bg-opacity-50 px-4 py-2 rounded-full text-sm text-purple-300">
                        {{ trim($tech) }}
                    </span>
                    @endforeach
                </div>
                @endif
                
                <div class="flex flex-wrap justify-center gap-4">
                    @if($project->link)
                    <a href="{{ $project->link }}" target="_blank" class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-3 rounded-full hover:shadow-2xl transition transform hover:scale-105">
                        <i class="fas fa-external-link-alt mr-2"></i> View Live Site
                    </a>
                    @endif
                    @if($project->github_link)
                    <a href="{{ $project->github_link }}" target="_blank" class="glass px-8 py-3 rounded-full hover:bg-white hover:text-purple-900 transition transform hover:scale-105">
                        <i class="fab fa-github mr-2"></i> View Code
                    </a>
                    @endif
                </div>
            </div>
            
            @if($project->image)
            <div class="max-w-6xl mx-auto rounded-2xl overflow-hidden shadow-2xl">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full">
            </div>
            @endif
        </div>
    </section>

    <!-- Project Details -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto space-y-12">
                
                <!-- Overview -->
                <div class="glass p-8 rounded-2xl">
                    <h2 class="text-3xl font-bold mb-4 flex items-center">
                        <i class="fas fa-info-circle text-purple-400 mr-3"></i>
                        Project Overview
                    </h2>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        {{ $project->description }}
                    </p>
                </div>
                
                <!-- Role & Responsibilities -->
                <div class="glass p-8 rounded-2xl">
                    <h2 class="text-3xl font-bold mb-4 flex items-center">
                        <i class="fas fa-user-tie text-purple-400 mr-3"></i>
                        My Role
                    </h2>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        {{ $project->role ?? 'Full Stack Developer - Responsible for both frontend and backend development, database design, and deployment.' }}
                    </p>
                </div>
                
                <!-- Challenge -->
                <div class="glass p-8 rounded-2xl">
                    <h2 class="text-3xl font-bold mb-4 flex items-center">
                        <i class="fas fa-exclamation-triangle text-yellow-400 mr-3"></i>
                        The Challenge
                    </h2>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        {{ $project->challenge ?? 'Describe the main challenges faced during this project and what made it complex or interesting.' }}
                    </p>
                </div>
                
                <!-- Solution -->
                <div class="glass p-8 rounded-2xl">
                    <h2 class="text-3xl font-bold mb-4 flex items-center">
                        <i class="fas fa-lightbulb text-green-400 mr-3"></i>
                        The Solution
                    </h2>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        {{ $project->solution ?? 'Explain how you solved the challenges, what technologies you used, and why you chose that approach.' }}
                    </p>
                </div>
                
                <!-- Results -->
                @if($project->results)
                <div class="glass p-8 rounded-2xl">
                    <h2 class="text-3xl font-bold mb-4 flex items-center">
                        <i class="fas fa-chart-line text-pink-400 mr-3"></i>
                        Results & Impact
                    </h2>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        {{ $project->results }}
                    </p>
                </div>
                @endif
                
            </div>
        </div>
    </section>

    <!-- Back to Projects -->
    <section class="py-12">
        <div class="container mx-auto px-4 text-center">
            <a href="{{ route('home') }}#projects" class="inline-block glass px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-purple-900 transition transform hover:scale-105">
                <i class="fas fa-arrow-left mr-2"></i> Back to All Projects
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-50 py-8 border-t border-gray-800">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-400">
                &copy; {{ date('Y') }} {{ $settings['name'] ?? 'Portfolio' }}. Made with <i class="fas fa-heart text-red-500"></i> using Laravel
            </p>
        </div>
    </footer>

</body>
</html>
