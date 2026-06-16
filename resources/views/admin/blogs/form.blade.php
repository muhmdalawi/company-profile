@csrf
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label" for="title">Judul</label>
        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="status">Status</label>
        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
            @foreach (['published' => 'Published', 'draft' => 'Draft'] as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $blog->status ?: 'published') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="author">Author</label>
        <input class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author', $blog->author ?: session('admin_name')) }}" required>
        @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="category">Kategori</label>
        <input class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $blog->category) }}" required>
        @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="description">Konten</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="8" required>{{ old('description', $blog->description) }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="image">Gambar</label>
        <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" accept="image/png,image/jpeg" {{ $blog->exists ? '' : 'required' }}>
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    @if ($blog->exists && $blog->image)
        <div class="col-md-6">
            <div class="form-label">Preview</div>
            <img src="{{ $blog->imageUrl() }}" class="preview-img" alt="{{ $blog->title }}">
        </div>
    @endif
</div>
<div class="mt-4 d-flex gap-2">
    <button class="btn btn-primary" type="submit">Simpan</button>
    <a class="btn btn-outline-secondary" href="{{ route('admin.blogs.index') }}">Batal</a>
</div>
