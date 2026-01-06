@extends('layouts.site')

@section('title', $post->title . ' | Brian Adero')
@section('description', $post->excerpt)

@section('meta')
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->excerpt }}">
    <meta property="og:image"
        content="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('assets/images/brian.jpeg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
    <!-- Header / Hero Section -->
    <header class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            @if($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover">
            @endif
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent"></div>

        <div class="relative max-w-7xl mx-auto px-6 fade-up">
            <a href="{{ $post->type === 'blog' ? route('blogs.index') : route('insights.index') }}"
                class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-slate-400 hover:text-white transition-colors mb-8">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to {{ $post->type === 'blog' ? 'Blogs' : 'Insights' }}
            </a>

            <div class="max-w-4xl">
                <div class="flex items-center gap-4 text-sm text-slate-400 mb-6">
                    <span
                        class="px-3 py-1 border border-slate-600 rounded-full bg-slate-800/50 uppercase tracking-widest text-xs font-bold">
                        {{ $post->type }}
                    </span>
                    <span>&bull;</span>
                    <span>{{ $post->published_at->format('F d, Y') }}</span>
                    <span>&bull;</span>
                    <span>By Brian Adero</span>
                </div>

                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight">
                    {{ $post->title }}
                </h1>
            </div>
        </div>
    </header>

    <!-- Main Content Grid -->
    <div class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid lg:grid-cols-12 gap-12 text-slate-600">

                <!-- Left Column: Article -->
                <article class="lg:col-span-8">
                    @if($post->image_path)
                        <div class="aspect-video bg-slate-100 rounded-xl overflow-hidden mb-10 shadow-lg">
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div
                        class="prose prose-lg prose-slate dark:prose-invert max-w-none prose-headings:font-serif prose-headings:text-slate-900 dark:prose-headings:text-white prose-a:text-blue-900 dark:prose-a:text-blue-400 prose-img:rounded-xl transition-colors">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    <!-- Share / Tags Footer -->
                    <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-800 transition-colors">
                        <h4
                            class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-widest mb-4 transition-colors">
                            Share this post</h4>
                        <div class="flex gap-4">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                target="_blank" rel="noopener noreferrer"
                                class="p-2 bg-slate-100 dark:bg-slate-800 rounded-full hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors text-slate-600 dark:text-slate-400">
                                <span class="sr-only">Twitter</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                target="_blank" rel="noopener noreferrer"
                                class="p-2 bg-slate-100 dark:bg-slate-800 rounded-full hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors text-slate-600 dark:text-slate-400">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                </svg>
                            </a>
                        </div>
                    </div>


                    <!-- Download Attachment -->
                    @if($post->attachment_path)
                        <div class="mt-8 pt-8 border-t border-slate-200 dark:border-slate-800 transition-colors">
                            <h4
                                class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-widest mb-4 transition-colors">
                                Attached Documents</h4>
                            <a href="{{ asset('storage/' . $post->attachment_path) }}" target="_blank"
                                class="inline-flex items-center gap-3 p-4 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg hover:border-slate-300 dark:hover:border-slate-600 transition-colors group">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <div
                                        class="font-bold text-slate-900 dark:text-white text-sm group-hover:text-blue-700 dark:group-hover:text-blue-400 transition-colors">
                                        Download PDF
                                        Attachment
                                    </div>
                                </div>
                                <svg class="w-4 h-4 ml-2 text-slate-400 group-hover:text-slate-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </article>

                <!-- Right Column: Sidebar -->
                <aside class="lg:col-span-4 space-y-8">

                    <!-- Author Widget -->
                    <div
                        class="bg-slate-50 dark:bg-slate-800 p-6 rounded-xl border border-slate-100 dark:border-slate-700 transition-colors">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-16 h-16 rounded-full overflow-hidden bg-slate-200 dark:bg-slate-700">
                                <img src="{{ asset('assets/images/brian.jpeg') }}" alt="Brian Adero"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-serif text-lg text-slate-900 dark:text-white font-bold transition-colors">
                                    Brian Adero</h3>
                                <p
                                    class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wider transition-colors">
                                    Advocate</p>
                            </div>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-300 mb-4 leading-relaxed transition-colors">
                            An Advocate of the High Court of Kenya specializing in corporate law, commercial litigation, and
                            family practice.
                        </p>
                        <a href="{{ route('about') }}"
                            class="text-sm font-bold text-slate-900 dark:text-white hover:text-blue-700 dark:hover:text-blue-400 underline decoration-slate-300 dark:decoration-slate-600 underline-offset-4 transition-colors">More
                            About Me &rarr;</a>
                    </div>

                    <!-- Recent Posts Widget -->
                    @if($recentPosts->count() > 0)
                        <div
                            class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm transition-colors">
                            <h3
                                class="font-serif text-lg text-slate-900 dark:text-white font-bold mb-6 pb-2 border-b border-slate-100 dark:border-slate-700 transition-colors">
                                Recent
                                {{ $post->type === 'blog' ? 'Blogs' : 'Insights' }}
                            </h3>
                            <div class="space-y-6">
                                @foreach($recentPosts as $recent)
                                    <a href="{{ $recent->type === 'blog' ? route('blogs.show', $recent->slug) : route('insights.show', $recent->slug) }}"
                                        class="group flex gap-4 items-start">
                                        @if($recent->image_path)
                                            <div
                                                class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden bg-slate-100 dark:bg-slate-700 transition-colors">
                                                <img src="{{ asset('storage/' . $recent->image_path) }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            </div>
                                        @endif
                                        <div>
                                            <h4
                                                class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-blue-700 dark:group-hover:text-blue-400 transition-colors line-clamp-2 leading-snug mb-1">
                                                {{ $recent->title }}
                                            </h4>
                                            <span
                                                class="text-xs text-slate-400 dark:text-slate-500">{{ $recent->published_at->format('M d, Y') }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Newsletter / CTA Widget -->
                    <div class="bg-slate-900 p-8 rounded-xl text-center text-white relative overflow-hidden">
                        <div class="absolute inset-0 bg-blue-900/20"></div>
                        <div class="relative z-10">
                            <h3 class="font-serif text-xl font-bold mb-2">Need Legal Advice?</h3>
                            <p class="text-slate-300 text-sm mb-6">Schedule a consultation today to discuss your case.</p>
                            <a href="{{ route('contact') }}"
                                class="inline-block w-full py-3 bg-white text-slate-900 font-bold text-sm rounded-lg hover:bg-slate-100 transition-colors">
                                Contact Me
                            </a>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </div>
@endsection