<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AboutController extends Controller
{
    public function index()
    {
        $user = User::with('profiles')->first();
        $profile = $user?->profiles->first();

        return view('pages.about', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }
}
