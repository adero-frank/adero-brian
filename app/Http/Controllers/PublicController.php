<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $content = SiteContent::all()->keyBy('key');
        $recentPosts = Post::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
        return view('pages.home', compact('content', 'recentPosts'));
    }

    public function about()
    {
        $content = SiteContent::all()->keyBy('key');
        return view('pages.about', compact('content'));
    }

    public function blogs(Request $request)
    {
        $query = Post::where('type', 'blog')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc');

        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('content', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('excerpt', 'LIKE', "%{$searchTerm}%");
            });
        }

        $posts = $query->paginate(6);
        return view('pages.posts.blogs', compact('posts'));
    }

    public function insights(Request $request)
    {
        $query = Post::where('type', 'insight')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc');

        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('content', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('excerpt', 'LIKE', "%{$searchTerm}%");
            });
        }

        $posts = $query->paginate(6);
        return view('pages.posts.insights', compact('posts'));
    }

    public function showBlog($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('type', 'blog')
            ->whereNotNull('published_at')
            ->firstOrFail();

        $recentPosts = Post::where('type', 'blog')
            ->where('id', '!=', $post->id)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        return view('pages.posts.show', compact('post', 'recentPosts'));
    }

    public function showInsight($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('type', 'insight')
            ->whereNotNull('published_at')
            ->firstOrFail();

        $recentPosts = Post::where('type', 'insight')
            ->where('id', '!=', $post->id)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        return view('pages.posts.show-insight', compact('post', 'recentPosts'));
    }

    public function contact()
    {
        $content = SiteContent::all()->keyBy('key');
        return view('pages.contact', compact('content'));
    }

    public function privacy()
    {
        $content = SiteContent::all()->keyBy('key');
        return view('pages.privacy', compact('content'));
    }

    public function terms()
    {
        $content = SiteContent::all()->keyBy('key');
        return view('pages.terms', compact('content'));
    }
}
