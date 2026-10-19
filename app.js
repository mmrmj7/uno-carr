/**
 * ==============================================================================
 * CENTRAL STUDIO JAVASCRIPT LOGIC
 * ==============================================================================
 */

const HERO_ANIMATED_TEXTS = [
  "automate your business.",
  "replace messy Excel quotes.",
  "close deals with video ads.",
  "10x your client inquiries."
];

let currentHeroTextIdx = 0;

document.addEventListener('DOMContentLoaded', () => {
  initCustomCursor();
  initLucideIcons();
  initHeroTextAnimation();
  loadLivePlans();
});

function initLucideIcons() {
  if (window.lucide) {
    window.lucide.createIcons();
  }
}

/**
 * Animated Headline Rotator
 */
function initHeroTextAnimation() {
  const el = document.getElementById('animatedHeroText');
  if (!el) return;

  setInterval(() => {
    currentHeroTextIdx = (currentHeroTextIdx + 1) % HERO_ANIMATED_TEXTS.length;
    el.style.opacity = '0';
    el.style.transform = 'translateY(8px)';
    
    setTimeout(() => {
      el.textContent = HERO_ANIMATED_TEXTS[currentHeroTextIdx];
      el.style.opacity = '1';
      el.style.transform = 'translateY(0)';
    }, 250);
  }, 3200);
}

/**
 * Custom Cursor Tracking
 */
function initCustomCursor() {
  const dot = document.getElementById('cursorDot');
  const ring = document.getElementById('cursorRing');
  if (!dot || !ring) return;

  let mouseX = 0, mouseY = 0;
  let ringX = 0, ringY = 0;

  window.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    dot.style.left = `${mouseX}px`;
    dot.style.top = `${mouseY}px`;
  });

  function renderRing() {
    ringX += (mouseX - ringX) * 0.2;
    ringY += (mouseY - ringY) * 0.2;
    ring.style.left = `${ringX}px`;
    ring.style.top = `${ringY}px`;
    requestAnimationFrame(renderRing);
  }
  renderRing();

  const hoverables = document.querySelectorAll('a, button, input, select, textarea, .studio-card, .studio-card-green');
  hoverables.forEach(el => {
    el.addEventListener('mouseenter', () => document.body.classList.add('cursor-hover'));
    el.addEventListener('mouseleave', () => document.body.classList.remove('cursor-hover'));
  });
}

/**
 * Mobile Navigation Drawer Toggle
 */
function toggleMobileMenu() {
  const menu = document.getElementById('mobileMenu');
  if (menu) menu.classList.toggle('hidden');
}
document.getElementById('mobileMenuBtn')?.addEventListener('click', toggleMobileMenu);

const DEFAULT_PLANS = [
  {
    id: "basic",
    name: "Basic Starter",
    price: 4999,
    billing: "/ one-time",
    badge: "Starter",
    description: "For small local services needing a fast, professional online presence.",
    features: [
      "Clean Responsive Website",
      "Custom Logo & Brand Palette",
      "1 Promotional AI Short Video",
      "Direct WhatsApp Instant Button",
      "5–7 Days Fast Delivery"
    ]
  },
  {
    id: "growth",
    name: "Growth Business",
    price: 9999,
    billing: "/ one-time",
    badge: "Growth",
    description: "For growing businesses looking to capture leads and showcase their work.",
    features: [
      "Up to 5 Pages Multi-Section Website",
      "Complete Logo Suite & Social Icons",
      "2 AI Storytelling Promo Video Reels",
      "Digital Letterhead Generator Tool",
      "PhonePe Direct UPI Checkout"
    ]
  },
  {
    id: "pro",
    name: "Pro Business Suite",
    price: 16999,
    billing: "/ one-time",
    badge: "RECOMMENDED FOR VENDORS",
    isFeatured: true,
    description: "Full automation suite: Solar vendors, event organizers & service leaders.",
    features: [
      "Full Custom Business Website",
      "Logo Design & Complete Brand Kit",
      "Live Quotation Generator Tool",
      "Work Completion Certificate Maker",
      "Digital Letterhead System",
      "4 Cinematic AI Video Ads (Voice + 4K)",
      "PhonePe + UPI Gateway Integration"
    ]
  },
  {
    id: "enterprise",
    name: "Enterprise AI Automation",
    price: 29999,
    billing: "/ one-time",
    badge: "Enterprise",
    description: "Comprehensive web system with custom client portal & unlimited video pipeline.",
    features: [
      "Unlimited Pages & Custom Client Portal",
      "Full Brand Identity & Vector Logo Suite",
      "Quotation, Invoice & Certificate Engine",
      "8 Cinematic AI Video Advertisements",
      "WhatsApp Business API Auto-Responder"
    ]
  }
];

/**
 * Load Plans Dynamically (Syncs with Admin Dashboard & data.json)
 */
async function loadLivePlans() {
  const container = document.getElementById('livePlansContainer');
  if (!container) return;

  let plansData = null;

  // 1. Try local storage first (reflects any live admin edits)
  const cached = localStorage.getItem('agency_site_data');
  if (cached) {
    try {
      const parsed = JSON.parse(cached);
      if (parsed.plans && parsed.plans.length > 0) {
        plansData = parsed.plans;
      }
    } catch (e) {}
  }

  // 2. Fallback to API / data.json
  if (!plansData) {
    try {
      const res = await fetch('data.json');
      if (res.ok) {
        const json = await res.json();
        if (json.plans && json.plans.length > 0) {
          plansData = json.plans;
          localStorage.setItem('agency_site_data', JSON.stringify(json));
        }
      }
    } catch (e) {}
  }

  // 3. Fallback to DEFAULT_PLANS
  if (!plansData || plansData.length === 0) {
    plansData = DEFAULT_PLANS;
  }

  container.innerHTML = plansData.map(p => `
    <div class="${p.isFeatured ? 'studio-card-green lg:-translate-y-2' : 'studio-card'} rounded-3xl p-6 flex flex-col justify-between relative">
      ${p.isFeatured ? `
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-trustGreen text-white text-[10px] font-black uppercase tracking-wider border-2 border-ink shadow-[2px_2px_0px_#141414] whitespace-nowrap">
          ${p.badge || 'MOST POPULAR'}
        </div>
      ` : ''}

      <div>
        <span class="px-3 py-1 rounded-full ${p.isFeatured ? 'bg-sunYellow' : 'bg-paper'} border border-ink text-ink text-[11px] font-black uppercase inline-block">
          ${p.name}
        </span>

        <div class="my-4">
          <div class="flex items-baseline space-x-1">
            <span class="text-3xl font-black font-display text-ink">₹${p.price.toLocaleString('en-IN')}</span>
            <span class="text-xs text-ink/60 font-bold">${p.billing || '/ one-time'}</span>
          </div>
          <p class="text-xs text-ink/70 font-medium mt-1 leading-relaxed">${p.description}</p>
        </div>

        <div class="space-y-2.5 pt-4 border-t-2 border-ink/10 text-xs font-bold text-ink">
          ${p.features.map(f => `
            <div class="flex items-center space-x-2">
              <span class="${p.isFeatured ? 'text-trustGreen' : 'text-brandOrange'} font-black">✓</span>
              <span>${f}</span>
            </div>
          `).join('')}
        </div>
      </div>

      <div class="pt-6 mt-6 border-t-2 border-ink/10">
        <a href="checkout.html?plan=${encodeURIComponent(p.name)}&price=${p.price}" class="w-full py-3.5 rounded-xl ${p.isFeatured ? 'btn-primary-green' : 'btn-primary-orange'} font-black text-xs uppercase text-center block tracking-wider">
          CHOOSE ${p.name.split(' ')[0].toUpperCase()} &rarr;
        </a>
      </div>
    </div>
  `).join('');

  initLucideIcons();
}

/**
 * Fast Quote Submit Handler
 */
function handleQuickQuote(e) {
  e.preventDefault();
  const name = document.getElementById('quickName').value.trim();
  const phone = document.getElementById('quickPhone').value.trim();
  const type = document.getElementById('quickType').value;

  alert(`🚀 Thank you ${name}! We received your request for "${type}". A developer will call/WhatsApp you on ${phone} in < 2 hours.`);
  e.target.reset();

  if (window.confetti) {
    window.confetti({ particleCount: 50, spread: 60, origin: { y: 0.6 } });
  }
}

/**
 * Modals
 */
function openJoinTeamModal() {
  const modal = document.getElementById('joinTeamModal');
  modal.classList.remove('hidden');
  setTimeout(() => modal.classList.remove('opacity-0'), 10);
  initLucideIcons();
}

function closeJoinTeamModal() {
  const modal = document.getElementById('joinTeamModal');
  modal.classList.add('opacity-0');
  setTimeout(() => modal.classList.add('hidden'), 200);
}

function handleJoinTeamSubmit(e) {
  e.preventDefault();
  const name = document.getElementById('devName').value.trim();
  const role = document.getElementById('devRole').value;

  alert(`🎉 Awesome ${name}! We received your application for "${role}". Our engineering lead will review your details and reach out on WhatsApp!`);
  e.target.reset();
  closeJoinTeamModal();

  if (window.confetti) {
    window.confetti({ particleCount: 70, spread: 70, origin: { y: 0.5 } });
  }
}

function openStudioVideoModal() {
  const modal = document.getElementById('studioVideoModal');
  modal.classList.remove('hidden');
  setTimeout(() => modal.classList.remove('opacity-0'), 10);
  initLucideIcons();
}

function closeStudioVideoModal() {
  const modal = document.getElementById('studioVideoModal');
  modal.classList.add('opacity-0');
  setTimeout(() => modal.classList.add('hidden'), 200);
}

function openCaseStudyModal(title, category, description, metric1, metric2) {
  document.getElementById('caseTitle').textContent = title;
  document.getElementById('caseCategory').textContent = category;
  document.getElementById('caseDescription').textContent = description;
  document.getElementById('caseMetric1').textContent = metric1;
  document.getElementById('caseMetric2').textContent = metric2;

  const modal = document.getElementById('caseStudyModal');
  modal.classList.remove('hidden');
  setTimeout(() => modal.classList.remove('opacity-0'), 10);
  initLucideIcons();
}

function closeCaseStudyModal() {
  const modal = document.getElementById('caseStudyModal');
  modal.classList.add('opacity-0');
  setTimeout(() => modal.classList.add('hidden'), 200);
}
