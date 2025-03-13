<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendContactMailJob;

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

        // Dispatch the email job
        SendContactMailJob::dispatch($validated['name'], $validated['email'], $validated['message']);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
