# Product Requirements Document (PRD)

## Project

Perbaikan Modul Sumber Daya - Project Mata Kuliah

---

# 1. Latar Belakang

Website HMJTI telah memiliki modul "Sumber Daya" yang berisi beberapa kategori akademik, salah satunya adalah Project Mata Kuliah.

Landing page berhasil menampilkan card Project Mata Kuliah dan tombol navigasi menuju halaman detail. Setelah dilakukan perbaikan routing, URL halaman berhasil ditemukan dan template berhasil dimuat.

Namun saat halaman dibuka, konten backend yang berasal dari Custom Post Type (CPT) tidak tampil sehingga halaman hanya menampilkan Header dan Footer tanpa isi utama.

Permasalahan ini mengindikasikan bahwa proses pengambilan data dari backend WordPress belum berjalan dengan benar meskipun sistem routing dan template telah berhasil ditemukan.

---

# 2. Problem Statement

## Kondisi Saat Ini

### Berhasil

* URL halaman dapat diakses.
* Template berhasil dimuat.
* Header tampil normal.
* Footer tampil normal.
* Tidak ada PHP Fatal Error.
* Tidak ada White Screen of Death.

### Gagal

* Data CPT tidak muncul.
* Loop project kosong.
* Dropdown project tidak tampil.
* Halaman utama resource terlihat kosong.

---

# 3. Tujuan Perbaikan

Memastikan halaman Project Mata Kuliah mampu:

1. Mengambil data dari backend WordPress.
2. Menampilkan seluruh project yang berstatus Publish.
3. Menampilkan daftar project dalam bentuk Accordion / Dropdown.
4. Menampilkan detail project ketika dropdown dibuka.
5. Menggunakan struktur WordPress yang sesuai dengan Template Hierarchy.
6. Tetap kompatibel dengan ACF Free tanpa Repeater Field.

---

# 4. Scope

## In Scope

### Frontend

* archive-project-mata-kuliah.php
* single-project-mata-kuliah.php
* Accordion UI
* Styling dropdown

### Backend

* CPT Project Mata Kuliah
* ACF Fields
* Query WP_Query
* Permalink structure

### Debugging

* Verifikasi CPT slug
* Verifikasi Template Hierarchy
* Verifikasi Publish Status
* Verifikasi Field Mapping

## Out of Scope

* Beasiswa
* Magang
* Informasi Akademik
* Jadwal Akademik
* Sistem pencarian
* Sistem filter lanjutan

---

# 5. Analisis Akar Masalah

## Hipotesis 1

### CPT Slug Tidak Sesuai

Contoh:

CPT UI:

project_mata_kuliah

Sedangkan Query:

'post_type' => 'project-mata-kuliah'

Akibat:

WP_Query tidak menemukan data.

---

## Hipotesis 2

### Nama File Archive Tidak Sesuai

Contoh:

CPT Slug:

project_mata_kuliah

Tetapi file:

archive-project-mata-kuliah.php

WordPress akan gagal mengenali template archive yang benar.

---

## Hipotesis 3

### Post Belum Publish

WP_Query hanya mengambil:

publish

Post dengan status:

* Draft
* Pending
* Private

tidak akan muncul.

---

## Hipotesis 4

### ACF Field Tidak Terhubung

Field:

* materi_project
* kategori_project
* deskripsi_project

mungkin belum terhubung ke CPT yang benar.

---

## Hipotesis 5

### Rewrite Rules Bermasalah

Terbukti URL:

/project-mata-kuliah

masih menghasilkan 404.

Sedangkan:

/index.php/project-mata-kuliah

berhasil diakses.

Ini menunjukkan terdapat masalah pada rewrite engine WordPress.

---

# 6. Solusi Teknis

## Tahap 1 - Verifikasi CPT

Checklist:

* Cek Post Type Slug.
* Cek Has Archive.
* Cek Supports.
* Cek Rewrite Settings.

Expected Result:

CPT dikenali WordPress.

---

## Tahap 2 - Verifikasi Template

Checklist:

* Pastikan nama file archive sesuai slug CPT.
* Pastikan nama file single sesuai slug CPT.

Expected Result:

WordPress memanggil template yang benar.

---

## Tahap 3 - Verifikasi Query

Implementasi query dasar:

```php
$args = array(
    'post_type' => 'project_mata_kuliah',
    'posts_per_page' => -1,
    'post_status' => 'publish'
);

$query = new WP_Query($args);
```

Expected Result:

Minimal satu judul project muncul.

---

## Tahap 4 - Debug Output

Tambahkan sementara:

```php
echo '<h1>TEST QUERY</h1>';
```

dan

```php
echo $query->found_posts;
```

Expected Result:

Jumlah post dapat terlihat.

---

## Tahap 5 - Implementasi Accordion

Struktur:

Project Mata Kuliah
├─ Project A
├─ Project B
├─ Project C

Setiap project menjadi satu item accordion.

Accordion mengambil:

* Judul
* Thumbnail
* Ringkasan
* Konten

langsung dari post CPT.

---

# 7. User Flow Target

Landing Page

↓

Klik "Akses Project"

↓

Archive Project Mata Kuliah

↓

Daftar Project

↓

Klik Dropdown

↓

Detail Project Tampil

↓

Klik "Baca Selengkapnya"

↓

Single Project

↓

Konten Lengkap

---

# 8. Kriteria Keberhasilan

## Functional

* URL archive dapat diakses.
* Data CPT muncul.
* Accordion tampil.
* Dropdown dapat dibuka.
* Single Project tampil.
* Thumbnail tampil.
* Konten tampil.

## Technical

* Tidak ada PHP Warning.
* Tidak ada PHP Fatal Error.
* Tidak ada halaman kosong.
* Tidak ada 404 pada archive.

## UX

* Tampilan konsisten dengan desain HMJTI.
* Navigasi mudah dipahami.
* Responsif desktop dan mobile.

---

# 9. Prioritas Implementasi

P1 (Critical)

* Verifikasi CPT slug.
* Verifikasi WP_Query.
* Verifikasi template archive.

P2 (High)

* Implementasi accordion.
* Integrasi ACF.

P3 (Medium)

* Optimasi UI.
* Animasi dropdown.

---

# 10. Deliverables

* archive-project-mata-kuliah.php stabil
* single-project-mata-kuliah.php stabil
* Query CPT berfungsi
* Accordion sinkron backend
* Dokumentasi debugging
* Struktur siap direplikasi ke modul:

  * Informasi Akademik
  * Beasiswa
  * Magang
  * Jadwal Akademik
