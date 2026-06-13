<?php get_header(); ?>

<section class="single-news-section">

  <div class="container single-news-container">

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

      <div class="breadcrumb">

        <a href="<?php echo home_url(); ?>">
          Home
        </a>

        <span>/</span>

        <a href="#berita">
          Berita
        </a>

        <span>/</span>

        <span>
          <?php the_title(); ?>
        </span>

      </div>

      <div class="single-news-header">

        <div class="single-news-meta">

          <span class="single-news-category">

            <?php
            $category = get_the_category();

            if($category){
              echo $category[0]->name;
            }
            ?>

          </span>

          <span class="single-news-date">

            <ion-icon name="calendar-number-outline"></ion-icon>

            <?php echo get_the_date('d F Y'); ?>

          </span>

        </div>

        <h1 class="single-news-title">
          <?php the_title(); ?>
        </h1>

      </div>

      <?php if(has_post_thumbnail()) : ?>

      <div class="single-news-thumbnail">

        <?php the_post_thumbnail(
          'full',
          ['class' => 'single-thumb']
        ); ?>

      </div>

      <?php endif; ?>

      <div class="single-news-content">

        <?php the_content(); ?>

      </div>

    <?php endwhile; endif; ?>

  </div>

</section>

<?php get_footer(); ?>