<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait HandlesImageUploads
{
    protected function uploadImage(Request $request, string $field, string $directory, ?string $oldPath = null): ?string
    {
        if (! $request->hasFile($field)) {
            return $oldPath;
        }

        $this->deleteStoredImage($oldPath);

        return $request->file($field)->store($directory, 'public');
    }

    protected function deleteStoredImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
