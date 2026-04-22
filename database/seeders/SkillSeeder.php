<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'category' => 'Backend', 'proficiency_level' => 90, 'icon' => 'fab fa-laravel'],
            ['name' => 'PHP', 'category' => 'Backend', 'proficiency_level' => 85, 'icon' => 'fab fa-php'],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'proficiency_level' => 88, 'icon' => 'fab fa-js'],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'proficiency_level' => 80, 'icon' => 'fab fa-vuejs'],
            ['name' => 'React', 'category' => 'Frontend', 'proficiency_level' => 75, 'icon' => 'fab fa-react'],
            ['name' => 'Node.js', 'category' => 'Backend', 'proficiency_level' => 70, 'icon' => 'fab fa-node-js'],
            ['name' => 'MySQL', 'category' => 'Database', 'proficiency_level' => 85, 'icon' => 'fas fa-database'],
            ['name' => 'Git', 'category' => 'Tools', 'proficiency_level' => 90, 'icon' => 'fab fa-git-alt'],
            ['name' => 'Docker', 'category' => 'DevOps', 'proficiency_level' => 65, 'icon' => 'fab fa-docker'],
            ['name' => 'AWS', 'category' => 'Cloud', 'proficiency_level' => 70, 'icon' => 'fab fa-aws'],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'proficiency_level' => 92, 'icon' => 'fas fa-palette'],
            ['name' => 'Python', 'category' => 'Backend', 'proficiency_level' => 75, 'icon' => 'fab fa-python'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
