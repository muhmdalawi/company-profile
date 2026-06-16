<?php

namespace App\Models;

use App\Models\Concerns\ResolvesImageUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory, ResolvesImageUrl;

    protected $fillable = [
        'title',
        'image',
        'description',
    ];

    public function imageUrl(): string
    {
        return $this->resolveImageUrl($this->image, 'images');
    }
}
