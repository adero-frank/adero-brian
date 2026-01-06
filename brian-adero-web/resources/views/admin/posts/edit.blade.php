@extends('layouts.admin')

@section('page-title', 'Edit Post')
@section('page-subtitle', 'Update post details')

@section('content')
    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="max-w-4xl">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-lg border border-slate-200 p-8 space-y-6">
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-bold text-slate-700 mb-2">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required
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
                    <option value="blog" {{ old('type', $post->type) === 'blog' ? 'selected' : '' }}>Blog</option>
                    <option value="insight" {{ old('type', $post->type) === 'insight' ? 'selected' : '' }}>Insight</option>
                </select>
                @error('type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-bold text-slate-700 mb-2">Content</label>
                <textarea id="content" name="content" rows="15" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent font-mono text-sm @error('content') border-red-500 @enderror">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Insight Specific Fields -->
            <div id="insight-fields" class="space-y-6 {{ (old('type', $post->type) === 'insight') ? '' : 'hidden' }}">
                <div class="bg-slate-50 p-6 rounded-lg border border-slate-200">
                    <h3 class="font-bold text-slate-900 mb-4">Insight Details</h3>

                    <!-- Key Takeaways -->
                    <div class="mb-6">
                        <label for="key_takeaways" class="block text-sm font-bold text-slate-700 mb-2">Key Takeaways /
                            Executive Summary</label>
                        <textarea id="key_takeaways" name="key_takeaways" rows="4"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent font-mono text-sm">{{ old('key_takeaways', $post->key_takeaways) }}</textarea>
                        <p class="mt-2 text-sm text-slate-500">Brief bullet points or summary of the legal analysis.</p>
                    </div>

                    <!-- Citation -->
                    <div>
                        <label for="citation" class="block text-sm font-bold text-slate-700 mb-2">Legal Citation / Case
                            Reference</label>
                        <input type="text" id="citation" name="citation" value="{{ old('citation', $post->citation) }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent"
                            placeholder="e.g. Republic v. John Doe (2024) eKLR">
                    </div>
                </div>
            </div>

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
                });
            </script>

            <!-- Current Image -->
            @if($post->image_path)
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Current Cover Image</label>
                    <div class="relative inline-block">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Current cover"
                            class="h-32 rounded-lg border border-slate-200">
                        <label class="absolute top-2 right-2">
                            <input type="checkbox" name="remove_image" value="1" class="rounded">
                            <span class="ml-1 text-xs bg-white px-2 py-1 rounded shadow">Remove</span>
                        </label>
                    </div>
                </div>
            @endif

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-sm font-bold text-slate-700 mb-2">
                    {{ $post->image_path ? 'Replace Cover Image' : 'Cover Image' }} (Optional)
                </label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Attachment -->
            @if($post->attachment_path)
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Current PDF Attachment</label>
                    <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <a href="{{ asset('storage/' . $post->attachment_path) }}" target="_blank"
                                class="text-sm font-medium text-slate-900 hover:text-blue-600 underline">
                                View PDF
                            </a>
                        </div>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remove_attachment" value="1"
                                class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                            <span class="text-sm text-red-600 font-medium">Remove</span>
                        </label>
                    </div>
                </div>
            @endif

            <!-- PDF Attachment Upload -->
            <div>
                <label for="attachment" class="block text-sm font-bold text-slate-700 mb-2">
                    {{ $post->attachment_path ? 'Replace PDF Attachment' : 'PDF Attachment' }} (Optional)
                </label>
                <input type="file" id="attachment" name="attachment" accept="application/pdf"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent @error('attachment') border-red-500 @enderror">
                @error('attachment')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-slate-500">Upload a PDF document. Max 10MB.</p>
            </div>

            <!-- Current Attachment -->
            @if($post->attachment_path)
                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Current PDF Attachment</label>
                    <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <a href="{{ asset('storage/' . $post->attachment_path) }}" target="_blank"
                                class="text-sm font-medium text-slate-900 hover:text-blue-600 underline">
                                View PDF
                            </a>
                        </div>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remove_attachment" value="1"
                                class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                            <span class="text-sm text-red-600 font-medium">Remove</span>
                        </label>
                    </div>
                </div>
            @endif

            <!-- PDF Attachment Upload -->
            <div class="mb-6">
                <label for="attachment" class="block text-sm font-bold text-slate-700 mb-2">
                    {{ $post->attachment_path ? 'Replace PDF Attachment' : 'PDF Attachment' }} (Optional)
                </label>
                <input type="file" id="attachment" name="attachment" accept="application/pdf"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent @error('attachment') border-red-500 @enderror">
                @error('attachment')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-slate-500">Upload a PDF document. Max 10MB.</p>
            </div>

            <!-- Publish Date -->
            <div>
                <label for="published_at" class="block text-sm font-bold text-slate-700 mb-2">Publish Date</label>
                <input type="datetime-local" id="published_at" name="published_at"
                    value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-900 focus:border-transparent @error('published_at') border-red-500 @enderror">
                @error('published_at')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-slate-500">Leave empty to save as draft.</p>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('admin.posts.index', ['type' => $post->type]) }}"
                class="px-6 py-3 text-slate-700 hover:text-slate-900 font-medium">
                Cancel
            </a>
            <button type="submit"
                class="px-6 py-3 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition-colors font-medium">
                Update Post
            </button>
        </div>
    </form>

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
@endsection