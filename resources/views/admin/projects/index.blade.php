<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Projects') }}
            </h2>
            <a href="{{ route('admin.projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Add New Project
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
                                <th class="text-left py-2">Title</th>
                                <th class="text-left py-2">Technologies</th>
                                <th class="text-left py-2">Order</th>
                                <th class="text-left py-2">Featured</th>
                                <th class="text-right py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $project)
                            <tr class="border-b">
                                <td class="py-3">{{ $project->title }}</td>
                                <td class="py-3">{{ $project->technologies }}</td>
                                <td class="py-3">{{ $project->order }}</td>
                                <td class="py-3">
                                    @if($project->is_featured)
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Yes</span>
                                    @else
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">No</span>
                                    @endif
                                </td>
                                <td class="py-3 text-right">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">No projects yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
