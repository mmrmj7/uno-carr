/**
 * ==============================================================================
 * CHECKOUT & PHONEPE PAYMENT ENGINE (Dynamic Sync with Admin Data)
 * ==============================================================================
 */

let appData = {
  plans: [],
  coupons: []
};

let checkoutState = {
  planName: 'Pro Business Suite',
  basePrice: 16999,
  discount: 0,
  finalPrice: 16999,
  couponCode: null,
  client: null
};

document.addEventListener('DOMContentLoaded', async () => {
  initCustomCursor();
  initLucide();
  await loadAppData();
  parseUrlParams();
  renderPlanSwitcher();
  renderPricing();
});

function initLucide() {
  if (window.lucide) {
    window.lucide.createIcons();
  }
}

const DEFAULT_PLANS = [
  { id: "basic", name: "Basic Starter", price: 4999 },
  { id: "growth", name: "Growth Business", price: 9999 },
  { id: "pro", name: "Pro Business Suite", price: 16999 },
  { id: "enterprise", name: "Enterprise AI Automation", price: 29999 }
];

const DEFAULT_COUPONS = [
  { code: 'VIP50', type: 'percent', value: 50, label: 'VIP Special 50% OFF', active: true },
  { code: 'DISCOUNT10', type: 'percent', value: 10, label: '10% Launch Discount', active: true },
  { code: 'EARLYBIRD', type: 'flat', value: 2000, label: '₹2,000 Flat Savings', active: true },
  { code: 'SOLAR25', type: 'percent', value: 25, label: '25% Solar & Vendor Discount', active: true }
];

/**
 * Load Plans & Coupons from LocalStorage / api.php / data.json
 */
async function loadAppData() {
  // 1. Try local storage
  const cached = localStorage.getItem('agency_site_data');
  if (cached) {
    try {
      const parsed = JSON.parse(cached);
      if (parsed.plans && parsed.plans.length > 0) {
        appData.plans = parsed.plans;
      }
      if (parsed.coupons && parsed.coupons.length > 0) {
        appData.coupons = parsed.coupons;
      }
      if (parsed.orders) {
        appData.orders = parsed.orders;
      }
    } catch (e) {}
  }

  // 2. Fallback to data.json
  if (!appData.plans || appData.plans.length === 0) {
    try {
      const res = await fetch('data.json');
      if (res.ok) {
        const json = await res.json();
        if (json.plans && json.plans.length > 0) appData.plans = json.plans;
        if (json.coupons && json.coupons.length > 0) appData.coupons = json.coupons;
        if (json.orders) appData.orders = json.orders;
      }
    } catch (e) {}
  }

  // 3. Fallback to hardcoded defaults
  if (!appData.plans || appData.plans.length === 0) {
    appData.plans = JSON.parse(JSON.stringify(DEFAULT_PLANS));
  }
  if (!appData.coupons || appData.coupons.length === 0) {
    appData.coupons = JSON.parse(JSON.stringify(DEFAULT_COUPONS));
  } else {
    // Ensure VIP50 is always in coupons
    DEFAULT_COUPONS.forEach(def => {
      if (!appData.coupons.some(c => c.code.toUpperCase() === def.code.toUpperCase())) {
        appData.coupons.unshift(def);
      }
    });
  }

  localStorage.setItem('agency_site_data', JSON.stringify(appData));
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
 * Render Plan Switcher Tabs Dynamically from Admin Data
 */
function renderPlanSwitcher() {
  const switcherContainer = document.getElementById('planSwitcherGrid');
  if (!switcherContainer || !appData.plans || appData.plans.length === 0) return;

  switcherContainer.innerHTML = appData.plans.map(p => `
    <button onclick="selectPlan('${p.name}', ${p.price})" class="plan-tab-btn p-2.5 rounded-xl border-2 ${p.name === checkoutState.planName ? 'border-brandOrange bg-brandOrange/10 font-black text-brandOrange' : 'border-ink bg-paper text-ink'} text-left font-bold" data-plan="${p.name}">
      <div class="text-[10px] uppercase opacity-70">${p.name}</div>
      <div class="font-black">₹${p.price.toLocaleString('en-IN')}</div>
    </button>
  `).join('');
}

/**
 * Parse URL Query Parameters
 */
function parseUrlParams() {
  const params = new URLSearchParams(window.location.search);
  const planParam = params.get('plan');
  const priceParam = params.get('price');

  if (planParam) {
    const matched = appData.plans.find(p => p.name.toLowerCase() === planParam.toLowerCase());
    const priceVal = matched ? matched.price : (parseInt(priceParam, 10) || 16999);
    selectPlan(planParam, priceVal);
  }
}

/**
 * Select Plan
 */
function selectPlan(name, price) {
  checkoutState.planName = name;
  checkoutState.basePrice = price;

  if (checkoutState.couponCode) {
    applyCouponDiscount(checkoutState.couponCode);
  } else {
    checkoutState.discount = 0;
    checkoutState.finalPrice = price;
  }

  // Update tabs UI
  document.querySelectorAll('.plan-tab-btn').forEach(btn => {
    if (btn.getAttribute('data-plan') === name) {
      btn.className = 'plan-tab-btn p-2.5 rounded-xl border-2 border-brandOrange bg-brandOrange/10 text-left font-black text-brandOrange';
    } else {
      btn.className = 'plan-tab-btn p-2.5 rounded-xl border-2 border-ink bg-paper hover:bg-white text-left font-bold text-ink';
    }
  });

  renderPricing();
}

function renderPricing() {
  document.getElementById('displayPlanTitle').textContent = checkoutState.planName;
  document.getElementById('priceBaseDisplay').textContent = '₹' + checkoutState.basePrice.toLocaleString('en-IN');
  document.getElementById('priceFinalDisplay').textContent = '₹' + checkoutState.finalPrice.toLocaleString('en-IN');

  const discountRow = document.getElementById('discountRow');
  const discountVal = document.getElementById('priceDiscountDisplay');

  if (checkoutState.discount > 0) {
    discountRow.style.display = 'flex';
    discountVal.textContent = '- ₹' + checkoutState.discount.toLocaleString('en-IN');
  } else {
    discountRow.style.display = 'none';
  }

  const phonepeAmt = document.getElementById('phonepeAmountDisplay');
  if (phonepeAmt) {
    phonepeAmt.textContent = '₹' + checkoutState.finalPrice.toLocaleString('en-IN');
  }
}

function quickApplyCoupon(code) {
  const input = document.getElementById('couponInput');
  if (input) {
    input.value = code;
    applyCoupon();
  }
}

function applyCoupon() {
  const input = document.getElementById('couponInput');
  const msgEl = document.getElementById('couponMessage');
  if (!input) return;

  const code = input.value.trim().toUpperCase();
  if (!code) {
    msgEl.textContent = 'Please enter a coupon code.';
    msgEl.className = 'text-xs mt-1.5 font-bold text-rose-600';
    msgEl.classList.remove('hidden');
    return;
  }

  const foundCoupon = appData.coupons.find(c => c.code.toUpperCase() === code && c.active);

  if (foundCoupon) {
    applyCouponDiscount(code);
    msgEl.textContent = `🎉 ${foundCoupon.label} applied! Saved ₹${checkoutState.discount.toLocaleString('en-IN')}`;
    msgEl.className = 'text-xs mt-1.5 font-bold text-trustGreen';
    msgEl.classList.remove('hidden');

    if (window.confetti) {
      window.confetti({ particleCount: 40, spread: 60, origin: { y: 0.6 } });
    }
    renderPricing();
  } else {
    msgEl.textContent = 'Invalid or expired coupon code. Try VIP50 or DISCOUNT10.';
    msgEl.className = 'text-xs mt-1.5 font-bold text-rose-600';
    msgEl.classList.remove('hidden');
  }
}

function applyCouponDiscount(code) {
  const coupon = appData.coupons.find(c => c.code.toUpperCase() === code && c.active);
  if (!coupon) return;

  let disc = 0;
  if (coupon.type === 'percent') {
    disc = (checkoutState.basePrice * coupon.value) / 100;
  } else if (coupon.type === 'flat') {
    disc = coupon.value;
  }
  disc = Math.min(disc, checkoutState.basePrice);
  checkoutState.discount = disc;
  checkoutState.finalPrice = checkoutState.basePrice - disc;
  checkoutState.couponCode = code;
}

function handleProceedToPayment(e) {
  e.preventDefault();

  const name = document.getElementById('custName').value.trim();
  const phone = document.getElementById('custPhone').value.trim();
  const business = document.getElementById('custBusiness').value.trim();
  const email = document.getElementById('custEmail').value.trim();
  const notes = document.getElementById('custNotes').value.trim();

  checkoutState.client = { name, phone, business, email, notes };

  openPhonePeModal();
}

function openPhonePeModal() {
  const modal = document.getElementById('phonepeModal');
  modal.classList.remove('hidden');
  setTimeout(() => {
    modal.classList.remove('opacity-0');
  }, 10);
  initLucide();
}

function closePhonePeModal() {
  const modal = document.getElementById('phonepeModal');
  modal.classList.add('opacity-0');
  setTimeout(() => {
    modal.classList.add('hidden');
  }, 200);
}

function handlePaymentApproved() {
  closePhonePeModal();

  const orderId = 'ORD-' + Math.floor(100000 + Math.random() * 900000);
  const trackingPassword = 'PASS-' + Math.floor(1000 + Math.random() * 9000);

  document.getElementById('confirmedOrderId').textContent = '#' + orderId;
  document.getElementById('confirmedTrackPassword').textContent = trackingPassword;
  document.getElementById('confirmedEmailDisplay').textContent = checkoutState.client.email;
  document.getElementById('confirmedPlanDisplay').textContent = checkoutState.planName;
  document.getElementById('confirmedBusinessDisplay').textContent = checkoutState.client.business + ` (${checkoutState.client.name})`;
  document.getElementById('confirmedAmountDisplay').textContent = '₹' + checkoutState.finalPrice.toLocaleString('en-IN');

  // Persist Order for Admin Panel & Client Tracking
  const newOrder = {
    orderId: orderId,
    trackingPassword: trackingPassword,
    clientName: checkoutState.client.name,
    phone: checkoutState.client.phone,
    business: checkoutState.client.business,
    email: checkoutState.client.email,
    planName: checkoutState.planName,
    amountPaid: checkoutState.finalPrice,
    date: new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' }),
    stage: 1,
    statusNote: 'Order approved! Our engineering team is reviewing your project requirements.'
  };

  if (!appData.orders) appData.orders = [];
  appData.orders.unshift(newOrder);
  localStorage.setItem('agency_site_data', JSON.stringify(appData));

  // Sync to XAMPP PHP backend
  try {
    fetch('api.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ action: 'add_order', order: newOrder })
    });
  } catch(e){}

  const trackBtn = document.getElementById('trackProjectBtn');
  if (trackBtn) {
    trackBtn.href = `track.html?orderId=${encodeURIComponent(orderId)}&pwd=${encodeURIComponent(trackingPassword)}`;
  }

  const confModal = document.getElementById('confirmedModal');
  confModal.classList.remove('hidden');
  setTimeout(() => {
    confModal.classList.remove('opacity-0');
  }, 10);

  if (window.confetti) {
    window.confetti({ particleCount: 100, spread: 75, origin: { y: 0.5 } });
  }

  initLucide();
}
