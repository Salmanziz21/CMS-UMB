# Panduan Deploy ke Aapanel

Dokumentasi ini menjelaskan langkah-langkah untuk deploy aplikasi Laravel ini ke server Aapanel.

## Persyaratan

- PHP >= 8.2 dengan ekstensi yang diperlukan:
  - OpenSSL PHP Extension
  - PDO PHP Extension
  - Mbstring PHP Extension
  - Tokenizer PHP Extension
  - XML PHP Extension
  - Ctype PHP Extension
  - JSON PHP Extension
  - BCMath PHP Extension
  - Fileinfo PHP Extension
- Composer
- Node.js & NPM (untuk build assets)
- MySQL/MariaDB
- Nginx atau Apache

## Langkah-langkah Deploy

### 1. Upload Files ke Server

Upload semua file project ke direktori website di Aapanel, biasanya:
```
/www/wwwroot/yourdomain.com/
```

Pastikan file `.env.example` ikut ter-upload.

### 2. Install Dependencies

SSH ke server dan jalankan:

```bash
cd /www/wwwroot/yourdomain.com/
composer install --optimize-autoloader --no-dev
npm install
npm run build
```

### 3. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` dengan konfigurasi database dan aplikasi Anda:

```env
APP_NAME="Admin Prodi"
APP_ENV=production
APP_KEY=base64:... (dari artisan key:generate)
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Setup Database

Buat database di Aapanel:
- Masuk ke Aapanel → Database → MySQL
- Buat database baru
- Buat user database dan berikan akses ke database tersebut
- Update konfigurasi di `.env`

Jalankan migration:

```bash
php artisan migrate --force
```

### 5. Setup Storage Link

```bash
php artisan storage:link
```

### 6. Set Permissions

```bash
chmod -R 755 storage bootstrap/cache
chown -R www:www storage bootstrap/cache
```

### 7. Optimize Application

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 8. Konfigurasi Web Server

#### Untuk Nginx

Edit konfigurasi Nginx di Aapanel atau gunakan file `nginx-aapanel.conf` yang disediakan.

Atau tambahkan di Aapanel → Website → Settings → Configuration:

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    fastcgi_pass unix:/tmp/php-cgi-74.sock; # Sesuaikan dengan versi PHP Anda
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
}

location ~ /\.(?!well-known).* {
    deny all;
}
```

#### Untuk Apache

File `.htaccess` sudah tersedia di folder `public/`. Pastikan mod_rewrite diaktifkan di Aapanel.

### 9. Setup SSL (Opsional)

Di Aapanel → Website → Settings → SSL, aktifkan SSL certificate untuk domain Anda.

### 10. Setup Cron Job

Di Aapanel → Cron, tambahkan cron job:

```
* * * * * cd /www/wwwroot/yourdomain.com && php artisan schedule:run >> /dev/null 2>&1
```

### 11. Setup Queue Worker (Jika menggunakan Queue)

Untuk production, disarankan menggunakan supervisor. Di Aapanel → Supervisor, tambahkan:

```ini
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /www/wwwroot/yourdomain.com/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www
numprocs=2
redirect_stderr=true
stdout_logfile=/www/wwwroot/yourdomain.com/storage/logs/worker.log
stopwaitsecs=3600
```

## Troubleshooting

### Permission Denied

Jika terjadi error permission:

```bash
chmod -R 755 storage bootstrap/cache
chown -R www:www storage bootstrap/cache
```

### 500 Internal Server Error

1. Cek log di `storage/logs/laravel.log`
2. Pastikan `APP_DEBUG=true` di `.env` untuk melihat error detail (set ke `false` setelah selesai)
3. Pastikan semua dependencies terinstall dengan benar
4. Pastikan storage link sudah dibuat

### Storage Files Tidak Muncul

Pastikan storage link sudah dibuat:
```bash
php artisan storage:link
```

Dan pastikan permission folder storage benar:
```bash
chmod -R 755 storage
chown -R www:www storage
```

### CSS/JS Tidak Load

1. Pastikan `npm run build` sudah dijalankan
2. Pastikan `APP_URL` di `.env` sudah benar
3. Clear cache: `php artisan config:clear && php artisan cache:clear`

## Optimasi Production

Setelah deploy berhasil, pastikan:

1. ✅ `APP_DEBUG=false` di `.env`
2. ✅ Cache config, route, dan view sudah dibuat
3. ✅ Storage link sudah dibuat
4. ✅ Permission folder sudah benar
5. ✅ SSL certificate aktif (jika menggunakan HTTPS)
6. ✅ Cron job sudah disetup
7. ✅ Queue worker sudah disetup (jika menggunakan queue)

## Update Aplikasi

Untuk update aplikasi di production:

```bash
git pull origin main
composer install --optimize-autoloader --no-dev
npm install
npm run build
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```
