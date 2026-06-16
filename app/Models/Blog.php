<?php

namespace App\Models;

use App\Models\Concerns\ResolvesImageUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, ResolvesImageUrl;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'author',
        'category',
        'status',
    ];

    public function imageUrl(): string
    {
        return $this->resolveImageUrl($this->image, 'images/blog');
    }
}
