# 📚 Sistem Informasi Perpustakaan

Sistem Informasi Perpustakaan merupakan aplikasi berbasis web yang dibuat menggunakan PHP Native dan MySQL untuk membantu pengelolaan data perpustakaan. Aplikasi ini menyediakan fitur pengelolaan data buku, data peminjam, transaksi peminjaman, pengembalian buku, serta pencarian buku.

---

## 🌐 Demo Website

Website dapat diakses melalui:

https://perpustakaanonline.site.je/

---

## 👨‍💻 Teknologi yang Digunakan

- PHP Native
- MySQL
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- SweetAlert2
- XAMPP (Local Development)
- InfinityFree (Web Hosting)
- GitHub (Version Control)

---

## ✨ Fitur Aplikasi

### Dashboard
- Menampilkan total data buku
- Menampilkan total data peminjam
- Menampilkan total transaksi
- Navigasi ke setiap menu

### Data Buku
- Tambah data buku
- Edit data buku
- Hapus data buku
- Pencarian buku berdasarkan judul

### Data Peminjam
- Tambah data peminjam
- Edit data peminjam
- Hapus data peminjam

### Transaksi
- Tambah transaksi peminjaman
- Pengembalian buku
- Hapus transaksi
- Status transaksi otomatis
- Update stok buku otomatis

### Notifikasi
- Popup menggunakan SweetAlert2
- Konfirmasi sebelum menghapus data

---

## 📂 Struktur Folder

```text
perpustakaan-online
│
├── buku
├── config
├── css
├── peminjam
├── transaksi
├── logo.png
├── index.php
├── database.sql
└── README.md
```

---

## 🗄️ Database

Database terdiri dari tiga tabel:

### buku
- id_buku
- judul_buku
- penulis
- penerbit
- tahun_terbit
- stok

### peminjam
- id_peminjam
- nama
- nim
- jurusan
- no_hp

### transaksi
- id_transaksi
- id_buku
- id_peminjam
- tanggal_pinjam
- tanggal_kembali
- status

---

## 🚀 Cara Menjalankan Project

1. Clone repository dari GitHub.

```bash
git clone https://github.com/USERNAME/perpustakaan-online.git
```

2. Pindahkan project ke folder `htdocs` (jika dijalankan secara lokal menggunakan XAMPP).

3. Import file `database.sql` ke phpMyAdmin.

4. Sesuaikan konfigurasi database pada file:

```
config/koneksi.php
```

5. Jalankan Apache dan MySQL.

6. Buka browser:

```
http://localhost/perpustakaan-online
```

Atau akses versi online melalui:

```
https://perpustakaanonline.site.je/
```

---

## 👩‍💻 Pengembang

**Clara Blinca Leticia**

Program Studi Teknik Informatika

Universitas Dian Nusantara

---

## 📄 Lisensi

Project ini dibuat untuk memenuhi tugas UAS Mata Kuliah Pemrograman Web.