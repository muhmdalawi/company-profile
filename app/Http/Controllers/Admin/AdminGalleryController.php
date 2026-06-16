<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create', ['gallery' => new Gallery()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['image'] = $this->uploadImage($request, 'image', 'galleries');

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate($this->rules($gallery));
        $data['image'] = $this->uploadImage($request, 'image', 'galleries', $gallery->image);

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        $this->deleteStoredImage($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil dihapus.');
    }

    private function rules(?Gallery $gallery = null): array
    {
        return [
            'title' => ['required', 'min:3'],
            'description' => ['nullable'],
            'image' => [$gallery ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }
}
