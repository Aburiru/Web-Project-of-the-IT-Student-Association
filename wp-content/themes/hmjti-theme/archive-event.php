<?php
get_header();
?>

<main class="main-content">
  <!-- Hero Section -->
  <section class="section archive-event-hero">
    <div class="container">
      <div class="archive-event-hero-content">
        <h1 class="section-title archive-event-hero-title">Agenda Kegiatan HMJTI</h1>
        <p class="archive-event-hero-description">Temukan semua agenda kegiatan, seminar, workshop, dan acara lainnya yang diselenggarakan oleh Himpunan Mahasiswa Jurusan Teknik Informatika</p>
      </div>
    </div>
  </section>

  <!-- Event List Section -->
  <section class="section">
    <div class="container">
      <div class="event-header">
        <div>
          <div class="section-label">Event & Kegiatan</div>
          <h2 class="section-title">Semua Agenda</h2>
        </div>
        
        <!-- Filter Buttons -->
        <div class="event-filters" id="event-filters">
          <button type="button" class="filter-btn active" data-filter="all">Semua</button>
          <button type="button" class="filter-btn" data-filter="upcoming">Akan Datang</button>
          <button type="button" class="filter-btn" data-filter="today">Sedang Berlangsung</button>
          <button type="button" class="filter-btn" data-filter="finished">Selesai</button>
        </div>
      </div>

      <div class="event-grid archive-event-grid" id="event-grid">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $event_query = new WP_Query(array(
          'post_type' => 'event',
          'posts_per_page' => 9,
          'paged' => $paged,
          'orderby' => 'meta_value',
          'meta_key' => 'tanggal_event',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'tanggal_event',
              'compare' => 'EXISTS',
            ),
          ),
        ));

        if ($event_query->have_posts()) :
          while ($event_query->have_posts()) : $event_query->the_post();
            $tanggal = get_field('tanggal_event');
            $lokasi = get_field('lokasi_event');
            $waktu = get_field('waktu_event');
            $link_pendaftaran = get_field('link_pendaftaran');
            $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $badge = '';
            $badge_class = '';
            if ($tanggal) {
              $today = date('Y-m-d');
              if ($tanggal > $today) {
                $badge = 'Akan Datang';
                $badge_class = 'badge-upcoming';
              } elseif ($tanggal === $today) {
                $badge = 'Sedang Berlangsung';
                $badge_class = 'badge-today';
              } else {
                $badge = 'Selesai';
                $badge_class = 'badge-finished';
              }
            }
        ?>
            <div class="event-card archive-event-card fade-in" data-event-date="<?php echo esc_attr($tanggal); ?>">
              <div class="event-card-top">
                <div class="event-date-box">
                  <?php if ($tanggal): ?>
                    <div class="day"><?php echo date('d', strtotime($tanggal)); ?></div>
                    <div class="month"><?php echo date('M', strtotime($tanggal)); ?></div>
                  <?php endif; ?>
                </div>
                <div class="event-info">
                  <div class="event-type <?php echo esc_attr($badge_class); ?>">
                    <?php echo esc_html($badge ?: 'Event'); ?>
                  </div>
                  <div class="event-title-card">
                    <?php the_title(); ?>
                  </div>
                </div>
              </div>
              <div class="event-card-body">
                <div class="event-detail">
                  <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                  <?php if ($tanggal): ?>
                    <?php echo date('d F Y', strtotime($tanggal)); ?>
                  <?php endif; ?>
                </div>
                <div class="event-detail">
                  <span class="icon"><ion-icon name="location-outline"></ion-icon></span>
                  <?php echo esc_html($lokasi ?: '-'); ?>
                </div>
                <?php if ($waktu): ?>
                <div class="event-detail">
                  <span class="icon"><ion-icon name="time-outline"></ion-icon></span>
                  <?php echo esc_html($waktu); ?>
                </div>
                <?php endif; ?>
                <div class="event-detail">
                  <span class="icon"><ion-icon name="document-text-outline"></ion-icon></span>
                  <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="btn btn-dark">Detail Event</a>
              </div>
            </div>
          <?php
          endwhile;
        ?>
      </div>

      <!-- Pagination -->
      <?php if ($event_query->max_num_pages > 1) : ?>
        <div class="pagination archive-event-pagination" id="event-pagination">
          <?php
          echo paginate_links(array(
            'total' => $event_query->max_num_pages,
            'current' => $paged,
            'prev_text' => '<ion-icon name="chevron-back-outline"></ion-icon>',
            'next_text' => '<ion-icon name="chevron-forward-outline"></ion-icon>',
            'type' => 'list',
            'end_size' => 2,
            'mid_size' => 2
          ));
          ?>
        </div>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>

      <?php else : ?>
        <div class="archive-event-empty" id="event-empty">
          <ion-icon name="calendar-outline"></ion-icon>
          <h3>Belum Ada Event</h3>
          <p>Belum ada agenda kegiatan yang dijadwalkan saat ini.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>