# 🐾 Paws Petshop – Sistem Manajemen Stok Admin (Laravel 12 + Tailwind CSS)

Repositori ini berisi **panel admin** berbasis **Laravel 12** untuk mengelola stok makanan hewan peliharaan di toko **Paws Petshop**. Semua styling sudah menggunakan **Tailwind CSS** sehingga tampilannya responsif dan modern.

---

## ✨ Fitur Utama

- ✅ **Manajemen Produk** (CRUD lengkap)  
- ✅ **Upload Gambar Produk** (dengan thumbnail otomatis)  
- ✅ **Pantau Stok Real-time**  
- ✅ **Autentikasi** menggunakan Laravel Breeze  
- ✅ **Desain Responsif** dengan Tailwind CSS  
- ✅ **Laravel 12** dengan PHP 8.3+

---

## 📦 Instalasi

### Prasyarat (Pastikan sudah ter-install)

| Software | Versi Minimal |
|----------|---------------|
| PHP      | 8.3           |
| Composer | Latest        |
| Node.js  | 18+           |

### Langkah-langkah

1. **Clone repositori**
   ```bash
   git clone https://github.com/ardhikaxx/paws-petshop.git
   cd paws-petshop
   ```

2. **Install dependensi PHP**
   ```bash
   composer install
   ```

3. **Install dependensi JavaScript**
   ```bash
   npm install
   ```

4. **Salin file environment**
   ```bash
   cp .env.example .env
   ```

5. **Sesuaikan `.env`**  
   Edit bagian berikut sesuai konfigurasi database Anda:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=paws_petshop
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Generate application key**
   ```bash
   php artisan key:generate
   ```

7. **Jalankan migrasi & seed (opsional)**
   ```bash
   php artisan migrate --seed
   ```

8. **Buat symlink untuk storage**
   ```bash
   php artisan storage:link
   ```

---

## 🚀 Menjalankan Proyek

### Development
```bash
npm run dev        # Compile Tailwind & JS
php artisan serve  # Jalankan server lokal
```
> Akses aplikasi di browser: `http://localhost:8000`

### Production
```bash
npm run build
php artisan serve --host=0.0.0.0 --port=8080
```

---

## 🔐 Akun Default (setelah `db:seed`)

| Email             | Password   |
|-------------------|------------|
| admin@paws.test   | password   |

---

## 🗂️ Struktur Folder

```text
paws-petshop/
├── app/
│   ├── Http/Controllers/     # Semua controller
│   ├── Models/               # Model Eloquent
│   └── Providers/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── storage/              # Symlink ke storage/app/public
├── resources/
│   ├── css/app.css           # Entry Tailwind
│   ├── js/
│   └── views/
│       ├── auth/             # Login, register, dll.
│       ├── components/       # Blade components
│       ├── layouts/          # Layout utama (app.blade.php)
│       └── products/         # CRUD produk
├── routes/
├── storage/
│   ├── app/public/products/  # Penyimpanan gambar produk
├── tailwind.config.js        # Konfigurasi Tailwind
├── vite.config.js            # Konfigurasi Vite
├── composer.json
└── package.json
```

---

## 🧪 Testing

```bash
php artisan test
```

---

## 📝 Lisensi

Proyek ini bersifat open-source di bawah lisensi **MIT**.  
Silakan fork, bintangi ⭐, dan kontribusi!

---

## 💬 Butuh Bantuan?

- **Issues**: Buat issue baru di GitHub  
- **Email**: support@paws-petshop.com  

---

> Happy coding & semoga stok kucing Anda selalu terpantau!