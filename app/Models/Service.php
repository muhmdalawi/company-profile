<?php

namespace App\Models;

use App\Models\Concerns\ResolvesImageUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, ResolvesImageUrl;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'status',
    ];

    public function imageUrl(): string
    {
        return $this->resolveImageUrl($this->image, 'images/services');
    }
}
