@csrf
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label" for="title">Nama Layanan</label>
        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $service->title) }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="status">Status</label>
        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
            @foreach (['published' => 'Published', 'draft' => 'Draft'] as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $service->status ?: 'published') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="description">Deskripsi</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $service->description) }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="image">Gambar</label>
        <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" accept="image/png,image/jpeg" {{ $service->exists ? '' : 'required' }}>
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    @if ($service->exists && $service->image)
        <div class="col-md-6">
            <div class="form-label">Preview</div>
            <img src="{{ $service->imageUrl() }}" class="preview-img" alt="{{ $service->title }}">
        </div>
    @endif
</div>
<div class="mt-4 d-flex gap-2">
    <button class="btn btn-primary" type="submit">Simpan</button>
    <a class="btn btn-outline-secondary" href="{{ route('admin.services.index') }}">Batal</a>
</div>
