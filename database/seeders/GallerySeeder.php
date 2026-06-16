<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            ['title' => 'Transformasi Digital', 'image' => 'images/hero1.png', 'description' => 'Visual solusi teknologi Nigmagrid.'],
            ['title' => 'Solusi Cloud', 'image' => 'images/hero2.png', 'description' => 'Dukungan infrastruktur modern untuk bisnis.'],
            ['title' => 'Inovasi Data', 'image' => 'images/hero3.png', 'description' => 'Pengambilan keputusan berbasis data.'],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(['title' => $gallery['title']], $gallery);
        }
    }
}
