<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /** @use HasFactory<\Database\Factories\CertificateFactory> */
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'issuer_id',
        'spoken_language_id',
        'name',
        'description',
        'date_awarded',
        'expiration_date',
        'credential_link',
        'image',
    ];

    protected $casts = [
        'date_awarded' => 'date',
        'expiration_date' => 'date',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function issuer()
    {
        return $this->belongsTo(Issuer::class);
    }

    public function spokenLanguage()
    {
        return $this->belongsTo(SpokenLanguage::class);
    }
}
