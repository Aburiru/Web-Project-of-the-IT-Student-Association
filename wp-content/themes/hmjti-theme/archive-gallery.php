<?php get_header(); ?>

<section class="section">
    <div class="container">
        <h1 class="section-title">Galeri Kegiatan</h1>

        <div class="gallery-grid">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    ?>
                    <div class="gallery-item">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('large', ['class' => 'gallery-thumb']); ?>
                        <?php endif; ?>

                        <div class="gallery-overlay">
                            <span class="icon">
                                <ion-icon name="images-outline"></ion-icon>
                            </span>
                        </div>

                        <div class="gallery-caption">
                            <span class="gallery-category"><?php echo esc_html(get_field('kategori')); ?></span>
                            <h3 class="gallery-title"><?php the_title(); ?></h3>
                            <div class="gallery-date">
                                <ion-icon name="calendar-outline"></ion-icon>
                                <?php
                                $tanggal = get_field('tanggal_event');
                                if($tanggal){
                                    echo date_i18n('d F Y', strtotime($tanggal));
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                // Tambahkan pagination jika diperlukan
                the_posts_pagination(['prev_text' => '«', 'next_text' => '»']);
                wp_reset_postdata();
            else:
                echo '<p>Belum ada galeri yang ditambahkan.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
