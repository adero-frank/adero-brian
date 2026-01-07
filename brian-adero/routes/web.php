<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SiteContentController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\SubscriberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Post;
use App\Models\Subscriber;

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/blogs', [PublicController::class, 'blogs'])->name('blogs.index');
Route::get('/blogs/{slug}', [PublicController::class, 'showBlog'])->name('blogs.show');
Route::get('/insights', [PublicController::class, 'insights'])->name('insights.index');
Route::get('/insights/{slug}', [PublicController::class, 'showInsight'])->name('insights.show');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/search', [App\Http\Controllers\Public\SearchController::class, 'index'])->name('search');
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
Route::get('subscribe/verify/{token}', [SubscriberController::class, 'verify'])->name('subscribe.verify');
Route::get('/privacy-policy', [PublicController::class, 'privacy'])->name('privacy');
Route::get('/terms-of-service', [PublicController::class, 'terms'])->name('terms');

// Admin Routes (Protected)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $totalPosts = Post::count();
        $publishedPosts = Post::whereNotNull('published_at')->count();
        $draftPosts = Post::whereNull('published_at')->count();
        $blogsCount = Post::where('type', 'blog')->count();
        $insightsCount = Post::where('type', 'insight')->count();
        $subscribersCount = Subscriber::count();
        $contactSubmissionsCount = ContactSubmission::count();
        $unreadContactsCount = ContactSubmission::where('is_read', false)->count();

        return view('admin.dashboard', compact(
            'totalPosts',
            'publishedPosts',
            'draftPosts',
            'blogsCount',
            'insightsCount',
            'subscribersCount',
            'contactSubmissionsCount',
            'unreadContactsCount'
        ));
    })->name('dashboard');

    Route::resource('posts', AdminPostController::class);
    Route::resource('content', SiteContentController::class)->only(['index', 'update']);

    // Subscribers
    Route::get('subscribers/export', [AdminSubscriberController::class, 'export'])->name('subscribers.export');
    Route::get('subscribers/email', [AdminSubscriberController::class, 'createEmail'])->name('subscribers.email');
    Route::post('subscribers/send', [AdminSubscriberController::class, 'sendEmail'])->name('subscribers.send');
    Route::resource('subscribers', AdminSubscriberController::class)->only(['index', 'destroy']);

    // Contact Submissions
    Route::get('contact-submissions', [ContactSubmissionController::class, 'index'])->name('contact-submissions.index');
    Route::get('contact-submissions/{submission}', [ContactSubmissionController::class, 'show'])->name('contact-submissions.show');
    Route::delete('contact-submissions/{submission}', [ContactSubmissionController::class, 'destroy'])->name('contact-submissions.destroy');
    Route::get('contact-submissions/{submission}/reply', [ContactSubmissionController::class, 'reply'])->name('contact-submissions.reply');
    Route::post('contact-submissions/{submission}/reply', [ContactSubmissionController::class, 'sendReply'])->name('contact-submissions.send-reply');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
