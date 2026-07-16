# 🖥️ Sistem Manajemen Lisensi Software

Sistem Manajemen Lisensi Software adalah aplikasi berbasis web yang dikembangkan menggunakan framework Laravel. Aplikasi ini dirancang untuk membantu perusahaan dalam mengelola data lisensi perangkat lunak secara efisien, mulai dari pencatatan organisasi, data software, detail lisensi, hingga pembuatan laporan.

---

## 🚀 Fitur Utama

- **Autentikasi:** Login, Register, dan Manajemen Profil Pengguna.
- **Dashboard:** Ringkasan data lisensi secara visual.
- **Manajemen Organisasi:** Pengelolaan data organisasi/perusahaan pengguna lisensi.
- **Manajemen Software Master:** Pengelolaan data induk perangkat lunak.
- **Manajemen Software Detail Licensing:** Pencatatan detail masa berlaku dan status lisensi.
- **Export Data:** Pembuatan laporan langsung ke format Microsoft Excel.

---

## 🛠️ Kebutuhan Perangkat Lunak (Software Requirements)

Sebelum memulai instalasi, pastikan perangkat Anda sudah memenuhi spesifikasi berikut:
- **OS:** Windows 10 / 11
- **Web Server:** XAMPP (dengan PHP 8.2+)
- **Dependency Manager:** Composer & Node.js (Versi LTS) + NPM
- **Code Editor:** Visual Studio Code
- **Version Control:** Git *(Opsional)*

---

## ⚙️ Cara Menjalankan Proyek dari GitHub (Untuk Pengguna Baru)

Jika Anda mendownload proyek ini langsung dari repositori ini, ikuti langkah instalasi berikut:

### 1. Clone Repositori
Buka terminal/command prompt, lalu jalankan perintah:
```bash
git clone https://github.com/jamesalejandros/MatapelProject.git
cd MatapelProject
```

### 2. Instalasi Dependency
Instal semua package PHP dan NodeJS yang dibutuhkan oleh aplikasi:
```bash
# Instal dependency backend (PHP)
composer install

# Instal dependency frontend (NodeJS)
npm install
```

### 3. Konfigurasi Environment & Database
Salin file konfigurasi `.env.example` menjadi file `.env`:
```bash
cp .env.example .env
```
Buka file `.env` baru tersebut, lalu sesuaikan bagian konfigurasi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=matapelproject
DB_USERNAME=root
DB_PASSWORD=
```
*Catatan: Pastikan Anda sudah membuat database kosong bernama `matapelproject` di phpMyAdmin Anda.*

### 4. Generate Application Key & Migrasi Database
Jalankan perintah ini secara berurutan untuk membuat key aplikasi dan mengisi tabel database:
```bash
# Membuat key enkripsi aplikasi
php artisan key:generate

# Menjalankan migrasi database
php artisan migrate
```

---

## 💻 Panduan Pengembangan & Catatan Package

### Struktur Autentikasi (Laravel Breeze)
Sistem ini menggunakan Laravel Breeze untuk menangani alur masuk sistem. Modul otomatis yang dihasilkan meliputi:
* **Views:** `resources/views/auth` (Halaman Login, Register, Forgot Password, dll)
* **Controllers:** `AuthenticatedSessionController`, `RegisteredUserController`, `PasswordResetController`
* **Routes:** `routes/auth.php`

### Fitur Laporan Excel (PhpSpreadsheet)
Proyek ini mengintegrasikan package `phpoffice/phpspreadsheet`. Komponen yang digunakan meliputi:
* **Controller:** `ExportController.php`
* **Library:**
  ```php
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  ```

---

## 🏃 Menjalankan Aplikasi di Lingkungan Lokal

Untuk menjalankan aplikasi ini secara lokal di komputer Anda, buka dua jendela terminal di folder proyek:

**Terminal 1 (Menjalankan Server Backend):**
```bash
php artisan serve
```

**Terminal 2 (Menjalankan Server Frontend Vite):**
```bash
# Untuk mode Pengembangan (Development)
npm run dev

# Untuk mode Produksi (Production)
npm run build
```
Akses aplikasi melalui browser Anda di alamat `http://127.0.0.1:8000`.

---

## 📄 Lisensi
Proyek ini bersifat open-source dan dilindungi di bawah lisensi
