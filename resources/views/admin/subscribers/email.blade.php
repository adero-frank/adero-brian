@extends('layouts.admin')

@section('page-title', 'Compose Newsletter')
@section('page-subtitle', 'Send an email to all active subscribers')

@section('content')
    <div class="max-w-4xl">
        <form action="{{ route('admin.subscribers.send') }}" method="POST"
            class="bg-white rounded-lg border border-slate-200 p-8 space-y-6">
            @csrf

            <div class="bg-blue-50 text-blue-800 p-4 rounded-lg text-sm mb-6 border border-blue-100 flex items-start gap-3">
                <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p>This email will be sent to all
                    <strong>{{ \App\Models\Subscriber::where('is_active', true)->count() }}</strong> active subscribers.
                    Please verify your message carefully before sending.
                </p>
            </div>

            <!-- Subject -->
            <div>
                <label for="subject" class="block text-sm font-bold text-slate-700 mb-2">Subject Line</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent @error('subject') border-red-500 @enderror">
                @error('subject')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Message -->
            <div>
                <label for="message" class="block text-sm font-bold text-slate-700 mb-2">Message</label>
                <textarea id="message" name="message" required class="@error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                @error('message')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Summernote CSS -->
            <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
            
            <!-- jQuery (required for Summernote) -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            
            <!-- Summernote JS -->
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
            
            <script>
                $(document).ready(function() {
                    $('#message').summernote({
                        height: 400,
                        placeholder: 'Compose your newsletter here...',
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline', 'clear']],
                            ['fontname', ['fontname']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link']],
                            ['view', ['codeview', 'help']]
                        ],
                        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Georgia', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana'],
                        fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Georgia', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana']
                    });
                });
            </script>

            <!-- Actions -->
            <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                <a href="{{ route('admin.subscribers.index') }}"
                    class="px-6 py-3 text-slate-700 hover:text-slate-900 font-medium">
                    Cancel
                </a>
                <button type="submit"
                    onclick="return confirm('Are you sure you want to send this newsletter to all subscribers? This action cannot be undone.')"
                    class="px-8 py-3 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition-colors font-bold flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    Send Newsletter
                </button>
            </div>
        </form>
    </div>
@endsection