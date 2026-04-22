<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'name', 'value' => 'John Doe'],
            ['key' => 'title', 'value' => 'Full Stack Developer'],
            ['key' => 'tagline', 'value' => 'I help businesses build powerful digital solutions that drive growth and innovation.'],
            ['key' => 'email', 'value' => 'john@example.com'],
            ['key' => 'phone', 'value' => '+62 812 3456 7890'],
            ['key' => 'address', 'value' => 'Jakarta, Indonesia'],
            ['key' => 'bio', 'value' => 'Passionate developer with 5+ years of experience in web development. Specialized in Laravel, Vue.js, and modern web technologies.'],
            ['key' => 'about_story', 'value' => 'I started my journey in web development 5 years ago and have been passionate about creating elegant solutions to complex problems. My experience spans from startups to enterprise-level applications.'],
            ['key' => 'about_passion', 'value' => 'What drives me is the ability to transform ideas into reality through code. I love learning new technologies and applying them to solve real-world problems.'],
            ['key' => 'years_experience', 'value' => '5+'],
            ['key' => 'github', 'value' => 'https://github.com/johndoe'],
            ['key' => 'linkedin', 'value' => 'https://linkedin.com/in/johndoe'],
            ['key' => 'twitter', 'value' => 'https://twitter.com/johndoe'],
            ['key' => 'instagram', 'value' => 'https://instagram.com/johndoe'],
            ['key' => 'cv_file', 'value' => ''],
            ['key' => 'profile_image', 'value' => ''],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
