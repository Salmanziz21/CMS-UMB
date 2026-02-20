# Deployment Checklist untuk Aapanel

Gunakan checklist ini untuk memastikan semua langkah deployment sudah dilakukan dengan benar.

## Pre-Deployment

- [ ] Backup database dan files dari server production (jika update)
- [ ] Pastikan semua perubahan code sudah di-commit dan di-push
- [ ] Test aplikasi di local/staging environment

## Server Requirements

- [ ] PHP >= 8.2 terinstall
- [ ] Extension PHP yang diperlukan sudah aktif:
  - [ ] OpenSSL
  - [ ] PDO
  - [ ] Mbstring
  - [ ] Tokenizer
  - [ ] XML
  - [ ] Ctype
  - [ ] JSON
  - [ ] BCMath
  - [ ] Fileinfo
- [ ] Composer terinstall
- [ ] Node.js & NPM terinstall
- [ ] MySQL/MariaDB terinstall dan running
- [ ] Web server (Nginx/Apache) terinstall dan running

## File Upload

- [ ] Upload semua file project ke server
- [ ] File `.env.example` ikut ter-upload
- [ ] Pastikan permission folder storage dan bootstrap/cache writable

## Environment Setup

- [ ] Copy `.env.example` ke `.env`
- [ ] Generate application key: `php artisan key:generate`
- [ ] Edit `.env` dengan konfigurasi:
  - [ ] `APP_NAME`
  - [ ] `APP_ENV=production`
  - [ ] `APP_DEBUG=false`
  - [ ] `APP_URL` (sesuaikan dengan domain)
  - [ ] Database configuration:
    - [ ] `DB_DATABASE`
    - [ ] `DB_USERNAME`
    - [ ] `DB_PASSWORD`
  - [ ] Mail configuration (jika menggunakan)
  - [ ] Cache/Session driver

## Database Setup

- [ ] Database dibuat di Aapanel
- [ ] User database dibuat dan diberikan akses
- [ ] Koneksi database di-test
- [ ] Run migration: `php artisan migrate --force`
- [ ] Seed database (jika ada): `php artisan db:seed --force`

## Dependencies

- [ ] Install Composer dependencies: `composer install --optimize-autoloader --no-dev`
- [ ] Install NPM dependencies: `npm install`
- [ ] Build assets: `npm run build`

## Storage & Permissions

- [ ] Create storage symlink: `php artisan storage:link`
- [ ] Set permissions:
  ```bash
  chmod -R 755 storage bootstrap/cache
  chown -R www:www storage bootstrap/cache
  ```
- [ ] Test upload file (jika ada fitur upload)

## Web Server Configuration

### Nginx
- [ ] Konfigurasi Nginx sudah disetup (lihat `nginx-aapanel.conf`)
- [ ] Root directory mengarah ke `/public`
- [ ] PHP-FPM socket path benar
- [ ] Test konfigurasi: `nginx -t`
- [ ] Reload Nginx: `systemctl reload nginx`

### Apache
- [ ] File `.htaccess` ada di folder `public/`
- [ ] Mod_rewrite aktif
- [ ] Test konfigurasi
- [ ] Restart Apache: `systemctl restart apache2` atau `systemctl restart httpd`

## Optimization

- [ ] Cache config: `php artisan config:cache`
- [ ] Cache routes: `php artisan route:cache`
- [ ] Cache views: `php artisan view:cache`
- [ ] Clear old caches: `php artisan cache:clear`

## SSL (Optional but Recommended)

- [ ] SSL certificate diaktifkan di Aapanel
- [ ] Redirect HTTP to HTTPS dikonfigurasi
- [ ] Test SSL certificate

## Cron Job

- [ ] Cron job disetup di Aapanel:
  ```
  * * * * * cd /www/wwwroot/yourdomain.com && php artisan schedule:run >> /dev/null 2>&1
  ```
- [ ] Test cron job berjalan

## Queue Worker (Jika menggunakan Queue)

- [ ] Supervisor disetup di Aapanel
- [ ] Queue worker configuration ditambahkan
- [ ] Queue worker running

## Testing

- [ ] Test akses homepage
- [ ] Test login/logout
- [ ] Test fitur utama aplikasi
- [ ] Test upload file (jika ada)
- [ ] Test form submission
- [ ] Check error logs: `storage/logs/laravel.log`
- [ ] Check browser console untuk error JS/CSS

## Security

- [ ] `APP_DEBUG=false` di production
- [ ] `APP_ENV=production` di production
- [ ] File `.env` tidak accessible dari browser
- [ ] Folder storage tidak directly accessible
- [ ] Security headers dikonfigurasi
- [ ] Strong password untuk database
- [ ] File permissions sudah benar (tidak 777)

## Performance

- [ ] OPCache enabled (jika menggunakan PHP-FPM)
- [ ] Static files cached (Nginx/Apache)
- [ ] Database indexing optimal
- [ ] Images optimized (jika ada)
- [ ] CDN configured (jika menggunakan)

## Monitoring

- [ ] Error logging aktif
- [ ] Access logs aktif
- [ ] Monitoring tools setup (opsional)
- [ ] Backup strategy ditentukan

## Documentation

- [ ] Domain dan server info didokumentasi
- [ ] Database credentials aman disimpan
- [ ] Deployment steps didokumentasi
- [ ] Contact information untuk support

## Post-Deployment

- [ ] Inform team/stakeholder bahwa deployment selesai
- [ ] Monitor error logs untuk beberapa jam pertama
- [ ] Test semua fitur kritis
- [ ] Setup automated backup (jika belum)
- [ ] Dokumentasi update process untuk next deployment

## Rollback Plan (Jika diperlukan)

- [ ] Backup files dan database sebelum rollback
- [ ] Procedure rollback sudah didokumentasi
- [ ] Test rollback procedure di staging

---

**Catatan:**
- Checklist ini harus disesuaikan dengan kebutuhan spesifik project
- Beberapa item mungkin tidak berlaku untuk semua project
- Selalu test di staging environment sebelum production deployment
