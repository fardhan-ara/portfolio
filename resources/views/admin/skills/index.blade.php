<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Skills') }}
            </h2>
            <a href="{{ route('admin.skills.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Add New Skill
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">Name</th>
                                <th class="text-left py-2">Category</th>
                                <th class="text-left py-2">Level</th>
                                <th class="text-left py-2">Icon</th>
                                <th class="text-right py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($skills as $skill)
                            <tr class="border-b">
                                <td class="py-3">{{ $skill->name }}</td>
                                <td class="py-3">{{ $skill->category }}</td>
                                <td class="py-3">{{ $skill->proficiency_level }}%</td>
                                <td class="py-3"><i class="{{ $skill->icon }}"></i> {{ $skill->icon }}</td>
                                <td class="py-3 text-right">
                                    <a href="{{ route('admin.skills.edit', $skill) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
                                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">No skills yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
