# Panduan Instalasi Nine Store - Windows

## Persyaratan Sistem
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- XAMPP atau Laragon

## Instalasi dengan XAMPP

### 1. Persiapan
- Download dan install XAMPP dari https://www.apachefriends.org/
- Pastikan Apache dan MySQL sudah berjalan di XAMPP Control Panel

### 2. Setup Project
- Copy folder project ke `C:\xampp\htdocs\`
- Rename folder menjadi `nine-landing` atau nama yang Anda inginkan

### 3. Konfigurasi Database
- Buka phpMyAdmin di browser: `http://localhost/phpmyadmin`
- Buat database baru dengan nama `nine_db`
- Import file database (jika ada) atau buat tabel manual

### 4. Konfigurasi CodeIgniter
- Buka file `application/config/config.php`
- Set base_url:
```php
$config['base_url'] = 'http://localhost/nine-landing/';
```

- Buka file `application/config/database.php`
- Sesuaikan konfigurasi database:
```php
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'nine_db',
```

### 5. Akses Aplikasi
- Buka browser dan akses: `http://localhost/nine-landing/`

## Instalasi dengan Laragon

### 1. Persiapan
- Download dan install Laragon dari https://laragon.org/
- Start Laragon (Apache & MySQL)

### 2. Setup Project
- Copy folder project ke `C:\laragon\www\`
- Rename folder menjadi `nine-landing`

### 3. Konfigurasi Database
- Buka phpMyAdmin: `http://localhost/phpmyadmin`
- Buat database baru dengan nama `nine_db`
- Import file database (jika ada)

### 4. Konfigurasi CodeIgniter
- Buka file `application/config/config.php`
- Set base_url:
```php
$config['base_url'] = 'http://nine-landing.test/';
```
atau
```php
$config['base_url'] = 'http://localhost/nine-landing/';
```

- Buka file `application/config/database.php`
- Sesuaikan konfigurasi database:
```php
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'nine_db',
```

### 5. Akses Aplikasi
Laragon biasanya otomatis membuat virtual host:
- `http://nine-landing.test/`

Atau akses via:
- `http://localhost/nine-landing/`

## Troubleshooting

### Error 404 / Blank Page
- Pastikan mod_rewrite sudah aktif di Apache
- Check file `.htaccess` ada di root project
- Pastikan `index.php` di root project dapat diakses

### Database Connection Error
- Pastikan MySQL sudah running
- Cek username dan password di `config/database.php`
- Pastikan database `nine_db` sudah dibuat

### CSS/JS Tidak Load
- Pastikan path di `config.php` sudah benar
- Check folder `public/assets/` ada dan berisi file CSS/JS
- Clear browser cache

### Permission Error (Laragon)
- Jalankan Laragon as Administrator
- Check folder permissions

## Struktur Project
```
nine-landing/
├── app/
│   ├── application/
│   │   ├── config/
│   │   ├── controllers/
│   │   ├── models/
│   │   └── views/
│   ├── public/
│   │   └── assets/
│   ├── system/
│   └── index.php
```

## Akses Dashboard Admin
- URL: `http://localhost/nine-landing/dashboard`
- Username: (sesuai yang ada di database)
- Password: (sesuai yang ada di database)

## Catatan Penting
- Selalu backup database sebelum update
- Jangan upload file konfigurasi ke repository publik
- Gunakan environment yang berbeda untuk development dan production
- Update base_url sesuai dengan domain/path Anda

## Teknologi yang Digunakan
- CodeIgniter 3.x
- Bootstrap 5
- jQuery 3.7.1
- Font Awesome 6.4.0
- Chart.js
- DataTables

## Support
Jika mengalami kendala, pastikan:
1. Apache dan MySQL sudah running
2. PHP version minimal 7.4
3. Extension PHP yang dibutuhkan sudah aktif (mysqli, mbstring, etc)
4. File permissions sudah benar

Selamat menggunakan Nine Store!
