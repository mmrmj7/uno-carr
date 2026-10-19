/**
 * ==============================================================================
 * ADMIN DASHBOARD ENGINE (Plans, Coupons & Live Order Tracking)
 * ==============================================================================
 */

const DEFAULT_COUPONS = [
  { code: 'VIP50', type: 'percent', value: 50, label: 'VIP Special 50% OFF', active: true },
  { code: 'DISCOUNT10', type: 'percent', value: 10, label: '10% Launch Discount', active: true },
  { code: 'EARLYBIRD', type: 'flat', value: 2000, label: '₹2,000 Flat Savings', active: true },
  { code: 'SOLAR25', type: 'percent', value: 25, label: '25% Solar & Vendor Discount', active: true }
];

const DEFAULT_PLANS = [
  {
    id: "basic",
    name: "Basic Starter",
    price: 4999,
    billing: "/ one-time",
    badge: "Starter",
    isFeatured: false,
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
    isFeatured: false,
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
    isFeatured: false,
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

let appData = {
  plans: JSON.parse(JSON.stringify(DEFAULT_PLANS)),
  coupons: JSON.parse(JSON.stringify(DEFAULT_COUPONS)),
  orders: []
};

document.addEventListener('DOMContentLoaded', () => {
  checkAuth();
  initLucide();
});

function initLucide() {
  if (window.lucide) {
    window.lucide.createIcons();
  }
}

/**
 * Authentication
 */
function checkAuth() {
  const isAuth = sessionStorage.getItem('admin_authenticated');
  const loginScreen = document.getElementById('loginScreen');
  const dashboard = document.getElementById('adminDashboard');

  if (isAuth === 'true') {
    loginScreen.classList.add('hidden');
    dashboard.classList.remove('hidden');
    loadData();
  } else {
    loginScreen.classList.remove('hidden');
    dashboard.classList.add('hidden');
  }
}

function handleAdminLogin(e) {
  e.preventDefault();
  const pass = document.getElementById('adminPasswordInput').value.trim();
  if (pass === 'admin123') {
    sessionStorage.setItem('admin_authenticated', 'true');
    checkAuth();
  } else {
    alert('Invalid Password. Default is: admin123');
  }
}

function handleAdminLogout() {
  sessionStorage.removeItem('admin_authenticated');
  checkAuth();
}

/**
 * Tab Switching
 */
function switchAdminTab(tabKey) {
  const tabs = ['plans', 'coupons', 'orders'];
  tabs.forEach(t => {
    const btn = document.getElementById(`tabBtn-${t}`);
    const content = document.getElementById(`tabContent-${t}`);
    if (t === tabKey) {
      btn.className = 'flex-1 min-w-[150px] py-3 px-4 rounded-xl font-black text-xs uppercase tracking-wider flex items-center justify-center space-x-2 bg-brandOrange text-white border-2 border-ink shadow-[2px_2px_0px_#141414] transition-all';
      content.classList.remove('hidden');
    } else {
      btn.className = 'flex-1 min-w-[150px] py-3 px-4 rounded-xl font-black text-xs uppercase tracking-wider flex items-center justify-center space-x-2 text-ink hover:bg-cream border-2 border-transparent transition-all';
      content.classList.add('hidden');
    }
  });
  initLucide();
}

/**
 * Data Loading
 */
async function loadData() {
  let loaded = false;

  // 1. Try XAMPP api.php
  try {
    const res = await fetch('api.php');
    if (res.ok) {
      const json = await res.json();
      if (json && json.plans && json.plans.length > 0) {
        appData.plans = json.plans;
      }
      if (json && json.coupons && json.coupons.length > 0) {
        appData.coupons = json.coupons;
      }
      if (json && json.orders && json.orders.length > 0) {
        appData.orders = json.orders;
      }
      loaded = true;
    }
  } catch (err) {}

  // 2. Check localStorage
  if (!loaded) {
    const saved = localStorage.getItem('agency_site_data');
    if (saved) {
      try {
        const parsed = JSON.parse(saved);
        if (parsed.plans && parsed.plans.length > 0) {
          appData.plans = parsed.plans;
        }
        if (parsed.coupons && parsed.coupons.length > 0) {
          appData.coupons = parsed.coupons;
        }
        if (parsed.orders && parsed.orders.length > 0) {
          appData.orders = parsed.orders;
        }
        loaded = true;
      } catch (e) {}
    }
  }

  // 3. Fallback to data.json
  if (!loaded) {
    try {
      const res2 = await fetch('data.json');
      if (res2.ok) {
        const json2 = await res2.json();
        if (json2.plans && json2.plans.length > 0) appData.plans = json2.plans;
        if (json2.coupons && json2.coupons.length > 0) appData.coupons = json2.coupons;
        if (json2.orders && json2.orders.length > 0) appData.orders = json2.orders;
        loaded = true;
      }
    } catch (e) {}
  }

  // Ensure default plans are populated if empty
  if (!appData.plans || appData.plans.length === 0) {
    appData.plans = JSON.parse(JSON.stringify(DEFAULT_PLANS));
  }

  // Ensure VIP50 and default coupons exist
  ensureDefaultCoupons();

  // Ensure default demo order if none
  if (!appData.orders || appData.orders.length === 0) {
    appData.orders = [
      {
        orderId: 'ORD-89421',
        trackingPassword: 'PASS-4921',
        clientName: 'Ramesh Patel',
        phone: '+91 98765 43210',
        business: 'Patel Solar Solutions',
        email: 'ramesh@patelsolar.com',
        planName: 'Pro Business Suite',
        amountPaid: 8499.50,
        date: '19 Oct 2026',
        stage: 3,
        statusNote: 'Solar quotation calculator & digital letterhead integrated. Generating 4K AI video ads.'
      }
    ];
  }

  localStorage.setItem('agency_site_data', JSON.stringify(appData));
  renderPlans();
  renderCoupons();
  renderOrders();
}

function ensureDefaultCoupons() {
  if (!appData.coupons || !Array.isArray(appData.coupons)) {
    appData.coupons = [];
  }
  DEFAULT_COUPONS.forEach(def => {
    const existing = appData.coupons.find(c => c.code.toUpperCase() === def.code.toUpperCase());
    if (!existing) {
      appData.coupons.unshift(JSON.parse(JSON.stringify(def)));
    }
  });
}

/**
 * ==============================================================================
 * 1. PLANS MANAGEMENT
 * ==============================================================================
 */
function renderPlans() {
  const container = document.getElementById('plansListContainer');
  if (!container) return;

  container.innerHTML = appData.plans.map((p, idx) => `
    <div class="studio-card p-6 rounded-3xl space-y-4 relative flex flex-col justify-between">
      <div class="space-y-3">
        <div class="flex justify-between items-center">
          <span class="text-[10px] font-black uppercase text-brandOrange">Plan #${idx + 1}</span>
          <div class="flex items-center gap-2">
            <input type="text" id="planBadge_${idx}" value="${p.badge || ''}" placeholder="Badge text" class="text-[10px] font-black uppercase px-2 py-0.5 rounded bg-sunYellow border border-ink w-28 text-right outline-none">
            <button onclick="deletePlan(${idx})" class="text-rose-600 text-xs font-bold hover:underline" title="Delete Plan">✕</button>
          </div>
        </div>

        <div>
          <label class="block text-[11px] font-black uppercase text-ink mb-1">Plan Name</label>
          <input type="text" id="planName_${idx}" value="${p.name}" class="w-full px-3 py-2 rounded-xl border-2 border-ink bg-cream font-bold text-sm outline-none">
        </div>

        <div>
          <label class="block text-[11px] font-black uppercase text-ink mb-1">Price (₹ INR)</label>
          <input type="number" id="planPrice_${idx}" value="${p.price}" class="w-full px-3 py-2 rounded-xl border-2 border-ink bg-cream font-black text-lg text-brandOrange outline-none">
        </div>

        <div>
          <label class="block text-[11px] font-black uppercase text-ink mb-1">Description</label>
          <textarea id="planDesc_${idx}" rows="2" class="w-full px-3 py-2 rounded-xl border-2 border-ink bg-cream text-xs font-medium outline-none">${p.description}</textarea>
        </div>

        <div>
          <label class="block text-[11px] font-black uppercase text-ink mb-1">Features (One per line)</label>
          <textarea id="planFeatures_${idx}" rows="4" class="w-full px-3 py-2 rounded-xl border-2 border-ink bg-cream text-xs font-semibold outline-none leading-relaxed">${(p.features || []).join('\n')}</textarea>
        </div>
      </div>

      <div class="pt-2 flex justify-between items-center text-xs">
        <label class="flex items-center space-x-1 cursor-pointer">
          <input type="checkbox" id="planFeatured_${idx}" ${p.isFeatured ? 'checked' : ''} class="w-4 h-4 accent-brandOrange">
          <span class="text-[11px] font-bold text-ink">Mark as Featured</span>
        </label>
        <span class="text-[10px] text-trustGreen font-bold">● Active on site</span>
      </div>
    </div>
  `).join('');

  initLucide();
}

function addNewBlankPlan() {
  appData.plans.push({
    id: 'custom-' + Date.now(),
    name: 'Custom New Package',
    price: 12999,
    billing: '/ one-time',
    badge: 'NEW',
    isFeatured: false,
    description: 'Custom tailored solution for expanding business needs.',
    features: [
      'Custom Responsive Website',
      'Logo & Brand Identity Kit',
      'Online Quotation Calculator',
      'PhonePe UPI Integration'
    ]
  });
  renderPlans();
}

function deletePlan(idx) {
  if (confirm(`Delete plan "${appData.plans[idx].name}"?`)) {
    appData.plans.splice(idx, 1);
    renderPlans();
    savePlansToBackend();
  }
}

async function savePlansToBackend() {
  appData.plans.forEach((p, idx) => {
    p.name = document.getElementById(`planName_${idx}`).value.trim();
    p.price = parseInt(document.getElementById(`planPrice_${idx}`).value, 10) || 0;
    p.badge = document.getElementById(`planBadge_${idx}`).value.trim();
    p.description = document.getElementById(`planDesc_${idx}`).value.trim();
    p.isFeatured = document.getElementById(`planFeatured_${idx}`).checked;
    const featText = document.getElementById(`planFeatures_${idx}`).value;
    p.features = featText.split('\n').map(f => f.trim()).filter(Boolean);
  });

  localStorage.setItem('agency_site_data', JSON.stringify(appData));

  try {
    await fetch('api.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ action: 'save_plans', plans: appData.plans })
    });
  } catch (err) {}

  alert('✅ Plans updated! Any edits will now appear on index.html and checkout.html immediately.');
}

/**
 * ==============================================================================
 * 2. COUPONS MANAGEMENT (Guaranteed to show VIP50)
 * ==============================================================================
 */
function renderCoupons() {
  const tbody = document.getElementById('couponsTableBody');
  if (!tbody) return;

  ensureDefaultCoupons();

  tbody.innerHTML = appData.coupons.map((c, idx) => `
    <tr class="hover:bg-paper/60 transition-colors">
      <td class="py-3 px-4 font-mono font-black text-brandOrange">${c.code}</td>
      <td class="py-3 px-4 uppercase text-[11px] font-bold">${c.type === 'percent' ? 'Percentage (%)' : 'Flat (₹)'}</td>
      <td class="py-3 px-4 font-black">${c.type === 'percent' ? c.value + '%' : '₹' + c.value.toLocaleString('en-IN')}</td>
      <td class="py-3 px-4 font-medium text-xs">${c.label}</td>
      <td class="py-3 px-4">
        <span class="px-2 py-0.5 rounded-full text-[10px] font-black uppercase ${c.active ? 'bg-trustGreen text-white' : 'bg-slate-300 text-slate-700'}">
          ${c.active ? 'Active' : 'Inactive'}
        </span>
      </td>
      <td class="py-3 px-4 text-right space-x-2">
        <button onclick="toggleCouponActive(${idx})" class="text-[11px] font-bold underline text-trustGreen">
          ${c.active ? 'Deactivate' : 'Activate'}
        </button>
        <button onclick="deleteCoupon(${idx})" class="text-[11px] font-bold underline text-rose-600 ml-2">
          Delete
        </button>
      </td>
    </tr>
  `).join('');
}

function openNewCouponModal() {
  const modal = document.getElementById('couponModal');
  modal.classList.remove('hidden');
  setTimeout(() => modal.classList.remove('opacity-0'), 10);
  initLucide();
}

function closeNewCouponModal() {
  const modal = document.getElementById('couponModal');
  modal.classList.add('opacity-0');
  setTimeout(() => modal.classList.add('hidden'), 200);
}

async function handleCreateCoupon(e) {
  e.preventDefault();
  const code = document.getElementById('couponCodeInput').value.trim().toUpperCase();
  const type = document.getElementById('couponTypeInput').value;
  const value = parseInt(document.getElementById('couponValueInput').value, 10) || 10;
  const label = document.getElementById('couponLabelInput').value.trim();

  if (appData.coupons.some(c => c.code === code)) {
    alert(`Coupon ${code} already exists!`);
    return;
  }

  appData.coupons.push({ code, type, value, label, active: true });
  closeNewCouponModal();
  e.target.reset();
  renderCoupons();
  await persistCoupons();
  alert(`✅ Coupon ${code} created and live!`);
}

async function toggleCouponActive(idx) {
  appData.coupons[idx].active = !appData.coupons[idx].active;
  renderCoupons();
  await persistCoupons();
}

async function deleteCoupon(idx) {
  if (confirm(`Delete coupon "${appData.coupons[idx].code}"?`)) {
    appData.coupons.splice(idx, 1);
    renderCoupons();
    await persistCoupons();
  }
}

async function persistCoupons() {
  localStorage.setItem('agency_site_data', JSON.stringify(appData));
  try {
    await fetch('api.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ action: 'save_coupons', coupons: appData.coupons })
    });
  } catch (err) {}
}

/**
 * ==============================================================================
 * 3. CUSTOMER ORDERS & DELIVERY MILESTONE TRACKER
 * ==============================================================================
 */
function renderOrders() {
  const container = document.getElementById('ordersContainer');
  if (!container) return;

  if (!appData.orders || appData.orders.length === 0) {
    container.innerHTML = `<div class="p-8 text-center text-xs text-ink/70 font-semibold bg-paper rounded-2xl border-2 border-ink">No customer orders recorded yet. As clients check out, their orders and tracking passwords appear here!</div>`;
    return;
  }

  container.innerHTML = appData.orders.map((ord, idx) => `
    <div class="studio-card p-6 sm:p-7 rounded-3xl space-y-4">
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pb-4 border-b-2 border-ink/10 gap-2">
        <div>
          <span class="text-[10px] font-black uppercase text-brandOrange">ORDER ${ord.orderId}</span>
          <h3 class="text-xl font-black font-display text-ink">${ord.business || 'Business Client'} (${ord.clientName})</h3>
          <div class="text-xs text-ink/70 font-medium">WhatsApp: <a href="https://wa.me/${(ord.phone || '').replace(/[^0-9]/g, '')}" target="_blank" class="text-trustGreen font-bold underline">${ord.phone}</a> | Email: ${ord.email}</div>
        </div>
        <div class="text-right">
          <div class="text-xs font-mono font-black text-ink">Paid: ₹${(ord.amountPaid || 0).toLocaleString('en-IN')}</div>
          <div class="inline-block px-2.5 py-1 bg-sunYellow border border-ink text-ink text-[11px] font-mono font-black rounded mt-1">
            Tracking Password: ${ord.trackingPassword || 'PASS-1234'}
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-end">
        <div class="sm:col-span-5">
          <label class="block text-xs font-black uppercase text-ink mb-1">Delivery Milestone Stage:</label>
          <select id="orderStage_${idx}" class="w-full px-3.5 py-2.5 rounded-xl border-2 border-ink bg-cream text-xs font-bold outline-none">
            <option value="1" ${ord.stage == 1 ? 'selected' : ''}>Stage 1: Brief Received & Requirements Logged</option>
            <option value="2" ${ord.stage == 2 ? 'selected' : ''}>Stage 2: UI Wireframe & Brand Design</option>
            <option value="3" ${ord.stage == 3 ? 'selected' : ''}>Stage 3: Quotation & Tool Integration</option>
            <option value="4" ${ord.stage == 4 ? 'selected' : ''}>Stage 4: 4K AI Video Advertisements</option>
            <option value="5" ${ord.stage == 5 ? 'selected' : ''}>Stage 5: Live Domain Launch & Handover (Complete)</option>
          </select>
        </div>

        <div class="sm:col-span-5">
          <label class="block text-xs font-black uppercase text-ink mb-1">Developer Status Note (Visible to Client in Tracker):</label>
          <input type="text" id="orderNote_${idx}" value="${ord.statusNote || ''}" placeholder="e.g. Quotation tool completed, generating AI video ads..." class="w-full px-3.5 py-2.5 rounded-xl border-2 border-ink bg-cream text-xs font-semibold outline-none">
        </div>

        <div class="sm:col-span-2">
          <button onclick="updateSingleOrder(${idx})" class="w-full py-2.5 btn-primary-orange rounded-xl text-xs font-black uppercase tracking-wider flex items-center justify-center space-x-1">
            <i data-lucide="check" class="w-3.5 h-3.5"></i>
            <span>Update</span>
          </button>
        </div>
      </div>
    </div>
  `).join('');

  initLucide();
}

async function updateSingleOrder(idx) {
  const ord = appData.orders[idx];
  if (!ord) return;

  const stageSelect = document.getElementById(`orderStage_${idx}`);
  const noteInput = document.getElementById(`orderNote_${idx}`);
  if (stageSelect) ord.stage = parseInt(stageSelect.value, 10);
  if (noteInput) ord.statusNote = noteInput.value.trim();

  localStorage.setItem('agency_site_data', JSON.stringify(appData));

  try {
    await fetch('api.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ 
        action: 'update_order_stage', 
        orderId: ord.orderId,
        stage: ord.stage,
        statusNote: ord.statusNote
      })
    });
  } catch (e) {}

  alert(`✅ Order ${ord.orderId} updated to Stage ${ord.stage}! Client can see this live at track.html.`);
}

async function saveOrdersToBackend() {
  if (!appData.orders) return;

  appData.orders.forEach((ord, idx) => {
    const stageSelect = document.getElementById(`orderStage_${idx}`);
    const noteInput = document.getElementById(`orderNote_${idx}`);
    if (stageSelect) ord.stage = parseInt(stageSelect.value, 10);
    if (noteInput) ord.statusNote = noteInput.value.trim();
  });

  localStorage.setItem('agency_site_data', JSON.stringify(appData));

  try {
    await fetch('api.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ action: 'update_all', data: appData })
    });
  } catch (e) {}

  alert('✅ Order milestone stages and notes saved! Clients can now see updated progress at track.html.');
}
