<?php get_header(); ?>

<section class="single-project-section">
    <div class="container single-project-container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php

			$materi_project = function_exists('get_field')
				? get_field('materi_project')
				: '';

			$deskripsi_project = function_exists('get_field')
				? get_field('deskripsi_project')
				: '';

    		$archive_link =
	    		get_post_type_archive_link(
				'project_mata_kuliah'
			);
		
			$nama_mata_kuliah = get_field('nama_mata_kuliah');
			$semester = get_field('semester');
			$tahun_project = get_field('tahun_project');
			$github_url = get_field('github_url');
		
            ?>

            <div class="single-project-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span>/</span>
                <a href="<?php echo esc_url($archive_link); ?>">Project Mata Kuliah</a>
                <span>/</span>
                <span><?php the_title(); ?></span>
            </div>

            <div class="single-project-header">
                <div class="section-label">Project Mata Kuliah</div>
                <h1 class="single-project-title"><?php the_title(); ?></h1>

				<?php if(get_the_excerpt()) : ?>

<!-- 					<p class="single-project-excerpt">
						<?php echo wp_trim_words(get_the_excerpt(), 10); ?>
					</p> -->

				<?php endif; ?>
				
                <div class="single-project-meta">
                    <span><ion-icon name="calendar-outline"></ion-icon><?php echo esc_html(get_the_date('d F Y')); ?></span>

					<?php if($nama_mata_kuliah): ?>

					<span>
						<ion-icon name="book-outline"></ion-icon>
						<?php echo esc_html($nama_mata_kuliah); ?>
					</span>

					<?php endif; ?>

					<?php if($semester): ?>

					<span>
						<ion-icon name="school-outline"></ion-icon>
						Semester <?php echo esc_html($semester); ?>
					</span>

					<?php endif; ?>
					                    
                </div>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="single-project-thumbnail">
                    <?php the_post_thumbnail('full', array('class' => 'single-project-image')); ?>
                </div>
            <?php endif; ?>

            <?php if ($deskripsi_project || $materi_project) : ?>
                <div class="project-info-box">

					<?php if($nama_mata_kuliah): ?>

					<div class="project-info-item">

						<ion-icon name="book-outline"></ion-icon>

						<div>

							<strong>Mata Kuliah</strong>

							<span>
								<?php echo esc_html($nama_mata_kuliah); ?>
							</span>

						</div>

					</div>

					<?php endif; ?>
					
					<?php if($semester): ?>

					<div class="project-info-item">

						<ion-icon name="school-outline"></ion-icon>

						<div>

							<strong>Semester</strong>

							<span>
								<?php echo esc_html($semester); ?>
							</span>

						</div>

					</div>

					<?php endif; ?>
					
					<?php if($tahun_project): ?>

					<div class="project-info-item">

						<ion-icon name="calendar-clear-outline"></ion-icon>

						<div>

							<strong>Tahun Project</strong>

							<span>
								<?php echo esc_html($tahun_project); ?>
							</span>

						</div>

					</div>

					<?php endif; ?>
										
				</div>
            <?php endif; ?>

            <div class="single-project-content">
                <?php the_content(); ?>
            </div>
		
			<div class="project-accordion">

			<?php for($i=1;$i<=5;$i++) :

				$title =
				get_field('dropdown_'.$i.'_title');

				$content =
				get_field('dropdown_'.$i.'_content');

				if(!$title) continue;

			?>

				<div class="accordion-item">

					<button class="accordion-btn">

						<span>
							<?php echo esc_html($title); ?>
						</span>

						<ion-icon
							name="chevron-down-outline">
						</ion-icon>

					</button>

					<div class="accordion-content">

						<?php echo wpautop($content); ?>

					</div>

				</div>

			<?php endfor; ?>

			</div>
		
			<?php if(get_field('github_url')) : ?>

			<div class="project-action">

				<a
					href="<?php the_field('github_url'); ?>"
					target="_blank"
					class="btn btn-dark">

					Repository Github

				</a>

			</div>

			<?php endif; ?>

			<div class="project-navigation">

				<div>

					<?php previous_post_link(
						'%link',
						'← Project Sebelumnya'
					); ?>

				</div>

				<div>

					<?php next_post_link(
						'%link',
						'Project Berikutnya →'
					); ?>

				</div>

			</div>
		
            <a href="<?php echo esc_url($archive_link); ?>" class="btn btn-outline single-project-back">← Kembali ke Daftar Project</a>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>