<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        $posts = $query->latest()->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        // Check for PHP upload errors before validation
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $errorCode = $_FILES['image']['error'];
            $errorMessage = 'Image upload failed: ';

            switch ($errorCode) {
                case UPLOAD_ERR_INI_SIZE:
                    $errorMessage .= 'File exceeds PHP upload_max_filesize (2MB).';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $errorMessage .= 'File exceeds MAX_FILE_SIZE directive in HTML form.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $errorMessage .= 'The uploaded file was only partially uploaded.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    // This is fine, proceed to validation if nullable
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $errorMessage .= 'Missing a temporary folder.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $errorMessage .= 'Failed to write file to disk.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $errorMessage .= 'A PHP extension stopped the file upload.';
                    break;
                default:
                    $errorMessage .= 'Unknown error code: ' . $errorCode;
            }

            if ($errorCode !== UPLOAD_ERR_NO_FILE) {
                return back()->withErrors(['image' => $errorMessage])->withInput();
            }
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'type' => 'required|in:blog,insight',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // Increased to 10MB
            'attachment' => 'nullable|file|mimes:pdf|max:10240', // 10MB Max PDF
            'published_at' => 'nullable|date',
            'key_takeaways' => 'nullable|string',
            'citation' => 'nullable|string',
        ]);

        // Generate slug from title
        $validated['slug'] = Str::slug($validated['title']);

        // Ensure slug is unique
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Post::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count;
            $count++;
        }

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            try {
                $validated['image_path'] = $request->file('image')->store('posts', 'public');
            } catch (\Exception $e) {
                return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
            }
        }

        // Handle attachment upload
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            try {
                $validated['attachment_path'] = $request->file('attachment')->store('attachments', 'public');
            } catch (\Exception $e) {
                return back()->withErrors(['attachment' => 'Failed to upload PDF: ' . $e->getMessage()])->withInput();
            }
        }
        unset($validated['attachment']);

        // Handle publish action
        if ($request->action === 'publish' && !isset($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Remove image from validated data as it's not a database column
        unset($validated['image']);
        unset($validated['action']); // Also remove action if present

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Check for PHP upload errors before validation
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $errorCode = $_FILES['image']['error'];
            if ($errorCode !== UPLOAD_ERR_NO_FILE) {
                // Simplified error handling for update, similar to store
                return back()->withErrors(['image' => 'Image upload failed. Error code: ' . $errorCode])->withInput();
            }
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'type' => 'required|in:blog,insight',
            'image' => 'nullable|image|max:10240', // Increased to 10MB
            'attachment' => 'nullable|file|mimes:pdf|max:10240',
            'remove_attachment' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'remove_image' => 'nullable|boolean',
            'key_takeaways' => 'nullable|string',
            'citation' => 'nullable|string',
        ]);

        // Update slug if title changed
        if ($post->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']);

            // Ensure slug is unique
            $originalSlug = $validated['slug'];
            $count = 1;
            while (Post::where('slug', $validated['slug'])->where('id', '!=', $post->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count;
                $count++;
            }
        }

        // Handle image removal
        if ($request->has('remove_image') && $post->image_path) {
            Storage::disk('public')->delete($post->image_path);
            $validated['image_path'] = null;
        }

        // Handle attachment removal
        if ($request->has('remove_attachment') && $post->attachment_path) {
            Storage::disk('public')->delete($post->attachment_path);
            $validated['attachment_path'] = null;
        }

        // Handle new image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete old image if exists
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }
            try {
                $validated['image_path'] = $request->file('image')->store('posts', 'public');
            } catch (\Exception $e) {
                return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()])->withInput();
            }
        }

        // Handle new attachment upload
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            if ($post->attachment_path) {
                Storage::disk('public')->delete($post->attachment_path);
            }
            try {
                $validated['attachment_path'] = $request->file('attachment')->store('attachments', 'public');
            } catch (\Exception $e) {
                return back()->withErrors(['attachment' => 'Failed to upload PDF: ' . $e->getMessage()])->withInput();
            }
        }

        // Remove non-database columns
        unset($validated['image']);
        unset($validated['remove_image']);
        unset($validated['image']);
        unset($validated['attachment']);
        unset($validated['remove_image']);
        unset($validated['remove_attachment']);
        unset($validated['action']);

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        // Delete associated image
        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully!');
    }
}
