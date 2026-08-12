# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**HMJTI Theme** — Custom WordPress theme for Himpunan Mahasiswa Jurusan Teknologi Informasi (HMJTI), a student organization portal at Universitas Sari Mulia, Banjarmasin. Built as a custom theme with ACF (Advanced Custom Fields) for content management.

## Architecture

### Theme Structure
```
wp-content/themes/hmjti-theme/
├── functions.php              # Theme setup, enqueues, CPT registration, AJAX handlers
├── style.css                  # Theme metadata only (CSS in assets/css/styles.css)
├── front-page.php             # Homepage with all sections (hero, about, pengurus, berita, event, galeri, akademik, download, aspirasi, kontak)
├── header.php                 # Header with nav, mobile menu, IonIcons
├── footer.php                 # Footer
├── index.php                  # Fallback template
├── single.php                 # Fallback single post
├── archive-berita.php         # News archive with pagination
├── single-event.php           # Single event detail
├── archive-event.php          # Event archive with AJAX filter
├── single-tim_pengurus.php    # Single pengurus detail
├── archive-tim_pengurus.php   # Pengurus archive with histori tabs
├── archive-project_mata_kuliah.php # Academic resources archive
├── assets/
│   ├── css/styles.css         # All styles (CSS custom properties, BEM-ish)
│   ├── js/script.js           # Main JS (nav, filters, animations, scroll)
│   └── js/histori.js          # Histori pengurus interactive tabs
└── assets/images/             # Static images (logo, event photos)
```

### Custom Post Types (registered in functions.php)
- **tim_pengurus** — Leadership team with fields: angkatan, kategori (Inti/Humas/Minat), jabatan, nim, email, jangka_jabatan, file_sk
- **event** — Events with fields: tanggal_event, lokasi_event, waktu_event
- **gallery** — Gallery items with kategori, tanggal_event
- **downloads** — Downloadable files with file_download, kategori_download
- **project_mata_kuliah** — Academic projects/resources
- **post** (built-in) — News/berita

### Key Features
1. **Histori Pengurus** — Interactive timeline of leadership periods by angkatan/divisi (JS in `histori.js`, data localized via `wp_localize_script`)
2. **AJAX Event Filtering** — Filter events by upcoming/today/finished via `hmjti_filter_events_ajax()` in functions.php
3. **IonIcons** — Loaded via CDN in front-page.php
4. **ACF Dependency** — All custom fields managed via ACF plugin
5. **Fluent Forms** — Contact/aspirasi forms via shortcodes `[fluentform id="3"]` and `[fluentform id="4"]`

## Development Setup

### Prerequisites
- Local WordPress (Laragon/XAMPP/Docker)
- PHP 8.1+
- WordPress 6.0+
- **Required Plugins**: Advanced Custom Fields (ACF), Fluent Forms

### Common Commands
```bash
# Start local server (Laragon)
# Access at: http://webHMJTI.local or http://localhost/webHMJTI

# Theme development - edit files directly in wp-content/themes/hmjti-theme/
# No build step required (vanilla CSS/JS)

# Clear WordPress cache if needed
wp cache flush

# Regenerate thumbnails after adding image sizes
wp media regenerate
```

### ACF Field Groups (configure in WP Admin)
- **Tim Pengurus**: angkatan (text), kategori (select: Inti/Humas/Minat dan Bakat), jabatan (text), nim (text), email (email), jangka_jabatan (text), file_sk (file), angkatan_raw (text)
- **Event**: tanggal_event (date picker), lokasi_event (text), waktu_event (text)
- **Gallery**: kategori (text), tanggal_event (date picker)
- **Downloads**: file_download (file), kategori_download (text)
- **Project Mata Kuliah**: thumbnail (image), deskripsi (wysiwyg), kategori (text), link (url)

## Code Patterns

### Enqueueing Assets (functions.php)
```php
wp_enqueue_style('hmjti-custom-style', get_template_directory_uri() . '/assets/css/styles.css', array(), filemtime(...));
wp_enqueue_script('hmjti-custom-script', get_template_directory_uri() . '/assets/js/script.js', array(), filemtime(...), true);
wp_localize_script('hmjti-custom-script', 'hmjtiAjax', ['ajaxurl' => admin_url('admin-ajax.php')]);
```

### AJAX Handler Pattern
```php
function hmjti_filter_events_ajax() { ... }
add_action('wp_ajax_filter_events', 'hmjti_filter_events_ajax');
add_action('wp_ajax_nopriv_filter_events', 'hmjti_filter_events_ajax');
// JS: fetch(hmjtiAjax.ajaxurl, {method:'POST', body: new URLSearchParams({action:'filter_events', filter:'upcoming'})})
```

### Template Hierarchy
- Front page → `front-page.php`
- Single event → `single-event.php`
- Archive event → `archive-event.php`
- Single pengurus → `single-tim_pengurus.php`
- Archive pengurus → `archive-tim_pengurus.php`
- Archive berita → `archive-berita.php`
- Archive project_mata_kuliah → `archive-project_mata_kuliah.php`

### CSS Custom Properties (assets/css/styles.css:3-25)
```css
:root {
  --gold: #C8961E; --gold-light: #E8B84B; --gold-dim: #A07818;
  --primary: #6B1010; --accent: #B02020; --accent2: #8B1A1A;
  --surface: #f5f7fa; --surface2: #eef1f6;
  --text: #0a2540; --text2: #4a5a72; --text3: #8a9ab2;
  --border: rgba(10,37,64,0.10); --white: #fff;
  --radius: 16px; --radius-sm: 8px; --nav-h: 72px;
  --transition: 0.28s cubic-bezier(0.4,0,0.2,1);
  --shadow: 0 4px 24px rgba(10,37,64,0.10);
  --shadow-lg: 0 16px 48px rgba(10,37,64,0.16);
  --font-display: 'Syne', sans-serif; --font-body: 'DM Sans', sans-serif;
}
```

### JS Module Pattern (assets/js/script.js)
```javascript
const HMJTI = {
  init() { this.nav(); this.filters(); this.scroll(); },
  nav() { ... },
  filters() { ... },
  scroll() { ... }
};
document.addEventListener('DOMContentLoaded', () => HMJTI.init());
```

## Common Tasks

### Add New Custom Post Type
1. Register in `functions.php` via `register_post_type()`
2. Create ACF field group in WP Admin
3. Create `archive-{cpt}.php` and `single-{cpt}.php` templates
4. Add to nav menu via WP Admin > Appearance > Menus

### Modify Histori Data
Edit the `$histori_periods` builder in `functions.php:28-113`. Normalization helpers: `hmjti_normalize_divisi()`, `hmjti_divisi_label()`, `hmjti_divisi_color()`.

### Add Event Filter Option
1. Add filter button in `front-page.php` or `archive-event.php`
2. Extend `hmjti_filter_events_ajax()` meta_query logic (lines 153-176)
3. Update JS filter handler in `script.js`

### Styling New Components
- Use existing CSS custom properties
- Follow BEM-ish naming: `.component__element--modifier`
- Mobile-first, responsive breakpoints at 768px, 1024px
- Animations use `--transition` variable

## Git Workflow
```bash
# Current branch: main
# Modified files tracked in git status:
# - functions.php, styles.css, script.js, front-page.php, archive-tim_pengurus.php, single-tim_pengurus.php
# New template files: archive-tim_pengurus.php, single-tim_pengurus.php, histori.js
```

## Debugging
- WP_DEBUG in wp-config.php: `define('WP_DEBUG', true); define('WP_DEBUG_LOG', true);`
- Check `wp-content/debug.log` for PHP errors
- Browser console for JS errors
- Network tab for AJAX requests (filter_events action)

## Notes
- Theme uses **no build tools** — vanilla CSS/JS/PHP
- Google Fonts (Syne, DM Sans) loaded via functions.php
- IonIcons loaded via CDN in front-page.php (consider local hosting for production)
- All text in Indonesian — maintain language consistency
- Responsive breakpoints: mobile ≤768px, tablet ≤1024px, desktop >1024px