<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function index()
    {
        $user = User::with('profiles.links' , 'profiles.degrees.organization')->first();
        $profile = $user?->profiles->first();

        // Format degrees
        $degrees = ($profile?->degrees ?? collect())->map(function($degree) {
            $degree->formatted_start = $degree->start_date 
                ? Carbon::parse($degree->start_date)->format('M Y') 
                : '?';
            $degree->formatted_end = $degree->end_date 
                ? Carbon::parse($degree->end_date)->format('M Y') 
                : 'Present';
            return $degree;
        });

        // Format certificates
        $certificates = ($profile?->certificates ?? collect())->map(function($cert) {
            $cert->formatted_date = $cert->date_awarded 
                ? Carbon::parse($cert->date_awarded)->format('M Y') 
                : '?';
            return $cert;
        });

        return view('pages.about', [
            'user' => $user,
            'profile' => $profile,
            'degrees' => $degrees,
            'certificates' => $certificates
        ]);
    }
}
