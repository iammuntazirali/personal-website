<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileLink extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileLinkFactory> */
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'url',
        'platform',
    ];
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
