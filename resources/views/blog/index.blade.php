<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .glass { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.2); }
        .text-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-gray-900 text-white min-h-screen">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gradient">Portfolio</a>
            <div class="flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-purple-400 transition">Home</a>
                <a href="{{ route('blog.index') }}" class="text-purple-400">Blog</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 pt-32 pb-20">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">
                <span class="text-gradient">Blog</span>
            </h1>
            <p class="text-gray-400 text-lg">Thoughts, tutorials, and insights</p>
        </div>

        <!-- Categories Filter -->
        @if($categories->count() > 0)
        <div class="flex flex-wrap gap-3 justify-center mb-12">
            <a href="{{ route('blog.index') }}" class="glass px-6 py-2 rounded-full hover:bg-purple-500 transition {{ !isset($category) ? 'bg-purple-500' : '' }}">
                All
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('blog.category', $cat) }}" class="glass px-6 py-2 rounded-full hover:bg-purple-500 transition {{ isset($category) && $category == $cat ? 'bg-purple-500' : '' }}">
                {{ $cat }}
            </a>
            @endforeach
        </div>
        @endif

        <!-- Blog Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($blogs as $blog)
            <article class="glass rounded-2xl overflow-hidden card-hover">
                @if($blog->featured_image)
                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center">
                    <i class="fas fa-blog text-6xl opacity-50"></i>
                </div>
                @endif
                
                <div class="p-6">
                    <div class="flex items-center gap-4 mb-3 text-sm text-gray-400">
                        <span class="bg-purple-900 bg-opacity-50 px-3 py-1 rounded-full text-purple-300">{{ $blog->category }}</span>
                        <span><i class="far fa-clock mr-1"></i>{{ $blog->reading_time }} min read</span>
                        <span><i class="far fa-eye mr-1"></i>{{ $blog->views }}</span>
                    </div>
                    
                    <h2 class="text-2xl font-bold mb-3 hover:text-purple-400 transition">
                        <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                    </h2>
                    
                    <p class="text-gray-400 mb-4 line-clamp-3">{{ $blog->excerpt }}</p>
                    
                    @if($blog->tags)
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach(explode(',', $blog->tags) as $tag)
                        <span class="text-xs text-purple-300">#{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                    @endif
                    
                    <div class="flex justify-between items-center">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="text-purple-400 hover:text-purple-300 transition inline-flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <span class="text-sm text-gray-500">{{ $blog->published_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-20">
                <i class="fas fa-inbox text-6xl text-gray-600 mb-4"></i>
                <p class="text-gray-400 text-xl">No blog posts yet. Check back soon!</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($blogs->hasPages())
        <div class="mt-12">
            {{ $blogs->links() }}
        </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-50 py-8 border-t border-gray-800">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-400">&copy; {{ date('Y') }} Portfolio. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
