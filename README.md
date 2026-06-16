# Company Profile Nigmagrid Indonesia

Project Company Profile berbasis Laravel untuk website Nigmagrid Indonesia. Website ini memiliki halaman frontend publik dan backend administrator untuk mengelola konten Company Profile.

## Fitur Utama

- Frontend company profile: Home, About, Services, Blog, dan Contact.
- Manual authentication admin menggunakan Laravel Session.
- Password admin disimpan menggunakan Hash.
- Middleware admin untuk melindungi seluruh halaman administrator.
- Dashboard admin berisi ringkasan jumlah data.
- CRUD Blog sebagai modul Artikel/Berita.
- CRUD Services sebagai modul Produk/Layanan.
- CRUD Gallery sebagai modul Galeri.
- Edit Company Profile, Contact, dan Footer.
- CRUD Leadership dan Team.
- Upload gambar menggunakan Laravel Storage.
- Validasi form menggunakan Laravel Validation.
- Export laporan PDF untuk Blog, Services, dan Gallery menggunakan DomPDF.

## Teknologi

- Laravel 12
- PHP 8.4+
- MySQL
- Blade Template
- Bootstrap 5
- Laravel Session
- Laravel Storage
- Barryvdh Laravel DomPDF

## Halaman Publik

| Halaman | Route |
| --- | --- |
| Home | `/` |
| About | `/about` |
| Services | `/services` |
| Blog | `/blog` |
| Detail Blog | `/blog/{id-or-slug}` |
| Contact | `/contact` |

## Halaman Admin

| Modul | Route |
| --- | --- |
| Login Admin | `/admin/login` |
| Dashboard | `/admin/dashboard` |
| Company Profile | `/admin/company-profile` |
| Blog | `/admin/blogs` |
| Services | `/admin/services` |
| Gallery | `/admin/galleries` |
| Leadership | `/admin/leaders` |
| Team | `/admin/teams` |
| Reports | `/admin/reports` |

## Akun Admin Default

Akun ini dibuat melalui seeder:

```text
Email    : admin@nigmagrid.test
Password : password123
```

## Instalasi

Clone atau masuk ke folder project, lalu jalankan:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Atur konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_company
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration, seeder, dan storage link:

```bash
php artisan migrate --seed
php artisan storage:link
```

Jalankan server:

```bash
php artisan serve
```

Buka website:

```text
http://127.0.0.1:8000
```

## Struktur Modul Database

Project menggunakan tabel utama berikut:

- `users` untuk akun admin manual.
- `blogs` untuk artikel/blog.
- `services` untuk layanan.
- `galleries` untuk galeri.
- `company_profiles` untuk data about, contact, footer, dan sosial media.
- `leaders` untuk data leadership.
- `teams` untuk data team.

## Upload Gambar

Upload gambar disimpan di:

```text
storage/app/public
```

File dapat diakses melalui:

```text
public/storage
```

Project tetap mendukung gambar existing dari:

```text
public/images
```

## Export PDF

Menu Reports tersedia di admin:

- Blog PDF: `/admin/reports/blog/pdf`
- Services PDF: `/admin/reports/services/pdf`
- Gallery PDF: `/admin/reports/galleries/pdf`

PDF hanya bisa diakses setelah login admin.

<!-- ## Deploy ke Vercel

Project ini bisa dideploy ke Vercel menggunakan community runtime `vercel-php`. Database production memakai Railway MySQL. Untuk saat ini upload gambar production belum diaktifkan, jadi deploy Vercel cukup memakai gambar seed/static dari `public/images`.

File deploy yang disiapkan:

- `api/index.php` sebagai entrypoint Vercel yang meneruskan request ke Laravel.
- `vercel.json` untuk runtime `vercel-php@0.9.0`, route static asset, dan cache Laravel ke `/tmp`.
- `.vercelignore` untuk mengecualikan file lokal seperti `vendor`, `.env`, cache, log, dan storage lokal.

### 1. Push ke GitHub

Pastikan repository GitHub sudah bisa di-push dari akun yang aktif di komputer:

```bash
git push -u origin main
```

Jika muncul error permission, tambahkan akun GitHub aktif sebagai collaborator repository atau login ulang memakai akun pemilik repository.

### 2. Buat Railway MySQL

Buat database MySQL di Railway, lalu salin credential ke Environment Variables Vercel:

```env
DB_CONNECTION=mysql
DB_HOST=your-railway-host
DB_PORT=your-railway-port
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=your-railway-password
```

### 3. Environment Variables Vercel

Tambahkan juga variable production berikut:

```env
APP_NAME="Nigmagrid Indonesia"
APP_ENV=production
APP_KEY=base64:your-generated-app-key
APP_DEBUG=false
APP_URL=https://your-project.vercel.app
LOG_CHANNEL=stderr
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=local
APP_CONFIG_CACHE=/tmp/config.php
APP_EVENTS_CACHE=/tmp/events.php
APP_PACKAGES_CACHE=/tmp/packages.php
APP_ROUTES_CACHE=/tmp/routes.php
APP_SERVICES_CACHE=/tmp/services.php
VIEW_COMPILED_PATH=/tmp/views
```

Buat `APP_KEY` dari lokal:

```bash
php artisan key:generate --show
```

### 4. Import Project di Vercel

Import repository GitHub ke Vercel. Vercel akan membaca `vercel.json` dan menjalankan Laravel melalui `api/index.php`.

Static asset yang dilayani langsung dari folder `public`:

- `/css/*`
- `/js/*`
- `/images/*`
- `/bootstrap-5.3.8-dist/*`
- `/favicon.ico`
- `/robots.txt`

### 5. Migration Production

Setelah Railway env siap, jalankan migration production dari lokal dengan credential Railway di `.env` lokal sementara:

```bash
php artisan migrate --seed --force
```

Seeder akan membuat akun admin default:

```text
Email    : admin@nigmagrid.test
Password : password123
```

Ganti password setelah login jika project dipakai publik.

### Upload Gambar di Vercel

Vercel berjalan secara serverless, jadi filesystem lokal tidak cocok untuk upload permanen. Untuk deploy saat ini:

- Gunakan gambar existing dari `public/images`.
- Jangan test upload gambar di production.
- CRUD teks, login admin, dashboard, dan PDF tetap bisa dipakai.

Jika nanti upload production mau diaktifkan, gunakan object storage seperti Cloudflare R2 dan set env berikut:

```env
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your-r2-access-key
AWS_SECRET_ACCESS_KEY=your-r2-secret-key
AWS_DEFAULT_REGION=auto
AWS_BUCKET=your-r2-bucket
AWS_ENDPOINT=https://your-account-id.r2.cloudflarestorage.com
AWS_URL=https://your-public-r2-domain
AWS_USE_PATH_STYLE_ENDPOINT=true
```

Lalu install dependency S3:

```bash
composer require league/flysystem-aws-s3-v3
```

## Testing

Jalankan test lokal:

```bash
php artisan test
php artisan route:list
```

Checklist setelah deploy Vercel:

- Buka `/`, `/about`, `/services`, `/blog`, dan `/contact`.
- Pastikan asset CSS, gambar, dan Bootstrap tidak 404.
- Login ke `/admin/login`.
- Coba edit Company Profile teks dan data CRUD tanpa upload gambar baru.
- Download PDF report Blog, Services, dan Gallery.
- Cek `/admin/dashboard` tanpa login harus redirect ke `/admin/login`.

## Checklist UAS

- [x] Authentication manual
- [x] Login admin
- [x] Logout admin
- [x] Password Hash
- [x] Session Laravel
- [x] Middleware admin
- [x] Dashboard admin
- [x] CRUD Blog
- [x] CRUD Services
- [x] CRUD Gallery
- [x] Company Profile/About management
- [x] Leadership management
- [x] Team management
- [x] Contact/Footer setting
- [x] Validasi form
- [x] Upload gambar
- [x] Export PDF
- [x] Frontend tetap memakai desain existing

## Catatan Serverless

Vercel cocok untuk demo dan traffic ringan. Untuk Laravel production jangka panjang, shared hosting PHP, VPS, Laravel Forge, atau platform PHP-native biasanya lebih sederhana karena filesystem, queue, scheduler, dan worker Laravel lebih natural di server biasa. -->
