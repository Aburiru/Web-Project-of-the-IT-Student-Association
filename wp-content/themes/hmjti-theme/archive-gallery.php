<?php get_header(); ?>

<section class="section" style="padding-top: calc(var(--nav-h) + 40px);">
  <div class="container">
    <!-- Header dengan Kalimat Pendukung -->
    <div style="margin-bottom: 48px;" class="fade-in">
      <div class="section-label">Dokumentasi &amp; Arsip</div>
      <h1 class="section-title">Galeri Kegiatan HMJTI</h1>
      <p class="section-sub">Rekaman visual dari setiap langkah, kerja nyata, dan kebersamaan keluarga besar Teknologi Informasi.</p>
    </div>

    <div class="gallery-grid fade-in">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="gallery-item">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('large', ['class' => 'gallery-thumb']); ?>
          <?php endif; ?>
          <div class="gallery-overlay">
            <span class="icon"><ion-icon name="images-outline"></ion-icon></span>
          </div>
          <div class="gallery-caption">
            <?php $kategori = get_field('kategori'); if ($kategori): ?>
              <span class="gallery-category"><?php echo esc_html($kategori); ?></span>
            <?php endif; ?>
            <h3 class="gallery-title"><?php the_title(); ?></h3>
            <div class="gallery-date">
              <ion-icon name="calendar-outline"></ion-icon>
              <?php
              $tanggal = get_field('tanggal_event');
              echo $tanggal ? date_i18n('d F Y', strtotime($tanggal)) : get_the_date('d F Y');
              ?>
            </div>
          </div>
        </div>
      <?php endwhile; else: ?>
        <!-- Empty State -->
        <div style="grid-column: 1 / -1; text-align: center; padding: 64px 0; color: var(--text2);">
          <ion-icon name="images-outline" style="font-size: 48px; margin-bottom: 16px; opacity: 0.5;"></ion-icon>
          <h3>Belum Ada Galeri</h3>
          <p>Dokumentasi kegiatan akan segera diunggah.</p>
        </div>
      <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div style="margin-top: 48px; display: flex; justify-content: center;">
      <?php the_posts_pagination(array('mid_size' => 2, 'prev_text' => '← Sebelumnya', 'next_text' => 'Selanjutnya →')); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
