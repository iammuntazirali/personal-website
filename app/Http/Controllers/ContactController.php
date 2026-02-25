<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Profile;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Mail::raw($validated['message'], function ($message) use ($validated) {
            $message->to(env('MAIL_TO_ADDRESS'))
                    ->subject("Message from: {$validated['name']}")
                    ->replyTo($validated['email']);
        });

        return back()->with('success', 'Message sent!');
    }
}
