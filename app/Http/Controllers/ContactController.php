<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendContactMailJob;
use App\Models\Contact;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:500',
        ]);

        Contact::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'message' => $validated['message'],
    ]);

        // Dispatch the email job
        SendContactMailJob::dispatch($validated['name'], $validated['email'], $validated['message']);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
