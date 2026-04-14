# Log Perubahan (Changelog)
## Aplikasi SIPTIKA - Sistem Informasi Kelembagaan PTKIS

---

## [v1.4.0] - 15 Maret 2026

### Ditambahkan
- Sistem **Status Non Aktif** pada layanan pengajuan
- Model baru: `DokumenProdiFaiModel.php` dan `ProdiFaiModel.php`
- Halaman baru `pembentukanfai/prodi.php` untuk manajemen prodi pada usulan FAI

### Diperbarui
- `app/Config/Routes.php` — penambahan route status layanan
- `app/Controllers/User/Alihbentukptkis.php` — penyesuaian logika status non-aktif
- `app/Controllers/User/Alihkelolaptkis.php` — penyesuaian logika status non-aktif
- `app/Controllers/User/Dokumen.php` — penambahan fungsi dokumen baru
- `app/Controllers/User/Pembentukanfai.php` — penyesuaian dan pengembangan fitur
- `app/Controllers/User/Pendirianptkis.php` — penyesuaian logika status
- `app/Views/user/alihbentukptkis/index.php` — penyesuaian tampilan status
- `app/Views/user/alihkelolaptkis/index.php` — penyesuaian tampilan status
- `app/Views/user/pembentukanfai/index.php` — penyesuaian tampilan
- `app/Views/user/pendirianptkis/index.php` — penyesuaian tampilan status

---

## [v1.3.0] - 20 Februari 2026

### Ditambahkan
- Fitur **Aktif/Non-Aktif Layanan** untuk Supervisor
- Fungsi toggle layanan di `Supervisor/Layanan.php`
- Notifikasi layanan non-aktif pada halaman welcome

### Diperbarui
- `app/Views/supervisor/master/layanan.php` — tombol toggle status aktif layanan
- `app/Views/supervisor/usulan/index.php` — tampilan status usulan
- `app/Controllers/Verifikator/Penilaian.php` — perbaikan proses penilaian
- Semua Controller User layanan PTKIS — validasi layanan aktif sebelum pengajuan

---

## [v1.2.4] - 27 Desember 2025

### Diperbarui
- `app/Views/verifikator/dashboard.php` — dashboard verifikator yang lebih informatif
- `app/Controllers/Verifikator/Dashboard.php` — kalkulasi data ringkasan
- `app/Models/CrudModel.php` — optimasi query
- `app/Views/user/alihbentukptkis/detail.php` — perbaikan tampilan detail

### Diperbaiki
- Bug pada tampilan detail penilaian pendirian PTKIS di sisi Supervisor

---

## [v1.2.3] - 20 Desember 2025

### Ditambahkan
- Route baru untuk detail pendirian PTKIS
- Fungsi detail penilaian di `Supervisor/Usulan/Pendirianptkis.php`

### Diperbarui
- `app/Views/supervisor/usulan/pendirianptkis/detail_penilaian.php` — tampilan detail penilaian

---

## [v1.2.2] - 12 Desember 2025

### Ditambahkan
- Tampilan detail lengkap pada halaman `supervisor/usulan/pendirianptkis/detail.php`

### Diperbarui
- `app/Controllers/User/Dokumen.php` — perbaikan fungsi upload

---

## [v1.2.1] - 11 Desember 2025

### Ditambahkan
- Fitur **manajemen data pengguna** lengkap pada halaman Supervisor Users
- Detail tampilan (`detail_view.php`) untuk Alih Bentuk PTKIS di Supervisor

### Diperbarui
- `app/Controllers/Supervisor/Users.php` — fungsi manajemen pengguna
- Semua Controller Supervisor Usulan — penambahan validasi dan data detail
- `app/Views/supervisor/users/edit.php` — tampilan edit pengguna baru
- `app/Views/supervisor/template.php` — penyesuaian navigasi

---

## [v1.2.0] - 8 Desember 2025

### Ditambahkan
- Modul **Arsip** untuk Supervisor (`Supervisor/Arsip.php`)
- Model baru: `ArsipModel.php` dan `NsptiModel.php`
- Halaman arsip: `Views/supervisor/arsip/index.php` dan `Views/supervisor/arsip/detail.php`
- Konfigurasi database sekunder di `app/Config/Database.php`

### Diperbarui
- `app/Config/Routes.php` — routing modul arsip
- `app/Views/pdf/alihbentukptkis.php` — perbaikan template PDF
- `app/Views/supervisor/usulan/alihbentukptkis/detail.php` — integrasi data arsip

---

## [v1.1.5] - 1 Desember 2025

### Diperbarui
- Favicon aplikasi diperbarui pada semua template (supervisor, user, verifikator, welcome)

### Dihapus
- Berkas PDF sampel uji coba dari direktori `public/uploads/`

---

## [v1.1.4] - 29 November 2025

### Diperbarui
- `app/Views/verifikator/usulan/alihbentukptkis/detail.php` — penambahan form penilaian tambahan

---

## [v1.1.3] - 28 November 2025

### Ditambahkan
- **Endpoint API** untuk status usulan (`app/Controllers/Api/Usulan.php`)
- Routing API baru di `app/Config/Routes.php`
- Custom helper baru untuk keperluan API

### Diperbarui
- `composer.json` dan `composer.lock` — pembaruan dependensi

---

## [v1.1.2] - 27 November 2025

### Diperbaiki
- Bug pada tampilan detail usulan Alih Bentuk dan Alih Kelola di Panel Supervisor
- Tampilan rincian KMA (Keputusan Menteri Agama) pada pendirian PTKIS

### Ditambahkan
- Halaman `detail_view.php` untuk Alih Bentuk, Alih Kelola, dan Pembentukan FAI di Supervisor

---

## [v1.1.1] - 25-26 November 2025

### Ditambahkan
- Statistik usulan per tipe di Dashboard Supervisor
- Grafik ringkasan dan ikon baru pada `Views/supervisor/dashboard.php`

### Diperbarui
- `app/Models/CrudModel.php` — query agregasi data dashboard
- `app/Views/supervisor/usulan/index.php` — filter dan tampilan tabel usulan

---

## [v1.1.0] - 10 November 2025

### Ditambahkan
- Fitur **Profil Supervisor** (`Views/supervisor/profile.php`)
- Fungsi ekspor data dengan library `dompdf` (melalui Composer)
- Rute profile dan PDF di `app/Config/Routes.php`

### Diperbarui
- `app/Controllers/Supervisor/Dashboard.php` — data profil dan statistik
- `app/Helpers/custom_helper.php` — fungsi utilitas baru

---

## [v1.0.9] - 9 November 2025

### Ditambahkan
- Alur **Verifikasi Ulang** pada semua tipe layanan PTKIS (Supervisor dan Verifikator)
- Halaman `detail_view.php` baru untuk Alih Bentuk, Alih Kelola, Pembentukan FAI, dan Pendirian PTKIS di Supervisor
- Halaman detail KMA untuk pendirian PTKIS (`detail_kma.php`)

### Diperbarui
- `app/Config/Routes.php` — routing verifikasi ulang
- `public/assets/css/custom.css` — penyesuaian CSS log

---

## [v1.0.8] - 7 November 2025

### Ditambahkan
- Fitur **Alih Kelola PTKIS** (module baru):
  - Controller: `Supervisor/Usulan/Alihkelolaptkis.php`
  - Controller: `Verifikator/Usulan/Alihkelolaptkis.php`
  - View Supervisor: `usulan/alihkelolaptkis/detail.php` & `detail_view.php`
  - View Verifikator: `usulan/alihkelolaptkis/detail.php` & `detail_view.php`
  - Form JS: `public/assets/js/form-alihkelola.js`
- Tombol "Buka Tab Baru" pada detail usulan Alih Bentuk
- Overwrite file pada upload dokumen

### Diperbarui
- `app/Config/Routes.php` — URL dan routing dirapikan

---

## [v1.0.7] - 3 November 2025

### Ditambahkan
- Fitur **Pembentukan FAI** (module baru):
  - Controller User: `Pembentukanfai.php`
  - Controller Supervisor: `Supervisor/Usulan/Pembentukanfai.php`
  - Controller Verifikator: `Verifikator/Usulan/Pembentukanfai.php`
  - View: `user/pembentukanfai/index.php`, `detail.php`, `detail_view.php`
  - Model: `FaiModel.php`
  - Form JS: `public/assets/js/form-pembentukan-fai.js`
  - Template instrumen: `public/template/template_instrumen_alihbentuk.xlsx`
- Tampilan daftar pengguna diperkaya di `supervisor/users/index.php`

---

## [v1.0.6] - 2 November 2025

### Ditambahkan
- Fitur **export PDF** hasil penilaian (`app/Controllers/Export.php`)
- Template PDF: `app/Views/pdf/alihbentukptkis.php`
- Halaman `detail_view.php` usulan di Verifikator untuk Alih Bentuk dan Pendirian PTKIS
- Module Settings untuk Admin dan Supervisor

### Diperbarui
- `app/Controllers/Verifikator/Penilaian.php` — penyesuaian alur penilaian
- `composer.json` & `composer.lock` — penambahan library dompdf

---

## [v1.0.5] - 31 Oktober 2025

### Ditambahkan
- **Controller terpisah** untuk detail usulan Supervisor:
  - `Supervisor/Usulan/AlihBentukPtkis.php`
  - `Supervisor/Usulan/Pendirianptkis.php`
- **Controller terpisah** untuk Verifikator:
  - `Verifikator/Usulan/Alihbentukptkis.php`
  - `Verifikator/Usulan/Pendirianptkis.php`
- Halaman detail baru: `supervisor/usulan/alihbentukptkis/detail.php`

### Diperbarui
- `app/Controllers/Supervisor/Usulan.php` — refactoring fungsi ke sub-controller
- `app/Views/verifikator/template.php` — navigasi diperbarui

---

## [v1.0.4] - 28 Oktober 2025

### Ditambahkan
- Controller `Dokumen.php` untuk User — manajemen upload dokumen prodi
- Model baru: `DokumenprodiModel.php`
- Tampilan halaman tambah prodi: `user/pendirianptkis/prodi.php` (diperluas)
- Desain halaman **Login** baru dengan background image dan logo Kemenag
- Template user baru `user/template1.php` sebagai alternatif desain

### Diperbarui
- `app/Views/user/template.php` — refactoring total navigasi dan layout
- `app/Views/verifikator/usulan/detail.php` — tampilan daftar dokumen

---

## [v1.0.3] - 27 Oktober 2025

### Ditambahkan
- Koneksi database sekunder (EMIS) di `app/Config/Database.php`
- Controller `Supervisor/Lembaga.php` dan `Ajax.php` untuk pencarian data lembaga
- Model `LembagaModel.php` dan `KelembagaanModel.php` untuk data induk lembaga
- Halaman `supervisor/lembaga/index.php`
- Navigasi menu Lembaga di template Supervisor

### Diperbarui
- `app/Views/user/alihbentukptkis/detail_view.php` — integrasi data lembaga
- `app/Views/welcome_message.php` — desain ulang landing page

---

## [v1.0.2] - 26 Oktober 2025

### Ditambahkan
- Fitur **Tambah Prodi** pada Usulan Pendirian PTKIS
- Model baru: `ProdiModel.php`
- Halaman prodi: `user/pendirianptkis/prodi.php`

---

## [v1.0.1] - Awal Oktober 2025

### Ditambahkan
- Fitur dasar **Alih Bentuk PTKIS** dan **Pendirian PTKIS**
- Form JavaScript: `public/assets/js/form-alihbentuk-ptkis.js`
- Struktur Controller, Model, dan View awal aplikasi

---

*Changelog ini disusun berdasarkan riwayat Git aplikasi. Tanggal mengacu pada tanggal commit.*
