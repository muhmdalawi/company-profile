<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminServiceController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $services = Service::latest()->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create', ['service' => new Service()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['image'] = $this->uploadImage($request, 'image', 'services');

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate($this->rules($service));
        $data['slug'] = $this->uniqueSlug($data['title'], $service->id);
        $data['image'] = $this->uploadImage($request, 'image', 'services', $service->image);

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $this->deleteStoredImage($service->image);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil dihapus.');
    }

    private function rules(?Service $service = null): array
    {
        return [
            'title' => ['required', 'min:3'],
            'description' => ['required'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'image' => [$service ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (Service::where('slug', $slug)->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))->exists()) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
