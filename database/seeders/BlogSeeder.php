<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Getting Started with Laravel 11',
                'slug' => 'getting-started-with-laravel-11',
                'category' => 'Tutorial',
                'excerpt' => 'Learn how to build modern web applications with Laravel 11. This comprehensive guide covers installation, setup, and your first project.',
                'content' => "Laravel 11 is the latest version of the popular PHP framework. In this tutorial, we'll walk through the basics of getting started with Laravel 11.\n\nFirst, make sure you have PHP 8.2 or higher installed on your system. You'll also need Composer, the PHP dependency manager.\n\nTo create a new Laravel project, run:\ncomposer create-project laravel/laravel my-project\n\nOnce installed, you can start the development server with:\nphp artisan serve\n\nLaravel 11 comes with many improvements including better performance, enhanced security features, and a more intuitive API.\n\nSome key features include:\n- Improved routing system\n- Better database query builder\n- Enhanced authentication\n- Modern frontend scaffolding\n\nStay tuned for more advanced tutorials!",
                'tags' => 'laravel, php, tutorial, web development',
                'reading_time' => 5,
                'views' => 150,
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Building RESTful APIs with Laravel',
                'slug' => 'building-restful-apis-with-laravel',
                'category' => 'Web Development',
                'excerpt' => 'A complete guide to creating robust and scalable RESTful APIs using Laravel. Learn best practices and advanced techniques.',
                'content' => "RESTful APIs are essential for modern web applications. Laravel makes it incredibly easy to build powerful APIs.\n\nIn this guide, we'll cover:\n\n1. Setting up API routes\n2. Creating API resources\n3. Authentication with Sanctum\n4. Rate limiting\n5. API versioning\n\nLet's start with routes. In your routes/api.php file, you can define API endpoints:\n\nRoute::get('/users', [UserController::class, 'index']);\nRoute::post('/users', [UserController::class, 'store']);\n\nAPI Resources help you transform your models into JSON responses. Create a resource with:\nphp artisan make:resource UserResource\n\nFor authentication, Laravel Sanctum provides a simple way to authenticate SPAs and mobile applications.\n\nRemember to always validate input, handle errors gracefully, and document your API endpoints.",
                'tags' => 'laravel, api, rest, backend',
                'reading_time' => 8,
                'views' => 230,
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => '10 Tips for Writing Clean PHP Code',
                'slug' => '10-tips-for-writing-clean-php-code',
                'category' => 'Tips & Tricks',
                'excerpt' => 'Improve your PHP coding skills with these 10 essential tips for writing clean, maintainable, and efficient code.',
                'content' => "Writing clean code is crucial for maintainability and collaboration. Here are 10 tips to improve your PHP code:\n\n1. Use meaningful variable names\n2. Follow PSR standards\n3. Keep functions small and focused\n4. Use type hints\n5. Write comments for complex logic\n6. Avoid deep nesting\n7. Use dependency injection\n8. Handle errors properly\n9. Write tests\n10. Refactor regularly\n\nLet's dive into each tip:\n\n1. Meaningful Variable Names\nInstead of \$x or \$temp, use descriptive names like \$userEmail or \$totalPrice.\n\n2. PSR Standards\nFollow PSR-1, PSR-2, and PSR-12 for consistent code formatting.\n\n3. Small Functions\nEach function should do one thing and do it well. If a function is too long, break it down.\n\n4. Type Hints\nUse type hints for function parameters and return types to catch errors early.\n\nImplementing these tips will make your code more professional and easier to maintain.",
                'tags' => 'php, clean code, best practices, tips',
                'reading_time' => 6,
                'views' => 180,
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Mastering Tailwind CSS: A Complete Guide',
                'slug' => 'mastering-tailwind-css-complete-guide',
                'category' => 'Web Development',
                'excerpt' => 'Learn how to use Tailwind CSS to build beautiful, responsive websites faster than ever before.',
                'content' => "Tailwind CSS is a utility-first CSS framework that has revolutionized how we build user interfaces.\n\nWhy Tailwind?\n- Rapid development\n- Consistent design\n- Smaller CSS files\n- Easy customization\n- Great documentation\n\nGetting Started:\nInstall Tailwind via npm:\nnpm install -D tailwindcss\nnpx tailwindcss init\n\nBasic Usage:\nInstead of writing custom CSS, you use utility classes directly in your HTML:\n<div class='bg-blue-500 text-white p-4 rounded-lg'>\n  Hello Tailwind!\n</div>\n\nResponsive Design:\nTailwind makes responsive design easy with breakpoint prefixes:\n<div class='w-full md:w-1/2 lg:w-1/3'>\n  Responsive width\n</div>\n\nCustomization:\nYou can customize colors, spacing, fonts, and more in tailwind.config.js.\n\nTailwind is perfect for rapid prototyping and production applications alike.",
                'tags' => 'tailwind, css, frontend, design',
                'reading_time' => 7,
                'views' => 320,
                'is_published' => true,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Database Optimization Techniques',
                'slug' => 'database-optimization-techniques',
                'category' => 'DevOps',
                'excerpt' => 'Learn essential database optimization techniques to improve your application performance and scalability.',
                'content' => "Database performance is critical for application success. Here are key optimization techniques:\n\n1. Indexing\nCreate indexes on frequently queried columns to speed up searches.\n\n2. Query Optimization\n- Use EXPLAIN to analyze queries\n- Avoid SELECT *\n- Use JOINs efficiently\n- Limit result sets\n\n3. Caching\nImplement query caching and result caching to reduce database load.\n\n4. Connection Pooling\nReuse database connections instead of creating new ones for each request.\n\n5. Normalization vs Denormalization\nBalance between normalized data structure and query performance.\n\n6. Partitioning\nSplit large tables into smaller, manageable pieces.\n\n7. Regular Maintenance\n- Update statistics\n- Rebuild indexes\n- Clean up old data\n\n8. Monitoring\nUse tools to monitor query performance and identify bottlenecks.\n\nImplementing these techniques can dramatically improve your application's performance.",
                'tags' => 'database, optimization, performance, mysql',
                'reading_time' => 9,
                'views' => 95,
                'is_published' => true,
                'published_at' => now()->subHours(12),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
