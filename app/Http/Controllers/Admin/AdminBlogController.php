<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create', ['blog' => new Blog()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['image'] = $this->uploadImage($request, 'image', 'blogs');

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate($this->rules($blog));
        $data['slug'] = $this->uniqueSlug($data['title'], $blog->id);
        $data['image'] = $this->uploadImage($request, 'image', 'blogs', $blog->image);

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy(Blog $blog)
    {
        $this->deleteStoredImage($blog->image);
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog berhasil dihapus.');
    }

    private function rules(?Blog $blog = null): array
    {
        return [
            'title' => ['required', 'min:3'],
            'description' => ['required'],
            'author' => ['required', 'min:3'],
            'category' => ['required', 'min:2'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'image' => [$blog ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (Blog::where('slug', $slug)->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))->exists()) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
