# Deploy Bali Santih ke VPS

Panduan ini untuk deploy Laravel landing page Bali Santih ke VPS dengan domain `balisantih.com` dan SSL Let's Encrypt.

## Kebutuhan VPS

- Ubuntu 22.04/24.04
- Nginx
- PHP 8.2 atau lebih baru dengan ekstensi umum Laravel
- Composer
- Node.js 20 atau lebih baru
- Certbot
- Domain `balisantih.com` mengarah ke IP VPS

## Setup Server

```bash
sudo apt update
sudo apt install -y nginx certbot python3-certbot-nginx unzip git curl
sudo apt install -y php8.2 php8.2-cli php8.2-fpm php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-bcmath
```

Install Composer jika belum ada:

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

Install Node.js jika belum ada:

```bash
curl -fsSL https://deb.nodesource.com/setup_22.x | sudo -E bash -
sudo apt install -y nodejs
```

## Deploy Project

```bash
sudo mkdir -p /var/www/balisantih
sudo chown -R $USER:www-data /var/www/balisantih
git clone https://github.com/USERNAME/balisantih.git /var/www/balisantih
cd /var/www/balisantih

composer install --no-dev --optimize-autoloader
npm ci
npm run build

cp .env.production.example .env
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache

sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R ug+rw storage bootstrap/cache
```

Ganti `USERNAME` dengan username GitHub pemilik repo.

## Konfigurasi Nginx

Buat file:

```bash
sudo nano /etc/nginx/sites-available/balisantih.com
```

Isi:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name balisantih.com www.balisantih.com;
    root /var/www/balisantih/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Aktifkan site:

```bash
sudo ln -s /etc/nginx/sites-available/balisantih.com /etc/nginx/sites-enabled/balisantih.com
sudo nginx -t
sudo systemctl reload nginx
```

## Tambahkan SSL

```bash
sudo certbot --nginx -d balisantih.com -d www.balisantih.com
sudo certbot renew --dry-run
```

## Update Deploy Berikutnya

```bash
cd /var/www/balisantih
git pull
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
sudo chown -R www-data:www-data storage bootstrap/cache
```
