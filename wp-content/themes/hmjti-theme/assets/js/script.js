// ─── DATA PENGURUS (from ACF via PHP localization) ───
// Fallback to hardcoded data if localization fails
const defaultPengurusData = [
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
];

const pengurusData = Array.isArray(window.pengurusData)
    ? window.pengurusData
    : (window.pengurusData && window.pengurusData.people ? window.pengurusData.people : defaultPengurusData);

function filterPengurus(div, el) {
  document.querySelectorAll('.ptab').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
  const filtered = div === 'all' ? pengurusData : pengurusData.filter(p => p.divisi === div);
  renderPengurus(filtered);
}

function renderPengurus(data) {
  const grid = document.getElementById('pengurus-grid');
  if (!grid) return;
  grid.innerHTML = data.map(p => `
    <div class="pengurus-card">
      <div class="pengurus-avatar">${p.inisial}</div>
      <div class="pengurus-name">${p.nama}</div>
      <div class="pengurus-role">${p.jabatan}</div>
      <span class="pengurus-badge ${p.divisi}">${p.divisi.charAt(0).toUpperCase()
 + p.divisi.slice(1)}</span>
    </div>
  `).join('');
}

if (document.getElementById('pengurus-grid')) {
  renderPengurus(pengurusData);
}

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

scrollTop.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
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

// ─── EVENT FILTER AJAX ───
(function() {
    const filterContainer = document.getElementById('event-filters');
    const gridContainer = document.getElementById('event-grid');
    const paginationContainer = document.getElementById('event-pagination');
    const emptyContainer = document.getElementById('event-empty');
    
    if (!filterContainer || !gridContainer) return;

    let currentFilter = 'all';
    let currentPage = 1;
    let isLoading = false;

    const filterButtons = filterContainer.querySelectorAll('.filter-btn');

    async function fetchEvents(filter, page) {
        if (isLoading) return;
        isLoading = true;
        
        gridContainer.style.opacity = '0.5';
        gridContainer.style.pointerEvents = 'none';

        try {
            const formData = new FormData();
            formData.append('action', 'filter_events');
            formData.append('filter', filter);
            formData.append('paged', page);

            const response = await fetch(hmjtiAjax.ajaxurl, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                gridContainer.innerHTML = data.data.html;
                paginationContainer.innerHTML = data.data.pagination;
                
                // Show/hide empty state
                if (emptyContainer) {
                    emptyContainer.style.display = data.data.html.includes('archive-event-empty') ? 'block' : 'none';
                }
                
                            } else {
                console.error('Filter error:', data.data);
            }
        } catch (error) {
            console.error('Fetch error:', error);
        } finally {
            isLoading = false;
            gridContainer.style.opacity = '1';
            gridContainer.style.pointerEvents = 'auto';
        }
    }

    function setActiveButton(btn) {
        filterButtons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    }

    function handlePaginationClick(e) {
        const link = e.target.closest('.page-numbers');
        if (!link) return;
        
        e.preventDefault();
        
        // Extract page number from href
        const href = link.getAttribute('href');
        if (!href) return;
        
        const url = new URL(href, window.location.origin);
        const page = parseInt(url.searchParams.get('paged')) || 1;
        
        if (page !== currentPage) {
            currentPage = page;
            fetchEvents(currentFilter, currentPage);
            
            // Scroll to top of grid
            gridContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    // Filter button clicks
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;
            if (filter !== currentFilter) {
                currentFilter = filter;
                currentPage = 1;
                setActiveButton(btn);
                fetchEvents(currentFilter, currentPage);
            }
        });
    });

    // Pagination clicks (event delegation)
    paginationContainer.addEventListener('click', handlePaginationClick);
})();