@csrf
<div class="row g-3">
    <div class="col-12">
        <label class="form-label" for="title">Judul</label>
        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="description">Deskripsi</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $gallery->description) }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="image">Gambar</label>
        <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" accept="image/png,image/jpeg" {{ $gallery->exists ? '' : 'required' }}>
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    @if ($gallery->exists && $gallery->image)
        <div class="col-md-6">
            <div class="form-label">Preview</div>
            <img src="{{ $gallery->imageUrl() }}" class="preview-img" alt="{{ $gallery->title }}">
        </div>
    @endif
</div>
<div class="mt-4 d-flex gap-2">
    <button class="btn btn-primary" type="submit">Simpan</button>
    <a class="btn btn-outline-secondary" href="{{ route('admin.galleries.index') }}">Batal</a>
</div>
