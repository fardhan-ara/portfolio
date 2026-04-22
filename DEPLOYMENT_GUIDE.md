# 🚀 DEPLOYMENT GUIDE - VERCEL

## 📋 PERSIAPAN SEBELUM DEPLOY

### ⚠️ PENTING: Laravel di Vercel Memiliki Keterbatasan!

**Vercel adalah platform untuk:**
- ✅ Static sites
- ✅ Serverless functions
- ✅ Frontend frameworks (Next.js, React, Vue)

**Vercel TIDAK ideal untuk:**
- ❌ Full Laravel applications (dengan database)
- ❌ File uploads (storage tidak persistent)
- ❌ Session management
- ❌ Background jobs

---

## 🎯 REKOMENDASI HOSTING UNTUK LARAVEL:

### 1. **Railway.app** (RECOMMENDED!) ⭐⭐⭐⭐⭐
**Kenapa Railway?**
- ✅ Support Laravel penuh
- ✅ MySQL database included
- ✅ File storage persistent
- ✅ Easy deployment
- ✅ Free tier available
- ✅ Auto SSL
- ✅ Custom domain

**Harga**: $5/month (setelah free tier)

### 2. **Heroku**
- ✅ Laravel support
- ✅ Add-ons untuk database
- ✅ Dokumentasi lengkap
- ❌ Tidak ada free tier lagi

**Harga**: $7/month

### 3. **DigitalOcean App Platform**
- ✅ Full Laravel support
- ✅ Managed database
- ✅ Scalable
- ❌ Lebih mahal

**Harga**: $12/month

### 4. **Shared Hosting (Niagahoster, Hostinger)**
- ✅ Murah
- ✅ cPanel
- ✅ Support Laravel
- ❌ Performance terbatas

**Harga**: Rp 20.000 - 50.000/bulan

---

## 🚀 CARA DEPLOY KE RAILWAY (RECOMMENDED)

### Step 1: Persiapan

1. **Buat akun Railway**
   - Kunjungi: https://railway.app
   - Sign up dengan GitHub

2. **Install Railway CLI**
   ```bash
   npm install -g @railway/cli
   ```

3. **Login Railway**
   ```bash
   railway login
   ```

### Step 2: Setup Project

1. **Initialize Railway**
   ```bash
   cd d:\project\portofolio\portofolio
   railway init
   ```

2. **Link ke project**
   ```bash
   railway link
   ```

### Step 3: Add Database

1. **Add MySQL**
   ```bash
   railway add mysql
   ```

2. **Get database credentials**
   ```bash
   railway variables
   ```

### Step 4: Configure Environment

1. **Set environment variables**
   ```bash
   railway variables set APP_NAME="Portfolio"
   railway variables set APP_ENV=production
   railway variables set APP_DEBUG=false
   railway variables set APP_KEY=base64:YOUR_APP_KEY
   railway variables set APP_URL=https://your-app.railway.app
   ```

2. **Database variables (auto-set by Railway)**
   - DB_CONNECTION=mysql
   - DB_HOST=containers-us-west-xxx.railway.app
   - DB_PORT=3306
   - DB_DATABASE=railway
   - DB_USERNAME=root
   - DB_PASSWORD=xxx

### Step 5: Deploy

1. **Deploy aplikasi**
   ```bash
   railway up
   ```

2. **Run migrations**
   ```bash
   railway run php artisan migrate --force
   railway run php artisan db:seed --force
   ```

3. **Generate app key (jika belum)**
   ```bash
   railway run php artisan key:generate --force
   ```

4. **Link storage**
   ```bash
   railway run php artisan storage:link
   ```

### Step 6: Custom Domain (Optional)

1. **Add domain di Railway dashboard**
2. **Update DNS records**
3. **Update APP_URL**

---

## 🌐 CARA DEPLOY KE SHARED HOSTING (CPANEL)

### Step 1: Persiapan

1. **Export database**
   ```bash
   php artisan db:export
   # atau manual export via phpMyAdmin
   ```

2. **Compress project**
   ```bash
   # Exclude node_modules dan vendor
   zip -r portfolio.zip . -x "node_modules/*" "vendor/*"
   ```

### Step 2: Upload ke Hosting

1. **Login cPanel**
2. **File Manager → public_html**
3. **Upload portfolio.zip**
4. **Extract**

### Step 3: Setup

1. **Install dependencies**
   ```bash
   # Via SSH atau Terminal di cPanel
   cd public_html
   composer install --optimize-autoloader --no-dev
   ```

2. **Setup .env**
   ```bash
   cp .env.example .env
   nano .env
   ```

3. **Update .env**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   
   DB_CONNECTION=mysql
   DB_HOST=localhost
   DB_PORT=3306
   DB_DATABASE=your_db_name
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_pass
   ```

4. **Generate key**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations**
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

6. **Link storage**
   ```bash
   php artisan storage:link
   ```

7. **Set permissions**
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

### Step 4: Configure .htaccess

**public/.htaccess** (sudah ada, pastikan benar):
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

---

## 🔧 OPTIMASI UNTUK PRODUCTION

### 1. Cache Configuration
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. Optimize Autoloader
```bash
composer install --optimize-autoloader --no-dev
```

### 3. Asset Compilation
```bash
npm run build
```

### 4. Database Optimization
```bash
php artisan optimize
```

---

## 📝 CHECKLIST DEPLOYMENT

### Pre-Deployment:
- [ ] Update .env untuk production
- [ ] Set APP_DEBUG=false
- [ ] Set APP_ENV=production
- [ ] Generate APP_KEY
- [ ] Configure database
- [ ] Test locally

### Deployment:
- [ ] Upload files
- [ ] Install dependencies
- [ ] Run migrations
- [ ] Seed database
- [ ] Link storage
- [ ] Set permissions
- [ ] Cache config

### Post-Deployment:
- [ ] Test all features
- [ ] Check database connection
- [ ] Test file uploads
- [ ] Test email sending
- [ ] Check SSL certificate
- [ ] Test on mobile
- [ ] Monitor errors

---

## 🐛 TROUBLESHOOTING

### Error 500
```bash
# Check logs
tail -f storage/logs/laravel.log

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Database Connection Error
```bash
# Check .env
cat .env | grep DB_

# Test connection
php artisan tinker
DB::connection()->getPdo();
```

### Storage Link Error
```bash
# Remove old link
rm public/storage

# Create new link
php artisan storage:link
```

### Permission Errors
```bash
# Fix permissions
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

---

## 🎯 REKOMENDASI FINAL

### Untuk Portfolio Anda:

**PILIHAN TERBAIK: Railway.app** 🏆

**Alasan:**
1. ✅ Support Laravel penuh
2. ✅ MySQL included
3. ✅ File storage persistent
4. ✅ Easy deployment
5. ✅ Free tier untuk testing
6. ✅ Auto SSL & custom domain
7. ✅ Monitoring & logs
8. ✅ Auto-deploy dari GitHub

**Alternatif Budget:**
- Niagahoster (Rp 20rb/bulan)
- Hostinger (Rp 25rb/bulan)
- IDCloudHost (Rp 15rb/bulan)

---

## 📊 PERBANDINGAN HOSTING

| Hosting | Harga/Bulan | Laravel Support | Database | Storage | SSL | Rating |
|---------|-------------|-----------------|----------|---------|-----|--------|
| Railway | $5 | ✅ Full | ✅ MySQL | ✅ Persistent | ✅ Auto | ⭐⭐⭐⭐⭐ |
| Heroku | $7 | ✅ Full | ✅ Add-on | ✅ Persistent | ✅ Auto | ⭐⭐⭐⭐ |
| DigitalOcean | $12 | ✅ Full | ✅ Managed | ✅ Persistent | ✅ Auto | ⭐⭐⭐⭐⭐ |
| Niagahoster | Rp 20k | ✅ Full | ✅ MySQL | ✅ Persistent | ✅ Free | ⭐⭐⭐⭐ |
| Vercel | Free | ❌ Limited | ❌ No | ❌ No | ✅ Auto | ⭐⭐ |

---

## 🚀 QUICK START - RAILWAY

```bash
# 1. Install CLI
npm install -g @railway/cli

# 2. Login
railway login

# 3. Initialize
cd d:\project\portofolio\portofolio
railway init

# 4. Add MySQL
railway add mysql

# 5. Deploy
railway up

# 6. Run migrations
railway run php artisan migrate --force
railway run php artisan db:seed --force

# 7. Done!
railway open
```

---

## 📞 SUPPORT

### Railway:
- Docs: https://docs.railway.app
- Discord: https://discord.gg/railway

### Laravel Deployment:
- Docs: https://laravel.com/docs/deployment
- Forge: https://forge.laravel.com

---

## 🎉 KESIMPULAN

**Untuk portfolio Laravel Anda, saya SANGAT MEREKOMENDASIKAN:**

### 🏆 Railway.app

**Kenapa?**
- ✅ Perfect untuk Laravel
- ✅ Database included
- ✅ Easy deployment
- ✅ Affordable ($5/month)
- ✅ Professional features
- ✅ Great developer experience

**Vercel TIDAK cocok untuk:**
- ❌ Full Laravel apps
- ❌ Database-driven apps
- ❌ File uploads
- ❌ Complex backend logic

---

**Mau saya bantu deploy ke Railway sekarang?** 🚀

Atau mau pilih hosting lain? Saya bisa bantu setup untuk:
- Railway
- Shared hosting (cPanel)
- DigitalOcean
- Heroku

**Pilih mana?** 😊
