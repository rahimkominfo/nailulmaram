/* ===================================================
   aduan.js — Sistem Aduan Jamaah
   Fokus pada animasi dan interaksi konten aduan
   =================================================== */

document.addEventListener('DOMContentLoaded', () => {
  initCounterAnimation();
});

/* ---------- Counter Animation ---------- */
function initCounterAnimation() {
  const counters = document.querySelectorAll('.aduan-scope [data-count]');
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

/* ---------- Toast Notification (Jika diperlukan) ---------- */
function showAduanToast(message, type = 'success') {
  let container = document.querySelector('.toast-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'toast-container z-[100] fixed top-6 right-6 flex flex-col gap-2';
    document.body.appendChild(container);
  }

  const toast = document.createElement('div');
  toast.className = `p-4 rounded-xl shadow-2xl flex items-center gap-3 animate-fade-in-right bg-white border-l-4 ${
    type === 'error' ? 'border-red-500' : 'border-green-500'
  }`;
  
  toast.innerHTML = `
    <span class="text-sm font-medium text-gray-800">${message}</span>
  `;
  container.appendChild(toast);

  setTimeout(() => {
    toast.classList.add('opacity-0', 'transition-opacity', 'duration-300');
    setTimeout(() => toast.remove(), 300);
  }, 4000);
}
