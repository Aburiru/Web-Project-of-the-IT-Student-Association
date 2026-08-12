<?php get_header(); ?>

<!-- Hero Section -->
<section class="histori-hero">
  <div class="histori-hero-inner">
    <div class="histori-eyebrow">Arsip organisasi</div>
    <h1 class="histori-title">Histori tim pengurus</h1>
    <p class="histori-desc">Daftar lengkap kepengurusan Himpunan Mahasiswa Jurusan Teknologi Informasi dari masa ke masa.</p>
  </div>
</section>

<!-- Page Body -->
<div class="histori-page">
  <div class="container">

    <!-- Toolbar with Period Selector -->
    <div class="histori-toolbar">
      <h2 id="periodTitle">Periode <span id="currentPeriod">2025/2026</span></h2>
      <div class="histori-period-select">
        <label for="periodPicker">Pilih periode</label>
        <select id="periodPicker"></select>
      </div>
    </div>

    <!-- Tabs -->
    <div class="histori-tabs" id="tabs"></div>

    <!-- Cards Wrapper -->
    <div id="cardsWrap"></div>

  </div>
</div>

<!-- Overlay Modal -->
<div class="histori-overlay" id="overlay">
  <div class="histori-modal" id="modal"></div>
</div>

<?php get_footer(); ?>