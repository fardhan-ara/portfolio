<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Skill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.skills.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Skill Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g., Laravel" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Category</label>
                            <input type="text" name="category" value="{{ old('category') }}" placeholder="e.g., Backend, Frontend, Database" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            @error('category')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Proficiency Level (1-100) *</label>
                            <input type="number" name="proficiency_level" value="{{ old('proficiency_level', 50) }}" required min="1" max="100" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            @error('proficiency_level')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Icon (Font Awesome class)</label>
                            <input type="text" name="icon" value="{{ old('icon') }}" placeholder="e.g., fab fa-laravel" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            <p class="text-sm text-gray-500 mt-1">Find icons at: <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-600">fontawesome.com/icons</a></p>
                            @error('icon')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Save</button>
                            <a href="{{ route('admin.skills.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
