<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ResolvesImageUrl
{
    protected function resolveImageUrl(?string $path, string $legacyDirectory, ?string $fallback = null): string
    {
        if (blank($path)) {
            return asset($fallback ?: 'images/logo_nigma.png');
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        if (Str::startsWith($path, 'images/')) {
            return asset($path);
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::url($path);
        }

        return asset(trim($legacyDirectory, '/').'/'.$path);
    }
}
