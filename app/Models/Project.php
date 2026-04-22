<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'role',
        'challenge',
        'solution',
        'results',
        'image',
        'technologies',
        'link',
        'github_link',
        'order',
        'is_featured'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
