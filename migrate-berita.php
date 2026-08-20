<?php
/**
 * Migration: Move 'post' type berita to 'berita' CPT
 * Run: http://webhmjti.test/migrate-berita.php
 * Delete after use!
 */

require_once 'wp-load.php';

if (!post_type_exists('berita')) {
    die('CPT "berita" does not exist. Register it first via ACF Pro or code.');
}

$posts = get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'category_name' => 'berita', // Adjust if different category slug
]);

if (empty($posts)) {
    die('No posts found to migrate.');
}

$migrated = 0;
$errors = 0;

foreach ($posts as $post) {
    $new_id = wp_insert_post([
        'post_title'   => $post->post_title,
        'post_content' => $post->post_content,
        'post_excerpt' => $post->post_excerpt,
        'post_status'  => $post->post_status,
        'post_type'    => 'berita',
        'post_date'    => $post->post_date,
        'post_date_gmt'=> $post->post_date_gmt,
        'post_author'  => $post->post_author,
        'post_name'    => $post->post_name,
    ], true);

    if (is_wp_error($new_id)) {
        $errors++;
        error_log("Failed to migrate post {$post->ID}: " . $new_id->get_error_message());
        continue;
    }

    // Migrate meta
    $meta = get_post_meta($post->ID);
    foreach ($meta as $key => $values) {
        foreach ($values as $value) {
            add_post_meta($new_id, $key, $value);
        }
    }

    // Migrate thumbnail
    $thumb_id = get_post_thumbnail_id($post->ID);
    if ($thumb_id) {
        set_post_thumbnail($new_id, $thumb_id);
    }

    // Migrate categories → taxonomies if needed
    $cats = get_the_category($post->ID);
    if ($cats) {
        $cat_names = wp_list_pluck($cats, 'name');
        wp_set_object_terms($new_id, $cat_names, 'category'); // or custom taxonomy
    }

    $migrated++;
    echo "Migrated: {$post->post_title} (ID: $new_id)<br>";
}

echo "<hr>Done. Migrated: $migrated, Errors: $errors<br>";
echo "<strong>IMPORTANT: Delete this file after migration!</strong>";