@extends('layouts.site')

@section('title', 'Search Results - ' . $query)
@section('description', 'Search results for: ' . $query)

@section('content')
    <section class="py-32 bg-slate-50 dark:bg-slate-900 relative overflow-hidden transition-colors duration-300">
        <!-- Background Decorations -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-slate-100/50 dark:bg-slate-800/50 skew-x-12 transform origin-top translate-x-32 transition-colors">
        </div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-slate-200/20 dark:bg-slate-700/20 rounded-full blur-3xl transition-colors"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto fade-up">
                <p class="text-slate-500 dark:text-slate-400 uppercase tracking-widest text-xs font-bold mb-4 transition-colors">Search Results</p>
                <h1 class="font-serif text-4xl sm:text-5xl text-slate-900 dark:text-white mb-6 leading-tight transition-colors">
                    Results for "<span class="italic text-slate-700 dark:text-slate-300 transition-colors">{{ $query }}</span>"
                </h1>
            </div>

            <div class="max-w-xl mx-auto mt-8">
                <form action="{{ route('search') }}" method="GET" class="relative">
                    <input type="text" name="q" value="{{ $query }}"
                        class="w-full px-6 py-4 bg-white dark:bg-slate-800 dark:text-white border-2 border-slate-200 dark:border-slate-700 rounded-full text-lg focus:outline-none focus:border-slate-900 dark:focus:border-slate-400 font-serif shadow-sm transition-colors"
                        placeholder="Search again...">
                    <button type="submit"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 p-2 text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6">
            @if($results->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($results as $index => $post)
                        @php
                            $route = $post->type === 'blog' ? 'blogs.show' : 'insights.show';
                            $typeLabel = $post->type === 'blog' ? 'Blog Post' : 'Legal Insight';
                            $badgeColor = $post->type === 'blog' ? 'bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300' : 'bg-slate-900 text-white dark:bg-white dark:text-slate-900';
                        @endphp
                        <article
                            class="bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 rounded-lg overflow-hidden hover:shadow-soft transition-all duration-300 group fade-up"
                            style="animation-delay: {{ $index * 100 }}ms">
                            <div class="h-48 overflow-hidden relative">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center text-slate-300 dark:text-slate-500 transition-colors">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="px-3 py-1 text-[10px] font-bold uppercase tracking-widest rounded-full {{ $badgeColor }}">
                                        {{ $typeLabel }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-8">
                                <span class="text-xs font-bold tracking-widest uppercase text-slate-400 transition-colors">
                                    {{ $post->published_at->format('M d, Y') }}
                                </span>
                                <h2 class="font-serif text-xl text-slate-900 dark:text-white mt-4 mb-4 leading-tight transition-colors">
                                    <a href="{{ route($route, $post->slug) }}" class="hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-6 transition-colors">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>
                                <a href="{{ route($route, $post->slug) }}"
                                    class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-slate-900 dark:text-white hover:gap-4 transition-all">
                                    Read More
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-12 flex justify-center">
                    {{ $results->appends(['q' => $query])->links() }}
                </div>
            @else
                <div class="text-center py-20 bg-slate-50 dark:bg-slate-800 rounded-lg transition-colors">
                    <svg class="w-16 h-16 text-slate-300 dark:text-slate-600 mx-auto mb-4 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <h3 class="text-xl font-serif text-slate-900 dark:text-white mb-2 transition-colors">No results found</h3>
                    <p class="text-slate-500 dark:text-slate-400 transition-colors">We couldn't find any posts matching "{{ $query }}". Try a different keyword.</p>
                </div>
            @endif
        </div>
    </section>
@endsection