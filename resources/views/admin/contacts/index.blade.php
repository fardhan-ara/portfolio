<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Messages') }}
        </h2>
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
                    @forelse($contacts as $contact)
                    <div class="border-b pb-4 mb-4 last:border-b-0">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="font-bold text-lg">{{ $contact->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $contact->email }}</p>
                                @if($contact->subject)
                                <p class="text-sm text-gray-600">Subject: {{ $contact->subject }}</p>
                                @endif
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-gray-500">{{ $contact->created_at->diffForHumans() }}</span>
                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded">
                            <p class="text-gray-700">{{ $contact->message }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-gray-500 py-8">No messages yet</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
