@extends('layouts.admin')

@section('page-title', 'Create New ' . (request('type') ? ucfirst(request('type')) : 'Post'))
@section('page-subtitle', request('type') === 'insight' ? 'Write a detailed legal insight with executive summary' : 'Write a new blog post or article')

@section('content')
    @if ($errors->any())
        <div class="max-w-4xl mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
            <div class="flex gap-3">
                <svg class="w-5 h-5 text-red-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="text-sm text-red-800">
                    <p class="font-medium mb-1">There were errors with your submission:</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl">
        @csrf

        <div class="bg-white rounded-lg border border-slate-200 p-8 space-y-6">
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-bold text-slate-700 mb-2">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Type -->
            <div>
                <label for="type" class="block text-sm font-bold text-slate-700 mb-2">Type</label>
                <select id="type" name="type" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent @error('type') border-red-500 @enderror">
                    <option value="blog" {{ (old('type') ?? request('type')) === 'blog' ? 'selected' : '' }}>Blog</option>
                    <option value="insight" {{ (old('type') ?? request('type')) === 'insight' ? 'selected' : '' }}>Insight
                    </option>
                </select>
                @error('type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Insight Specific Fields -->
            <div id="insight-fields" class="space-y-6 {{ (old('type') ?? request('type')) === 'insight' ? '' : 'hidden' }}">
                <div class="bg-slate-50 p-6 rounded-lg border border-slate-200">
                    <h3 class="font-bold text-slate-900 mb-4">Insight Details</h3>

                    <!-- Key Takeaways -->
                    <div class="mb-6">
                        <label for="key_takeaways" class="block text-sm font-bold text-slate-700 mb-2">Key Takeaways /
                            Executive Summary</label>
                        <textarea id="key_takeaways" name="key_takeaways" rows="4"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent font-mono text-sm">{{ old('key_takeaways') }}</textarea>
                        <p class="mt-2 text-sm text-slate-500">Brief bullet points or summary of the legal analysis.</p>
                    </div>

                    <!-- Citation -->
                    <div>
                        <label for="citation" class="block text-sm font-bold text-slate-700 mb-2">Legal Citation / Case
                            Reference</label>
                        <input type="text" id="citation" name="citation" value="{{ old('citation') }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent"
                            placeholder="e.g. Republic v. John Doe (2024) eKLR">
                    </div>
                </div>
            </div>

            <!-- PDF Attachment -->
            <div>
                <label for="attachment" class="block text-sm font-bold text-slate-700 mb-2">PDF Attachment
                    (Optional)</label>
                <input type="file" id="attachment" name="attachment" accept="application/pdf"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent @error('attachment') border-red-500 @enderror">
                @error('attachment')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-slate-500">Upload a PDF document (e.g. detailed report, legal brief). Max 10MB.
                </p>
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-bold text-slate-700 mb-2">Content</label>
                <textarea id="content" name="content" rows="15" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent font-mono text-sm @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-slate-500">Write your content here. Line breaks will be preserved.</p>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-sm font-bold text-slate-700 mb-2">Cover Image (Optional)</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-slate-500">Recommended size: 1200x630px. Max 10MB. Formats: JPEG, PNG, GIF, WebP
                </p>
            </div>

            <!-- Publish Date -->
            <div>
                <label for="published_at" class="block text-sm font-bold text-slate-700 mb-2">Publish Date
                    (Optional)</label>
                <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at') }}"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent @error('published_at') border-red-500 @enderror">
                @error('published_at')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-slate-500">Leave empty to save as draft. Set a date to publish immediately or
                    schedule for later.</p>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('admin.posts.index', ['type' => request('type')]) }}"
                class="px-6 py-3 text-slate-700 hover:text-slate-900 font-medium">
                Cancel
            </a>
            <div class="flex gap-3">
                <button type="submit" name="action" value="draft"
                    class="px-6 py-3 bg-white border-2 border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors font-medium">
                    Save as Draft
                </button>
                <button type="submit" name="action" value="publish"
                    class="px-6 py-3 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition-colors font-medium">
                    Publish Now
                </button>
            </div>
        </div>
        <!-- Insight Toggle Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const typeSelect = document.getElementById('type');
                const insightFields = document.getElementById('insight-fields');

                function toggleFields() {
                    if (typeSelect.value === 'insight') {
                        insightFields.classList.remove('hidden');
                    } else {
                        insightFields.classList.add('hidden');
                    }
                }


                typeSelect.addEventListener('change', toggleFields);
                toggleFields(); // Ensure correct state on load
            });
        </script>

        <!-- Summernote CSS -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

        <!-- jQuery (required for Summernote) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Summernote JS -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#content').summernote({
                    height: 400,
                    placeholder: 'Write your blog/insight content here...',
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']],
                        ['view', ['codeview', 'help']]
                    ],
                    fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Georgia', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana'],
                    fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Georgia', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana']
                });
            });
        </script>
    </form>
@endsection