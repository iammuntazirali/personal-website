<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'slug',
        'description',
        'project_url',
        'github_url',
        'status',
    ];

    protected $casts = [
        'highlights' => 'array',
    ];
}
