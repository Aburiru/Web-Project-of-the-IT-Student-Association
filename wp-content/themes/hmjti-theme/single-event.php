<?php get_header(); ?>

<section class="single-event-section">

    <div class="container single-event-container">

        <?php if (have_posts()): while (have_posts()): the_post(); ?>

            <div class="single-event-header">

                <div class="event-meta-row">

                    <span class="event-badge">
                        Upcoming Event
                    </span>

                    <span class="event-date-single">
                        <ion-icon name="calendar-outline"></ion-icon>

                        <?php
                        $tanggal = get_field('tanggal_event');

                        if ($tanggal) {
                            echo date('d F Y', strtotime($tanggal));
                        }
                        ?>
                    </span>

                </div>

                <h1 class="single-event-title">
                    <?php the_title(); ?>
                </h1>

            </div>

            <?php if (has_post_thumbnail()): ?>

                <div class="single-event-thumbnail">

                    <?php the_post_thumbnail('full', array(
                        'class' => 'single-event-image'
                    )); ?>

                </div>

            <?php endif; ?>

            <div class="single-event-info">

                <div class="event-info-box">

                    <div class="event-info-item">

                        <ion-icon name="location-outline"></ion-icon>

                        <span>
                            <?php the_field('lokasi_event'); ?>
                        </span>

                    </div>

                    <div class="event-info-item">

                        <ion-icon name="time-outline"></ion-icon>

                        <span>
                            <?php the_field('waktu_event'); ?>
                        </span>

                    </div>

                </div>

            </div>

			<?php
			$link = get_field('link_pendaftaran');

			if ($link):
			?>

			<a href="<?php echo esc_url($link); ?>" 
			   class="btn btn-primary"
			   target="_blank">

			   Daftar Sekarang

			</a>

			<?php endif; ?>		

            <div class="single-event-content">

                <?php the_content(); ?>

            </div>

        <?php endwhile; endif; ?>

    </div>

</section>

<?php get_footer(); ?>