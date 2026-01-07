@extends('layouts.admin')

@section('page-title', 'Manage ' . (request('type') ? ucfirst(Str::plural(request('type'))) : 'Posts'))
@section('page-subtitle', 'View and manage all ' . (request('type') ? Str::plural(request('type')) : 'blog posts and insights'))

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div class="flex gap-4">
            <a href="{{ route('admin.posts.index') }}"
                class="px-4 py-2 {{ !request('type') ? 'bg-slate-900 text-white' : 'bg-white text-slate-700' }} rounded-lg font-medium">
                All Posts
            </a>
            <a href="{{ route('admin.posts.index', ['type' => 'blog']) }}"
                class="px-4 py-2 {{ request('type') === 'blog' ? 'bg-slate-900 text-white' : 'bg-white text-slate-700' }} rounded-lg font-medium">
                Blogs
            </a>
            <a href="{{ route('admin.posts.index', ['type' => 'insight']) }}"
                class="px-4 py-2 {{ request('type') === 'insight' ? 'bg-slate-900 text-white' : 'bg-white text-slate-700' }} rounded-lg font-medium">
                Insights
            </a>
        </div>
        <a href="{{ route('admin.posts.create', ['type' => request('type')]) }}"
            class="flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition-colors font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            New {{ request('type') ? ucfirst(request('type')) : 'Post' }}
        </a>
    </div>

    <div class="bg-white rounded-lg border border-slate-200">
        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-slate-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse($posts as $post)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4">
                            <div class="font-medium text-slate-900">{{ $post->title }}</div>
                            <div class="text-sm text-slate-500">{{ Str::limit($post->slug, 50) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 text-xs font-medium rounded-full {{ $post->type === 'blog' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                {{ ucfirst($post->type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($post->published_at)
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    Published
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">
                            {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                @if($post->published_at)
                                    <a href="{{ route($post->type === 'blog' ? 'blogs.show' : 'insights.show', $post->slug) }}"
                                        target="_blank"
                                        class="p-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                @endif
                                <a href="{{ route('admin.posts.edit', $post) }}"
                                    class="p-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-lg transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="p-2 text-red-600 hover:text-red-900 hover:bg-red-50 rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                            No posts found. Create your first post!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($posts->hasPages())
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    @endif
@endsection