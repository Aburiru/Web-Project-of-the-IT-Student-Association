<?php
/**
 * HMJTI Theme Functions
 */

function hmjti_theme_scripts() {
    // Enqueue Google Fonts (Syne and DM Sans)
    wp_enqueue_style('hmjti-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Syne:wght@700;800&display=swap', array(), null);

    // Enqueue Main Style (style.css in root)
    wp_enqueue_style('hmjti-main-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));

    // Enqueue Custom Assets CSS
    wp_enqueue_style('hmjti-custom-style', get_template_directory_uri() . '/assets/css/styles.css', array(), filemtime(get_template_directory() . '/assets/css/styles.css'));

    // Enqueue Custom Assets JS
    wp_enqueue_script('hmjti-custom-script', get_template_directory_uri() . '/assets/js/script.js', array(), filemtime(get_template_directory() . '/assets/js/script.js'), true);

    // Enqueue Histori Script
    wp_enqueue_script('hmjti-histori-script', get_template_directory_uri() . '/assets/js/histori.js', array(), filemtime(get_template_directory() . '/assets/js/histori.js'), true);

    // Localize script for AJAX
    wp_localize_script('hmjti-custom-script', 'hmjtiAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

    // Localize histori data from CPT/ACF
    $histori_periods = array();
    $posts = get_posts(array(
        'post_type' => 'tim_pengurus',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_key' => 'angkatan',
        'orderby' => 'meta_value',
        'order' => 'DESC'
    ));

    // Helper: normalize divisi label to key
    function hmjti_normalize_divisi($label) {
        $label = strtolower(trim($label));
        $map = array(
            'inti' => 'inti',
            'pengurus inti' => 'inti',
            'divisi inti' => 'inti', // Added for clarity
            'humas' => 'humas',
            'divisi humas' => 'humas',
            'minat dan bakat' => 'minat',
            'minat' => 'minat',
            'divisi minat dan bakat' => 'minat', // Added for clarity
            'minat & bakat' => 'minat',
        );
        return $map[$label] ?? 'inti'; // Default to 'inti' if no match
    }

    // Helper: get badge label from key
    function hmjti_divisi_label($key) {
        $labels = array(
            'inti' => 'Inti',
            'humas' => 'Humas',
            'minat' => 'Minat dan Bakat',
        );
        return $labels[$key] ?? ucfirst($key);
    }

    // Helper: get badge color from key (for CSS class)
    function hmjti_divisi_color($key) {
        $colors = array(
            'inti' => '#6B1010',      // maroon
            'humas' => '#c65a24',     // orange-brown
            'minat' => '#0f6e56',     // teal
        );
        return $colors[$key] ?? '#6B1010';
    }

    foreach ($posts as $post) {
        $angkatan = get_field('angkatan', $post->ID);
        $kategori_raw = get_field('divisi_pengurus', $post->ID);

        if (!$kategori_raw) {
            $kategori_raw = get_field('kategori', $post->ID);
        }
        if (!$kategori_raw) {
            $kategori_raw = get_field('divisi', $post->ID);
        }

        if (!$angkatan) $angkatan = '2025/2026';
        if (!$kategori_raw) $kategori_raw = 'Inti';

        // Normalize to key: inti/humas/minat
        $kategori_key = hmjti_normalize_divisi($kategori_raw);

        $period_key = $angkatan;
        if (!isset($histori_periods[$period_key])) {
            $histori_periods[$period_key] = array();
        }

        // Get initials from name
        $name_parts = explode(' ', get_the_title($post->ID));
        $initials = '';
        foreach ($name_parts as $part) {
            $initials .= strtoupper($part[0]);
        }
        $initials = substr($initials, 0, 2);

        $histori_periods[$period_key][] = array(
            'kategori' => $kategori_key,
            'initials' => $initials,
            'nama' => get_the_title($post->ID),
            'jabatan' => get_field('jabatan', $post->ID),
            'badgeLabel' => hmjti_divisi_label($kategori_key),
            'badgeColor' => hmjti_divisi_color($kategori_key), // for dynamic CSS if needed
            'nim' => get_field('nim', $post->ID),
            'angkatan' => get_field('angkatan_raw', $post->ID) ?: get_field('angkatan', $post->ID),
            'masaJabatan' => get_field('jangka_jabatan', $post->ID),
            'email' => get_field('email', $post->ID),
            'fileSk' => get_field('file_sk', $post->ID) ? get_field('file_sk', $post->ID)['url'] : ''
        );
    }

    wp_localize_script('hmjti-histori-script', 'historiData', array(
        'periods' => $histori_periods
    ));
}
add_action('wp_enqueue_scripts', 'hmjti_theme_scripts');

function hmjti_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    
    // Register Menu
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'hmjti'),
    ));
}
add_action('after_setup_theme', 'hmjti_theme_setup');

/**
 * AJAX Handler for Event Filtering
 */
function hmjti_filter_events_ajax() {
    $filter = isset($_POST['filter']) ? sanitize_text_field($_POST['filter']) : 'all';
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $today = date('Y-m-d');

    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 9,
        'paged' => $paged,
        'orderby' => 'meta_value',
        'meta_key' => 'tanggal_event',
        'order' => 'ASC',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'tanggal_event',
                'compare' => 'EXISTS',
            )
        )
    );

    if ($filter === 'upcoming') {
        $args['meta_query'][] = array(
            'key' => 'tanggal_event',
            'value' => $today,
            'compare' => '>',
            'type' => 'DATE'
        );
    } elseif ($filter === 'today') {
        $args['meta_query'][] = array(
            'key' => 'tanggal_event',
            'value' => $today,
            'compare' => '=',
            'type' => 'DATE'
        );
    } elseif ($filter === 'finished') {
        $args['meta_query'][] = array(
            'key' => 'tanggal_event',
            'value' => $today,
            'compare' => '<',
            'type' => 'DATE'
        );
        // Reverse order for finished events (newest finished first)
        $args['order'] = 'DESC';
    }

    $event_query = new WP_Query($args);
    
    ob_start();

    if ($event_query->have_posts()) :
        while ($event_query->have_posts()) : $event_query->the_post();
            $tanggal = get_field('tanggal_event');
            $lokasi = get_field('lokasi_event');
            $waktu = get_field('waktu_event');
            $badge = '';
            $badge_class = '';
            
            if ($tanggal) {
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
    else :
        ?>
        <div class="archive-event-empty" style="grid-column: 1 / -1;">
          <ion-icon name="calendar-outline"></ion-icon>
          <h3>Belum Ada Event</h3>
          <p>Belum ada agenda kegiatan yang sesuai dengan filter ini.</p>
        </div>
        <?php
    endif;
    
    $html = ob_get_clean();
    
    // Generate Pagination
    ob_start();
    if ($event_query->max_num_pages > 1) {
        echo paginate_links(array(
            'total' => $event_query->max_num_pages,
            'current' => $paged,
            'prev_text' => '<ion-icon name="chevron-back-outline"></ion-icon>',
            'next_text' => '<ion-icon name="chevron-forward-outline"></ion-icon>',
            'type' => 'list',
            'end_size' => 2,
            'mid_size' => 2
        ));
    }
    $pagination = ob_get_clean();
    
    wp_reset_postdata();

    wp_send_json_success(array(
        'html' => $html,
        'pagination' => $pagination,
        'max_pages' => $event_query->max_num_pages
    ));
}
add_action('wp_ajax_filter_events', 'hmjti_filter_events_ajax');
add_action('wp_ajax_nopriv_filter_events', 'hmjti_filter_events_ajax');
