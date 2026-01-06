@extends('layouts.site')

@section('content')
    <!-- Hero Section -->
    <header
        class="relative pt-20 min-h-screen flex items-center bg-gradient-to-br from-[#E0E7FF] to-[#F5F7FA] dark:from-slate-900 dark:to-slate-800 transition-colors duration-300">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 gap-12 md:gap-16 items-center">
            <!-- Left: Text Content -->
            <div class="py-12 md:py-24 space-y-10 order-2 md:order-1 fade-up">
                <div class="space-y-4">
                    <span class="text-xs font-bold tracking-[0.2em] text-slate-500 dark:text-slate-400 uppercase">Advocate
                        of the High
                        Court</span>
                    <h1
                        class="font-serif text-5xl sm:text-6xl md:text-7xl lg:text-8xl leading-[0.9] text-slate-900 dark:text-white transition-colors">
                        {{ $content['hero.title.line1']->value ?? 'Justice' }} <br />
                        <span
                            class="italic text-slate-600 dark:text-slate-400 font-normal transition-colors">{{ $content['hero.title.line2']->value ?? 'Requires' }}</span>
                        <br />
                        {{ $content['hero.title.line3']->value ?? 'Clarity.' }}
                    </h1>
                </div>
                <div
                    class="text-base sm:text-lg text-slate-600 dark:text-slate-300 max-w-md leading-relaxed transition-colors">
                    {!! $content['hero.description']->value ?? 'I provide strategic counsel for businesses and individuals, ensuring your rights are protected with unwavering integrity and precision.' !!}
                </div>
                <div class="flex flex-col sm:flex-row flex-wrap gap-3 sm:gap-4">
                    <a href="{{ route('contact') }}"
                        class="px-10 py-4 bg-slate-900 text-white hover:bg-slate-800 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-200 transition-all shadow-lg hover:shadow-xl text-xs font-bold tracking-widest uppercase">
                        Get in Touch
                    </a>
                    <a href="#experience"
                        class="px-10 py-4 bg-white border border-slate-200 text-slate-900 hover:bg-slate-50 dark:bg-transparent dark:border-slate-600 dark:text-white dark:hover:bg-slate-800 transition-all text-xs font-bold tracking-widest uppercase">
                        My Work
                    </a>
                </div>
            </div>

            <!-- Right: Image -->
            <div class="h-[50vh] sm:h-[60vh] md:h-[70vh] lg:h-[80vh] w-full relative order-1 md:order-2 fade-up delay-200">
                <div class="absolute inset-0 bg-slate-200 dark:bg-slate-800 overflow-hidden shadow-2xl transition-colors">
                    <img src="{{ asset('assets/images/brian.jpeg') }}" alt="Brian Adero"
                        class="w-full h-full object-cover transition-transform duration-[2s] hover:scale-105">
                </div>
                <!-- Floating Card -->
                <div
                    class="absolute bottom-12 -left-12 bg-white dark:bg-slate-800 dark:text-white p-8 shadow-xl max-w-xs hidden md:block transition-colors">
                    <p class="font-serif text-2xl italic text-slate-900 dark:text-white">
                        "{{ $content['hero.floating.quote']->value ?? 'Excellence is not an act, but a habit.' }}"</p>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-16 sm:py-24 md:py-32 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-12 gap-8 md:gap-16">
            <div class="md:col-span-4 fade-up">
                <h2 class="font-serif text-3xl sm:text-4xl text-slate-900 dark:text-white mb-6 transition-colors">
                    {{ $content['home.about.title']->value ?? 'About Brian' }}
                </h2>
                <div class="h-0.5 w-16 bg-slate-900 dark:bg-slate-600 mb-6 transition-colors"></div>
                <p class="text-slate-500 font-medium">{{ $content['home.about.subtitle']->value ?? 'Since 2020' }}</p>
            </div>
            <div
                class="md:col-span-8 space-y-8 text-slate-600 dark:text-slate-300 leading-loose fade-up delay-100 transition-colors">
                <p class="text-xl sm:text-2xl text-slate-900 dark:text-white font-serif italic mb-8 transition-colors">
                    "{{ $content['home.about.quote']->value ?? 'I believe that effective legal representation goes beyond merely knowing the law; it requires understanding the unique human and business dynamics behind every case.' }}"
                </p>
                <div class="grid sm:grid-cols-2 gap-6 md:gap-8 text-sm">
                    <div>
                        {!! $content['home.about.p1']->value ?? 'With 4 years of experience practicing at the High Court, I have built a reputation for meticulous preparation and strategic advocacy. My approach is client-centric, ensuring that you are not just represented, but truly heard and understood.' !!}
                    </div>
                    <div>
                        {!! $content['home.about.p2']->value ?? 'Whether navigating complex corporate disputes or sensitive family matters, my commitment remains the same: to provide ethical, aggressive, and effective counsel that secures your future.' !!}
                    </div>
                </div>
                <div class="pt-8">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/Sig_J._R._R._Tolkien.png" alt="Signature"
                        class="h-12 opacity-60 dark:opacity-40 invert dark:invert-0">
                </div>
            </div>
        </div>
    </section>

    <!-- Quote / Highlight Section -->
    <section
        class="py-16 sm:py-24 md:py-32 bg-[#E4E9F2] dark:bg-slate-800 relative overflow-hidden transition-colors duration-300">
        <div class="absolute top-0 right-0 p-32 opacity-5 pointer-events-none">
            <svg width="400" height="400" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 7.55228 14.017 7V3H19.017C20.6739 3 22.017 4.34315 22.017 6V15C22.017 16.6569 20.6739 18 19.017 18H16.017V21H14.017ZM5.0166 21L5.0166 18C5.0166 16.8954 5.91203 16 7.0166 16H10.0166C10.5689 16 11.0166 15.5523 11.0166 15V9C11.0166 8.44772 10.5689 8 10.0166 8H6.0166C5.46432 8 5.0166 7.55228 5.0166 7V3H10.0166C11.6735 3 13.0166 4.34315 13.0166 6V15C13.0166 16.6569 11.6735 18 10.0166 18H7.0166V21H5.0166Z" />
            </svg>
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center fade-up">
            <blockquote
                class="font-serif text-3xl sm:text-4xl md:text-5xl leading-tight text-slate-900 dark:text-white mb-8 transition-colors">
                "{{ $content['quote.main']->value ?? 'I don\'t just win cases; I secure futures. Your success is my singular mission.' }}"
            </blockquote>
            <a href="{{ route('contact') }}"
                class="inline-block border-b border-slate-900 dark:border-white text-slate-900 dark:text-white pb-1 hover:text-slate-600 dark:hover:text-slate-300 transition-colors text-sm font-bold tracking-widest uppercase">
                Start a Conversation
            </a>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-16 sm:py-24 md:py-32 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div
                class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12 sm:mb-16 md:mb-24 gap-4 fade-up">
                <div>
                    <h2 class="font-serif text-3xl sm:text-4xl text-slate-900 dark:text-white mb-4 transition-colors">
                        Experience</h2>
                    <p class="text-slate-500 uppercase tracking-widest text-xs font-bold">Professional Journey</p>
                </div>
                <div class="hidden md:block h-px w-32 bg-slate-200 dark:bg-slate-700 mb-4 transition-colors"></div>
            </div>

            @php
                $experience = json_decode($content['home.experience']->value ?? '[]', true);
                if (empty($experience)) {
                    $experience = [
                        [
                            'period' => '2023 - Present',
                            'title' => 'Senior Associate Advocate',
                            'company' => 'Ochieng & Associates',
                            'desc' => 'Leading the corporate litigation department, overseeing complex merger disputes and high-value commercial arbitration. Successfully negotiated settlements totaling over $2M in 2023 alone.'
                        ],
                        [
                            'period' => '2021 - 2023',
                            'title' => 'Associate Advocate',
                            'company' => 'Mutuso Dhahabu & Co. Advocates',
                            'desc' => 'Specialized in Family Law and Civil Litigation. Managed a verified caseload of 40+ active files, appearing before the High Court and Court of Appeal routinely.'
                        ],
                        [
                            'period' => '2020 - 2021',
                            'title' => 'Legal Trainee',
                            'company' => 'Kenya School of Law',
                            'desc' => 'Completed pupillage with distinction. Drafted pleadings, legal opinions, and conducted extensive legal research on constitutional matters.'
                        ]
                    ];
                }
            @endphp

            <div class="space-y-16 max-w-4xl">
                @foreach($experience as $exp)
                    <div
                        class="grid sm:grid-cols-12 gap-4 sm:gap-6 {{ !$loop->last ? 'border-b border-slate-100 pb-8 sm:pb-12 md:pb-16' : '' }} fade-up">
                        <div class="sm:col-span-3">
                            <span class="text-sm font-bold text-slate-400">{{ $exp['period'] }}</span>
                        </div>
                        <div class="sm:col-span-9">
                            <h3 class="text-xl sm:text-2xl font-serif text-slate-900 mb-2">{{ $exp['title'] }}</h3>
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-6">{{ $exp['company'] }}</p>
                            <p class="text-slate-600 leading-relaxed">
                                {{ $exp['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section id="education" class="py-32 bg-[#F5F7FA] dark:bg-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-end mb-24 fade-up">
                <div>
                    <h2 class="font-serif text-4xl text-slate-900 dark:text-white mb-4 transition-colors">Education</h2>
                    <p class="text-slate-500 uppercase tracking-widest text-xs font-bold">Academic Background</p>
                </div>
                <div class="hidden md:block h-px w-32 bg-slate-200 dark:bg-slate-700 mb-4 transition-colors"></div>
            </div>

            @php
                $education = json_decode($content['home.education']->value ?? '[]', true);
                if (empty($education)) {
                    $education = [
                        [
                            'degree' => 'Post Graduate Diploma',
                            'institution' => 'Kenya School of Law',
                            'year' => '2021',
                            'desc' => 'ATP (Advocates Training Programme) completion with honors.'
                        ],
                        [
                            'degree' => 'Bachelor of Laws (LL.B)',
                            'institution' => 'University of Nairobi',
                            'year' => '2019',
                            'desc' => 'Second Class Honors (Upper Division). Specialization in Commercial Law.'
                        ]
                    ];
                }
            @endphp

            <div class="grid md:grid-cols-2 gap-12 max-w-5xl">
                @foreach($education as $edu)
                    <div
                        class="bg-white dark:bg-slate-900 p-10 shadow-soft fade-up {{ $loop->iteration > 1 ? 'delay-100' : '' }} transition-colors">
                        <span
                            class="text-5xl text-slate-100 dark:text-slate-800 font-serif font-bold absolute -mt-6 -ml-4 pointer-events-none transition-colors">
                            {{ sprintf('%02d', $loop->iteration) }}
                        </span>
                        <div class="relative">
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 transition-colors">
                                {{ $edu['degree'] }}</h3>
                            <p class="text-sm text-slate-500 mb-4">{{ $edu['institution'] }} | {{ $edu['year'] }}</p>
                            <p class="text-slate-600 dark:text-slate-400 transition-colors">{{ $edu['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Practice Areas Section -->
    <section
        class="py-32 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16 fade-up">
                <h2 class="font-serif text-4xl text-slate-900 dark:text-white mb-4 transition-colors">Areas of Practice</h2>
                <p class="text-slate-500 uppercase tracking-widest text-xs font-bold">Legal Services I Offer</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @php
                    $practiceAreas = json_decode($content['home.practice_areas']->value ?? '[]', true);
                    if (empty($practiceAreas)) {
                        $practiceAreas = [
                            ['title' => 'Corporate Law', 'icon' => 'Building', 'desc' => 'Company formation, contracts, compliance, and commercial transactions.'],
                            ['title' => 'Civil Litigation', 'icon' => 'Gavel', 'desc' => 'Representation in disputes, contract enforcement, and courtroom advocacy.'],
                            ['title' => 'Family Law', 'icon' => 'Users', 'desc' => 'Divorce, child custody, matrimonial property, and succession matters.']
                        ];
                    }
                @endphp

                @foreach($practiceAreas as $index => $area)
                    <div class="text-center p-8 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors fade-up bg-white dark:bg-slate-900 border border-transparent dark:border-slate-800 rounded-lg"
                        style="animation-delay: {{ $index * 100 }}ms">
                        <div
                            class="w-16 h-16 bg-slate-900 text-white dark:bg-slate-800 dark:text-slate-200 rounded-full flex items-center justify-center mx-auto mb-6 transition-colors">
                            @if(($area['icon'] ?? '') === 'Building')
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            @elseif(($area['icon'] ?? '') === 'Gavel')
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                    </path>
                                </svg>
                            @elseif(($area['icon'] ?? '') === 'Users')
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            @elseif(($area['icon'] ?? '') === 'Scale')
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                    </path>
                                </svg>
                            @elseif(($area['icon'] ?? '') === 'Briefcase')
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            @elseif(($area['icon'] ?? '') === 'FileText')
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            @elseif(($area['icon'] ?? '') === 'Shield')
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            @else
                                <!-- Default/Fallback Icon -->
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @endif
                        </div>
                        <h3 class="font-serif text-xl text-slate-900 dark:text-white mb-3 transition-colors">
                            {{ $area['title'] ?? 'Service Title' }}</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                            {{ $area['desc'] ?? 'Service description goes here.' }}</p>
                    </div>
                @endforeach
            </div>

            <!-- CTA -->
            <div class="text-center mt-16 fade-up">
                <p class="text-slate-600 mb-6">Need legal assistance in any of these areas?</p>
                @php
                    $bookingUrl = $content['general.booking_url']->value ?? '';
                @endphp
                <a href="{{ $bookingUrl ?: route('contact') }}"
                   @if($bookingUrl) target="_blank" rel="noopener noreferrer" @endif
                    class="inline-block px-8 py-3 bg-slate-900 text-white hover:bg-slate-800 transition-colors text-sm font-bold tracking-widest uppercase">
                    Schedule a Consultation
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Updates Section -->
    @if(isset($recentPosts) && $recentPosts->count() > 0)
        <section class="py-32 bg-[#F5F7FA] dark:bg-slate-900 transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-end mb-16 fade-up">
                    <div>
                        <h2 class="font-serif text-4xl text-slate-900 dark:text-white mb-4 transition-colors">Latest Updates
                        </h2>
                        <p class="text-slate-500 uppercase tracking-widest text-xs font-bold">Insights & Perspectives</p>
                    </div>
                    <div class="hidden md:flex gap-4">
                        <a href="{{ route('blogs.index') }}"
                            class="text-xs font-bold uppercase tracking-widest text-slate-900 hover:text-slate-600">All
                            Blogs</a>
                        <span class="text-slate-300">|</span>
                        <a href="{{ route('insights.index') }}"
                            class="text-xs font-bold uppercase tracking-widest text-slate-900 hover:text-slate-600">All
                            Insights</a>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($recentPosts as $post)
                        <article
                            class="bg-white dark:bg-slate-800 rounded-lg overflow-hidden shadow-sm hover:shadow-soft transition-all duration-300 group fade-up">
                            <a href="{{ $post->type === 'insight' ? route('insights.show', $post->slug) : route('blogs.show', $post->slug) }}"
                                class="block h-full flex flex-col">
                                <div class="aspect-[16/9] overflow-hidden bg-slate-200 relative">
                                    @if($post->image_path)
                                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400 bg-slate-100">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="absolute top-4 left-4">
                                        <span
                                            class="bg-white/90 backdrop-blur-sm px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-slate-900 rounded-sm shadow-sm">
                                            {{ ucfirst($post->type) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-8 flex-1 flex flex-col">
                                    <div class="mb-4 text-xs text-slate-500 dark:text-slate-400 font-medium transition-colors">
                                        {{ $post->published_at->format('F d, Y') }}
                                    </div>
                                    <h3
                                        class="font-serif text-xl text-slate-900 dark:text-white mb-3 group-hover:text-blue-900 dark:group-hover:text-blue-400 transition-colors line-clamp-2">
                                        {{ $post->title }}
                                    </h3>
                                    <p
                                        class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-6 line-clamp-3 transition-colors">
                                        {{ $post->excerpt }}
                                    </p>
                                    <div
                                        class="mt-auto pt-6 border-t border-slate-100 dark:border-slate-700 flex items-center text-xs font-bold uppercase tracking-widest text-slate-900 dark:text-white group-hover:translate-x-1 transition-transform">
                                        Read Article <span class="ml-2">&rarr;</span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                <div class="mt-12 text-center md:hidden flex flex-col gap-4">
                    <a href="{{ route('blogs.index') }}"
                        class="text-xs font-bold uppercase tracking-widest text-slate-900 dark:text-white">View
                        All Blogs</a>
                    <a href="{{ route('insights.index') }}"
                        class="text-xs font-bold uppercase tracking-widest text-slate-900 dark:text-white">View All Insights</a>
                </div>
            </div>
        </section>
    @endif

    <!-- Achievements / Skills Grid -->
    <section id="achievements" class="py-32 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20 fade-up">
                <h2 class="font-serif text-4xl mb-4">Achievements</h2>
                <p class="text-slate-400 uppercase tracking-widest text-xs font-bold">Recognition & Awards</p>
            </div>

            @php
                $achievements = json_decode($content['home.achievements']->value ?? '[]', true);
                if (empty($achievements)) {
                    $achievements = [
                        ['number' => '2023', 'title' => 'Top litigator', 'desc' => 'Law Society of Kenya (Nairobi Branch)'],
                        ['number' => '50+', 'title' => 'Cases Won', 'desc' => 'High Court & Magistrates Court'],
                        ['number' => '98%', 'title' => 'Client Satisfaction', 'desc' => 'Based on exit surveys'],
                        ['number' => 'Pro', 'title' => 'Pro Bono Award', 'desc' => 'Service to Community']
                    ];
                }
            @endphp

            <div class="grid md:grid-cols-4 gap-8 text-center">
                @foreach($achievements as $ach)
                    <div class="p-8 border border-white/10 hover:bg-white/5 transition-colors fade-up"
                        style="animation-delay: {{ $loop->index * 100 }}ms">
                        <div class="text-4xl font-serif text-[#A9C9FF] mb-4">{{ $ach['number'] }}</div>
                        <h3 class="font-bold mb-2">{{ $ach['title'] }}</h3>
                        <p class="text-sm text-slate-400">{{ $ach['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
        <section id="contact" class="py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16">
                <div class="fade-up">
                    <h2 class="font-serif text-5xl text-slate-900 mb-8">Get in Touch</h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-12">
                        Whether you have a question about a case, need legal advice, or want to book a consultation, I'm
                        here to help.
                    </p>

                    <div class="space-y-8">
                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 bg-slate-50 flex items-center justify-center text-slate-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-1">Phone</h3>
                                <a href="tel:+254721485244" class="text-slate-500 hover:text-slate-900 transition-colors">+254
                                    721 485 244</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 bg-slate-50 flex items-center justify-center text-slate-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="16" x="2" y="4" rx="2" />
                                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-1">Email</h3>
                                <a href="mailto:omongeadero@gmail.com"
                                    class="text-slate-500 hover:text-slate-900 transition-colors">omongeadero@gmail.com</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 bg-slate-50 flex items-center justify-center text-slate-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-1">Location</h3>
                                <p class="text-slate-500">Nairobi, Kenya</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#F5F7FA] p-10 md:p-12 fade-up delay-200">
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase tracking-wider text-slate-500">First Name</label>
                                <input type="text"
                                    class="w-full bg-white border-none p-4 text-slate-900 focus:ring-2 focus:ring-slate-900 outline-none"
                                    placeholder="John">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase tracking-wider text-slate-500">Last Name</label>
                                <input type="text"
                                    class="w-full bg-white border-none p-4 text-slate-900 focus:ring-2 focus:ring-slate-900 outline-none"
                                    placeholder="Doe">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-wider text-slate-500">Email</label>
                            <input type="email"
                                class="w-full bg-white border-none p-4 text-slate-900 focus:ring-2 focus:ring-slate-900 outline-none"
                                placeholder="john@example.com">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-wider text-slate-500">Subject</label>
                            <input type="text"
                                class="w-full bg-white border-none p-4 text-slate-900 focus:ring-2 focus:ring-slate-900 outline-none"
                                placeholder="Legal Inquiry">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-wider text-slate-500">Message</label>
                            <textarea
                                class="w-full bg-white border-none p-4 text-slate-900 h-32 focus:ring-2 focus:ring-slate-900 outline-none resize-none"
                                placeholder="How can I help you?"></textarea>
                        </div>

                        <button type="button"
                            class="w-full py-4 bg-slate-900 text-white font-bold uppercase tracking-widest hover:bg-slate-800 transition-colors">
                            Submit Request
                        </button>
                    </form>
                </div>
            </div>
        </section>
@endsection