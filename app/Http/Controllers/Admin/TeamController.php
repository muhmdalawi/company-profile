<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $teams = Team::orderBy('sort_order')->latest()->paginate(10);

        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create', ['team' => new Team()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['photo'] = $this->uploadImage($request, 'photo', 'teams');

        Team::create($data);

        return redirect()->route('admin.teams.index')->with('success', 'Team berhasil ditambahkan.');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $data = $request->validate($this->rules($team));
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['photo'] = $this->uploadImage($request, 'photo', 'teams', $team->photo);

        $team->update($data);

        return redirect()->route('admin.teams.index')->with('success', 'Team berhasil diperbarui.');
    }

    public function destroy(Team $team)
    {
        $this->deleteStoredImage($team->photo);
        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Team berhasil dihapus.');
    }

    private function rules(?Team $team = null): array
    {
        return [
            'name' => ['required', 'min:3'],
            'position' => ['required', 'min:3'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'photo' => [$team ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }
}
