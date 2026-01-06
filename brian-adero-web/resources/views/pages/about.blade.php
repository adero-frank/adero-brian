@extends('layouts.site')

@section('content')
    <!-- Header / Hero Section -->
    <header class="relative pt-24 sm:pt-28 md:pt-32 pb-16 sm:pb-20 bg-gradient-to-br from-[#E0E7FF] to-[#F5F7FA] dark:from-slate-900 dark:to-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center fade-up">
            <span class="text-xs font-bold tracking-[0.2em] text-slate-500 dark:text-slate-400 uppercase mb-4 block">My Story</span>
            <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl text-slate-900 dark:text-white mb-6 transition-colors">
                {{ $content['about.page.title']->value ?? 'About Brian Adero' }}
            </h1>
            <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto leading-relaxed transition-colors">
                {{ $content['about.page.subtitle']->value ?? 'A steadfast commitment to legal excellence, integrity, and the pursuit of justice for every client.' }}
            </p>
        </div>
    </header>

    <!-- Content Section -->
    <section class="py-16 sm:py-20 md:py-24 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Image / Visual -->
                <div class="relative fade-up">
                    <div class="aspect-[3/4] bg-slate-200 dark:bg-slate-800 rounded-lg overflow-hidden relative transition-colors">
                        <!-- Using the dynamically uploaded image name -->
                        <img src="{{ asset('assets/images/about-portrait.jpeg') }}" 
                             onerror="this.src='{{ asset('assets/images/brian.jpeg') }}'"
                             alt="Brian Adero - Advocate"
                            class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Text Content -->
                <div class="space-y-8 fade-up" style="transition-delay: 100ms;">
                    <div>
                        <h2 class="font-serif text-2xl sm:text-3xl text-slate-900 dark:text-white mb-4 transition-colors">{{ $content['about.section.title']->value ?? 'Dedicated to Your Legal Success' }}</h2>
                        <div class="w-12 h-1 bg-slate-900 dark:bg-slate-500 mb-6 transition-colors"></div>
                        <div class="text-slate-600 dark:text-slate-300 leading-relaxed mb-6 space-y-6 transition-colors">
                            {!! $content['about.page.bio']->value ?? 'Brian Adero is an Advocate of the High Court of Kenya...' !!}
                        </div>
                    </div>

                    <!-- Values Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 pt-4">
                        <div class="bg-slate-50 dark:bg-slate-800 p-4 sm:p-6 rounded-lg transition-colors">
                            <h3 class="font-serif text-lg sm:text-xl text-slate-900 dark:text-white mb-2 transition-colors">{{ $content['about.value1.title']->value ?? 'Integrity' }}</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400 transition-colors">{{ $content['about.value1.desc']->value ?? 'Upholding the highest ethical standards in every case.' }}</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 p-4 sm:p-6 rounded-lg transition-colors">
                            <h3 class="font-serif text-lg sm:text-xl text-slate-900 dark:text-white mb-2 transition-colors">{{ $content['about.value2.title']->value ?? 'Excellence' }}</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400 transition-colors">{{ $content['about.value2.desc']->value ?? 'Pursuing superior outcomes through diligent preparation.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 sm:py-20 md:py-24 bg-[#F5F7FA] dark:bg-slate-800 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center fade-up">
            <h2 class="font-serif text-2xl sm:text-3xl md:text-4xl text-slate-900 dark:text-white mb-6 transition-colors">{{ $content['about.cta.title']->value ?? 'Ready to Discuss Your Case?' }}</h2>
            <p class="text-slate-600 dark:text-slate-400 mb-8 sm:mb-10 text-base sm:text-lg transition-colors">
                {{ $content['about.cta.text']->value ?? 'Schedule a consultation today and let me provide the legal guidance you need.' }}
            </p>
            @php
                $bookingUrl = $content['general.booking_url']->value ?? '';
            @endphp
            <a href="{{ $bookingUrl ?: route('contact') }}"
               @if($bookingUrl) target="_blank" rel="noopener noreferrer" @endif
                class="inline-block px-8 py-4 bg-slate-900 text-white dark:bg-white dark:text-slate-900 font-bold tracking-widest uppercase rounded-lg hover:bg-slate-800 dark:hover:bg-slate-200 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                {{ $bookingUrl ? 'Book Consultation' : 'Contact Me' }}
            </a>
        </div>
    </section>
@endsection