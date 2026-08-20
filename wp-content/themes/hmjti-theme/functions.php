<?php
/**
 * HMJTI Theme Functions
 */

function hmjti_theme_scripts() {
    wp_enqueue_style('hmjti-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Syne:wght@700;800&display=swap', array(), null);
    wp_enqueue_style('hmjti-main-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));
    wp_enqueue_style('hmjti-custom-style', get_template_directory_uri() . '/assets/css/styles.css', array(), filemtime(get_template_directory() . '/assets/css/styles.css'));
    wp_enqueue_script('hmjti-custom-script', get_template_directory_uri() . '/assets/js/script.js', array(), filemtime(get_template_directory() . '/assets/js/script.js'), true);
    wp_enqueue_script('hmjti-histori-script', get_template_directory_uri() . '/assets/js/histori.js', array(), filemtime(get_template_directory() . '/assets/js/histori.js'), true);

    wp_localize_script('hmjti-custom-script', 'hmjtiAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    $histori_periods = array();
    $posts = get_posts(array('post_type' => 'tim_pengurus', 'posts_per_page' => -1, 'post_status' => 'publish'));
    foreach ($posts as $post) {
        $angkatan = get_field('angkatan', $post->ID) ?: '2025/2026';
        $kategori_raw = get_field('divisi_pengurus', $post->ID) ?: get_field('kategori', $post->ID) ?: 'Inti';
        $histori_periods[$angkatan][] = array(
            'nama' => get_the_title($post->ID),
            'jabatan' => get_field('jabatan', $post->ID),
            'divisi' => strtolower($kategori_raw)
        );
    }
    wp_localize_script('hmjti-histori-script', 'historiData', array('periods' => $histori_periods));
}
add_action('wp_enqueue_scripts', 'hmjti_theme_scripts');

function hmjti_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array('primary-menu' => __('Primary Menu', 'hmjti')));
}
add_action('after_setup_theme', 'hmjti_theme_setup');

/**
 * AJAX Handler untuk Event Filtering (Fixed & Complete)
 */
function hmjti_filter_events_ajax() {
    $filter = isset($_POST['filter']) ? sanitize_text_field($_POST['filter']) : 'all';
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $today_timestamp = strtotime(date('Y-m-d'));

    // Ambil semua event (parameter sinkron dengan archive-event.php)
    // meta_key untuk orderby sudah imply EXISTS, tidak perlu meta_query lagi
    $all_events = get_posts(array(
        'post_type' => 'event',
        'posts_per_page' => -1,
        'orderby' => 'meta_value',
        'meta_key' => 'tanggal_event',
        'order' => 'ASC',
    ));
    $filtered = array();

    // Filter berdasarkan tanggal
    $debug_events = [];
    foreach ($all_events as $post) {
        $date_str = get_field('tanggal_event', $post->ID);
        $event_ts = strtotime($date_str);
        $debug_events[] = ['id' => $post->ID, 'title' => get_the_title($post->ID), 'raw' => $date_str, 'ts' => $event_ts];

        // Include events with invalid dates in 'all' filter; skip for specific filters
        $valid_date = $event_ts !== false;
        $include = false;
        if ($filter === 'all') {
            $include = true; // Show all events regardless of date validity
        } elseif ($valid_date) {
            if (($filter === 'upcoming' && $event_ts > $today_timestamp) ||
                ($filter === 'today' && $event_ts == $today_timestamp) ||
                ($filter === 'finished' && $event_ts < $today_timestamp)) {
                $include = true;
            }
        }
        if ($include) {
            $filtered[] = $post;
        }
    }

    // Manual Pagination
    $per_page = 9;
    $total_items = count($filtered);
    $total_pages = ceil($total_items / $per_page);
    $offset = ($paged - 1) * $per_page;
    $page_events = array_slice($filtered, $offset, $per_page);

    ob_start();
    if (!empty($page_events)) {
        foreach ($page_events as $event_post) {
            global $post;
            $post = $event_post;
            setup_postdata($post);
            $tanggal = get_field('tanggal_event', $post->ID);
            $event_ts = strtotime($tanggal);
            $valid_date = $event_ts !== false;

            $lokasi = get_field('lokasi_event', $post->ID);
            $waktu = get_field('waktu_event', $post->ID);
            $badge = $valid_date
                ? (($event_ts > $today_timestamp) ? 'Akan Datang' : (($event_ts == $today_timestamp) ? 'Sedang Berlangsung' : 'Selesai'))
                : 'Event';
            $badge_class = $valid_date ? str_replace(' ', '-', strtolower($badge)) : 'badge-event';
            ?>
            <div class="event-card archive-event-card" data-event-date="<?php echo esc_attr($tanggal); ?>">
              <div class="event-card-top">
                <div class="event-date-box">
                  <?php if ($valid_date): ?>
                    <div class="day"><?php echo date('d', $event_ts); ?></div>
                    <div class="month"><?php echo date('M', $event_ts); ?></div>
                  <?php endif; ?>
                </div>
                <div class="event-info">
                  <div class="event-type <?php echo esc_attr($badge_class); ?>"><?php echo esc_html($badge); ?></div>
                  <div class="event-title-card"><?php the_title(); ?></div>
                </div>
              </div>
              <div class="event-card-body">
                <?php if ($valid_date): ?>
                  <div class="event-detail"><span class="icon"><ion-icon name="calendar-outline"></ion-icon></span><?php echo date('d F Y', $event_ts); ?></div>
                <?php endif; ?>
                <div class="event-detail"><span class="icon"><ion-icon name="location-outline"></ion-icon></span><?php echo esc_html($lokasi ?: '-'); ?></div>
                <?php if ($waktu): ?><div class="event-detail"><span class="icon"><ion-icon name="time-outline"></ion-icon></span><?php echo esc_html($waktu); ?></div><?php endif; ?>
                <div class="event-detail"><span class="icon"><ion-icon name="document-text-outline"></ion-icon></span><?php echo wp_trim_words(get_the_excerpt(), 15); ?></div>
                <a href="<?php the_permalink(); ?>" class="btn btn-dark">Detail Event</a>
              </div>
            </div>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo '<div class="archive-event-empty"><h3>Belum Ada Event</h3><p>Belum ada agenda kegiatan yang sesuai dengan filter ini.</p></div>';
    }

    $html = ob_get_clean();

    // Pagination
    ob_start();
    if ($total_pages > 1) {
        $pagination = paginate_links(array(
            'total' => $total_pages,
            'current' => $paged,
            'prev_text' => '«',
            'next_text' => '»',
            'type' => 'list'
        ));
        if ($pagination) {
            echo '<div class="pagination">' . $pagination . '</div>';
        }
    }
    $pagination_html = ob_get_clean();

    wp_send_json_success(array('html' => $html, 'pagination' => $pagination_html, 'debug_query' => $debug_events));
}
add_action('wp_ajax_filter_events', 'hmjti_filter_events_ajax');
add_action('wp_ajax_nopriv_filter_events', 'hmjti_filter_events_ajax');