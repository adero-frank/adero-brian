@extends('layouts.site')

@section('content')
    <!-- Header / Hero Section -->
    <!-- Header / Hero Section -->
    <header
        class="relative pt-24 sm:pt-28 md:pt-32 pb-16 sm:pb-20 bg-gradient-to-br from-[#6B7280] via-[#9CA3AF] to-[#D1D5DB] dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center fade-up">
            <span
                class="text-xs font-bold tracking-[0.2em] text-slate-700 dark:text-slate-400 uppercase mb-4 block transition-colors">Professional
                Analysis</span>
            <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl text-slate-900 dark:text-white mb-6 transition-colors">
                Insights
            </h1>
            <p
                class="text-base sm:text-lg text-slate-700 dark:text-slate-300 max-w-2xl mx-auto leading-relaxed mb-6 sm:mb-8 transition-colors">
                In-depth legal analysis and professional commentary.
            </p>

            <!-- Search Bar -->
            <form method="GET" action="{{ route('insights.index') }}" class="max-w-md mx-auto px-4">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search insights..."
                        class="w-full px-4 sm:px-5 py-3 pr-12 rounded-full border-2 border-amber-200 dark:border-amber-900/50 focus:border-amber-600 dark:focus:border-amber-500 focus:outline-none transition-colors bg-white dark:bg-slate-800 dark:text-white text-sm sm:text-base">
                    <button type="submit"
                        class="absolute right-2 top-1/2 -translate-y-1/2 p-2 bg-amber-700 text-white rounded-full hover:bg-amber-800 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </header>

    <!-- Insights List -->
    <section class="py-16 sm:py-20 md:py-24 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            @if($posts->count() > 0)
                <div class="space-y-8 sm:space-y-12">
                    @foreach($posts as $post)
                        <article
                            class="border-b border-slate-200 dark:border-slate-800 pb-8 sm:pb-12 last:border-0 fade-up transition-colors">
                            <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                                @if($post->image_path)
                                    <div class="md:w-1/3 shrink-0">
                                        <div
                                            class="aspect-video bg-slate-200 dark:bg-slate-700 overflow-hidden rounded-lg transition-colors">
                                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                        </div>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <span class="text-xs font-bold tracking-widest uppercase text-slate-400 transition-colors">
                                        {{ $post->published_at->format('M d, Y') }}
                                    </span>
                                    <h2
                                        class="font-serif text-2xl sm:text-3xl text-slate-900 dark:text-white mt-3 mb-4 leading-tight transition-colors">
                                        <a href="{{ route('insights.show', $post->slug) }}"
                                            class="hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                                            {{ $post->title }}
                                        </a>
                                    </h2>
                                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-6 transition-colors">
                                        {{ Str::limit(strip_tags($post->content), 250) }}
                                    </p>
                                    <a href="{{ route('insights.show', $post->slug) }}"
                                        class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-slate-900 dark:text-white hover:gap-4 transition-all">
                                        Read Full Analysis
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-12 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-20">
                    <p class="text-slate-500 text-lg">No insights published yet. Check back soon!</p>
                </div>
            @endif
        </div>
    </section>
@endsection