<?php

namespace Database\Seeders;

use App\Models\Leader;
use Illuminate\Database\Seeder;

class LeaderSeeder extends Seeder
{
    public function run(): void
    {
        $leaders = [
            ['name' => 'Andri Royantara', 'position' => 'Founder / Owner', 'photo' => 'images/team/owner.jpg', 'sort_order' => 1],
            ['name' => 'Bagas', 'position' => 'Chief Executive Officer', 'photo' => 'images/team/investor.jpg', 'sort_order' => 2],
            ['name' => 'Muhamad Iqbal Fikri', 'position' => 'Project Manager', 'photo' => 'images/team/pm.jpg', 'sort_order' => 3],
        ];

        foreach ($leaders as $leader) {
            Leader::updateOrCreate(['name' => $leader['name']], $leader);
        }
    }
}
