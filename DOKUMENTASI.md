# 📋 CHANGELOG (Log Perubahan)

Changelog aplikasi terdokumentasi di [CHANGELOG.md](CHANGELOG.md). Berikut format dan ringkasannya:

- **Versi, Tanggal, dan Fitur**
  - Setiap versi mencatat tanggal rilis, fitur yang ditambahkan, diperbarui, diperbaiki, atau dihapus.
- **Contoh entri**:
  - **Ditambahkan**: Fitur baru, modul, model, halaman, route, dsb.
  - **Diperbarui**: Perubahan pada file, penyesuaian logika, tampilan, atau optimasi.
  - **Diperbaiki**: Bugfix, perbaikan tampilan, atau proses.
  - **Dihapus**: Penghapusan file/fitur yang tidak diperlukan.

---

# 📖 DOKUMENTASI APLIKASI

## 1. Struktur Proyek
- **Framework**: CodeIgniter 4 (lihat [README.md](README.md))
- **Folder utama**:
  - `app/`: Kode aplikasi (Controllers, Models, Views, Config, Helpers, Libraries)
  - `public/`: Root web server (index.php, assets, uploads)
  - `writable/`: Cache, logs, uploads, session
  - `vendor/`: Dependensi Composer
  - `tests/`: Unit test

## 2. Instalasi & Setup
- **Instalasi**:  
  Jalankan `composer install` di root proyek.
- **Konfigurasi**:  
  Salin file `env` ke `.env`, sesuaikan `baseURL` dan database.
- **Akses**:  
  Web server diarahkan ke folder `public/`.

## 3. Konfigurasi Penting
- **Routes**:  
  Semua routing diatur di [app/Config/Routes.php](app/Config/Routes.php).
- **Filters**:  
  Middleware/filters diatur di [app/Config/Filters.php](app/Config/Filters.php).
- **Autentikasi**:  
  Menggunakan CodeIgniter Shield, konfigurasi di [app/Config/Auth.php](app/Config/Auth.php).

## 4. Fitur Utama
- **Manajemen Usulan PTKIS**: Alih Bentuk, Alih Kelola, Pendirian, Pembentukan FAI.
- **Role**: Admin, Supervisor, Verifikator, User.
- **Status Layanan**: Aktif/Non-aktif, notifikasi, validasi sebelum pengajuan.
- **Arsip & Export PDF**: Modul arsip, export dokumen, template PDF.
- **API**: Endpoint API untuk status usulan.
- **Manajemen Pengguna**: CRUD user, aktivasi/deaktivasi, detail user.

## 5. Pengembangan & Kontribusi
- **Log perubahan**: Selalu update [CHANGELOG.md](CHANGELOG.md) setiap ada perubahan signifikan.
- **Dokumentasi kode**: Gunakan PHPDoc pada setiap fungsi/class penting.
- **Testing**: Unit test diletakkan di folder `tests/`.

---

**Catatan:**
- Untuk detail perubahan setiap versi, silakan cek file [CHANGELOG.md](CHANGELOG.md).
- Untuk setup server dan requirement, cek [README.md](README.md).
- Dokumentasi teknis lebih lanjut dapat ditambahkan pada setiap modul/folder sesuai kebutuhan.

Jika ingin menambah dokumentasi teknis per modul atau template dokumentasi di folder tertentu, silakan informasikan detailnya!
