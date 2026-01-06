@extends('layouts.site')

@section('content')
    <!-- Header / Hero Section -->
    <header
        class="relative pt-24 sm:pt-28 md:pt-32 pb-16 sm:pb-20 bg-gradient-to-br from-[#E0E7FF] to-[#F5F7FA] dark:from-slate-900 dark:to-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center fade-up">
            <span
                class="text-xs font-bold tracking-[0.2em] text-slate-500 dark:text-slate-400 uppercase mb-4 block">{{ $content['contact.hero.subtitle']->value ?? 'Get In Touch' }}</span>
            <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl text-slate-900 dark:text-white mb-6 transition-colors">
                {{ $content['contact.hero.title']->value ?? 'Contact Me' }}
            </h1>
            <p
                class="text-base sm:text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto leading-relaxed transition-colors">
                {{ $content['contact.hero.desc']->value ?? 'Reach out for legal consultations, inquiries, or representation.' }}
            </p>
        </div>
    </header>

    <!-- Contact Content -->
    <section class="py-16 sm:py-20 md:py-24 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 grid lg:grid-cols-2 gap-12 md:gap-16">

            <!-- Contact Info -->
            <div class="fade-up space-y-12">
                <div>
                    <h3 class="font-serif text-2xl sm:text-3xl text-slate-900 dark:text-white mb-6 transition-colors">
                        {{ $content['contact.office.title']->value ?? 'Office Info' }}
                    </h3>
                    <div class="text-slate-600 dark:text-slate-300 leading-relaxed mb-8 transition-colors">
                        {!! $content['contact.office.desc']->value ?? 'My office is open Monday through Friday, from 8:00 AM to 5:00 PM. I am available for consultations by appointment.' !!}
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center text-slate-900 dark:text-white shrink-0 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-serif text-lg text-slate-900 dark:text-white mb-1 transition-colors">Phone</h4>
                            <a href="tel:{{ $content['contact.phone']->value ?? '+254721485244' }}"
                                class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">{{ $content['contact.phone']->value ?? '+254 721 485 244' }}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center text-slate-900 dark:text-white shrink-0 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-serif text-lg text-slate-900 dark:text-white mb-1 transition-colors">Email</h4>
                            <a href="mailto:{{ $content['contact.email']->value ?? 'omongeadero@gmail.com' }}"
                                class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">{{
                                $content['contact.email']->value ?? 'omongeadero@gmail.com' }}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center text-slate-900 dark:text-white shrink-0 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-serif text-lg text-slate-900 dark:text-white mb-1 transition-colors">Location
                            </h4>
                            <span
                                class="text-slate-600 dark:text-slate-400 transition-colors">{{ $content['contact.location']->value ?? 'Nairobi, Kenya' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-slate-50 dark:bg-slate-800 p-10 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-soft fade-up transition-colors"
                style="transition-delay: 100ms;">
                <h3 class="font-serif text-xl sm:text-2xl text-slate-900 dark:text-white mb-2 transition-colors">Send a
                    Message</h3>

                @if(session('contact_success'))
                    <div class="bg-green-600 text-white p-4 rounded-lg mb-6">
                        {{ session('contact_success') }}
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="name"
                                class="text-xs font-bold uppercase tracking-widest text-slate-500 dark:text-slate-400 transition-colors">Name
                                *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 bg-white dark:bg-slate-700 dark:text-white border border-slate-200 dark:border-slate-600 rounded-lg focus:outline-none focus:border-slate-900 dark:focus:border-slate-400 transition-colors @error('name') border-red-500 @enderror"
                                placeholder="Your Name">
                            @error('name')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="email"
                                class="text-xs font-bold uppercase tracking-widest text-slate-500 dark:text-slate-400 transition-colors">Email
                                *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 bg-white dark:bg-slate-700 dark:text-white border border-slate-200 dark:border-slate-600 rounded-lg focus:outline-none focus:border-slate-900 dark:focus:border-slate-400 transition-colors @error('email') border-red-500 @enderror"
                                placeholder="john@example.com">
                            @error('email')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="phone"
                            class="text-xs font-bold uppercase tracking-widest text-slate-500 dark:text-slate-400 transition-colors">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                            class="w-full px-4 py-3 bg-white dark:bg-slate-700 dark:text-white border border-slate-200 dark:border-slate-600 rounded-lg focus:outline-none focus:border-slate-900 dark:focus:border-slate-400 transition-colors"
                            placeholder="+254 700 000 000">
                    </div>
                    <div class="space-y-2">
                        <label for="message"
                            class="text-xs font-bold uppercase tracking-widest text-slate-500 dark:text-slate-400 transition-colors">Message
                            *</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-3 bg-white dark:bg-slate-700 dark:text-white border border-slate-200 dark:border-slate-600 rounded-lg focus:outline-none focus:border-slate-900 dark:focus:border-slate-400 transition-colors @error('message') border-red-500 @enderror"
                            placeholder="Tell me more about your inquiry...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full py-4 bg-slate-900 text-white dark:bg-white dark:text-slate-900 font-bold tracking-widest uppercase rounded-lg hover:bg-slate-800 dark:hover:bg-slate-200 transition-all duration-300 shadow-lg hover:shadow-xl translate-y-0 hover:-translate-y-1">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection