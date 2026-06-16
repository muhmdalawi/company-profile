<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'ERP System',
                'slug' => 'erp-system',
                'image' => 'images/services/erp.png',
                'description' => 'Solusi manajemen bisnis terintegrasi untuk operasional perusahaan.',
                'status' => 'published',
            ],
            [
                'title' => 'CRM System',
                'slug' => 'crm-system',
                'image' => 'images/services/crm.png',
                'description' => 'Kelola hubungan pelanggan dan tingkatkan loyalitas.',
                'status' => 'published',
            ],
            [
                'title' => 'Cloud Solution',
                'slug' => 'cloud-solution',
                'image' => 'images/services/cloud.png',
                'description' => 'Infrastruktur fleksibel dan aman untuk bisnis modern.',
                'status' => 'published',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
