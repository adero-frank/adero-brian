<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormSubmission;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        // Save to database
        ContactSubmission::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'],
        ]);

        // Send email to admin
        Mail::to('brianaderoadv@gmail.com')->send(
            new ContactFormSubmission(
                $validated['name'],
                $validated['email'],
                $validated['phone'] ?? 'Not provided',
                $validated['message']
            )
        );

        return back()->with('contact_success', 'Thank you for your message! I will get back to you soon.');
    }
}
