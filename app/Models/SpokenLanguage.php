<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpokenLanguage extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_id',
        'name',          // Language name, e.g. English, Greek
        'proficiency',   // e.g. Native, Fluent, C2, B2
        'is_native',     // boolean
    ];
    protected $casts = [
        'is_native' => 'boolean',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
