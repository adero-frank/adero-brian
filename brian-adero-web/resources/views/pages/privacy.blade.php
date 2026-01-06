@extends('layouts.site')

@section('seo_title', 'Privacy Policy - Brian Adero')
@section('seo_description', 'Privacy Policy for Brian Adero, Advocate of the High Court of Kenya.')

@section('content')
    <div class="pt-32 pb-20 bg-white dark:bg-slate-900 transition-colors min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
            <h1 class="text-4xl font-serif text-slate-900 dark:text-white mb-8 fade-up">Privacy Policy</h1>
            <div class="prose prose-lg prose-slate dark:prose-invert max-w-none fade-up delay-100">
                {!! $content['legal.privacy']->value ?? '<p>Privacy policy content coming soon...</p>' !!}
            </div>
        </div>
    </div>
@endsection