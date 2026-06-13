<?php get_header(); ?>

<section class="resource-archive-section">

    <div class="container resource-archive-container">

        <!-- Breadcrumb -->
        <div class="breadcrumb">

            <a href="<?php echo home_url(); ?>">
                Beranda
            </a>

            <span>/</span>

            <span>
                Project Mata Kuliah
            </span>

        </div>

        <!-- Header -->
        <div class="resource-header">

            <div class="section-label">
                Sumber Daya Akademik
            </div>

            <h1 class="section-title">
                Project Mata Kuliah
            </h1>

            <p class="section-sub">
                Kumpulan project mahasiswa Teknologi Informasi yang telah disusun berdasarkan mata kuliah dan bidang keilmuan.
            </p>

        </div>

        <?php

        $args = array(
            'post_type'      => 'project_mata_kuliah',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC'
        );

        $query = new WP_Query($args);

        ?>

        <?php if ($query->have_posts()) : ?>

            <div class="resource-grid">

                <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <div class="resource-card">

                        <?php if (has_post_thumbnail()) : ?>

                            <div class="resource-thumbnail">

                                <?php the_post_thumbnail('medium_large'); ?>

                            </div>

                        <?php endif; ?>

                        <div class="resource-card-header">

                            <div class="resource-icon">
                                <ion-icon name="book-outline"></ion-icon>
                            </div>

                            <h3 class="resource-title">
                                <?php the_title(); ?>
                            </h3>

                        </div>

                        <div class="resource-excerpt">

                            <?php
                            if (has_excerpt()) {
                                the_excerpt();
                            } else {
                                echo wp_trim_words(
                                    get_the_content(),
                                    25,
                                    '...'
                                );
                            }
                            ?>

                        </div>

                        <a href="<?php the_permalink(); ?>" class="btn btn-dark">

                            Lihat Detail →

                        </a>

                    </div>

                <?php endwhile; ?>

            </div>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <div class="resource-empty">

                <h3>
                    Belum Ada Project
                </h3>

                <p>
                    Data project mata kuliah belum tersedia.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>

<?php get_footer(); ?>