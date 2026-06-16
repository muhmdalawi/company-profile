# Company Profile Nigmagrid Indonesia

Project Company Profile berbasis Laravel untuk website Nigmagrid Indonesia. Website ini memiliki halaman frontend publik dan backend administrator untuk mengelola konten sesuai kebutuhan UAS Backend Company Profile.

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
- Frontend tetap memakai tampilan existing dengan data dari database dan fallback asset lama.

## Teknologi

- Laravel 12
- PHP 8.4+ direkomendasikan untuk dependency lock saat ini
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

## Catatan PHP di Laragon

Pada environment pengembangan ini, project diverifikasi menggunakan PHP:

```text
C:\laragon\bin\php\php-8.5.7-Win32-vs17-x64\php.exe
```

Jika command `php artisan` gagal karena PHP default masih versi lama, arahkan PATH/Laragon ke PHP 8.4+ atau jalankan Artisan dengan path PHP tersebut.

Contoh:

```powershell
& 'C:\laragon\bin\php\php-8.5.7-Win32-vs17-x64\php.exe' artisan migrate --seed
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

## Testing

Jalankan test:

```bash
php artisan test
```

Command yang sudah digunakan untuk verifikasi:

```bash
php artisan migrate --seed
php artisan storage:link
php artisan route:list
php artisan test
```

Hasil verifikasi terakhir:

```text
Tests: 2 passed
```

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

## Git

Remote repository:

```bash
git remote add origin https://github.com/muhmdalawi/company-profile.git
```

Jika push gagal dengan error permission, pastikan akun GitHub yang aktif memiliki akses collaborator ke repository tersebut.
