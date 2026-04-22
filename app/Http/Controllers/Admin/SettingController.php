<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'tagline' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'bio' => 'nullable|string',
            'about_story' => 'nullable|string',
            'about_passion' => 'nullable|string',
            'years_experience' => 'nullable|string',
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'profile_image' => 'nullable|image|max:2048',
            'cv_file' => 'nullable|mimes:pdf|max:5120'
        ]);

        if ($request->hasFile('profile_image')) {
            $oldImage = Setting::where('key', 'profile_image')->first();
            if ($oldImage && $oldImage->value) {
                Storage::disk('public')->delete($oldImage->value);
            }
            $validated['profile_image'] = $request->file('profile_image')->store('profile', 'public');
        }

        if ($request->hasFile('cv_file')) {
            $oldCV = Setting::where('key', 'cv_file')->first();
            if ($oldCV && $oldCV->value) {
                Storage::disk('public')->delete($oldCV->value);
            }
            $validated['cv_file'] = $request->file('cv_file')->store('cv', 'public');
        }

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings berhasil diupdate!');
    }
}
