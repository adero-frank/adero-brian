@extends('layouts.admin')

@section('page-title', 'Reply to Message')
@section('page-subtitle', 'Replying to: ' . $submission->name)

@section('content')
    <div class="max-w-3xl">
        <div class="mb-6">
            <a href="{{ route('admin.contact-submissions.show', $submission) }}"
                class="flex items-center text-slate-500 hover:text-slate-700 transition-colors">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Message
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
            <form action="{{ route('admin.contact-submissions.send-reply', $submission) }}" method="POST" class="p-6">
                @csrf

                <div class="mb-6">
                    <label class="block text-sm font-medium text-slate-700 mb-1">To</label>
                    <input type="text" value="{{ $submission->email }}" disabled
                        class="w-full bg-slate-50 border border-slate-300 rounded-md py-2 px-3 text-slate-500">
                </div>

                <div class="mb-6">
                    <label for="subject" class="block text-sm font-medium text-slate-700 mb-1">Subject</label>
                    <input type="text" name="subject" id="subject" value="Re: Inquiry via Website" required
                        class="w-full border-slate-300 rounded-md shadow-sm focus:border-slate-500 focus:ring-slate-500">
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-sm font-medium text-slate-700 mb-1">Message</label>
                    <textarea name="message" id="message" rows="10" required
                        class="w-full border-slate-300 rounded-md shadow-sm focus:border-slate-500 focus:ring-slate-500 font-sans"></textarea>
                    <p class="mt-2 text-xs text-slate-500">Professional signature is automatically not added, please sign
                        your name.</p>
                </div>

                <div class="mb-8 border-l-4 border-slate-200 pl-4 text-slate-500 text-sm italic">
                    <p class="font-bold not-italic mb-1">Original Message:</p>
                    {{ Str::limit($submission->message, 300) }}
                </div>

                <div class="flex items-center justify-end space-x-3">
                    <a href="{{ route('admin.contact-submissions.show', $submission) }}"
                        class="px-4 py-2 border border-slate-300 rounded-md text-sm font-medium text-slate-700 hover:bg-slate-50">Cancel</a>
                    <button type="submit"
                        class="px-4 py-2 bg-slate-900 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                        Send Reply
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Summernote Editor -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#message').summernote({
            placeholder: 'Write your reply here...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection