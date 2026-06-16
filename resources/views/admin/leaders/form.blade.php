@csrf
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="name">Nama</label>
        <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $leader->name) }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="position">Jabatan</label>
        <input class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position', $leader->position) }}" required>
        @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-2">
        <label class="form-label" for="sort_order">Urutan</label>
        <input class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $leader->sort_order ?? 0) }}">
        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="photo">Foto</label>
        <input class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" type="file" accept="image/png,image/jpeg" {{ $leader->exists ? '' : 'required' }}>
        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    @if ($leader->exists && $leader->photo)
        <div class="col-md-6">
            <div class="form-label">Preview</div>
            <img src="{{ $leader->photoUrl() }}" class="preview-img" alt="{{ $leader->name }}">
        </div>
    @endif
</div>
<div class="mt-4 d-flex gap-2">
    <button class="btn btn-primary" type="submit">Simpan</button>
    <a class="btn btn-outline-secondary" href="{{ route('admin.leaders.index') }}">Batal</a>
</div>
