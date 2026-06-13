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
            <p>Made with ❤️ by <a href="#">Kelompok 1 Angkatan 2025</a></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>