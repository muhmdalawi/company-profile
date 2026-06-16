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