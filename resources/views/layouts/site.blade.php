<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $routeName = Route::currentRouteName();
        $seoKeyMap = [
            'home' => 'home',
            'about' => 'about',
            'contact' => 'contact',
            'blogs.index' => 'blogs',
            'insights.index' => 'insights'
        ];
        $seoKeyPrefix = $seoKeyMap[$routeName] ?? null;
        // Use default title/desc as fallbacks, but allow View Yields to take precedence over Admin DB if set explicitly (though usually we want Admin DB to be the default for the PAGE, and Yield for specific items like Logic)
        // Actually, logic: Yield takes precedence (e.g. single blog post title), THEN Admin DB value, THEN Default.
        $dbTitle = $seoKeyPrefix ? ($content->get("seo.{$seoKeyPrefix}.title")?->value ?? null) : null;
        $dbDesc = $seoKeyPrefix ? ($content->get("seo.{$seoKeyPrefix}.desc")?->value ?? null) : null;
    @endphp
    <title>@yield('title', $dbTitle ?? 'Brian Adero | Advocate of the High Court')</title>
    <meta name="description"
        content="@yield('description', $dbDesc ?? 'Professional portfolio of Brian Adero, Advocate of the High Court. Corporate law, civil litigation, and family law expertise.')">
    @yield('meta')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Check local storage or system preference immediately
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }

        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        lavender: {
                            50: '#F5F7FA',
                            100: '#E4E9F2',
                            200: '#BCCCDC',
                        },
                        navy: {
                            800: '#1F2937',
                            900: '#111827',
                        }
                    },
                    boxShadow: {
                        'soft': '0 10px 40px -10px rgba(0, 0, 0, 0.05)',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #F5F7FA;
            color: #1F2937;
        }

        /* Animation Utility Classes */
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-100 {
            transition-delay: 100ms;
        }

        .delay-200 {
            transition-delay: 200ms;
        }

        .delay-300 {
            transition-delay: 300ms;
        }
    </style>
</head>

<body class="antialiased text-slate-800 dark:bg-slate-900 dark:text-slate-100 transition-colors duration-300">

    <!-- Sticky Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-[#F5F7FA]/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-gray-200 dark:border-slate-800 transition-all duration-300"
        id="navbar">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div
                    class="w-10 h-10 bg-slate-900 flex items-center justify-center text-white font-serif font-bold text-xl">
                    B</div>
                <div class="flex flex-col">
                    <span class="font-serif text-lg font-bold leading-none text-slate-900">Brian Adero</span>
                    <span class="text-[10px] uppercase tracking-widest text-slate-500">Advocate</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-10 text-xs font-bold tracking-widest uppercase text-slate-500 dark:text-slate-400">
                <a href="{{ route('home') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Home</a>
                <a href="{{ route('about') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">About</a>
                <a href="{{ route('blogs.index') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Blogs</a>
                <a href="{{ route('insights.index') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Insights</a>
                <a href="{{ route('contact') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Contact</a>

                <!-- Dark Mode Toggle -->
                <button onclick="toggleTheme()" class="p-2 text-slate-500 hover:text-slate-900 transition-colors dark:text-slate-400 dark:hover:text-white" title="Toggle Dark Mode">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Search Toggle -->
                <div class="relative group">
                    <button onclick="toggleSearch()" class="p-2 text-slate-500 hover:text-slate-900 transition-colors dark:text-slate-400 dark:hover:text-white" title="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                    <div id="search-bar" class="absolute right-0 top-full mt-2 w-72 bg-white dark:bg-slate-800 rounded-lg shadow-xl p-4 border border-slate-100 dark:border-slate-700 hidden transform origin-top transition-all duration-200 z-50">
                        <form action="{{ route('search') }}" method="GET">
                            <input type="text" name="q" class="w-full px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-lg text-sm focus:outline-none focus:border-slate-400 dark:bg-slate-700 dark:text-white" placeholder="Search insights & blogs..." autofocus>
                        </form>
                    </div>
                </div>

                @if(!empty($content['general.booking_url']->value))
                    <a href="{{ $content['general.booking_url']->value }}" target="_blank"
                        class="px-5 py-2.5 bg-slate-900 dark:bg-white dark:text-slate-900 text-white rounded-full hover:bg-slate-800 dark:hover:bg-slate-200 transition-colors shadow-lg shadow-slate-900/20">
                        Book Consultation
                    </a>
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="lg:hidden p-2 text-slate-900">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobileMenu"
        class="fixed inset-0 z-40 bg-white transform translate-x-full transition-transform duration-300 lg:hidden flex flex-col justify-center items-center gap-8">
        <button id="closeMenuBtn" class="absolute top-6 right-6 p-2 text-slate-900">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        
        <!-- Mobile Search -->
        <div class="w-3/4 max-w-sm">
            <form action="{{ route('search') }}" method="GET" class="relative">
                <input type="text" name="q" class="w-full px-6 py-3 border-2 border-slate-200 rounded-full text-lg focus:outline-none focus:border-slate-900 font-serif" placeholder="Search...">
                <button type="submit" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>

        <a href="{{ route('home') }}" class="mobile-link text-2xl font-serif text-slate-900">Home</a>
        <a href="{{ route('about') }}" class="mobile-link text-2xl font-serif text-slate-900">About</a>
        <a href="{{ route('blogs.index') }}" class="mobile-link text-2xl font-serif text-slate-900">Blogs</a>
        <a href="{{ route('insights.index') }}" class="mobile-link text-2xl font-serif text-slate-900">Insights</a>
        <a href="{{ route('contact') }}" class="mobile-link text-2xl font-serif text-slate-900">Contact</a>
        
        @if(!empty($content['general.booking_url']->value))
            <a href="{{ $content['general.booking_url']->value }}" target="_blank" class="mobile-link text-xl font-bold uppercase tracking-widest text-white bg-slate-900 px-8 py-3 rounded-full mt-4">
                Book Consultation
            </a>
        @endif
    </div>

    @yield('content')
    
    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }

        function toggleSearch() {
            const search = document.getElementById('search-bar');
            search.classList.toggle('hidden');
            if (!search.classList.contains('hidden')) {
                const input = search.querySelector('input');
                if(input) input.focus();
            }
        }
        
        // Close search when clicking outside
        document.addEventListener('click', function(event) {
            const search = document.getElementById('search-bar');
            const toggle = event.target.closest('button[onclick="toggleSearch()"]');
            const searchContent = event.target.closest('#search-bar');
            
            if (!search.classList.contains('hidden') && !toggle && !searchContent) {
                 search.classList.add('hidden');
            }
        });
    </script>

    <!-- Footer -->
    <footer class="bg-slate-900 border-t border-slate-800 py-20 text-slate-400">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12">
            <!-- Brand Column -->
            <div class="col-span-1">
                <div
                    class="w-12 h-12 bg-white flex items-center justify-center text-slate-900 font-serif font-bold text-2xl mb-6">
                    B</div>
                <p class="text-sm leading-relaxed mb-6">
                    Advocate of the High Court. Dedicated to justice, integrity, and client success.
                </p>
                <div class="flex gap-4 mt-6">
                    @php
                        $socialMedia = json_decode($content->get('footer.social_media')?->value ?? '[]', true);
                        if (empty($socialMedia)) {
                            $socialMedia = [
                                ['platform' => 'Twitter', 'url' => 'https://twitter.com/', 'icon' => 'twitter'],
                                ['platform' => 'LinkedIn', 'url' => 'https://linkedin.com/', 'icon' => 'linkedin'],
                                ['platform' => 'Facebook', 'url' => 'https://facebook.com/', 'icon' => 'facebook']
                            ];
                        }
                    @endphp

                    @foreach($socialMedia as $social)
                        @if(!empty($social['url']))
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                                class="h-10 w-10 border border-slate-700 rounded-full flex items-center justify-center hover:bg-white hover:text-slate-900 transition-colors">
                                <span class="sr-only">{{ $social['platform'] ?? 'Social Media' }}</span>
                                @if(strtolower($social['icon'] ?? '') === 'twitter' || strtolower($social['platform'] ?? '') === 'twitter')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path
                                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                @elseif(strtolower($social['icon'] ?? '') === 'linkedin' || strtolower($social['platform'] ?? '') === 'linkedin')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                @elseif(strtolower($social['icon'] ?? '') === 'facebook' || strtolower($social['platform'] ?? '') === 'facebook')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif(strtolower($social['icon'] ?? '') === 'instagram' || strtolower($social['platform'] ?? '') === 'instagram')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif(strtolower($social['icon'] ?? '') === 'youtube' || strtolower($social['platform'] ?? '') === 'youtube')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif(strtolower($social['icon'] ?? '') === 'github' || strtolower($social['platform'] ?? '') === 'github')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                    </svg>
                                @elseif(strtolower($social['icon'] ?? '') === 'tiktok' || strtolower($social['platform'] ?? '') === 'tiktok')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.65-1.62-1.030-1.44 5.3-4.26 10.15-8.35 13.88-5.83 5.39-16.03 2.53-15.65-6.68.08-3.9 3.25-7.1 7.15-7.1v4c-1.66.03-3.32 1.4-3.33 3.08-.01 1.65 1.34 3.01 3.01 3.01 1.69 0 3.05-1.33 3.05-3.02 0-.22-.05-.44-.1-.65-.02-.85-.04-1.7-.06-2.55-1.27-.03-2.54-.03-3.81-.02V.02h3.91z"/>
                                    </svg>
                                @elseif(strtolower($social['icon'] ?? '') === 'whatsapp' || strtolower($social['platform'] ?? '') === 'whatsapp')
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112-.15.224-.579.73-.71.88-.131.149-.262.168-.487.056-.225-.113-.95-.35-1.809-1.116-.673-.6-1.127-1.34-1.258-1.565-.132-.225-.015-.347.098-.459.102-.102.225-.262.337-.394.045-.053.076-.131.113-.206.09-.187.045-.35-.023-.487-.068-.137-.504-1.214-.69-1.663-.181-.435-.366-.376-.504-.383-.131-.006-.281-.006-.431-.006-.15 0-.394.056-.6.281-.206.225-.787.77-.787 1.876 0 1.107.806 2.176.919 2.326.112.15 1.587 2.422 3.844 3.397.537.232.956.371 1.282.475.549.176 1.049.151 1.442.092.441-.067 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.066-.056-.093-.206-.149-.431-.262" clip-rule="evenodd" />
                                    </svg>
                                @else
                                    {{-- Generic link icon for unknown platforms --}}
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                @endif
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Menu Column -->
            <div>
                <h4 class="font-bold text-white mb-6 uppercase tracking-widest text-xs">Menu</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About</a></li>
                    <li><a href="{{ route('blogs.index') }}" class="hover:text-white transition-colors">Blogs</a>
                    </li>
                    <li><a href="{{ route('insights.index') }}" class="hover:text-white transition-colors">Insights</a>
                    </li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div>
                <h4 class="font-bold text-white mb-6 uppercase tracking-widest text-xs">Contact</h4>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-slate-500 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>{{ $content['contact.location']->value ?? 'Nairobi, Kenya' }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-slate-500 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $content['contact.phone']->value ?? '+254721485244') }}"
                            class="hover:text-white transition-colors">{{ $content['contact.phone']->value ?? '+254 721 485244' }}</a>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-slate-500 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <a href="mailto:{{ $content['contact.email']->value ?? 'omongeadero@gmail.com' }}"
                            class="hover:text-white transition-colors">{{ $content['contact.email']->value ??
                            'omongeadero@gmail.com' }}</a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter Column -->
            <div>
                <h4 class="font-bold text-white mb-6 uppercase tracking-widest text-xs">Stay Informed</h4>
                <p class="text-xs mb-4 text-slate-500">Subscribe for legal updates and news.</p>

                @if(session('newsletter_success'))
                    <div class="bg-green-600 text-white text-xs p-3 rounded mb-4">
                        {{ session('newsletter_success') }}
                    </div>
                @endif

                <form action="{{ route('subscribe') }}" method="POST" class="space-y-2">
                    @csrf
                    <input type="email" name="email" placeholder="Email Address" required
                        class="w-full bg-slate-800 border-none text-white text-sm px-4 py-3 rounded focus:ring-1 focus:ring-white outline-none placeholder-slate-500">
                    @error('email')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                    <button type="submit"
                        class="w-full bg-white text-slate-900 font-bold text-xs uppercase tracking-widest py-3 rounded hover:bg-slate-200 transition-colors">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-slate-800 text-center text-sm text-slate-600">
            <div class="flex flex-col md:flex-row items-center justify-center gap-2 md:gap-6">
                <p>&copy; 2026 Brian Adero. All Rights Reserved.</p>
                <div class="flex gap-4 text-xs">
                    <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                    <span class="text-slate-700">•</span>
                    <a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Logic
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMenuBtn = document.getElementById('closeMenuBtn');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        function toggleMenu() {
            mobileMenu.classList.toggle('translate-x-full');
            document.body.classList.toggle('overflow-hidden');
        }

        mobileMenuBtn.addEventListener('click', toggleMenu);
        closeMenuBtn.addEventListener('click', toggleMenu);

        mobileLinks.forEach(link => {
            link.addEventListener('click', toggleMenu);
        });

        // Sticky Navbar Logic
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('shadow-md');
                navbar.classList.add('py-0');
            } else {
                navbar.classList.remove('shadow-md');
                navbar.classList.remove('py-0');
            }
        });

        // Scroll Rise Animation (Simple IntersectionObserver)
        const observerOptions = {
            threshold: 0.1,
            rootMargin: "0px 0px -50px 0px"
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Optional: Unobserve after animating once
                    // observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-up').forEach(el => {
            observer.observe(el);
        });

        // Auto-hide success messages
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                // Select solid green (public) and light green (admin) alerts
                const alerts = document.querySelectorAll('.bg-green-50, .bg-blue-50, .bg-green-600');
                alerts.forEach(alert => {
                    alert.style.transition = 'opacity 0.5s ease-out';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                });
            }, 5000); // 5 seconds
        });

    </script>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/254721485244?text=Hello%20Brian%20Adero,%20I%20would%20like%20to%20inquire%20about%20your%20legal%20services."
        target="_blank" rel="noopener noreferrer"
        class="fixed bottom-6 right-6 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:bg-[#20BA5A] transition-all duration-300 hover:scale-110 animate-bounce-subtle group">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
        </svg>
        <span
            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">!</span>
    </a>

    <style>
        @keyframes bounce-subtle {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }
    </style>

    <!-- Calendly badge widget begin -->
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
    <script type="text/javascript">
        window.onload = function() {
            Calendly.initBadgeWidget({
                url: 'https://calendly.com/aderofrank401/30min',
                text: 'Schedule time with me',
                color: '#1e293b',
                textColor: '#ffffff',
                branding: true
            });
        }
    </script>
    <!-- Calendly badge widget end -->
</body>


</html>