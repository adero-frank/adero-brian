@extends('layouts.admin')

@section('page-title', 'Contact Submission Details')
@section('page-subtitle', 'Message from: ' . $submission->name)

@section('content')
    <div class="max-w-3xl">
        <div class="mb-6">
            <a href="{{ route('admin.contact-submissions.index') }}"
                class="flex items-center text-slate-500 hover:text-slate-700 transition-colors">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Inbox
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex justify-between items-center">
                <div class="text-sm text-slate-500">
                    Received {{ $submission->created_at->format('M d, Y \a\t h:i A') }}
                </div>
                <div class="flex space-x-2">
                    <form action="{{ route('admin.contact-submissions.destroy', $submission) }}" method="POST"
                        class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this submission?')"
                            class="px-3 py-1 bg-white border border-red-200 text-red-600 rounded hover:bg-red-50 text-sm transition-colors">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">From</h3>
                        <p class="text-lg font-medium text-slate-900">{{ $submission->name }}</p>
                    </div>

                    <div class="md:text-right">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Status</h3>
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Read
                        </span>
                    </div>

                    <div>
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Email</h3>
                        <a href="mailto:{{ $submission->email }}" class="text-blue-600 hover:text-blue-800 hover:underline">
                            {{ $submission->email }}
                        </a>
                    </div>

                    <div>
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Phone</h3>
                        <p class="text-slate-700">{{ $submission->phone ?? 'Not provided' }}</p>
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-6">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Message Details</h3>
                    <div class="prose max-w-none text-slate-800 bg-slate-50 p-6 rounded-lg border border-slate-100 italic">
                        {{ $submission->message }}
                    </div>
                </div>

                <div class="mt-8 border-t border-slate-100 pt-6">
                    <a href="{{ route('admin.contact-submissions.reply', $submission) }}"
                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                        </svg>
                        Reply
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection