// ─── HISTORI TIM PENGURUS ───
document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on the histori page
    const cardsWrap = document.getElementById('cardsWrap');
    if (!cardsWrap) return;

    // Get the localized data from WordPress
    const periods = typeof historiData !== 'undefined' ? historiData.periods : {};
    const tabsConfig = typeof historiData !== 'undefined' && historiData.tabsConfig ? historiData.tabsConfig : [
        { key: 'semua', label: 'Semua' },
        { key: 'inti', label: 'Pengurus Inti' },
        { key: 'humas', label: 'Divisi Humas' },
        { key: 'minat', label: 'Divisi Minat dan Bakat' }
    ];

    const groupMeta = typeof historiData !== 'undefined' && historiData.groupMeta ? historiData.groupMeta : {
        inti:  { name: 'Pimpinan', dot: '#6B1010' },
        humas: { name: 'Divisi Humas', dot: '#c65a24' },
        minat: { name: 'Divisi Minat dan Bakat', dot: '#0f6e56' }
    };

    const periodPicker = document.getElementById('periodPicker');
    const periodTitle = document.getElementById('periodTitle');
    const currentPeriodSpan = document.getElementById('currentPeriod');
    const tabsWrap = document.getElementById('tabs');
    const overlay = document.getElementById('overlay');
    const modal = document.getElementById('modal');

    let activePeriod = Object.keys(periods)[0] || '2025/2026';
    let activeTab = 'semua';

    // Initialize period picker
    if (periodPicker) {
        Object.keys(periods).forEach(key => {
            const opt = document.createElement('option');
            opt.value = key;
            opt.textContent = 'Periode ' + key;
            periodPicker.appendChild(opt);
        });
        periodPicker.value = activePeriod;
        if (currentPeriodSpan) currentPeriodSpan.textContent = activePeriod;
        periodPicker.addEventListener('change', function() {
            activePeriod = this.value;
            if (periodTitle) periodTitle.textContent = 'Periode ' + activePeriod;
            if (currentPeriodSpan) currentPeriodSpan.textContent = activePeriod;
            render();
        });
    }

    function renderTabs() {
        if (!tabsWrap) return;
        tabsWrap.innerHTML = '';
        tabsConfig.forEach(t => {
            const btn = document.createElement('button');
            btn.className = 'histori-tab' + (t.key === activeTab ? ' active' : '');
            btn.type = 'button';
            btn.textContent = t.label;
            btn.addEventListener('click', function() {
                activeTab = t.key;
                renderTabs();
                renderCards();
            });
            tabsWrap.appendChild(btn);
        });
    }

    function renderCards() {
        if (!cardsWrap) return;
        cardsWrap.innerHTML = '';
        const people = periods[activePeriod] || [];

        if (!people.length) {
            cardsWrap.innerHTML = '<div class="histori-empty">Belum ada data pengurus untuk periode ini.</div>';
            return;
        }

        if (activeTab !== 'semua') {
            appendGroup(activeTab, people.filter(p => p.kategori === activeTab));
            return;
        }

        Object.keys(groupMeta).forEach(key => {
            const list = people.filter(p => p.kategori === key);
            if (list.length) appendGroup(key, list);
        });
    }

    function appendGroup(key, list) {
        const meta = groupMeta[key];
        const header = document.createElement('div');
        header.className = 'histori-group-header';
        header.innerHTML = `
            <span class="histori-group-dot" style="background:${meta.dot}"></span>
            <span class="histori-group-name">${meta.name}</span>
            <span class="histori-group-count">${list.length} orang</span>
        `;
        cardsWrap.appendChild(header);

        const grid = document.createElement('div');
        grid.className = 'histori-grid';
        list.forEach(person => {
            const card = document.createElement('button');
            card.className = 'histori-card';
            card.type = 'button';
            card.setAttribute('aria-label', 'Lihat detail ' + person.nama);
            // Generate initials from name
            const initials = person.nama.split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
            // Use dynamic badge color from PHP if available
            const badgeStyle = `class="histori-badge ${person.kategori}"${person.badgeColor ? ` style="background:${person.badgeColor};color:#fff;"` : ''}`;
            card.innerHTML = `
                <div class="histori-avatar">${person.initials || initials}</div>
                <p class="histori-card-name">${person.nama}</p>
                <p class="histori-card-role">${person.jabatan}</p>
                <span ${badgeStyle}>${person.badgeLabel}</span>
            `;
            card.addEventListener('click', function() { openModal(person); });
            grid.appendChild(card);
        });
        cardsWrap.appendChild(grid);
    }

    function closeModal() {
        if (overlay) overlay.classList.remove('open');
    }
    if (overlay) {
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) closeModal();
        });
    }
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
    });

    function openModal(p) {
        if (!modal || !overlay) return;
        modal.innerHTML = `
            <div class="histori-modal-banner">
                <button class="histori-modal-close" aria-label="Tutup" id="closeBtn">&#10005;</button>
                <div class="histori-modal-person">
                    <div class="histori-modal-avatar">${p.initials}</div>
                    <div>
                        <p class="histori-modal-name">${p.nama}</p>
                        <p class="histori-modal-role">${p.jabatan}</p>
                    </div>
                </div>
            </div>
            <div class="histori-modal-body">
                <div class="histori-modal-row">
                    <span class="label"><span class="histori-icon-dot">#</span>NIM</span>
                    <span class="value">${p.nim || '-'}</span>
                </div>
                <div class="histori-modal-row">
                    <span class="label"><span class="histori-icon-dot">Y</span>Tahun angkatan</span>
                    <span class="value">${p.angkatan || '-'}</span>
                </div>
                <div class="histori-modal-row">
                    <span class="label"><span class="histori-icon-dot">J</span>Masa jabatan</span>
                    <span class="value">${p.masaJabatan || '-'}</span>
                </div>
                <div class="histori-modal-row">
                    <span class="label"><span class="histori-icon-dot">@</span>Email</span>
                    <span class="value link">${p.email || '-'}</span>
                </div>
                ${p.fileSk ? `
                <div class="histori-modal-row">
                    <span class="label"><span class="histori-icon-dot">📄</span>SK</span>
                    <span class="value link"><a href="${p.fileSk}" target="_blank" download>Download SK</a></span>
                </div>
                ` : ''}
            </div>
        `;
        overlay.classList.add('open');
        const closeBtn = document.getElementById('closeBtn');
        if (closeBtn) closeBtn.addEventListener('click', closeModal);
    }

    function render() { renderTabs(); renderCards(); }
    render();
});