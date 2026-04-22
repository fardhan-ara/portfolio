<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }} - Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .glass { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
        .text-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .prose { max-width: none; }
        .prose p { margin-bottom: 1rem; line-height: 1.8; color: #d1d5db; }
        .prose h2 { font-size: 1.875rem; font-weight: bold; margin-top: 2rem; margin-bottom: 1rem; color: #a78bfa; }
        .prose h3 { font-size: 1.5rem; font-weight: bold; margin-top: 1.5rem; margin-bottom: 0.75rem; color: #c4b5fd; }
        .prose ul, .prose ol { margin-left: 1.5rem; margin-bottom: 1rem; color: #d1d5db; }
        .prose li { margin-bottom: 0.5rem; }
        .prose code { background: rgba(167, 139, 250, 0.2); padding: 0.2rem 0.4rem; border-radius: 0.25rem; color: #c4b5fd; }
        .prose pre { background: rgba(0, 0, 0, 0.3); padding: 1rem; border-radius: 0.5rem; overflow-x: auto; margin-bottom: 1rem; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-gray-900 text-white min-h-screen">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gradient">Portfolio</a>
            <div class="flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-purple-400 transition">Home</a>
                <a href="{{ route('blog.index') }}" class="hover:text-purple-400 transition">Blog</a>
            </div>
        </div>
    </nav>

    <article class="container mx-auto px-4 pt-32 pb-20 max-w-4xl">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-4 mb-4 text-sm text-gray-400">
                <span class="bg-purple-900 bg-opacity-50 px-4 py-2 rounded-full text-purple-300">{{ $blog->category }}</span>
                <span><i class="far fa-clock mr-1"></i>{{ $blog->reading_time }} min read</span>
                <span><i class="far fa-eye mr-1"></i>{{ $blog->views }} views</span>
                <span><i class="far fa-calendar mr-1"></i>{{ $blog->published_at->format('M d, Y') }}</span>
            </div>
            
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $blog->title }}</h1>
            
            @if($blog->tags)
            <div class="flex flex-wrap gap-2 mb-6">
                @foreach(explode(',', $blog->tags) as $tag)
                <span class="text-sm text-purple-300">#{{ trim($tag) }}</span>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Featured Image -->
        @if($blog->featured_image)
        <div class="mb-8 rounded-2xl overflow-hidden">
            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-auto">
        </div>
        @endif

        <!-- Content -->
        <div class="glass p-8 rounded-2xl mb-12">
            <div class="prose prose-lg">
                {!! nl2br(e($blog->content)) !!}
            </div>
        </div>

        <!-- Share Buttons -->
        <div class="glass p-6 rounded-2xl mb-12">
            <h3 class="text-xl font-bold mb-4">Share this article</h3>
            <div class="flex gap-4">
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $blog->slug)) }}&text={{ urlencode($blog->title) }}" target="_blank" class="glass px-6 py-3 rounded-lg hover:bg-purple-500 transition">
                    <i class="fab fa-twitter mr-2"></i> Twitter
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $blog->slug)) }}" target="_blank" class="glass px-6 py-3 rounded-lg hover:bg-purple-500 transition">
                    <i class="fab fa-facebook mr-2"></i> Facebook
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $blog->slug)) }}" target="_blank" class="glass px-6 py-3 rounded-lg hover:bg-purple-500 transition">
                    <i class="fab fa-linkedin mr-2"></i> LinkedIn
                </a>
            </div>
        </div>

        <!-- Related Posts -->
        @if($relatedBlogs->count() > 0)
        <div class="mb-12">
            <h3 class="text-3xl font-bold mb-8">
                <span class="text-gradient">Related Articles</span>
            </h3>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($relatedBlogs as $related)
                <div class="glass rounded-2xl overflow-hidden hover:transform hover:scale-105 transition">
                    @if($related->featured_image)
                    <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-32 object-cover">
                    @else
                    <div class="w-full h-32 bg-gradient-to-br from-purple-600 to-pink-600"></div>
                    @endif
                    <div class="p-4">
                        <h4 class="font-bold mb-2 line-clamp-2">
                            <a href="{{ route('blog.show', $related->slug) }}" class="hover:text-purple-400 transition">{{ $related->title }}</a>
                        </h4>
                        <p class="text-sm text-gray-400">{{ $related->reading_time }} min read</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Back to Blog -->
        <div class="text-center">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center glass px-8 py-4 rounded-full hover:bg-purple-500 transition">
                <i class="fas fa-arrow-left mr-2"></i> Back to Blog
            </a>
        </div>
    </article>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-50 py-8 border-t border-gray-800">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-400">&copy; {{ date('Y') }} Portfolio. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
