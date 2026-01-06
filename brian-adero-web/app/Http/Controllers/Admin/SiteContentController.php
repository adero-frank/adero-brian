<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    public function index()
    {
        $content = SiteContent::all()->keyBy('key');
        return view('admin.content.index', compact('content'));
    }

    public function update(Request $request)
    {
        $contentData = $request->input('content', []);
        $page = $request->input('page', 'all');

        // Handle image uploads
        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')->store('images', 'public');
            // You can save this path to database or move the file to assets/images/brian.jpeg
            $request->file('hero_image')->move(public_path('assets/images'), 'brian.jpeg');
        }

        if ($request->hasFile('signature_image')) {
            $path = $request->file('signature_image')->store('images', 'public');
            $request->file('signature_image')->move(public_path('assets/images'), 'signature.png');
        }

        if ($request->hasFile('about_portrait')) {
            $path = $request->file('about_portrait')->store('images', 'public');
            $request->file('about_portrait')->move(public_path('assets/images'), 'about-portrait.jpeg');
        }

        // Update or create content entries
        foreach ($contentData as $key => $value) {
            SiteContent::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'page' => $page
                ]
            );
        }

        return redirect()->route('admin.content.index')->with('success', 'Content updated successfully!');
    }
}
