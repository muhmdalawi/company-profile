<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            ['name' => 'Lutfi Muladi', 'position' => 'Fullstack Developer', 'photo' => 'images/team/dev.png', 'sort_order' => 1],
            ['name' => 'Nanang Santoso', 'position' => 'Fullstack Developer', 'photo' => 'images/team/dev.png', 'sort_order' => 2],
            ['name' => 'Fandi Ahmad', 'position' => 'Fullstack Developer', 'photo' => 'images/team/dev.png', 'sort_order' => 3],
            ['name' => 'Muhamad Alawi', 'position' => 'Fullstack Developer', 'photo' => 'images/team/dev.png', 'sort_order' => 4],
            ['name' => 'Martasya Zahra', 'position' => 'Administration', 'photo' => 'images/team/sec.png', 'sort_order' => 5],
        ];

        foreach ($teams as $team) {
            Team::updateOrCreate(['name' => $team['name']], $team);
        }
    }
}
