/* ===================================================
   app.js — Sistem Aduan Jamaah
   Shared logic: navbar, sidebar, forms, utilities
   =================================================== */

document.addEventListener('DOMContentLoaded', () => {
  initNavbar();
  initCounterAnimation();
});

/* ---------- Navbar Scroll Effect ---------- */
function initNavbar() {
  const navbar = document.querySelector('.navbar');
  if (!navbar) return;
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 10);
  });
}

/* ---------- Mobile Menu Toggle ---------- */
function toggleMobileMenu() {
  const menu = document.getElementById('mobileMenu');
  const overlay = document.getElementById('mobileOverlay');
  if (!menu) return;
  const isOpen = menu.classList.contains('open');
  if (isOpen) {
    menu.classList.remove('open');
    if (overlay) overlay.classList.add('hidden');
    document.body.style.overflow = '';
  } else {
    menu.classList.add('open');
    if (overlay) overlay.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
}

/* ---------- Admin Sidebar Toggle ---------- */
function toggleSidebar() {
  const sidebar = document.getElementById('adminSidebar');
  const overlay = document.getElementById('sidebarOverlay');
  if (!sidebar) return;
  const isOpen = sidebar.classList.contains('open');
  if (isOpen) {
    sidebar.classList.remove('open');
    if (overlay) overlay.classList.add('hidden');
    document.body.style.overflow = '';
  } else {
    sidebar.classList.add('open');
    if (overlay) overlay.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
}

/* ---------- Counter Animation ---------- */
function initCounterAnimation() {
  const counters = document.querySelectorAll('[data-count]');
  if (counters.length === 0) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.3 });

  counters.forEach(counter => observer.observe(counter));
}

function animateCounter(el) {
  const target = parseInt(el.getAttribute('data-count'));
  const suffix = el.getAttribute('data-suffix') || '';
  const duration = 1500;
  const start = performance.now();

  function update(now) {
    const progress = Math.min((now - start) / duration, 1);
    const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
    const current = Math.floor(eased * target);
    el.textContent = current + suffix;
    if (progress < 1) requestAnimationFrame(update);
    else el.textContent = target + suffix;
  }
  requestAnimationFrame(update);
}

/* ---------- Toast Notification ---------- */
function showToast(message, type = 'success') {
  let container = document.querySelector('.toast-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'toast-container';
    document.body.appendChild(container);
  }

  const icons = {
    success: '<i class="fas fa-check-circle" style="color:#10B981;font-size:1.25rem"></i>',
    error: '<i class="fas fa-exclamation-circle" style="color:#EF4444;font-size:1.25rem"></i>',
    info: '<i class="fas fa-info-circle" style="color:#3B82F6;font-size:1.25rem"></i>'
  };

  const toast = document.createElement('div');
  toast.className = 'toast';
  toast.style.borderLeftColor = type === 'error' ? '#EF4444' : type === 'info' ? '#3B82F6' : '#10B981';
  toast.innerHTML = `
    ${icons[type] || icons.success}
    <span style="flex:1;font-size:0.9375rem;font-weight:500;color:#1f2937">${message}</span>
    <button onclick="this.parentElement.remove()" style="background:none;border:none;color:#9CA3AF;cursor:pointer;padding:0.25rem"><i class="fas fa-times"></i></button>
  `;
  container.appendChild(toast);

  setTimeout(() => {
    toast.classList.add('toast-exit');
    setTimeout(() => toast.remove(), 300);
  }, 4000);
}

/* ---------- Copy to Clipboard ---------- */
function copyTicketCode(text) {
  navigator.clipboard.writeText(text).then(() => {
    showToast('Kode tiket berhasil disalin!', 'success');
  }).catch(() => {
    // Fallback
    const input = document.createElement('input');
    input.value = text;
    document.body.appendChild(input);
    input.select();
    document.execCommand('copy');
    document.body.removeChild(input);
    showToast('Kode tiket berhasil disalin!', 'success');
  });
}

/* ---------- Form: Toggle Anonim ---------- */
function toggleAnonim(isAnonim) {
  const nameGroup = document.getElementById('nameGroup');
  if (!nameGroup) return;
  if (isAnonim) {
    nameGroup.style.maxHeight = '0';
    nameGroup.style.opacity = '0';
    nameGroup.style.overflow = 'hidden';
    nameGroup.style.marginBottom = '0';
    nameGroup.querySelector('input')?.removeAttribute('required');
  } else {
    nameGroup.style.maxHeight = '200px';
    nameGroup.style.opacity = '1';
    nameGroup.style.overflow = 'visible';
    nameGroup.style.marginBottom = '';
    nameGroup.querySelector('input')?.setAttribute('required', '');
  }
}

/* ---------- Form: File Upload Preview ---------- */
function initFileUpload() {
  const zone = document.getElementById('uploadZone');
  const input = document.getElementById('fileInput');
  const preview = document.getElementById('filePreview');
  if (!zone || !input) return;

  zone.addEventListener('click', () => input.click());

  zone.addEventListener('dragover', (e) => {
    e.preventDefault();
    zone.classList.add('drag-over');
  });
  zone.addEventListener('dragleave', () => zone.classList.remove('drag-over'));
  zone.addEventListener('drop', (e) => {
    e.preventDefault();
    zone.classList.remove('drag-over');
    if (e.dataTransfer.files.length) {
      input.files = e.dataTransfer.files;
      showFilePreview(e.dataTransfer.files[0]);
    }
  });

  input.addEventListener('change', () => {
    if (input.files.length) showFilePreview(input.files[0]);
  });

  function showFilePreview(file) {
    if (!preview) return;
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = (e) => {
        preview.innerHTML = `
          <div style="display:flex;align-items:center;gap:0.75rem;padding:0.75rem;background:#F9FAFB;border-radius:0.5rem;border:1px solid #E5E7EB">
            <img src="${e.target.result}" style="width:3rem;height:3rem;object-fit:cover;border-radius:0.375rem" />
            <div style="flex:1;min-width:0">
              <p style="font-size:0.875rem;font-weight:600;color:#1f2937;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">${file.name}</p>
              <p style="font-size:0.75rem;color:#6B7280">${(file.size / 1024).toFixed(1)} KB</p>
            </div>
            <button type="button" onclick="clearUpload()" style="background:none;border:none;color:#EF4444;cursor:pointer;font-size:1.125rem"><i class="fas fa-trash-alt"></i></button>
          </div>
        `;
      };
      reader.readAsDataURL(file);
    } else {
      preview.innerHTML = `<p style="color:#EF4444;font-size:0.875rem"><i class="fas fa-exclamation-triangle"></i> Hanya file gambar (JPG/PNG) yang diperbolehkan.</p>`;
      input.value = '';
    }
  }
}

function clearUpload() {
  const input = document.getElementById('fileInput');
  const preview = document.getElementById('filePreview');
  if (input) input.value = '';
  if (preview) preview.innerHTML = '';
}

/* ---------- Form Submit Simulation ---------- */
function handleSubmitAduan(e) {
  e.preventDefault();
  const btn = e.target.querySelector('button[type="submit"]');
  if (!btn) return;

  // Show loading
  const originalText = btn.innerHTML;
  btn.classList.add('btn-loading');
  btn.innerHTML = '<span>Mengirim...</span>';

  // Simulate submission
  setTimeout(() => {
    window.location.href = 'berhasil.html';
  }, 1500);
}

/* ---------- Lacak Form ---------- */
function handleLacakAduan(e) {
  e.preventDefault();
  const input = e.target.querySelector('input');
  if (!input || !input.value.trim()) {
    showToast('Silakan masukkan kode tiket', 'error');
    return;
  }
  window.location.href = 'detail.html?ticket=' + encodeURIComponent(input.value.trim());
}

/* ---------- Simple Bar Chart (CSS only data) ---------- */
function initBarChart() {
  const bars = document.querySelectorAll('[data-bar-height]');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.height = entry.target.getAttribute('data-bar-height');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });
  bars.forEach(bar => {
    bar.style.height = '0';
    bar.style.transition = 'height 0.8s ease-out';
    observer.observe(bar);
  });
}
