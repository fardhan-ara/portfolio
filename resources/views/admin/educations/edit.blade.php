<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Education') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.educations.update', $education) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Institution *</label>
                            <input type="text" name="institution" value="{{ old('institution', $education->institution) }}" required placeholder="e.g., Universitas Indonesia" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            @error('institution')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Degree *</label>
                            <input type="text" name="degree" value="{{ old('degree', $education->degree) }}" required placeholder="e.g., Bachelor's Degree, Master's Degree" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            @error('degree')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Field of Study *</label>
                            <input type="text" name="field" value="{{ old('field', $education->field) }}" required placeholder="e.g., Computer Science" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            @error('field')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Start Date *</label>
                                <input type="date" name="start_date" value="{{ old('start_date', $education->start_date->format('Y-m-d')) }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                @error('start_date')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">End Date (leave empty if current)</label>
                                <input type="date" name="end_date" value="{{ old('end_date', $education->end_date ? $education->end_date->format('Y-m-d') : '') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                @error('end_date')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Update</button>
                            <a href="{{ route('admin.educations.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
