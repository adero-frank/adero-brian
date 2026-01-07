@extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome back!')

@section('content')
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <!-- Subscribers -->
        <div class="bg-white p-6 rounded-lg border border-slate-200">
            <div class="flex items-center justify-between mb-2">
                <p class="text-sm font-medium text-slate-600">Subscribers</p>
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <p class="text-3xl font-bold text-slate-900">{{ $subscribersCount }}</p>
            <div class="text-xs text-slate-500 mt-1">Total leads</div>
        </div>

        <!-- Contact Submissions -->
        <div class="bg-white p-6 rounded-lg border border-slate-200">
            <div class="flex items-center justify-between mb-2">
                <p class="text-sm font-medium text-slate-600">Contact Inquiries</p>
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
            </div>
            <p class="text-3xl font-bold text-slate-900">{{ $contactSubmissionsCount }}</p>
            @if($unreadContactsCount > 0)
                <p class="text-xs text-blue-600 mt-1">{{ $unreadContactsCount }} unread</p>
            @endif
        </div>

        <!-- Blogs -->
        <div class="bg-white p-6 rounded-lg border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Blogs</p>
                    <p class="text-3xl font-bold text-slate-900 mt-2">{{ \App\Models\Post::where('type', 'blog')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Insights -->
        <div class="bg-white p-6 rounded-lg border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Insights</p>
                    <p class="text-3xl font-bold text-slate-900 mt-2">{{ \App\Models\Post::where('type', 'insight')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Published -->
        <div class="bg-white p-6 rounded-lg border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Published</p>
                    <p class="text-3xl font-bold text-slate-900 mt-2">
                        {{ \App\Models\Post::whereNotNull('published_at')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Drafts -->
        <div class="bg-white p-6 rounded-lg border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Drafts</p>
                    <p class="text-3xl font-bold text-slate-900 mt-2">
                        {{ \App\Models\Post::whereNull('published_at')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg border border-slate-200 p-6 mb-8">
        <h2 class="text-lg font-bold text-slate-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.posts.create', ['type' => 'blog']) }}"
                class="flex items-center gap-3 p-4 border-2 border-dashed border-slate-300 rounded-lg hover:border-slate-900 hover:bg-slate-50 transition-all">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <div>
                    <div class="font-bold text-slate-900">New Blog</div>
                    <div class="text-sm text-slate-500">Create post</div>
                </div>
            </a>

            <a href="{{ route('admin.posts.create', ['type' => 'insight']) }}"
                class="flex items-center gap-3 p-4 border-2 border-dashed border-slate-300 rounded-lg hover:border-slate-900 hover:bg-slate-50 transition-all">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <div>
                    <div class="font-bold text-slate-900">New Insight</div>
                    <div class="text-sm text-slate-500">Create insight</div>
                </div>
            </a>

            <a href="{{ route('admin.posts.index') }}"
                class="flex items-center gap-3 p-4 border-2 border-dashed border-slate-300 rounded-lg hover:border-slate-900 hover:bg-slate-50 transition-all">
                <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <div>
                    <div class="font-bold text-slate-900">All Posts</div>
                    <div class="text-sm text-slate-500">View all</div>
                </div>
            </a>

            <a href="{{ route('admin.content.index') }}"
                class="flex items-center gap-3 p-4 border-2 border-dashed border-slate-300 rounded-lg hover:border-slate-900 hover:bg-slate-50 transition-all">
                <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <div>
                    <div class="font-bold text-slate-900">Site Settings</div>
                    <div class="text-sm text-slate-500">Edit content</div>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="bg-white rounded-lg border border-slate-200 p-6">
        <h2 class="text-lg font-bold text-slate-900 mb-4">Recent Posts</h2>
        <div class="space-y-4">
            @forelse(\App\Models\Post::latest()->take(5)->get() as $post)
                <div class="flex items-center justify-between p-4 border border-slate-200 rounded-lg">
                    <div class="flex-1">
                        <h3 class="font-medium text-slate-900">{{ $post->title }}</h3>
                        <p class="text-sm text-slate-500 mt-1">
                            {{ $post->type === 'blog' ? 'Blog' : 'Insight' }} •
                            {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}
                        </p>
                    </div>
                    <a href="{{ route('admin.posts.edit', $post) }}"
                        class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-100 rounded-lg transition-colors">
                        Edit
                    </a>
                </div>
            @empty
                <p class="text-slate-500 text-center py-8">No posts yet. Create your first post!</p>
            @endforelse
        </div>
    </div>
@endsection