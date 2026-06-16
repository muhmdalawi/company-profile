<?php

namespace App\Models;

use App\Models\Concerns\ResolvesImageUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory, ResolvesImageUrl;

    protected $fillable = [
        'name',
        'position',
        'photo',
        'sort_order',
    ];

    public function photoUrl(): string
    {
        return $this->resolveImageUrl($this->photo, 'images/team');
    }
}
