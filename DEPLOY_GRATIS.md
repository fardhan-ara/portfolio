# 🚀 DEPLOY GRATIS - Panduan Lengkap

## ✅ Persiapan Selesai!
Git repository sudah siap. Sekarang tinggal push ke GitHub dan deploy.

---

## 📦 OPSI 1: Railway (RECOMMENDED - Paling Mudah)

### Keuntungan:
- ✅ **500 jam gratis/bulan** (cukup untuk 1 website 24/7)
- ✅ MySQL database included
- ✅ Auto-deploy dari GitHub
- ✅ SSL certificate gratis
- ✅ Custom domain support

### Langkah Deploy (5 Menit):

#### 1. Push ke GitHub
```bash
# Buat repository baru di GitHub.com (jangan centang README/gitignore)
# Lalu jalankan:
git remote add origin https://github.com/USERNAME/REPO-NAME.git
git branch -M main
git push -u origin main
```

#### 2. Deploy ke Railway
1. Buka https://railway.app
2. Klik **"Start a New Project"**
3. Login dengan GitHub
4. Klik **"Deploy from GitHub repo"**
5. Pilih repository portfolio kamu
6. Railway akan auto-detect Laravel

#### 3. Tambah MySQL Database
1. Di project Railway, klik **"+ New"**
2. Pilih **"Database" → "Add MySQL"**
3. Tunggu database dibuat

#### 4. Set Environment Variables
Klik service Laravel → **"Variables"** → tambahkan:
```
APP_NAME=Portfolio
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:GENERATE_NANTI
APP_URL=https://DOMAIN-RAILWAY.up.railway.app

DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQL_HOST}}
DB_PORT=${{MySQL.MYSQL_PORT}}
DB_DATABASE=${{MySQL.MYSQL_DATABASE}}
DB_USERNAME=${{MySQL.MYSQL_USER}}
DB_PASSWORD=${{MySQL.MYSQL_PASSWORD}}

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

MAIL_MAILER=log
```

#### 5. Generate APP_KEY
Di Railway service → **"Settings"** → **"Custom Start Command"**:
```bash
php artisan key:generate --show
```
Deploy, copy key yang muncul di logs, paste ke variable APP_KEY, hapus custom command.

#### 6. Selesai!
Website live di: `https://DOMAIN-RAILWAY.up.railway.app`

---

## 📦 OPSI 2: Render (Alternatif Gratis)

### Keuntungan:
- ✅ **Gratis unlimited** (tapi sleep setelah 15 menit tidak ada traffic)
- ✅ PostgreSQL database gratis
- ✅ Auto-deploy dari GitHub
- ✅ SSL certificate gratis

### Langkah Deploy:

#### 1. Push ke GitHub (sama seperti Railway)

#### 2. Deploy ke Render
1. Buka https://render.com
2. Klik **"New +"** → **"Web Service"**
3. Connect GitHub repository
4. Isi form:
   - **Name**: portfolio
   - **Environment**: PHP
   - **Build Command**: `composer install --optimize-autoloader --no-dev && php artisan config:cache && php artisan route:cache && php artisan view:cache`
   - **Start Command**: `php artisan serve --host=0.0.0.0 --port=$PORT`

#### 3. Tambah PostgreSQL Database
1. Klik **"New +"** → **"PostgreSQL"**
2. Pilih free tier
3. Copy connection string

#### 4. Set Environment Variables
Di web service → **"Environment"** → tambahkan semua variable seperti Railway, tapi:
```
DB_CONNECTION=pgsql
DB_HOST=DARI_RENDER_POSTGRES
DB_PORT=5432
DB_DATABASE=DARI_RENDER_POSTGRES
DB_USERNAME=DARI_RENDER_POSTGRES
DB_PASSWORD=DARI_RENDER_POSTGRES
```

---

## 📦 OPSI 3: InfinityFree (Shared Hosting Gratis)

### Keuntungan:
- ✅ **Gratis selamanya**
- ✅ MySQL database
- ✅ cPanel
- ⚠️ Ada iklan di website
- ⚠️ Performa terbatas

### Langkah Deploy:

#### 1. Daftar di InfinityFree
1. Buka https://infinityfree.net
2. Daftar akun gratis
3. Buat hosting account

#### 2. Upload Files
1. Login ke cPanel
2. Buka **File Manager**
3. Upload semua file KECUALI folder `public`
4. Isi folder `htdocs` dengan isi folder `public`

#### 3. Setup Database
1. Di cPanel → **MySQL Databases**
2. Buat database baru
3. Buat user dan assign ke database
4. Import database (export dulu dari local)

#### 4. Edit .env
Upload file `.env` dengan config database dari InfinityFree

---

## 🎯 Rekomendasi Saya

**Untuk kamu yang gratis:**
1. **Railway** - Paling mudah, paling cepat, paling stabil (500 jam/bulan cukup!)
2. **Render** - Backup option, tapi website sleep kalau tidak ada traffic
3. **InfinityFree** - Terakhir, ada iklan dan lambat

---

## 🔥 QUICK START - Railway (Tercepat)

```bash
# 1. Push ke GitHub
git remote add origin https://github.com/USERNAME/portfolio.git
git branch -M main
git push -u origin main

# 2. Buka Railway.app → Deploy from GitHub
# 3. Tambah MySQL database
# 4. Set environment variables
# 5. DONE! ✅
```

---

## ❓ Butuh Bantuan?

Pilih platform mana yang mau kamu pakai, nanti saya bantu step-by-step!

**Railway = Paling Gampang** 🚀
