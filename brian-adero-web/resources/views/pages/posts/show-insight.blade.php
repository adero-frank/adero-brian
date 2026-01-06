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
    <!-- Insight Header -->
    <header class="pt-32 pb-24 bg-slate-900 text-white border-b border-slate-800">
        <div class="max-w-5xl mx-auto px-6 text-center fade-up">
            <span
                class="inline-block px-3 py-1 border border-slate-700 rounded-full bg-slate-800 text-xs font-bold uppercase tracking-widest mb-6 text-slate-300">
                Legal Insight
            </span>
            <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl leading-tight mb-8 font-medium">
                {{ $post->title }}
            </h1>
            <div class="flex items-center justify-center gap-6 text-sm text-slate-400 font-serif italic">
                <span>By Brian Adero</span>
                <span class="w-1 h-1 bg-slate-600 rounded-full"></span>
                <span>{{ $post->published_at->format('F d, Y') }}</span>
                @if($post->citation)
                    <span class="w-1 h-1 bg-slate-600 rounded-full"></span>
                    <span
                        class="font-mono bg-slate-800 px-2 py-1 rounded text-xs tracking-wide select-all border border-slate-700 text-slate-300"
                        title="Legal Citation">
                        {{ $post->citation }}
                    </span>
                @endif
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div
        class="bg-[#FDFBF7] dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 transition-colors duration-300">
        <!-- Cream/Paper background -->
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid lg:grid-cols-12 gap-16">

                <!-- Left Sidebar (Metadata & Author) -->
                <aside class="lg:col-span-3 lg:order-1 order-2 space-y-12">
                    <div class="sticky top-32">
                        <div class="mb-8">
                            <a href="{{ route('insights.index') }}"
                                class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Back to Insights
                            </a>
                        </div>

                        <!-- Author Block -->
                        <div class="border-t border-slate-200 dark:border-slate-800 pt-6 transition-colors">
                            <h4 class="font-serif text-lg text-slate-900 dark:text-white font-bold mb-4 transition-colors">
                                About the Author</h4>
                            <div class="flex items-center gap-4 mb-4">
                                <img src="{{ asset('assets/images/brian.jpeg') }}"
                                    class="w-12 h-12 rounded-full object-cover">
                                <div>
                                    <div class="font-bold text-slate-900 dark:text-white text-sm transition-colors">Brian
                                        Adero</div>
                                    <div class="text-xs text-slate-500 dark:text-slate-400 uppercase transition-colors">
                                        Advocate</div>
                                </div>
                            </div>
                            <p
                                class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed italic font-serif transition-colors">
                                Providing detailed legal analysis on complex corporate and family law matters.
                            </p>
                        </div>

                        <!-- Download Brief -->
                        @if($post->attachment_path)
                            <div class="border-t border-slate-200 dark:border-slate-800 pt-6 mt-6 transition-colors">
                                <h4 class="font-serif text-lg text-slate-900 dark:text-white font-bold mb-4 transition-colors">
                                    Downloads</h4>
                                <a href="{{ asset('storage/' . $post->attachment_path) }}" target="_blank"
                                    class="flex items-center gap-3 p-4 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-lg transition-colors group">
                                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <div>
                                        <div
                                            class="font-bold text-slate-900 dark:text-white text-sm group-hover:text-blue-900 dark:group-hover:text-blue-400 transition-colors">
                                            Download Brief
                                        </div>
                                        <div class="text-xs text-slate-500 dark:text-slate-400 transition-colors">PDF Document
                                        </div>
                                    </div>
                                    <svg class="w-4 h-4 ml-auto text-slate-400 bg-slate-100 dark:bg-slate-800 dark:text-slate-500 group-hover:text-slate-600 dark:group-hover:text-slate-300 transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </a>
                            </div>
                        @endif

                        <!-- Share -->
                        <div class="border-t border-slate-200 dark:border-slate-800 pt-6 mt-6 transition-colors">
                            <h4 class="font-serif text-lg text-slate-900 dark:text-white font-bold mb-4 transition-colors">
                                Share Brief</h4>
                            <div class="flex gap-4">
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="w-10 h-10 flex items-center justify-center bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-full hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors text-slate-600 dark:text-slate-400">
                                    <span class="sr-only">LinkedIn</span>
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="w-10 h-10 flex items-center justify-center bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-full hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors text-slate-600 dark:text-slate-400">
                                    <span class="sr-only">Twitter</span>
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Center: Content -->
                <article class="lg:col-span-9 lg:order-2 order-1">
                    @if($post->image_path)
                        <div
                            class="aspect-[21/9] bg-slate-200 dark:bg-slate-800 overflow-hidden mb-12 shadow-sm border border-slate-200 dark:border-slate-800 transition-colors">
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                class="w-full h-full object-cover grayscale opacity-90 hover:grayscale-0 transition-all duration-700">
                        </div>
                    @endif

                    <div
                        class="prose prose-lg prose-slate dark:prose-invert max-w-none font-serif text-slate-800 dark:text-slate-300 leading-loose transition-colors">
                        <!-- Drop cap for first paragraph -->
                        <style>
                            .prose p:first-of-type::first-letter {
                                float: left;
                                font-size: 3.5rem;
                                line-height: 0.8;
                                font-weight: bold;
                                margin-right: 0.5rem;
                                color: #0f172a;
                            }

                            .dark .prose p:first-of-type::first-letter {
                                color: #f8fafc;
                            }
                        </style>
                        {!! $post->content !!}
                    </div>

                    @if($post->key_takeaways)
                        <div
                            class="my-12 p-8 bg-slate-100 dark:bg-slate-800 border-l-4 border-slate-900 dark:border-slate-500 rounded-r-lg transition-colors">
                            <h3
                                class="font-serif font-bold text-slate-900 dark:text-white text-xl mb-4 flex items-center gap-3 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Executive Summary
                            </h3>
                            <div
                                class="prose prose-slate dark:prose-invert text-slate-700 dark:text-slate-300 leading-relaxed font-sans transition-colors">
                                {!! nl2br(e($post->key_takeaways)) !!}
                            </div>
                        </div>
                    @endif
                </article>

            </div>
        </div>
    </div>

    <!-- Footer: Related Insights -->
    @if($recentPosts->count() > 0)
        <section class="py-20 bg-white dark:bg-slate-900 transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-6">
                <h3
                    class="font-serif text-2xl text-slate-900 dark:text-white border-b border-slate-200 dark:border-slate-800 pb-4 mb-10 transition-colors">
                    Related Analysis</h3>
                <div class="grid md:grid-cols-4 gap-8">
                    @foreach($recentPosts as $recent)
                        <a href="{{ route('insights.show', $recent->slug) }}" class="group block">
                            <span
                                class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 block transition-colors">{{ $recent->published_at->format('M d, Y') }}</span>
                            <h4
                                class="font-serif text-lg text-slate-900 dark:text-white group-hover:text-blue-900 dark:group-hover:text-blue-400 transition-colors leading-snug">
                                {{ $recent->title }}
                            </h4>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection