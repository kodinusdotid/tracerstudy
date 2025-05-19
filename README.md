# Tracer Study SMKS Darunnadwah

Aplikasi **Tracer Study SMKS Darunnadwah** adalah platform digital untuk melakukan studi pelacakan terhadap alumni SMK Darunnadwah. Aplikasi ini dirancang untuk mengumpulkan data alumni yang bermanfaat dalam analisis pencapaian, perkembangan karir, serta menilai relevansi pendidikan SMK Darunnadwah dengan dunia kerja.

---

## 🎯 Fitur Utama

-   **Pendaftaran Alumni**  
    Alumni dapat mendaftar dan mengisi data pribadi mereka.

-   **Survei Karir**  
    Alumni dapat mengisi survei mengenai status pekerjaan, pendidikan lanjut, dan pengembangan karir setelah lulus.

-   **Laporan Statistik**  
    Admin dapat melihat hasil survei dalam bentuk statistik untuk mendapatkan wawasan menyeluruh.

-   **Manajemen Data Alumni**  
    Admin dapat mengelola data alumni seperti mengedit, menghapus, dan memverifikasi data.

-   **Notifikasi Pengingat**  
    Alumni akan menerima pengingat berkala untuk mengisi atau memperbarui survei.

-   **Keamanan Data**  
    Data alumni dilindungi dengan autentikasi API menggunakan Laravel Sanctum.

---

## 🛠️ Teknologi yang Digunakan

| Komponen     | Teknologi                              |
| ------------ | -------------------------------------- |
| Backend      | Laravel 12.x (PHP)                     |
| Frontend     | Bootstrap 4 (SB Admin 2)               |
| UI Framework | Tailwind CSS (untuk komponen tambahan) |
| Database     | MySQL 5.7+                             |
| Autentikasi  | Laravel Sanctum (API)                  |
| Environment  | PHP 8.0+, Node.js, Composer            |

---

## ⚙️ Cara Menjalankan Aplikasi (Manual Setup)

### 1. Clone Repository

```bash
git clone https://github.com/namauser/tracer-study-smks-darunnadwah.git
cd tracer-study-smks-darunnadwah
```

### 2. Setup Backend

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
```

### 3. Konfigurasi `.env`

Buka file `.env` dan atur variabel berikut sesuai dengan konfigurasi lokal Anda:

```
APP_NAME="Tracer Study"
APP_URL=http://localhost/tracer-study

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi dan Seeder

```bash
php artisan migrate --seed
```

### 5. Jalankan Server

Terdapat dua cara untuk menjalankan aplikasi:

-   **Jika menggunakan Laravel default server:**

```bash
php artisan serve
```

Akses di browser melalui:
[http://localhost:8000](http://localhost:8000)

-   **Jika menggunakan Laragon:**

Letakkan folder proyek di `C:\laragon\www\tracer-study`
Akses di browser melalui:
[http://tracerstudy.test](http://tracerstudy.test)

-   **Jika menggunakan XAMPP:**

Letakkan folder proyek di `htdocs`
Akses di browser melalui:
[http://localhost/tracer-study](http://localhost/tracer-study)

---

## 👤 Akun Default

| Role            | Email                                                     | Password |
| --------------- | --------------------------------------------------------- | -------- |
| Admin           | [admin@tracerstudy.id](mailto:admin@tracerstudy.id)       | password |
| Operator        | [operator@tracerstudy.id](mailto:operator@tracerstudy.id) | password |
| Fulan Bin Fulan | [fulan@tracerstudy.id](mailto:fulan@tracerstudy.id)       | password |

> Ganti password segera setelah login pertama.

---

## 📂 Struktur Proyek (Ringkasan)

```bash
tracer-study/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   ├── Models/
│   ├── Providers/
├── bootstrap/
│   └── app.php
├── config/
│   └── *.php (file konfigurasi)
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── lang/
│   └── en/
├── public/
│   └── index.php (entry point)
├── resources/
│   ├── js/
│   ├── lang/
│   ├── sass/
│   └── views/ (Blade templates)
├── routes/
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── storage/
│   ├── app/
│   ├── framework/
│   └── logs/
├── tests/
│   ├── Feature/
│   └── Unit/
├── vendor/
├── .env
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
└── vite.config.js
```

---

## 🧾 Lisensi

Proyek ini dikembangkan untuk keperluan internal dan pendidikan. Lisensi mengikuti kebijakan SMKS Darunnadwah.

---

## 🙏 Kontribusi & Dukungan

Jika Anda ingin berkontribusi, silakan buat pull request atau buka issue baru untuk diskusi.
Untuk pertanyaan atau dukungan, hubungi [email@smksdarunnadwah.sch.id](mailto:email@smksdarunnadwah.sch.id)
