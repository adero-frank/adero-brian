<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index()
    {
        $submissions = ContactSubmission::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.contact-submissions.index', compact('submissions'));
    }

    public function show(ContactSubmission $submission)
    {
        $submission->update(['is_read' => true]);
        return view('admin.contact-submissions.show', compact('submission'));
    }

    public function destroy(ContactSubmission $submission)
    {
        $submission->delete();
        return redirect()->route('admin.contact-submissions.index')
            ->with('success', 'Contact submission deleted successfully.');
    }

    public function reply(ContactSubmission $submission)
    {
        return view('admin.contact-submissions.reply', compact('submission'));
    }

    public function sendReply(Request $request, ContactSubmission $submission)
    {
        $validated = $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        \Illuminate\Support\Facades\Mail::to($submission->email)->send(
            new \App\Mail\ReplyToContact($validated['subject'], $validated['message'])
        );

        return redirect()->route('admin.contact-submissions.show', $submission)
            ->with('success', 'Reply sent successfully.');
    }
}
