@extends('layouts.admin')

@section('title', 'Company Profile')
@section('page-title', 'Company Profile / Contact')

@section('content')
    <div class="card admin-card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.company-profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="company_name">Nama Perusahaan</label>
                        <input class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name', $profile->company_name) }}" required>
                        @error('company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="website">Website</label>
                        <input class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $profile->website) }}">
                        @error('website')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="logo">Logo / Gambar About</label>
                        <input class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" type="file" accept="image/png,image/jpeg">
                        @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-label">Preview Logo</div>
                        <img src="{{ $profile->logoUrl() }}" class="preview-img" alt="logo">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="main_title">Judul About</label>
                        <input class="form-control @error('main_title') is-invalid @enderror" id="main_title" name="main_title" value="{{ old('main_title', $profile->main_title) }}" required>
                        @error('main_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="main_description">Deskripsi About</label>
                        <textarea class="form-control @error('main_description') is-invalid @enderror" id="main_description" name="main_description" rows="5" required>{{ old('main_description', $profile->main_description) }}</textarea>
                        @error('main_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="who_we_are_title">Judul Who We Are</label>
                        <input class="form-control @error('who_we_are_title') is-invalid @enderror" id="who_we_are_title" name="who_we_are_title" value="{{ old('who_we_are_title', $profile->who_we_are_title) }}">
                        @error('who_we_are_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="who_we_are_description">Deskripsi Who We Are</label>
                        <textarea class="form-control @error('who_we_are_description') is-invalid @enderror" id="who_we_are_description" name="who_we_are_description" rows="4">{{ old('who_we_are_description', $profile->who_we_are_description) }}</textarea>
                        @error('who_we_are_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="footer_description">Deskripsi Footer</label>
                        <textarea class="form-control @error('footer_description') is-invalid @enderror" id="footer_description" name="footer_description" rows="2">{{ old('footer_description', $profile->footer_description) }}</textarea>
                        @error('footer_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $profile->email) }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="phone">Telepon</label>
                        <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}">
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="address">Alamat Singkat</label>
                        <input class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $profile->address) }}">
                        @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="facebook_url">Facebook</label>
                        <input class="form-control @error('facebook_url') is-invalid @enderror" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $profile->facebook_url) }}">
                        @error('facebook_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="instagram_url">Instagram</label>
                        <input class="form-control @error('instagram_url') is-invalid @enderror" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $profile->instagram_url) }}">
                        @error('instagram_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="linkedin_url">LinkedIn</label>
                        <input class="form-control @error('linkedin_url') is-invalid @enderror" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}">
                        @error('linkedin_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="twitter_url">Twitter/X</label>
                        <input class="form-control @error('twitter_url') is-invalid @enderror" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $profile->twitter_url) }}">
                        @error('twitter_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="map_embed_url">Google Maps Embed URL</label>
                        <textarea class="form-control @error('map_embed_url') is-invalid @enderror" id="map_embed_url" name="map_embed_url" rows="3">{{ old('map_embed_url', $profile->map_embed_url) }}</textarea>
                        @error('map_embed_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Simpan Profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection
