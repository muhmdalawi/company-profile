<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'title' => 'Apa Itu ERP dan Manfaatnya untuk Bisnis',
                'image' => 'blog1.png',
                'description' => 'ERP (Enterprise Resource Planning) adalah sistem yang digunakan untuk mengintegrasikan berbagai proses bisnis dalam satu platform yang terpusat. Sistem ini memungkinkan perusahaan untuk mengelola berbagai aspek penting seperti keuangan, operasional, inventaris, hingga sumber daya manusia secara lebih efisien dan terstruktur. Dengan menggunakan ERP, perusahaan dapat mengurangi kesalahan manual yang sering terjadi akibat pencatatan terpisah. Selain itu, ERP juga memberikan akses data secara real-time sehingga memudahkan manajemen dalam mengambil keputusan yang lebih cepat dan akurat. Implementasi ERP juga membantu meningkatkan produktivitas tim, karena semua data sudah terintegrasi dalam satu sistem. Hal ini membuat alur kerja menjadi lebih efisien dan transparan. Oleh karena itu, ERP menjadi salah satu solusi teknologi yang sangat penting bagi perusahaan yang ingin berkembang di era digital.',
                'author' => 'Admin Nigmagrid',
                'category' => 'ERP',
                'status' => 'published',
            ],
            [
                'title' => 'Perbedaan ERP dan CRM yang Perlu Anda Ketahui',
                'image' => 'blog2.png',
                'description' => 'ERP dan CRM merupakan dua sistem yang sering digunakan dalam dunia bisnis modern, namun memiliki fokus yang berbeda. ERP berfungsi untuk mengelola proses internal perusahaan seperti keuangan, produksi, dan operasional. Sedangkan CRM berfokus pada pengelolaan hubungan dengan pelanggan. ERP membantu perusahaan dalam meningkatkan efisiensi operasional, sementara CRM membantu meningkatkan kepuasan pelanggan dan penjualan. Keduanya memiliki peran penting dan saling melengkapi satu sama lain. Dengan menggabungkan ERP dan CRM, perusahaan dapat memiliki sistem yang lebih terintegrasi, mulai dari proses internal hingga interaksi dengan pelanggan. Hal ini akan memberikan keunggulan kompetitif yang signifikan dalam menjalankan bisnis.',
                'author' => 'Admin Nigmagrid',
                'category' => 'Technology',
                'status' => 'published',
            ],
            [
                'title' => 'Kenapa Bisnis Anda Membutuhkan CRM',
                'image' => 'blog3.png',
                'description' => 'CRM (Customer Relationship Management) adalah sistem yang dirancang untuk membantu perusahaan dalam mengelola hubungan dengan pelanggan. Dengan CRM, perusahaan dapat menyimpan data pelanggan, melacak riwayat interaksi, serta mengelola proses penjualan secara lebih terstruktur. Salah satu manfaat utama CRM adalah meningkatkan kepuasan pelanggan. Dengan data yang terorganisir, perusahaan dapat memberikan layanan yang lebih personal dan responsif. Selain itu, CRM juga membantu tim penjualan dalam mengidentifikasi peluang bisnis baru. Dalam jangka panjang, penggunaan CRM dapat meningkatkan loyalitas pelanggan serta mendorong pertumbuhan bisnis yang berkelanjutan.',
                'author' => 'Admin Nigmagrid',
                'category' => 'CRM',
                'status' => 'published',
            ],
            [
                'title' => 'Cloud Computing untuk Masa Depan Bisnis',
                'image' => 'blog4.png',
                'description' => 'Cloud computing adalah teknologi yang memungkinkan penyimpanan dan pengolahan data secara online melalui internet. Dengan cloud, perusahaan tidak perlu lagi bergantung pada server fisik yang mahal dan sulit dikelola. Salah satu keunggulan cloud adalah fleksibilitas. Perusahaan dapat menyesuaikan kapasitas sesuai kebutuhan tanpa harus melakukan investasi besar di awal. Selain itu, cloud juga mendukung kolaborasi tim karena data dapat diakses dari mana saja. Dengan berbagai keunggulan tersebut, cloud computing menjadi solusi yang sangat relevan untuk mendukung pertumbuhan bisnis di era digital.',
                'author' => 'Admin Nigmagrid',
                'category' => 'Cloud',
                'status' => 'published',
            ],
            [
                'title' => 'Digital Transformation di Era Modern',
                'image' => 'blog5.png',
                'description' => 'Transformasi digital merupakan proses perubahan bisnis dengan memanfaatkan teknologi digital untuk meningkatkan efisiensi dan inovasi. Perusahaan yang mampu beradaptasi dengan perubahan ini akan memiliki peluang lebih besar untuk berkembang. Transformasi digital tidak hanya tentang teknologi, tetapi juga mencakup perubahan budaya kerja dan strategi bisnis. Dengan mengadopsi teknologi seperti ERP, CRM, dan cloud, perusahaan dapat meningkatkan daya saing secara signifikan. Di era modern ini, transformasi digital bukan lagi pilihan, melainkan kebutuhan bagi setiap perusahaan.',
                'author' => 'Admin Nigmagrid',
                'category' => 'Technology',
                'status' => 'published',
            ],
            [
                'title' => 'Cara Meningkatkan Efisiensi Operasional dengan ERP',
                'image' => 'blog6.png',
                'description' => 'ERP membantu perusahaan dalam meningkatkan efisiensi operasional dengan mengotomatisasi berbagai proses bisnis. Mulai dari pencatatan transaksi hingga pelaporan keuangan, semuanya dapat dilakukan dalam satu sistem yang terintegrasi. Dengan ERP, perusahaan dapat mengurangi kesalahan manual serta meningkatkan akurasi data. Selain itu, ERP juga memungkinkan manajemen untuk memantau kinerja bisnis secara real-time. Hal ini membuat perusahaan dapat mengambil keputusan dengan lebih cepat dan tepat.',
                'author' => 'Admin Nigmagrid',
                'category' => 'ERP',
                'status' => 'published',
            ],
            [
                'title' => 'Keamanan Data dalam Sistem Cloud',
                'image' => 'blog7.png',
                'description' => 'Keamanan data merupakan aspek penting dalam penggunaan cloud computing. Banyak perusahaan khawatir tentang keamanan data mereka di cloud, namun sebenarnya teknologi cloud modern telah dilengkapi dengan sistem keamanan yang canggih. Fitur seperti enkripsi data, firewall, dan kontrol akses membantu melindungi data dari ancaman. Selain itu, penyedia cloud juga memiliki standar keamanan internasional yang ketat. Dengan pengelolaan yang tepat, cloud dapat menjadi solusi yang aman dan efisien untuk penyimpanan data.',
                'author' => 'Admin Nigmagrid',
                'category' => 'Cloud',
                'status' => 'published',
            ],
            [
                'title' => 'Strategi Mengelola Pelanggan dengan CRM',
                'image' => 'blog8.png',
                'description' => 'CRM membantu perusahaan dalam memahami kebutuhan pelanggan melalui data yang terstruktur. Dengan informasi yang lengkap, perusahaan dapat memberikan layanan yang lebih baik dan meningkatkan kepuasan pelanggan. Selain itu, CRM juga membantu dalam mengelola proses penjualan dan meningkatkan efektivitas tim marketing. Dengan strategi yang tepat, CRM dapat menjadi alat yang sangat powerful dalam meningkatkan pertumbuhan bisnis.',
                'author' => 'Admin Nigmagrid',
                'category' => 'CRM',
                'status' => 'published',
            ],
            [
                'title' => 'Manfaat Integrasi Sistem dalam Perusahaan',
                'image' => 'blog9.png',
                'description' => 'Integrasi sistem memungkinkan berbagai aplikasi dalam perusahaan saling terhubung. Hal ini membantu meningkatkan efisiensi kerja serta mengurangi duplikasi data. Dengan sistem yang terintegrasi, alur informasi menjadi lebih cepat dan akurat. Hal ini sangat penting dalam mendukung pengambilan keputusan yang lebih baik. Integrasi sistem menjadi salah satu faktor penting dalam keberhasilan transformasi digital perusahaan.',
                'author' => 'Admin Nigmagrid',
                'category' => 'Technology',
                'status' => 'published',
            ],
            [
                'title' => 'Tren Teknologi yang Akan Mendominasi Tahun Ini',
                'image' => 'blog10.png',
                'description' => 'Perkembangan teknologi terus bergerak dengan cepat, mulai dari artificial intelligence, big data, hingga cloud computing. Perusahaan perlu mengikuti tren ini agar tetap kompetitif. Teknologi tidak hanya menjadi alat, tetapi juga menjadi strategi utama dalam pengembangan bisnis. Dengan memanfaatkan teknologi secara optimal, perusahaan dapat menciptakan inovasi dan meningkatkan efisiensi. Mengikuti tren teknologi adalah langkah penting untuk memastikan keberlanjutan bisnis di masa depan.',
                'author' => 'Admin Nigmagrid',
                'category' => 'Technology',
                'status' => 'published',
            ],
        ];
        foreach ($data as $item) {
            $item['slug'] = Str::slug($item['title']);
            Blog::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
