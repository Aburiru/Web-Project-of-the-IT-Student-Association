<?php
get_header();
?>

<main class="main-content">
  <!-- Hero Section -->
  <section class="section archive-berita-hero">
    <div class="container">
      <div class="archive-berita-hero-content">
        <h1 class="section-title archive-berita-hero-title">Informasi Terkini</h1>
        <p class="archive-berita-hero-description">Temukan berita terbaru, artikel, dan informasi seputar kegiatan Himpunan Mahasiswa Jurusan Teknik Informatika</p>
      </div>
    </div>
  </section>

  <!-- Berita List Section -->
  <section class="section">
    <div class="container">
      <div class="berita-header">
        <div>
          <div class="section-label">Berita & Artikel</div>
          <h2 class="section-title">Semua Berita</h2>
        </div>
      </div>

      <div class="news-grid archive-berita-grid">
        <?php
        if (have_posts()) :
          while (have_posts()) : the_post(); ?>

            <div class="news-featured archive-berita-card">
              <div class="news-thumbnail archive-berita-thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large', array('class' => 'archive-berita-img')); ?>
                  </a>
                <?php else: ?>
                  <div class="news-thumbnail-text">HMJTI NEWS</div>
                <?php endif; ?>
              </div>

              <div class="news-featured-body">
                <div class="news-meta">
                  <span class="news-cat">
                    <ion-icon name="pricetag-outline"></ion-icon>
                    <?php
                    $category = get_the_category();
                    if ($category) {
                      echo esc_html($category[0]->name);
                    }
                    ?>
                  </span>
                  <span class="news-date">
                    <ion-icon name="calendar-number-outline"></ion-icon>
                    <?php echo get_the_date('d M Y'); ?>
                  </span>
                </div>

                <h2 class="news-featured-title">
                  <a href="<?php the_permalink(); ?>" class="archive-berita-link">
                    <?php the_title(); ?>
                  </a>
                </h2>

                <p>
                  <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                </p>

                <div class="archive-berita-read-more-wrapper">
                  <a href="<?php the_permalink(); ?>" class="news-read-more">
                    Baca Selengkapnya →
                  </a>
                </div>
              </div>
            </div>

          <?php endwhile; ?>
      </div>

      <!-- Pagination -->
      <?php
      global $wp_query;
      if ($wp_query->max_num_pages > 1) : ?>
        <div class="pagination archive-berita-pagination">
          <?php
          echo paginate_links(array(
            'total' => $wp_query->max_num_pages,
            'current' => get_query_var('paged') ? get_query_var('paged') : 1,
            'prev_text' => '<ion-icon name="chevron-back-outline"></ion-icon>',
            'next_text' => '<ion-icon name="chevron-forward-outline"></ion-icon>',
            'type' => 'list',
            'end_size' => 2,
            'mid_size' => 2
          ));
          ?>
        </div>
      <?php endif; ?>

      <?php else : ?>
        <div class="archive-berita-empty">
          <ion-icon name="newspaper-outline"></ion-icon>
          <h3>Belum Ada Berita</h3>
          <p>Belum ada berita yang dipublikasikan saat ini.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>