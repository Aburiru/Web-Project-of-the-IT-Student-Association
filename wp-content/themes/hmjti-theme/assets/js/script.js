// ─── DATA PENGURUS ───
const pengurusData = [
  { nama: 'Suraya Akbar', jabatan: 'Ketua Himpunan', divisi: 'inti', inisial: 'SA' },
  { nama: 'Maria Peronika', jabatan: 'Wakil Ketua Himpunan', divisi: 'inti', inisial: 'MP' },
  { nama: 'Fatimah', jabatan: 'Sekretaris I', divisi: 'inti', inisial: 'F' },
  { nama: 'Muhammad Fikri Nabilah', jabatan: 'Sekretaris II', divisi: 'inti', inisial: 'MF' },
  { nama: 'Risna Ariyasari Harahap', jabatan: 'Bendahara', divisi: 'inti', inisial: 'RA' },
  { nama: 'Rosdayanti', jabatan: 'Koordinator Divisi', divisi: 'humas', inisial: 'R' },
  { nama: 'Mahdi', jabatan: 'Anggota Humas', divisi: 'humas', inisial: 'M' },
  { nama: 'Lili Paramita', jabatan: 'Anggota Humas', divisi: 'humas', inisial: 'LP' },
  { nama: 'Trija Anjelia', jabatan: 'Anggota Humas', divisi: 'humas', inisial: 'TA' },
  { nama: 'Tiara Zhafirah', jabatan: 'Anggota Humas', divisi: 'humas', inisial: 'TZ' },
  { nama: 'Muhammad Hanafi', jabatan: 'Anggota Humas', divisi: 'humas', inisial: 'MH' },
  { nama: 'Muhamamad Zaini Abdul Ghoni', jabatan: 'Anggota Humas', divisi: 'humas', inisial: 'MZ' },
  { nama: 'Marliana', jabatan: 'Koordinator Divisi', divisi: 'minat dan bakat', inisial: 'M' },
  { nama: 'Nina Azka Aniqah', jabatan: 'Anggota Minat & Bakat', divisi: 'minat dan bakat', inisial: 'NA' },
  { nama: 'Muhammad Ramdani Zulfa', jabatan: 'Anggota Minat & Bakat', divisi: 'minat dan bakat', inisial: 'MR' },
  { nama: 'Soraya Aisyah Yusda', jabatan: 'Anggota Minat & Bakat', divisi: 'minat dan bakat', inisial: 'SY' },
  // { nama: 'Mega Lestari', jabatan: 'Ketua Divisi', divisi: 'sosial', inisial: 'ML' },
  // { nama: 'Arif Rahman', jabatan: 'Koordinator', divisi: 'sosial', inisial: 'AR' },
  // { nama: 'Yuni Kartika', jabatan: 'Ketua Divisi', divisi: 'kewirausahaan', inisial: 'YK' },
  // { nama: 'Bagas Surya', jabatan: 'Anggota', divisi: 'kewirausahaan', inisial: 'BA' },
];

function filterPengurus(div, el) {
  document.querySelectorAll('.ptab').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
  const filtered = div === 'all' ? pengurusData : pengurusData.filter(p => p.divisi === div);
  renderPengurus(filtered);
}

function renderPengurus(data) {
  const grid = document.getElementById('pengurus-grid');
  grid.innerHTML = data.map(p => `
    <div class="pengurus-card">
      <div class="pengurus-avatar">${p.inisial}</div>
      <div class="pengurus-name">${p.nama}</div>
      <div class="pengurus-role">${p.jabatan}</div>
      <span class="pengurus-badge">${p.divisi.charAt(0).toUpperCase() + p.divisi.slice(1)}</span>
    </div>
  `).join('');
}

renderPengurus(pengurusData);

// ─── HEADER SCROLL ───
const header = document.getElementById('main-header');
const scrollTop = document.getElementById('scrollTop');

window.addEventListener('scroll', () => {
  header.classList.toggle('scrolled', window.scrollY > 20);
  scrollTop.classList.toggle('visible', window.scrollY > 400);

  // Active nav link
  document.querySelectorAll('section[id]').forEach(sec => {
    const top = sec.offsetTop - 100;
    const bottom = top + sec.offsetHeight;
    if (window.scrollY >= top && window.scrollY < bottom) {
      document.querySelectorAll('.nav-links a').forEach(a => {
        a.classList.remove('active');
        if (a.getAttribute('href') === '#' + sec.id) a.classList.add('active');
      });
    }
  });
});

// ─── HAMBURGER ───
const hamburger = document.getElementById('hamburger');
const mobileNav = document.getElementById('mobile-nav');
let mobileOpen = false;

hamburger.addEventListener('click', () => {
  mobileOpen = !mobileOpen;
  mobileNav.classList.toggle('open', mobileOpen);
  hamburger.querySelectorAll('span')[0].style.transform = mobileOpen ? 'translateY(7px) rotate(45deg)' : '';
  hamburger.querySelectorAll('span')[1].style.opacity = mobileOpen ? '0' : '1';
  hamburger.querySelectorAll('span')[2].style.transform = mobileOpen ? 'translateY(-7px) rotate(-45deg)' : '';
});

function closeMobileNav() {
  mobileOpen = false;
  mobileNav.classList.remove('open');
  hamburger.querySelectorAll('span').forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
}

// ─── FADE IN OBSERVER ───
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.classList.add('visible');
      observer.unobserve(e.target);
    }
  });
}, { threshold: 0.12 });

document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

// ─── TOAST ───
let toastTimer;
function showToast(msg) {
  const t = document.getElementById('toast');
  if (!t) return;
  t.textContent = msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 3000);
}

const galleryItems = document.querySelectorAll('.gallery-item');

galleryItems.forEach(item => {

  item.addEventListener('click', () => {

    // tutup semua card lain
    galleryItems.forEach(el => {
      if(el !== item){
        el.classList.remove('active');
      }
    });

    // toggle current
    item.classList.toggle('active');

  });

});

// ─── RESOURCE DROPDOWN ───

const resourceDropdowns = document.querySelectorAll('.resource-dropdown-item');

resourceDropdowns.forEach(item => {

  const btn = item.querySelector('.resource-dropdown-btn');

  btn.addEventListener('click', () => {

    item.classList.toggle('active');

  });

});