<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo"><img
					src="<?php echo get_template_directory_uri(); ?>/assets/images/hmjti-logo.png"
					class="logo-mark"
					alt="Logo HMJTI"
					>
					HMJTI
				</a>
                <p>Himpunan Mahasiswa Jurusan Teknologi Informasi (HMJTI) adalah wadah bagi mahasiswa TI untuk
                    berekspresi, berinovasi, dan berkontribusi nyata dalam perkembangan teknologi.</p>
                <div class="sosmed-row" style="margin-top:20px;">
                    <div class="sosmed-btn" style="width:36px;height:36px;font-size:14px;"><ion-icon name="logo-instagram"></ion-icon></div>
                    <div class="sosmed-btn" style="width:36px;height:36px;font-size:14px;"><ion-icon name="logo-twitter"></ion-icon></div>
                    <div class="sosmed-btn" style="width:36px;height:36px;font-size:14px;"><ion-icon name="logo-youtube"></ion-icon></div>
                </div>
            </div>

            <div>
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/#beranda')); ?>">Beranda</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#about')); ?>">Tentang Kami</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#kepengurusan')); ?>">Struktur</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#event')); ?>">Agenda</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#berita')); ?>">Berita</a></li>
                </ul>
            </div>

            <div>
                <h4>Layanan</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/#akademik')); ?>">Akademik</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#download')); ?>">Download</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#aspirasi')); ?>">Aspirasi</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#kontak')); ?>">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4>Hubungi Kami</h4>
                <div class="footer-contact-item">
                    <span><ion-icon name="location-outline"></ion-icon></span>
                    <span>Jl. Pramuka No.2, Pemurus Luar, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan 70238</span>
                </div>
                <div class="footer-contact-item">
                    <span><ion-icon name="mail-outline"></ion-icon></span>
                    <span>hmjti@universitasku.ac.id</span>
                </div>
                <div class="footer-contact-item">
                    <span><ion-icon name="call-outline"></ion-icon></span>
                    <span>(0511) 3268105</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> HMJTI Himpunan Mahasiswa Jurusan Teknologi Informasi.</p>
            <p class="footer-credit" id="credit-trigger" tabindex="0" role="button" aria-label="Easter egg">
              <span id="credit-text">Crafted with </span>
              <span class="heart">❤️</span>
              <span id="credit-suffix"> by Kelompok 1 · 2025</span>
            </p>
        </div>

        <!-- Developer Modal -->
        <div class="dev-modal" id="dev-modal" role="dialog" aria-modal="true" aria-labelledby="dev-modal-title" hidden>
          <div class="dev-modal__backdrop"></div>
          <div class="dev-modal__content">
            <button class="dev-modal__close" aria-label="Tutup">&times;</button>
            <h3 id="dev-modal-title">Dikembangkan Oleh</h3>
            <ul class="dev-list">
              <li>Jibrillian Gilang Satriaji</li>
              <li>Muhammad Maudhodi Fikri</li>
              <li>Muhammad Fikri Nabillah</li>
              <li>Trija Anjelia</li>
              <li>Tiara Zhafirah</li>
              <li>Nur Meldayanti</li>
              <li>Kardiana Verlin Sau</li>
            </ul>
            <p class="dev-note">deployed successfully ✓</p>
          </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>