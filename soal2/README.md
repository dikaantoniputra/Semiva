# 🚀 Laravel 10 Starter Project

Ini adalah proyek starter menggunakan **Laravel 10** – framework PHP modern dan powerful untuk pengembangan web.

---

## 📦 Spesifikasi & Requirement

Pastikan kamu sudah menginstall di komputer kamu:

-   PHP ≥ 8.1
-   Composer
-   MySQL / MariaDB / PostgreSQL / SQLite
-   Git (opsional)

---

## ⚙️ Langkah Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/dikaantoniputra/Semiva.git
cd nama-proyek soal2

lalu php artisan key:generate
lalu php artisan migrate --seed
lalu php artisan serve

lalu http://127.0.0.1:8000/bus

Gui di sini bis filter data sesuai data yang di munculkan dan ada pagination di setiap 10 atau bisa di munculkan semua  kekurangan dari berikut belum di terapkanyan filter saya mengunakan datatabales


Di sini saya membuat data dumy dengan database\seeders\data\json untuk penjalankan data pada database ketikan perintah
php artisan migrate –seed  atau php artisan migrate:fresh --seed


Saya menambahkan end ponin berikut
Get  http://127.0.0.1:8000/api/bus
Post http://127.0.0.1:8000/api/bus
Put http://localhost:8000/api/bus/1 contoh
Get http://127.0.0.1:8000/api/bus?page=2
Get  http://127.0.0.1:8000/api/bus?search=Nopol





```
