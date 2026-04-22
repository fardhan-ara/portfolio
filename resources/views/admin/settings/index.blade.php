<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Personal Information</h3>
                        
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Name *</label>
                                <input type="text" name="name" value="{{ old('name', $settings['name'] ?? '') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">Title/Position *</label>
                                <input type="text" name="title" value="{{ old('title', $settings['title'] ?? '') }}" required placeholder="e.g., Full Stack Developer" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                @error('title')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Tagline/USP</label>
                            <input type="text" name="tagline" value="{{ old('tagline', $settings['tagline'] ?? '') }}" placeholder="e.g., I help businesses build powerful digital solutions" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            @error('tagline')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Email *</label>
                                <input type="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" placeholder="+62 812 3456 7890" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                @error('phone')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Address/Location</label>
                            <input type="text" name="address" value="{{ old('address', $settings['address'] ?? '') }}" placeholder="Jakarta, Indonesia" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            @error('address')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Years of Experience</label>
                            <input type="text" name="years_experience" value="{{ old('years_experience', $settings['years_experience'] ?? '') }}" placeholder="5+" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            @error('years_experience')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Bio (Short)</label>
                            <textarea name="bio" rows="3" placeholder="2-3 sentences about yourself" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">{{ old('bio', $settings['bio'] ?? '') }}</textarea>
                            @error('bio')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <h3 class="text-lg font-semibold mb-4 mt-6 border-b pb-2">About Me Section</h3>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Professional Story</label>
                            <textarea name="about_story" rows="4" placeholder="Your professional journey and background" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">{{ old('about_story', $settings['about_story'] ?? '') }}</textarea>
                            @error('about_story')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">What Drives You</label>
                            <textarea name="about_passion" rows="3" placeholder="What you love about your work" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">{{ old('about_passion', $settings['about_passion'] ?? '') }}</textarea>
                            @error('about_passion')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <h3 class="text-lg font-semibold mb-4 mt-6 border-b pb-2">Social Media Links</h3>

                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 mb-2">GitHub URL</label>
                                <input type="url" name="github" value="{{ old('github', $settings['github'] ?? '') }}" placeholder="https://github.com/username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                @error('github')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">LinkedIn URL</label>
                                <input type="url" name="linkedin" value="{{ old('linkedin', $settings['linkedin'] ?? '') }}" placeholder="https://linkedin.com/in/username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                @error('linkedin')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">Twitter URL</label>
                                <input type="url" name="twitter" value="{{ old('twitter', $settings['twitter'] ?? '') }}" placeholder="https://twitter.com/username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                @error('twitter')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">Instagram URL</label>
                                <input type="url" name="instagram" value="{{ old('instagram', $settings['instagram'] ?? '') }}" placeholder="https://instagram.com/username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                @error('instagram')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <h3 class="text-lg font-semibold mb-4 mt-6 border-b pb-2">Files</h3>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Profile Image</label>
                            @if(isset($settings['profile_image']) && $settings['profile_image'])
                            <img src="{{ asset('storage/' . $settings['profile_image']) }}" alt="Profile" class="w-32 h-32 object-cover rounded-full mb-2">
                            @endif
                            <input type="file" name="profile_image" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
                            <p class="text-sm text-gray-500 mt-1">Recommended: 500x500px, max 2MB</p>
                            @error('profile_image')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">CV File (PDF)</label>
                            @if(isset($settings['cv_file']) && $settings['cv_file'])
                            <p class="text-sm text-green-600 mb-2">✓ CV sudah diupload</p>
                            @endif
                            <input type="file" name="cv_file" accept=".pdf" class="w-full px-4 py-2 border rounded-lg">
                            <p class="text-sm text-gray-500 mt-1">Max 5MB</p>
                            @error('cv_file')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="flex gap-4 mt-6">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Save Settings</button>
                            <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
