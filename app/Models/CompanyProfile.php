<?php

namespace App\Models;

use App\Models\Concerns\ResolvesImageUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory, ResolvesImageUrl;

    protected $fillable = [
        'company_name',
        'logo',
        'main_title',
        'main_description',
        'who_we_are_title',
        'who_we_are_description',
        'footer_description',
        'email',
        'phone',
        'address',
        'website',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'twitter_url',
        'map_embed_url',
    ];

    public function logoUrl(): string
    {
        return $this->resolveImageUrl($this->logo, 'images', 'images/logo_nigma.png');
    }
}
