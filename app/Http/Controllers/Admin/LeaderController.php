<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $leaders = Leader::orderBy('sort_order')->latest()->paginate(10);

        return view('admin.leaders.index', compact('leaders'));
    }

    public function create()
    {
        return view('admin.leaders.create', ['leader' => new Leader()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['photo'] = $this->uploadImage($request, 'photo', 'leaders');

        Leader::create($data);

        return redirect()->route('admin.leaders.index')->with('success', 'Leadership berhasil ditambahkan.');
    }

    public function edit(Leader $leader)
    {
        return view('admin.leaders.edit', compact('leader'));
    }

    public function update(Request $request, Leader $leader)
    {
        $data = $request->validate($this->rules($leader));
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['photo'] = $this->uploadImage($request, 'photo', 'leaders', $leader->photo);

        $leader->update($data);

        return redirect()->route('admin.leaders.index')->with('success', 'Leadership berhasil diperbarui.');
    }

    public function destroy(Leader $leader)
    {
        $this->deleteStoredImage($leader->photo);
        $leader->delete();

        return redirect()->route('admin.leaders.index')->with('success', 'Leadership berhasil dihapus.');
    }

    private function rules(?Leader $leader = null): array
    {
        return [
            'name' => ['required', 'min:3'],
            'position' => ['required', 'min:3'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'photo' => [$leader ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }
}
