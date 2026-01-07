<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Mail\VerifySubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns|unique:subscribers,email'
        ]);

        $token = Str::random(32);

        Subscriber::create([
            'email' => $request->email,
            'is_active' => false,
            'verification_token' => $token
        ]);

        Mail::to($request->email)->send(new VerifySubscription($token));

        return back()->with('newsletter_success', 'Please check your email to confirm your subscription.');
    }

    public function verify($token)
    {
        $subscriber = Subscriber::where('verification_token', $token)->first();

        if (!$subscriber) {
            return redirect('/')->with('error', 'Invalid verification link.');
        }

        $subscriber->update([
            'is_active' => true,
            'verification_token' => null
        ]);

        return redirect('/')->with('newsletter_success', 'Subscription confirmed! Thank you.');
    }
}
