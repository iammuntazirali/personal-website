<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuer extends Model
{
    /** @use HasFactory<\Database\Factories\IssuerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'type',          
        'website',      
        'contact_email', 
    ];

    public function degrees()
    {
        return $this->hasMany(Degree::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
