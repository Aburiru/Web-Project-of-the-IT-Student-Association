<?php get_header(); ?>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- ─── HERO ─── -->
<section id="beranda">
  <div class="hero-bg">
    <div class="hero-blob blob-1"></div>
    <div class="hero-blob blob-2"></div>
    <div class="hero-blob blob-3"></div>
  </div>
  <div class="container">
    <div class="hero-inner">
      <div class="hero-content">
        <div class="hero-eyebrow">
          <div class="dot"></div>
          Aktif &amp; Berinovasi — Periode 2025/2026
        </div>
        <h1 class="hero-title">
          Himpunan<br>
          Mahasiswa<br>
          <span class="accent-word">Jurusan-TI</span>
        </h1>
        <p class="hero-desc">
          Organisasi kemahasiswaan yang menjadi wadah pengembangan potensi, kreativitas, dan kolaborasi antar mahasiswa Teknologi Informasi.
        </p>
        <div class="hero-actions">
          <a href="#about" class="btn btn-dark">Kenali Kami →</a>
          <a href="#event" class="btn btn-outline">Lihat Event</a>
        </div>
        <div class="hero-stats">
          <div class="stat-item">
            <div class="stat-number">36</div>
            <div class="stat-label">Anggota Aktif</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">16</div>
            <div class="stat-label">Pengurus</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">10</div>
            <div class="stat-label">Program Kerja</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">3</div>
            <div class="stat-label">Divisi</div>
          </div>
        </div>
      </div>

      <div class="hero-visual">
        <div class="hero-card-stack">
          <div class="floating-badge b1"><ion-icon name="trophy-outline"></ion-icon> Juara 1 Hackathon 2026</div>
          <div class="floating-badge b2"><ion-icon name="ribbon-outline"></ion-icon> 10 Program Kerja</div>

          <div class="hcard hcard-main">
            <div class="card-badge">✦ Periode 2025/2026</div>
            <h3>HMJTI — Bergerak, Berkarya, Berdampak</h3>
            <p>Mewujudkan mahasiswa TI yang kompeten, berkarakter, dan berdaya saing tinggi di era digital.</p>
          </div>

          <div class="hcard hcard-bottom1">
            <div class="mini-stat">
              <div class="mini-icon" style="background:rgba(0,194,255,0.12); font-size:18px;"><ion-icon name="mic-outline"></ion-icon></div>
              <div>
                <div style="font-size:13px;font-weight:600;color:var(--primary);">Seminar Nasional AI</div>
                <div style="font-size:12px;color:var(--text3);">11 Mei 2026</div>
              </div>
            </div>
          </div>

          <div class="hcard hcard-bottom2">
            <div class="mini-stat">
              <div class="mini-icon" style="background:rgba(123,92,247,0.12); font-size:18px;"><ion-icon name="book-outline"></ion-icon></div>
              <div>
                <div style="font-size:13px;font-weight:600;color:var(--primary);">Materi Kuliah Baru</div>
                <div style="font-size:12px;color:var(--text3);">Tersedia sekarang</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── SAMBUTAN ─── -->
<section id="sambutan" class="section">
  <div class="container">
    <div class="sambutan-inner">
      <div class="ketua-photo-wrap fade-in">
        <div class="ketua-photo">
          <img src="<?php echo esc_url(home_url('/wp-content/uploads/2026/05/ketuaHMJTI026_backdrop-scaled.png')); ?>" alt="Ketua HMJTI" class="ketua-img">
          <div class="ketua-info-tag">
            <div class="ketua-name">Suraya Akbar</div>
            <div class="ketua-role">✦ Ketua HMJTI 2025/2026</div>
          </div>
        </div>
      </div>

      <div class="sambutan-content fade-in fade-in-delay-2">
        <div class="section-label">Sambutan Ketua</div>
        <h2 class="section-title">Selamat Datang di<br>Keluarga HMJTI</h2>
        <blockquote>
          "HMJTI bukan sekadar organisasi, melainkan ekosistem tempat mahasiswa tumbuh bersama, berinovasi tanpa batas, dan memberikan kontribusi nyata bagi kemajuan teknologi bangsa."
        </blockquote>
        <p>
          Atas nama seluruh pengurus HMJTI, kami mengucapkan selamat datang kepada seluruh mahasiswa Jurusan Teknologi Informasi. Melalui berbagai program kerja, kegiatan akademik, dan pengembangan soft skill, kami hadir untuk memfasilitasi tumbuhnya potensi terbaik kalian.
        </p>
        <br>
        <p>
          Mari bersama kita ciptakan lingkungan belajar yang positif, produktif, dan penuh semangat kolaborasi. Bersama HMJTI, kita bergerak, berkarya, dan berdampak!
        </p>
        <br>
        <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:20px;">
          <a href="#about" class="btn btn-primary">Pelajari Lebih Lanjut</a>
          <a href="#event" class="btn btn-outline" style="border-color:rgba(255,255,255,0.2);color:rgba(255,255,255,0.8);">Lihat Kegiatan</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── ABOUT ─── -->
<section id="about" class="section">
  <div class="container">
    <div class="about-grid">
      <div class="fade-in">
        <div class="section-label">Profil Organisasi</div>
        <h2 class="section-title">Tentang HMJTI</h2>
        <p class="section-sub">
          HMJ-TI adalah organisasi mahasiswa jurusan Teknologi Informasi yang didirikan pada tahun 2019 untuk mendukung pengembangan akademik, keterampilan profesional, serta kegiatan sosial mahasiswa melalui seminar, workshop, dan berbagai kegiatan teknologi informasi.
        </p>
        <div class="about-cards">
          <div class="about-card fade-in fade-in-delay-1">
            <div class="about-card-icon"><ion-icon name="earth-outline"></ion-icon></ion-icon></div>
            <h4>Sejarah</h4>
            <p>Berdiri sejak awal pembentukan jurusan sebagai wadah aspirasi dan kreativitas mahasiswa TI.</p>
          </div>
          <div class="about-card fade-in fade-in-delay-2">
            <div class="about-card-icon"><ion-icon name="color-palette-outline"></ion-icon></div>
            <h4>Logo &amp; Filosofi</h4>
            <p>Logo Kabinet Innovatia melambangkan kolaborasi, inovasi, dan semangat berkembang menuju HMJTI yang modern, adaptif, dan berdaya saing.</p>
          </div>
          <div class="about-card fade-in fade-in-delay-3">
            <div class="about-card-icon"><ion-icon name="document-text-outline"></ion-icon></div>
            <h4>AD/ART</h4>
            <p>Landasan hukum organisasi yang mengatur keseluruhan tata kelola dan struktur HMJTI.</p>
          </div>
          <div class="about-card fade-in fade-in-delay-4">
            <div class="about-card-icon"><ion-icon name="ribbon-outline"></ion-icon></ion-icon></div>
            <h4>Program Kerja</h4>
            <p>10 program kerja terencana mencakup akademik, sosial, dan pengembangan diri.</p>
          </div>
        </div>
      </div>

      <div class="fade-in fade-in-delay-2">
        <div class="section-label">Visi &amp; Misi</div>
        <h2 class="section-title">Landasan Kami</h2>
        <p style="color:var(--text2);font-size:15px;line-height:1.7;margin-bottom:8px;">
          <strong style="color:var(--primary);">Visi:</strong> Membangun HMJTI yang adaptif terhadap perkembangan teknologi, berlandaskan kolaborasi, inovasi, dan profesionalisme untuk menciptakan lingkungan organisasi yang berdaya saing, responsif, serta berdampak bagi mahasiswa TI.
        </p>
        <div class="vm-list">
          <div class="vm-item">
            <div class="vm-num">01</div>
            <p>Meningkatkan Inovasi dan Kompetensi Teknologi Mahasiswa.</p>
          </div>
          <div class="vm-item">
            <div class="vm-num">02</div>
            <p>Membangun Kultur Organisasi yang Kolaboratif dan Transparan.</p>
          </div>
          <div class="vm-item">
            <div class="vm-num">03</div>
            <p>Menguatkan Pelayanan dan Kepedulian Terhadap Mahasiswa TI.</p>
          </div>
          <div class="vm-item">
            <div class="vm-num">04</div>
            <p>Mengembangkan dan Mengoptimalkan Kompetensi Mahasiswa TI.</p>
          </div>
          <div class="vm-item">
            <div class="vm-num">05</div>
            <p>Meningkatkan Kualitas dan Pengembangan Skill Akademik Secara Berkelanjutan.</p>
          </div>
          <div class="vm-item">
            <div class="vm-num">06</div>
            <p>Mendorong Digitalisasi dan Modernisasi Tata Kelola HMJTI.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── KEPENGURUSAN ─── -->
<section id="kepengurusan" class="section">
  <div class="container">
    <div class="pengurus-header fade-in">
      <div>
        <div class="section-label">Struktur Organisasi</div>
        <h2 class="section-title">Tim Pengurus HMJTI<br>2025/2026</h2>
      </div>
      <!-- <a href="#" class="btn btn-outline">Lihat Semua →</a> -->
    </div>

    <div class="pengurus-tabs">
      <div class="ptab active" onclick="filterPengurus('all', this)">Semua</div>
      <div class="ptab" onclick="filterPengurus('inti', this)">Pengurus Inti</div>
      <div class="ptab" onclick="filterPengurus('humas', this)">Divisi Humas</div>
      <div class="ptab" onclick="filterPengurus('minat dan bakat', this)">Divisi Minat dan Bakat</div>
      <!-- <div class="ptab" onclick="filterPengurus('sosial', this)">Divisi Sosial</div>
      <div class="ptab" onclick="filterPengurus('kewirausahaan', this)">Divisi Kewirausahaan</div> -->
    </div>

    <div class="pengurus-grid" id="pengurus-grid">
      <!-- injected by JS -->
    </div>
  </div>
</section>

<!-- ─── BERITA ─── -->
<section id="berita" class="section">
  <div class="container">
    <div class="berita-header fade-in">
      <div>
        <div class="section-label">Berita &amp; Artikel</div>
        <h2 class="section-title">Informasi Terkini</h2>
      </div>
      <a href="<?php echo get_post_type_archive_link('berita'); ?>" class="btn btn-outline">Semua Berita →</a>
    </div>

    <div class="news-grid fade-in">

      <?php
      $featured_args = array(
        'post_type' => 'post',
        'posts_per_page' => 1
      );

      $featured_query = new WP_Query($featured_args);

      if ($featured_query->have_posts()):
        while ($featured_query->have_posts()):
          $featured_query->the_post();
          ?>

          <div class="news-featured">

            <div class="news-thumbnail">

              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large', ['class' => 'news-thumb']); ?>
              <?php endif; ?>

            </div>

            <div class="news-featured-body">

              <div class="news-meta">

                <span class="news-cat">
                  <?php
                  $category = get_the_category();
                  if ($category) {
                    echo $category[0]->name;
                  }
                  ?>
                </span>

                <span class="news-date">
                  <ion-icon name="calendar-number-outline"></ion-icon>
                  <?php echo get_the_date('d M Y'); ?>
                </span>

              </div>

              <h2 class="news-featured-title">
                <?php the_title(); ?>
              </h2>

              <p>
                <?php echo wp_trim_words(get_the_excerpt(), 32); ?>
              </p>

              <a href="<?php the_permalink(); ?>" class="news-read-more">
                Baca Selengkapnya →
              </a>

            </div>

          </div>

          <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>

      <div class="news-sidebar">

        <?php
        $sidebar_args = array(
          'post_type' => 'post',
          'posts_per_page' => 4,
          'offset' => 1
        );

        $sidebar_query = new WP_Query($sidebar_args);

        if ($sidebar_query->have_posts()):
          while ($sidebar_query->have_posts()):
            $sidebar_query->the_post();
            ?>

            <div class="news-item">

              <span class="news-cat">
                <?php
                $category = get_the_category();
                if ($category) {
                  echo $category[0]->name;
                }
                ?>
              </span>

              <div class="news-item-title">
                <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </div>

              <div class="news-date">
                <ion-icon name="calendar-number-outline"></ion-icon>
                <?php echo get_the_date('d M Y'); ?>
              </div>

            </div>

            <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>

      </div>

    </div>
</section>

<!-- ─── EVENT ─── -->
<section id="event" class="section">
  <div class="container">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:48px;" class="fade-in">
      <div>
        <div class="section-label">Event &amp; Kegiatan</div>
        <h2 class="section-title">Agenda Mendatang</h2>
      </div>
      <a href="#" class="btn btn-outline">Semua Event →</a>
    </div>

    <div class="event-grid">
<!-- 		<?php
      $args = array(
        'post_type' => 'events',
        'posts_per_page' => 3
      );

      $test_query = new WP_Query($args);

      if ($test_query->have_posts()):

        while ($test_query->have_posts()):
          $test_query->the_post();
          ?>

          <h2 style="color:white;">
            <?php the_title(); ?>
          </h2>

          <?php
        endwhile;

      else:
        ?>

        <h2 style="color:red;">
          EVENT TIDAK DITEMUKAN
        </h2>

      <?php endif; ?> -->

      <?php
      $args = array(
        'post_type' => 'event',
        'posts_per_page' => 3
      );

      $event_query = new WP_Query($args);

      if ($event_query->have_posts()):
        while ($event_query->have_posts()):
          $event_query->the_post();
          ?>

          <div class="event-card fade-in">

            <div class="event-card-top">

              <div class="event-date-box">

                <?php
                $tanggal = get_field('tanggal_event');

                if ($tanggal):
                  ?>

                  <div class="day">
                    <?php echo date('d', strtotime($tanggal)); ?>
                  </div>

                  <div class="month">
                    <?php echo date('M', strtotime($tanggal)); ?>
                  </div>

                <?php endif; ?>

              </div>

              <div class="event-info">

                <div class="event-type">
                  Event
                </div>

                <div class="event-title-card">
                  <?php the_title(); ?>
                </div>

              </div>

            </div>

            <div class="event-card-body">

              <div class="event-detail">
                <span class="icon">
                  <ion-icon name="calendar-outline"></ion-icon>
                </span>

                <?php
                if ($tanggal) {
                  echo date('d F Y', strtotime($tanggal));
                }
                ?>
              </div>

              <div class="event-detail">

                <span class="icon">
                  <ion-icon name="location-outline"></ion-icon>
                </span>

                <?php the_field('lokasi_event'); ?>

              </div>

              <div class="event-detail">

                <span class="icon">
                  <ion-icon name="document-text-outline"></ion-icon>
                </span>

                <?php echo wp_trim_words(get_the_excerpt(), 10); ?>

              </div>

              <a href="<?php the_permalink(); ?>" class="btn btn-dark">
                Detail Event
              </a>

            </div>

          </div>

          <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>

<!-- ─── GALERI ─── -->
<section id="galeri" class="section">
  <div class="container">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:48px;" class="fade-in">
      <div>
        <div class="section-label">Dokumentasi</div>
        <h2 class="section-title">Galeri Kegiatan</h2>
      </div>
      <a href="#" class="btn btn-outline">Lihat Semua →</a>
    </div>

    <div class="gallery-grid fade-in">

      <?php
      $args = array(
        'post_type' => 'gallery',
        'posts_per_page' => 6
      );

      $gallery_query = new WP_Query($args);

      if ($gallery_query->have_posts()):
        while ($gallery_query->have_posts()):
          $gallery_query->the_post();
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

				<span class="gallery-category">

					<?php echo esc_html(get_field('kategori')); ?>

				</span>

				<h3 class="gallery-title">

					<?php the_title(); ?>

				</h3>

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
        wp_reset_postdata();
      endif;
      ?>

    </div>
  </div>
</section>

<!-- ─── AKADEMIK ─── -->
<section id="akademik" class="section">
  <div class="container">
    <div class="fade-in" style="margin-bottom:48px;">
      <div class="section-label">Sumber Daya</div>
      <h2 class="section-title">Akademik &amp; Pengembangan</h2>
      <p class="section-sub">Temukan semua sumber daya akademik yang kamu butuhkan, dari materi kuliah hingga informasi magang dan beasiswa.</p>
    </div>
    <div class="akademik-grid">
		<div class="akademik-card fade-in">
        <div class="akademik-icon"><ion-icon name="book-outline"></ion-icon></div>
        <h3>Project Mata Kuliah</h3>
        <p>Akses catatan project yang telah dikurasi oleh pengurus akademik HMJTI.</p>
        <a href="<?php echo site_url('index.php/project_mata_kuliah'); ?>" class="akademik-link">Akses Project →</a>
      </div>
      <div class="akademik-card fade-in fade-in-delay-2">
        <div class="akademik-icon"><ion-icon name="create-outline"></ion-icon></div>
        <h3>PKL &amp; Skripsi</h3>
        <p>Informasi prosedur, template, dan panduan penulisan PKL dan skripsi yang komprehensif.</p>
        <a href="#" class="akademik-link">Pelajari →</a>
      </div>
      <div class="akademik-card fade-in fade-in-delay-3">
        <div class="akademik-icon"><ion-icon name="diamond-outline"></ion-icon></div>
        <h3>Beasiswa</h3>
        <p>Update info beasiswa dalam dan luar negeri, beserta panduan cara mendaftar dan persyaratan.</p>
        <a href="#" class="akademik-link">Cek Beasiswa →</a>
      </div>
      <div class="akademik-card fade-in fade-in-delay-4">
        <div class="akademik-icon"><ion-icon name="briefcase-outline"></ion-icon></div>
        <h3>Lowongan Magang</h3>
        <p>Daftar lowongan magang dari perusahaan mitra yang terpercaya dan relevan dengan bidang TI.</p>
        <a href="#" class="akademik-link">Cari Magang →</a>
      </div>
      <div class="akademik-card fade-in fade-in-delay-4">
        <div class="akademik-icon"><ion-icon name="calendar-outline"></ion-icon></div>
        <h3>Jadwal Akademik</h3>
        <p>Kalender akademik, jadwal ujian, dan informasi penting terkait kegiatan perkuliahan.</p>
        <a href="#" class="akademik-link">Lihat Jadwal →</a>
      </div>
    </div>
  </div>
</section>

<!-- ─── DOWNLOAD ─── -->
<section id="download" class="section-sm">
  <div class="container">
    <div style="margin-bottom:40px;" class="fade-in">
      <div class="section-label">Berkas Digital</div>
      <h2 class="section-title">Pusat Download</h2>
      <p class="section-sub">Unduh template, dokumen resmi, dan aset organisasi yang kamu butuhkan.</p>
    </div>

    <div class="download-grid">
      <?php
      $args = array(
        'post_type' => 'downloads',
        'posts_per_page' => 8
      );

      $download_query = new WP_Query($args);

      if ($download_query->have_posts()):
        while ($download_query->have_posts()):
          $download_query->the_post();

          $file = get_field('file_download');
          ?>

          <?php if ($file): ?>

            <a href="<?php echo esc_url($file['url']); ?>" class="dl-item fade-in" download>

              <div class="dl-icon">

                <?php
                $filetype = wp_check_filetype($file['url']);

                switch ($filetype['ext']) {

                  case 'pdf':
                    echo '<ion-icon name="document-text-outline"></ion-icon>';
                    break;

                  case 'doc':
                  case 'docx':
                    echo '<ion-icon name="document-outline"></ion-icon>';
                    break;

                  case 'zip':
                    echo '<ion-icon name="archive-outline"></ion-icon>';
                    break;

                  case 'xls':
                  case 'xlsx':
                    echo '<ion-icon name="grid-outline"></ion-icon>';
                    break;

                  default:
                    echo '<ion-icon name="folder-outline"></ion-icon>';
                }
                ?>

              </div>

              <div class="dl-info">

                <h4>
                  <?php the_title(); ?>
                </h4>

                <span>

                  <?php the_field('kategori_download'); ?>

                  ·

                  <?php
                  $filesize = size_format($file['filesize'], 2);
                  echo $filesize;
                  ?>

                </span>

              </div>

              <span class="dl-arrow">↓</span>

            </a>

          <?php endif; ?>

          <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>

<!-- ─── ASPIRASI ─── -->
<section id="aspirasi" class="section">
  <div class="container">
    <div class="aspirasi-inner">
      <div class="aspirasi-content fade-in">
        <div class="section-label">Suara Mahasiswa</div>
        <h2 class="section-title">Aspirasi &amp;<br>Kritik Saran</h2>
        <p>Kami percaya bahwa organisasi yang baik adalah yang mendengarkan. Sampaikan aspirasimu, kritik, saran, atau pengaduan melalui formulir ini. Semua masukan akan ditindaklanjuti secara serius.</p>
        <div style="display:flex;flex-direction:column;gap:16px;">
          <div style="display:flex;align-items:center;gap:12px;color:rgba(255,255,255,0.7);font-size:14px;">
            <div style="width:36px;height:36px;background:rgba(245, 247, 250,0.12);border:1px solid rgba(10,37,64,0.10);border-radius:8px;display:flex;align-items:center;justify-content:center;"><ion-icon name="lock-closed-outline"></ion-icon></div>
            Identitasmu terjaga kerahasiaannya
          </div>
          <div style="display:flex;align-items:center;gap:12px;color:rgba(255,255,255,0.7);font-size:14px;">
            <div style="width:36px;height:36px;background:rgba(245, 247, 250,0.12);border:1px solid rgba(10,37,64,0.10);border-radius:8px;display:flex;align-items:center;justify-content:center;"><ion-icon name="flash-outline"></ion-icon></div>
            Ditindaklanjuti dalam 3×24 jam
          </div>
          <div style="display:flex;align-items:center;gap:12px;color:rgba(255,255,255,0.7);font-size:14px;">
            <div style="width:36px;height:36px;background:rgba(245, 247, 250,0.12);border:1px solid rgba(10,37,64,0.10);border-radius:8px;display:flex;align-items:center;justify-content:center;"><ion-icon name="megaphone-outline"></ion-icon></div>
            Dapat disampaikan secara anonim
          </div>
        </div>
      </div>

      <div class="aspirasi-form fade-in fade-in-delay-2">
		<?php echo do_shortcode('[fluentform id="3"]'); ?>
      </div>
    </div>
  </div>
</section>

<!-- ─── KONTAK ─── -->
<section id="kontak" class="section">
  <div class="container">
    <div style="margin-bottom:48px;" class="fade-in">
      <div class="section-label">Hubungi Kami</div>
      <h2 class="section-title">Kontak &amp; Lokasi</h2>
    </div>

    <div class="kontak-grid">
      <div class="kontak-info fade-in">
        <div class="kontak-item">
          <div class="kontak-icon-wrap"><ion-icon name="location-outline"></ion-icon></div>
          <div>
            <h4>Alamat Sekretariat</h4>
            <p>Jl. Pramuka No.2, Pemurus Luar, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan 70238</p>
          </div>
        </div>
        <div class="kontak-item">
          <div class="kontak-icon-wrap"><ion-icon name="mail-outline"></ion-icon></div>
          <div>
            <h4>Email Resmi</h4>
            <p>hmjti@universitasku.ac.id</p>
          </div>
        </div>
        <div class="kontak-item">
          <div class="kontak-icon-wrap"><ion-icon name="call-outline"></ion-icon></div>
          <div>
            <h4>WhatsApp</h4>
            <p>+62 878-7235-8933 (Ketua Umum)</p>
          </div>
        </div>
        <div class="kontak-item">
          <div class="kontak-icon-wrap"><ion-icon name="time-outline"></ion-icon></div>
          <div>
            <h4>Jam Operasional</h4>
            <p>Senin – Jumat: 08.00 – 17.00 WITA</p>
          </div>
        </div>

        <div>
          <h4 style="font-size:14px;font-weight:600;color:var(--primary);margin-bottom:12px;">Ikuti Kami di Media Sosial</h4>
          <div class="sosmed-row">
            <div class="sosmed-btn" onclick="showToast('Membuka Instagram...')"><ion-icon name="logo-instagram"></ion-icon></div>
            <div class="sosmed-btn" onclick="showToast('Membuka Twitter/X...')"><ion-icon name="logo-twitter"></ion-icon></div>
            <div class="sosmed-btn" onclick="showToast('Membuka YouTube...')"><ion-icon name="logo-youtube"></ion-icon></div>
            <div class="sosmed-btn" onclick="showToast('Membuka LinkedIn...')"><ion-icon name="logo-linkedin"></ion-icon></div>
            <div class="sosmed-btn" onclick="showToast('Membuka TikTok...')"><ion-icon name="logo-tiktok"></ion-icon></div>
          </div>
        </div>

        <div class="kontak-map">
          <div class="map-placeholder">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d248.9399463244081!2d114.6284289!3d-3.3404974!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de426b04bc12fcd%3A0xa5e568eddf80a5c4!2sUniversitas%20Sari%20Mulia!5e0!3m2!1sid!2sid!4v1779083772355!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!-- <div class="map-pin"><ion-icon name="location-outline"></ion-icon></div> -->
            <!-- <p>Sekretariat HMJTI — Banjarmasin, Kalsel</p> -->
          </div>
          <div style="padding:16px;background:var(--white);">
            <a href="https://maps.app.goo.gl/MVS5unZA4EESEfxP9" target="_blank" class="btn btn-outline" style="width:100%;justify-content:center;font-size:13px;padding:10px;">Buka di Google Maps <ion-icon name="arrow-up-circle-outline"></ion-icon></a>
          </div>
        </div>
      </div>

      <div class="kontak-form fade-in fade-in-delay-2" style="background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:32px;">
        <h3>Kirim Pesan Langsung</h3>
        <?php echo do_shortcode('[fluentform id="4"]'); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>