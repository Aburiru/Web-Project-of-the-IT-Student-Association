<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="main-header">
    <nav>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo"><img
		    src="<?php echo get_template_directory_uri(); ?>/assets/images/hmjti-logo.png"
		    class="logo-mark"
		    alt="Logo HMJTI"
			>
            HMJTI
        </a>
        
        <ul class="nav-links">
            <li><a href="<?php echo esc_url(home_url('/#beranda')); ?>" class="active">Beranda</a></li>
            <li><a href="<?php echo esc_url(home_url('/#about')); ?>">Profil</a></li>
            <li><a href="<?php echo esc_url(home_url('/#kepengurusan')); ?>">Kepengurusan</a></li>
            <li><a href="<?php echo esc_url(home_url('/#berita')); ?>">Informasi</a></li>
            <li><a href="<?php echo esc_url(home_url('/#event')); ?>">Event</a></li>
            <li><a href="<?php echo esc_url(home_url('/#akademik')); ?>">Akademik</a></li>
            <li><a href="<?php echo esc_url(home_url('/#galeri')); ?>">Galeri</a></li>
            <li><a href="<?php echo esc_url(home_url('/#download')); ?>">Download</a></li>
            <li><a href="<?php echo esc_url(home_url('/#kontak')); ?>">Kontak</a></li>
        </ul>

        <div class="nav-cta">
            <a href="<?php echo esc_url(home_url('/#about')); ?>" class="btn btn-outline btn-sm" style="font-size:13px;">Pelajari</a>
            <a href="<?php echo esc_url(home_url('/#kontak')); ?>" class="btn btn-dark btn-sm" style="font-size:13px;">Join Us</a>
        </div>

        <button class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    <!-- Mobile Nav -->
    <div class="mobile-nav" id="mobile-nav">
        <ul class="mobile-links">
            <li><a href="<?php echo esc_url(home_url('/#beranda')); ?>" onclick="closeMobileNav()">Beranda</a></li>
            <li><a href="<?php echo esc_url(home_url('/#about')); ?>" onclick="closeMobileNav()">Profil</a></li>
            <li><a href="<?php echo esc_url(home_url('/#kepengurusan')); ?>" onclick="closeMobileNav()">Kepengurusan</a></li>
            <li><a href="<?php echo esc_url(home_url('/#event')); ?>" onclick="closeMobileNav()">Event</a></li>
            <li><a href="<?php echo esc_url(home_url('/#akademik')); ?>" onclick="closeMobileNav()">Akademik</a></li>
            <li><a href="<?php echo esc_url(home_url('/#kontak')); ?>" onclick="closeMobileNav()">Kontak</a></li>
        </ul>
        <div class="mobile-nav-cta">
             <a href="#kontak" class="btn btn-dark" style="width:100%;justify-content:center;">Join Us Now</a>
        </div>
    </div>
</header>

<div id="toast" class="toast"></div>
<button id="scrollTop" class="scroll-top">↑</button>
