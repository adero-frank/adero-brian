@extends('layouts.site')

@section('seo_title', 'Terms of Service - Brian Adero')
@section('seo_description', 'Terms of Service for Brian Adero, Advocate of the High Court of Kenya.')

@section('content')
    <div class="pt-32 pb-20 bg-white dark:bg-slate-900 transition-colors min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
            <h1 class="text-4xl font-serif text-slate-900 dark:text-white mb-8 fade-up">Terms of Service</h1>
            <div class="prose prose-lg prose-slate dark:prose-invert max-w-none fade-up delay-100">
                {!! $content['legal.terms']->value ?? '<p>Terms of service content coming soon...</p>' !!}
            </div>
        </div>
    </div>
@endsection