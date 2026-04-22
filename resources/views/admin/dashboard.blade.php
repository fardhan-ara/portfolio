<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Projects</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Project::count() }}</p>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Skills</h3>
                        <p class="text-3xl font-bold text-green-600">{{ \App\Models\Skill::count() }}</p>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Experiences</h3>
                        <p class="text-3xl font-bold text-purple-600">{{ \App\Models\Experience::count() }}</p>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Testimonials</h3>
                        <p class="text-3xl font-bold text-yellow-600">{{ \App\Models\Testimonial::count() }}</p>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Blogs</h3>
                        <p class="text-3xl font-bold text-indigo-600">{{ \App\Models\Blog::count() }}</p>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Messages</h3>
                        <p class="text-3xl font-bold text-red-600">{{ \App\Models\Contact::where('is_read', false)->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="{{ route('admin.projects.index') }}" class="bg-blue-500 text-white px-4 py-3 rounded-lg text-center hover:bg-blue-600">
                            Manage Projects
                        </a>
                        <a href="{{ route('admin.skills.index') }}" class="bg-green-500 text-white px-4 py-3 rounded-lg text-center hover:bg-green-600">
                            Manage Skills
                        </a>
                        <a href="{{ route('admin.experiences.index') }}" class="bg-purple-500 text-white px-4 py-3 rounded-lg text-center hover:bg-purple-600">
                            Manage Experiences
                        </a>
                        <a href="{{ route('admin.educations.index') }}" class="bg-yellow-500 text-white px-4 py-3 rounded-lg text-center hover:bg-yellow-600">
                            Manage Education
                        </a>
                        <a href="{{ route('admin.testimonials.index') }}" class="bg-orange-500 text-white px-4 py-3 rounded-lg text-center hover:bg-orange-600">
                            Manage Testimonials
                        </a>
                        <a href="{{ route('admin.blogs.index') }}" class="bg-indigo-500 text-white px-4 py-3 rounded-lg text-center hover:bg-indigo-600">
                            Manage Blogs
                        </a>
                        <a href="{{ route('admin.contacts.index') }}" class="bg-red-500 text-white px-4 py-3 rounded-lg text-center hover:bg-red-600">
                            View Messages
                        </a>
                        <a href="{{ route('admin.settings.index') }}" class="bg-gray-500 text-white px-4 py-3 rounded-lg text-center hover:bg-gray-600">
                            Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
