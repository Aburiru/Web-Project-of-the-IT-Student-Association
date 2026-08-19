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

    wp_localize_script('hmjti-custom-script', 'hmjtiAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

    // Histori logic kept as original
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
 * AJAX Handler untuk Event Filtering (Fixed Logic)
 */
function hmjti_filter_events_ajax() {
    $filter = isset($_POST['filter']) ? sanitize_text_field($_POST['filter']) : 'all';
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $today_timestamp = strtotime(date('Y-m-d'));

    $all_events = get_posts(array('post_type' => 'event', 'posts_per_page' => -1));
    $filtered = array();

    foreach ($all_events as $post) {
        $date_str = get_field('tanggal_event', $post->ID);
        $event_ts = strtotime($date_str);

        if ($filter === 'upcoming' && $event_ts > $today_timestamp) $filtered[] = $post;
        elseif ($filter === 'today' && $event_ts == $today_timestamp) $filtered[] = $post;
        elseif ($filter === 'finished' && $event_ts < $today_timestamp) $filtered[] = $post;
        elseif ($filter === 'all') $filtered[] = $post;
    }

    $total = count($filtered);
    $per_page = 9;
    $offset = ($paged - 1) * $per_page;
    $slice = array_slice($filtered, $offset, $per_page);

    ob_start();
    if (!empty($slice)) {
        foreach ($slice as $post) {
            setup_postdata($post);
            $tanggal = get_field('tanggal_event', $post->ID);
            $badge = (strtotime($tanggal) > $today_timestamp) ? 'Akan Datang' : ((strtotime($tanggal) == $today_timestamp) ? 'Sedang Berlangsung' : 'Selesai');
            ?>
            <div class="event-card archive-event-card">
              <div class="event-card-top">
                <div class="event-date-box"><div class="day"><?php echo date('d', strtotime($tanggal)); ?></div><div class="month"><?php echo date('M', strtotime($tanggal)); ?></div></div>
                <div class="event-info"><div class="event-type"><?php echo $badge; ?></div><div class="event-title-card"><?php the_title(); ?></div></div>
              </div>
              <div class="event-card-body">
                <a href="<?php the_permalink(); ?>" class="btn btn-dark">Detail Event</a>
              </div>
            </div>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo '<div class="archive-event-empty"><h3>Belum Ada Event</h3></div>';
    }

    wp_send_json_success(array('html' => ob_get_clean()));
}
add_action('wp_ajax_filter_events', 'hmjti_filter_events_ajax');
add_action('wp_ajax_nopriv_filter_events', 'hmjti_filter_events_ajax');
