<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        CompanyProfile::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'Nigmagrid Indonesia',
                'logo' => 'images/logo_nigma.png',
                'main_title' => 'About Nigmagrid',
                'main_description' => 'Nigmagrid Indonesia adalah perusahaan teknologi yang berfokus pada penyediaan solusi digital terintegrasi untuk mendukung transformasi bisnis di era modern. Dengan layanan seperti ERP, CRM, Cloud, dan solusi berbasis data lainnya, kami membantu perusahaan meningkatkan efisiensi operasional, mengoptimalkan proses bisnis, serta memperkuat daya saing di pasar digital. Kami percaya bahwa teknologi bukan hanya alat, tetapi strategi untuk mendorong pertumbuhan dan inovasi bisnis secara berkelanjutan.',
                'who_we_are_title' => 'Who We Are',
                'who_we_are_description' => 'Kami berfokus pada pengembangan solusi seperti ERP, CRM, dan Cloud yang membantu perusahaan meningkatkan efisiensi operasional dan pengambilan keputusan berbasis data. Dengan pendekatan inovatif dan teknologi terkini, kami berkomitmen untuk menjadi partner terbaik dalam perjalanan digitalisasi bisnis Anda.',
                'footer_description' => 'Solusi digital kreatif untuk membantu bisnis berkembang di era modern.',
                'email' => 'info@nigmagrid.com',
                'phone' => '+62 812-3456-7890',
                'address' => 'Jl. Kebagusan 3 No.58Q 9, RT.9/RW.5, Kebagusan, Ps. Minggu, Jakarta Selatan 12520',
                'website' => 'https://nigmagrid.com',
                'facebook_url' => '#',
                'instagram_url' => '#',
                'linkedin_url' => '#',
                'twitter_url' => '#',
                'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.630413613589!2d106.8278276749911!3d-6.312187093677131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69edef660438c1%3A0xe08d45ea5f9ff2b4!2sMulia%20Kebagusan%20Residence!5e0!3m2!1sen!2sid!4v1777620758324!5m2!1sen!2sid',
            ]
        );
    }
}
