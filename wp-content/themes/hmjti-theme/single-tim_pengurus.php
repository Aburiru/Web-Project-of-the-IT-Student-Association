<?php get_header(); ?>

<main class="container py-5">
    <?php while (have_posts()) : the_post(); ?>
        <div class="row">
            <div class="col-md-4">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>" class="img-fluid rounded" alt="<?php the_title(); ?>">
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <h1><?php the_field('nama_lengkap'); ?></h1>
                <ul class="list-unstyled">
                    <li><strong>Jabatan:</strong> <?php the_field('jabatan'); ?></li>
                    <li><strong>NIM:</strong> <?php the_field('nim'); ?></li>
                    <li><strong>Angkatan:</strong> <?php the_field('angkatan'); ?></li>
                </ul>

                <div class="entry-content my-4">
                    <?php the_content(); ?>
                </div>

                <?php
                $file_sk = get_field('file_sk');
                if ($file_sk) : ?>
                    <a href="<?php echo esc_url($file_sk); ?>" class="btn btn-primary" download>Download SK</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
