## Tentang Project
Ini adalah project portal berita sederhana menggunakan Laravel v.8+, didalamnya Admin panel dalam bentuk web untuk mengolah data berita, dan juga disediakan API endpoint untuk menggambil dan mencari data berita.

### Database design

https://drive.google.com/file/d/1jgemfBEOcuCoWsvnQRb4eRzzofV1r41A/view?usp=sharing

## API Documentation

Silahkan klik link berikut untuk dokumentasi API yang telah dibuat:
https://documenter.getpostman.com/view/21533265/2s83YWkQmW

## Development Setup
### Detail Project
- Project menggunakan Laravel v.8+, database MySQL 
- Menggunakan php v8.+

### Setting Up Project

Setelah project di clone di local development, lakukan instalasi dependensi dengan perintah berikut
```bash
composer install && composer update
```
Lalu, copy file `.env.example` dengan nama `.env` sebagai berikut:
```bash
cp .env.example .env
```
Kemudian, silahkan ganti credentials database di file .env nya seperti database dan lainnya
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xxx
DB_USERNAME=root
DB_PASSWORD=
```

Kemudian, migrate semua database di project ini dengan menggunakan artisan command:
```bash
php artisan migrate
```
Setelahnya, generate aplikasi key untuk keamanan pada project laravel dengan menggunakan artisan command berikut:
```bash
php artisan key:generate
# atau 
php artisan key:generate --show
```
Langkah Terakhir, silahkan jalankan local development server Laravel dengan menggunakan artisan command sebagai berikut:
```bash
php artisan serve
```
Project ini akan berjalan di `https://localhost:8000`.
