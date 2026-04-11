@extends('layouts.master')

@php
$meta_title = "Eshan Buildwell – Building Estimate Calculator";
$meta_description = "Get a preliminary construction cost estimate for your residential or commercial project. Fill your details and calculate instantly.";
$keywords = "construction cost calculator, building estimate, residential construction cost, Eshan Buildwell calculator";
@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop

@section('content')
<section class="hero-banner"><div class="container"><div class="hero-content"><h1>Building Estimate Calculator</h1><div class="hero-divider"></div><p>Get an Instant Estimate for Your Construction Project</p></div></div></section>
<div class="breadcrumb-bar"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li><li class="breadcrumb-item active">Building Estimate Calculator</li></ol></nav></div></div>

{{-- ===================== STYLES ===================== --}}
<style>
    .estimate-pro { font-family: inherit; }

    /* ---- Cards ---- */
    .estimate-pro .ep-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,.07);
        padding: 28px;
        margin-bottom: 24px;
        border: 1px solid #eaeaea;
    }
    .estimate-pro .ep-card-title {
        font-size: 1.1rem; font-weight: 700;
        margin-bottom: 22px; color: var(--navy);
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 10px;
        display: flex; align-items: center; gap: 8px;
    }

    /* ---- Form grid ---- */
    .estimate-pro .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
        gap: 18px;
    }
    .estimate-pro .fg-full { grid-column: 1 / -1; }
    .estimate-pro .inp-wrap { display: flex; flex-direction: column; }
    .estimate-pro .inp-wrap label {
        font-size: .85rem; color: #4b5563;
        margin-bottom: 5px; font-weight: 600;
    }
    .estimate-pro .inp-wrap input,
    .estimate-pro .inp-wrap select {
        padding: 10px 12px;
        border: 1.5px solid #d1d5db; border-radius: 7px;
        font-size: .97rem; outline: none;
        transition: border-color .2s, box-shadow .2s;
        width: 100%; background: #fff;
    }
    .estimate-pro .inp-wrap input:focus,
    .estimate-pro .inp-wrap select:focus {
        border-color: var(--orange);
        box-shadow: 0 0 0 3px rgba(255,107,0,.12);
    }
    .estimate-pro .inp-wrap input[readonly] {
        background: #f3f4f6; color: #6b7280; cursor: not-allowed;
    }
    .estimate-pro .inp-note {
        font-size: .75rem; color: #9ca3af; margin-top: 3px;
    }

    /* ---- Calculate button ---- */
    .btn-calculate {
        width: 100%; padding: 15px;
        background: linear-gradient(135deg, var(--orange), #ff7c26);
        color: #fff; border: none; border-radius: 9px;
        font-size: 1.05rem; font-weight: 700; cursor: pointer;
        transition: .25s; margin-top: 8px;
        box-shadow: 0 4px 15px rgba(255,107,0,.3);
        display: flex; align-items: center; justify-content: center; gap: 10px;
    }
    .btn-calculate:hover { transform: translateY(-2px); box-shadow: 0 7px 22px rgba(255,107,0,.4); }
    .btn-calculate:disabled { opacity: .65; cursor: not-allowed; transform: none; }

    /* ---- Summary / Result ---- */
    .result-panel {
        display: none;
        animation: fadeUp .4s ease;
    }
    @keyframes fadeUp { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }

    #resultCol .ep-card {
        margin-bottom: 0;
        width: 100%;
    }
    .result-placeholder-card {
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .estimate-pro .summary-table { width: 100%; border-collapse: collapse; table-layout: fixed; }
    .estimate-pro .summary-table td {
        padding: 10px 4px; border-bottom: 1px solid #e5e7eb;
        font-size: .9rem; color: #374151;
        vertical-align: middle; word-break: break-word;
    }
    .estimate-pro .summary-table td:first-child { color: #4b5563; }
    .estimate-pro .summary-table td:last-child {
        text-align: right; font-weight: 600; color: #111827;
        white-space: nowrap;
    }
    .estimate-pro .summary-table .total-row td {
        font-size: 1.1rem; font-weight: 700;
        color: var(--orange); border-bottom: none; padding-top: 14px;
    }
    .summary-table .basement-row { display: none; }
    .gst-note { font-size: .8rem; color: #ef4444; text-align: right; margin-top: 6px; font-weight: 500; }
    .note-text { font-size: .8rem; color: #6b7280; line-height: 1.5; margin-top: 10px; }

    @media (max-width: 991px) {
        #resultCol { margin-top: 20px; }
        .estimate-pro .summary-table td { font-size: .82rem; padding: 8px 3px; }
    }
    @media (max-width: 480px) {
        .estimate-pro .summary-table td:last-child { font-size: .82rem; }
        .estimate-pro .summary-table .total-row td { font-size: 1rem; }
    }

    /* ---- Premium CTA ---- */
    .estimate-pro .premium-box {
        background: linear-gradient(135deg, var(--navy), #1e293b);
        color: white; border-radius: 12px; padding: 24px;
        display: flex; flex-wrap: wrap;
        justify-content: space-between; align-items: center; gap: 20px;
        margin-bottom: 20px; box-shadow: 0 10px 25px rgba(0,0,0,.12);
    }
    .estimate-pro .premium-text h3 { margin:0 0 8px 0; font-size:1.2rem; color:#fff; }
    .estimate-pro .premium-text p  { margin:0 0 8px 0; color:#cbd5e1; font-size:.9rem; }
    .estimate-pro .btn-premium {
        background: var(--orange); color: white; border: none;
        padding: 12px 22px; border-radius: 7px; font-weight: 600;
        cursor: pointer; transition:.2s; text-decoration:none; display:inline-block;
    }
    .estimate-pro .btn-premium:hover { background:#e65c00; color:white; }
    .estimate-pro .premium-price { font-size:1.05rem; font-weight:600; color:#fbbf24; }

    /* ---- Step 1 – User Info ---- */
    .user-info-wrapper { max-width: 560px; margin: 0 auto 40px auto; }
    .user-info-card {
        background: #fff; border-radius: 16px;
        box-shadow: 0 8px 35px rgba(0,0,0,.10);
        padding: 40px 36px; border-top: 4px solid var(--orange);
    }
    .step-icon {
        width: 60px; height: 60px; border-radius: 50%;
        background: linear-gradient(135deg, var(--orange), #ff9d4d);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 18px auto; font-size: 1.6rem; color: #fff;
        box-shadow: 0 4px 14px rgba(255,107,0,.35);
    }
    .user-info-card h4 { font-size:1.3rem; font-weight:700; color:var(--navy); text-align:center; margin-bottom:6px; }
    .user-info-card .sub { text-align:center; color:#6b7280; font-size:.9rem; margin-bottom:28px; }
    .user-info-field { margin-bottom: 18px; }
    .user-info-field label { display:block; font-size:.88rem; font-weight:600; color:#374151; margin-bottom:6px; }
    .user-info-field input {
        width:100%; padding:12px 14px;
        border:1.5px solid #e5e7eb; border-radius:8px;
        font-size:1rem; outline:none; transition:.2s;
    }
    .user-info-field input:focus { border-color:var(--orange); box-shadow:0 0 0 3px rgba(255,107,0,.12); }
    .user-info-field input.error-input { border-color:#ef4444; }
    .field-error { color:#ef4444; font-size:.79rem; margin-top:4px; display:none; }
    .btn-proceed {
        width:100%; padding:13px;
        background:linear-gradient(135deg,var(--orange),#ff7c26);
        color:#fff; border:none; border-radius:8px;
        font-size:1rem; font-weight:700; cursor:pointer;
        transition:.25s; margin-top:8px;
        box-shadow:0 4px 15px rgba(255,107,0,.3);
    }
    .btn-proceed:hover { transform:translateY(-2px); box-shadow:0 7px 20px rgba(255,107,0,.4); }

    /* ---- Step tracker ---- */
    .step-tracker { display:flex; align-items:center; justify-content:center; margin-bottom:40px; }
    .step-node { display:flex; flex-direction:column; align-items:center; gap:6px; }
    .step-circle {
        width:38px; height:38px; border-radius:50%;
        border:2px solid #d1d5db; display:flex; align-items:center; justify-content:center;
        font-weight:700; font-size:.9rem; color:#9ca3af; background:#fff; transition:.3s;
    }
    .step-circle.active { border-color:var(--orange); color:var(--orange); background:#fff7f0; }
    .step-circle.done   { border-color:#22c55e; background:#22c55e; color:#fff; }
    .step-label { font-size:.75rem; color:#9ca3af; font-weight:500; }
    .step-label.active { color:var(--orange); }
    .step-label.done   { color:#22c55e; }
    .step-connector { width:60px; height:2px; background:#e5e7eb; margin:0 4px; margin-bottom:22px; transition:.3s; }
    .step-connector.done { background:#22c55e; }

    /* ---- User badge ---- */
    .user-badge {
        background:#f0fdf4; border:1px solid #bbf7d0; color:#15803d;
        padding:7px 14px; border-radius:20px; font-size:.85rem; font-weight:600;
        display:inline-flex; align-items:center; gap:6px; margin-bottom:20px;
    }

    /* ---- Toast ---- */
    .ep-toast {
        position: fixed; bottom: 30px; right: 30px; z-index: 9999;
        background: #1e293b; color: #fff; padding: 14px 22px;
        border-radius: 10px; font-size: .92rem; font-weight: 500;
        box-shadow: 0 8px 24px rgba(0,0,0,.18);
        display: flex; align-items: center; gap: 10px;
        transform: translateY(60px); opacity: 0;
        transition: .35s cubic-bezier(.4,0,.2,1);
        pointer-events: none;
    }
    .ep-toast.show { transform: translateY(0); opacity: 1; }
    .ep-toast.toast-success { border-left: 4px solid #22c55e; }
    .ep-toast.toast-error   { border-left: 4px solid #ef4444; }
</style>

{{-- ===================== MAIN SECTION ===================== --}}
<section class="py-5 bg-light estimate-pro">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="sec-title mb-2">🏗️ EstimatePro</h2>
            <p class="sec-sub">Preliminary construction estimate • Fill all fields &amp; press Calculate</p>
        </div>

        {{-- Step Tracker --}}
        <div class="step-tracker">
            <div class="step-node">
                <div class="step-circle active" id="sc1">1</div>
                <div class="step-label active" id="sl1">Your Info</div>
            </div>
            <div class="step-connector" id="conn1"></div>
            <div class="step-node">
                <div class="step-circle" id="sc2">2</div>
                <div class="step-label" id="sl2">Calculator</div>
            </div>
        </div>

        {{-- =========================
             STEP 1 – User Info
        ========================== --}}
        <div id="step1">
            <div class="user-info-wrapper">
                <div class="user-info-card">
                    <div class="step-icon">📋</div>
                    <h4>Tell us about yourself</h4>
                    <p class="sub">Enter your details to unlock the free estimate calculator.</p>

                    <div class="user-info-field">
                        <label for="userName">Full Name <span style="color:#ef4444">*</span></label>
                        <input type="text" id="userName" placeholder="e.g. Rajesh Kumar" autocomplete="name">
                        <div class="field-error" id="errName">Please enter your full name.</div>
                    </div>
                    <div class="user-info-field">
                        <label for="userEmail">Email Address <span style="color:#ef4444">*</span></label>
                        <input type="email" id="userEmail" placeholder="e.g. rajesh@email.com" autocomplete="email">
                        <div class="field-error" id="errEmail">Please enter a valid email address.</div>
                    </div>
                    <div class="user-info-field">
                        <label for="userPhone">Contact Number <span style="color:#ef4444">*</span></label>
                        <input type="tel" id="userPhone" placeholder="e.g. 9876543210" maxlength="15" autocomplete="tel">
                        <div class="field-error" id="errPhone">Please enter a valid 10‑digit mobile number.</div>
                    </div>

                    <button class="btn-proceed" onclick="proceedToCalculator()">
                        Proceed to Calculator &nbsp;→
                    </button>
                </div>
            </div>
        </div>

        {{-- =========================
             STEP 2 – Calculator
        ========================== --}}
        <div id="step2" style="display:none;">

            <div class="text-center">
                <span class="user-badge">
                    <i class="fas fa-user-check"></i> <span id="badgeName"></span>
                </span>
            </div>

            <div class="row g-4">

                {{-- ---- LEFT: Project Inputs ---- --}}
                <div class="col-lg-7">
                    <div class="ep-card">
                        <div class="ep-card-title"><span>📐</span> Project Inputs</div>
                        <div class="form-grid">

                            {{-- Project type --}}
                            <div class="inp-wrap">
                                <label>Project Type</label>
                                <select id="projectType">
                                    <option value="Residential">Residential</option>
                                    <option value="Commercial">Commercial</option>
                                </select>
                            </div>

                            {{-- Plot dimensions --}}
                            <div class="inp-wrap">
                                <label>Plot Length (ft)</label>
                                <input type="number" id="plotLength" value="0" min="0" step="1">
                            </div>
                            <div class="inp-wrap">
                                <label>Plot Width (ft)</label>
                                <input type="number" id="plotWidth" value="0" min="0" step="1">
                            </div>
                            <div class="inp-wrap">
                                <label>Plot Area (sq.ft)</label>
                                <input type="number" id="plotArea" value="0" min="0" step="1">
                                <span class="inp-note">Auto-filled from L × W, or enter manually</span>
                            </div>

                            {{-- Floors --}}
                            <div class="inp-wrap">
                                <label>Number of Floors <small style="color:#9ca3af">(excl. basement)</small></label>
                                <input type="number" id="totalFloors" value="1" min="1" step="1">
                            </div>
                            <div class="inp-wrap">
                                <label>Built-up Area per Floor (sq.ft)</label>
                                <input type="number" id="builtupPerFloor" value="0" min="0" step="50">
                            </div>

                            {{-- Basement toggle only – no area input (auto = plot area) --}}
                            <div class="inp-wrap">
                                <label>Basement Required</label>
                                <select id="basementReq">
                                    <option value="No" selected>No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                                <span class="inp-note" id="basementNote" style="display:none;">Basement area = Plot Area &middot; charged at {{ $pricing->basement_multiplier }}&times; structure rate</span>
                            </div>

                            {{-- Computed totals (readonly) --}}
                            <div class="inp-wrap">
                                <label>Total Built-up Area (sq.ft)</label>
                                <input type="number" id="totalBuiltup" readonly value="0">
                                <span class="inp-note">Floors × per-floor area</span>
                            </div>

                            {{-- Quality selects --}}
                            <div class="inp-wrap">
                                <label>Structure Quality</label>
                                <select id="structureQuality">
                                    <option value="Basic">Basic</option>
                                    <option value="Standard" selected>Standard</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                            <div class="inp-wrap">
                                <label>Finishing Quality</label>
                                <select id="finishingQuality">
                                    <option value="Basic">Basic</option>
                                    <option value="Standard" selected>Standard</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                            <div class="inp-wrap">
                                <label>MEP Services</label>
                                <select id="mepQuality">
                                    <option value="Basic">Basic</option>
                                    <option value="Standard" selected>Standard</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                            <div class="inp-wrap">
                                <label>Front Facade Type</label>
                                <select id="facadeType">
                                    <option value="Basic">Basic</option>
                                    <option value="Standard" selected>Standard</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                            <div class="inp-wrap">
                                <label>External Development</label>
                                <select id="externalDev">
                                    <option value="Basic">Basic</option>
                                    <option value="Standard" selected>Standard</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                            <div class="inp-wrap">
                                <label>Project Location</label>
                                <select id="location">
                                    <option value="Metro">Metro City</option>
                                    <option value="Urban" selected>Urban / Tier-2</option>
                                    <option value="Hill">Hill / Remote</option>
                                </select>
                            </div>
                            <div class="inp-wrap">
                                <label>Contingency Buffer</label>
                                <select id="contingency">
                                    <option value="No" selected>No</option>
                                    <option value="Yes">Yes (+5%)</option>
                                </select>
                            </div>

                            {{-- Calculate button (full width) --}}
                            <div class="inp-wrap fg-full">
                                <button class="btn-calculate" id="btnCalculate" onclick="runCalculation()">
                                    <i class="fas fa-calculator"></i> Calculate My Estimate
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ---- RIGHT: Result Summary ---- --}}
                <div class="col-lg-5 mt-4 mt-lg-0" id="resultCol">
                    {{-- Placeholder --}}
                    <div class="ep-card result-placeholder-card" id="resultPlaceholder">
                        <div class="text-center py-4">
                            <div style="font-size:3rem;margin-bottom:12px;">📊</div>
                            <p style="color:#9ca3af;font-size:.95rem;">Fill all project details on the left,<br>then press <strong>Calculate My Estimate</strong>.</p>
                        </div>
                    </div>

                    {{-- Actual result --}}
                    <div class="ep-card result-panel" id="resultPanel">
                        <div class="ep-card-title"><span>💰</span> Cost Estimate Summary</div>
                        <table class="summary-table">
                            <colgroup><col style="width:65%"><col style="width:35%"></colgroup>
                            <tbody>
                                <tr><td>Structure Cost</td><td id="structureCostVal">₹0</td></tr>
                                <tr class="basement-row" id="basementRow">
                                    <td>Basement Cost <small class="text-muted" id="basementMultLabel">({{ $pricing->basement_multiplier }}&times;)</small></td>
                                    <td id="basementCostVal">₹0</td>
                                </tr>
                                <tr><td>Finishing Cost</td><td id="finishingCostVal">₹0</td></tr>
                                <tr><td>MEP Services</td><td id="mepCostVal">₹0</td></tr>
                                <tr><td>Front Facade Cost</td><td id="facadeCostVal">₹0</td></tr>
                                <tr><td>External Work Cost</td><td id="externalCostVal">₹0</td></tr>
                                <tr><td>Location Factor</td><td id="locationFactorVal">₹0</td></tr>
                                <tr><td>Contingency Buffer</td><td id="contingencyVal">₹0</td></tr>
                                <tr class="total-row">
                                    <td><strong>Total Estimated Cost</strong></td>
                                    <td id="totalCostVal">₹0</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="gst-note mt-2">⚠️ Plus GST extra as applicable</div>
                        <div class="note-text">
                            🔍 Approximate estimate. Final cost may vary based on design &amp; site conditions.
                        </div>
                    </div>
                </div>

            </div>{{-- end .row --}}

            {{-- CTA Box (hidden until calculated) --}}
            <div class="result-panel" id="ctaPanel">
                <div class="premium-box mt-4">
                    <div class="premium-text">
                        <h3>📋 Detailed BOQ &amp; Accurate Estimation</h3>
                        <p>Get item-wise quantities, rates, specifications &amp; accurate costing</p>
                        <div><strong>Total Built-up area: </strong><span id="premiumArea">0</span> sq.ft</div>
                    </div>
                    <div class="mb-3 mb-md-0" style="text-align:right;">
                        <div class="premium-price">₹4/sq.ft <span style="font-size:.85rem;color:#cbd5e1;font-weight:400;">(incl. GST)</span></div>
                        <div style="font-weight:700;margin-top:4px;font-size:1.05rem;">
                            Estimation Charges: ₹<span id="estimationCharge">0</span>
                        </div>
                    </div>
                    <button class="btn-premium" id="contactBtn">📞 Request Professional Estimate</button>
                </div>
                <div class="note-text text-center mt-1 mb-4">
                    *For a fully detailed BOQ with item-wise quantities, specifications &amp; accurate costing, contact us for our professional paid estimation service.
                </div>
            </div>

        </div>{{-- end #step2 --}}
    </div>
</section>

{{-- Toast notification --}}
<div class="ep-toast" id="epToast"></div>

{{-- ===================== SCRIPTS ===================== --}}
<script>
// ---------------------------------------------------------------
// Rate tables – injected from DB via PHP
// ---------------------------------------------------------------
const structureRates = {
    Basic:    {{ $pricing->structure_basic }},
    Standard: {{ $pricing->structure_standard }},
    Premium:  {{ $pricing->structure_premium }}
};
const finishingRates = {
    Basic:    {{ $pricing->finishing_basic }},
    Standard: {{ $pricing->finishing_standard }},
    Premium:  {{ $pricing->finishing_premium }}
};
const mepRates = {
    Basic:    {{ $pricing->mep_basic }},
    Standard: {{ $pricing->mep_standard }},
    Premium:  {{ $pricing->mep_premium }}
};
const facadeRates = {
    Basic:    {{ $pricing->facade_basic }},
    Standard: {{ $pricing->facade_standard }},
    Premium:  {{ $pricing->facade_premium }}
};
const externalRates = {
    Basic:    {{ $pricing->external_basic }},
    Standard: {{ $pricing->external_standard }},
    Premium:  {{ $pricing->external_premium }}
};
const locationMultiplier = {
    Metro: {{ $pricing->location_metro }},
    Urban: {{ $pricing->location_urban }},
    Hill:  {{ $pricing->location_hill }}
};
const BASEMENT_MULTIPLIER = {{ $pricing->basement_multiplier }};

const CSRF = '{{ csrf_token() }}';
const STORE_URL = '{{ route("calculator.enquiry.store") }}';

// ---------------------------------------------------------------
// Helper: format currency
// ---------------------------------------------------------------
const fmt = v => '₹' + Math.round(v).toLocaleString('en-IN');

// ---------------------------------------------------------------
// Helper: Toast
// ---------------------------------------------------------------
function showToast(msg, type = 'success') {
    const t = document.getElementById('epToast');
    t.className = `ep-toast toast-${type}`;
    t.innerHTML = (type === 'success' ? '✅ ' : '❌ ') + msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3500);
}

// ---------------------------------------------------------------
// STEP 1 – Validate & Proceed
// ---------------------------------------------------------------
function proceedToCalculator() {
    const name  = document.getElementById('userName').value.trim();
    const email = document.getElementById('userEmail').value.trim();
    const phone = document.getElementById('userPhone').value.trim();
    let valid = true;

    const check = (val, errId, inpId, test) => {
        const e = document.getElementById(errId);
        const i = document.getElementById(inpId);
        if (!test(val)) {
            e.style.display = 'block';
            i.classList.add('error-input');
            valid = false;
        } else {
            e.style.display = 'none';
            i.classList.remove('error-input');
        }
    };

    check(name,  'errName',  'userName',  v => v.length >= 2);
    check(email, 'errEmail', 'userEmail', v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v));
    check(phone, 'errPhone', 'userPhone', v => /^[6-9]\d{9}$/.test(v));

    if (!valid) return;

    // Animate step tracker
    const sc1 = document.getElementById('sc1');
    sc1.classList.replace('active','done');
    sc1.innerHTML = '<i class="fas fa-check" style="font-size:.8rem"></i>';
    document.getElementById('sl1').className = 'step-label done';
    document.getElementById('conn1').classList.add('done');
    document.getElementById('sc2').classList.add('active');
    document.getElementById('sl2').classList.add('active');

    document.getElementById('badgeName').textContent = name;
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';
    document.getElementById('step2').scrollIntoView({ behavior:'smooth', block:'start' });

    // Auto-update readonly fields when inputs change
    updateReadonlyFields();
}

// Allow Enter key
['userName','userEmail','userPhone'].forEach(id => {
    document.getElementById(id)?.addEventListener('keydown', e => {
        if (e.key === 'Enter') proceedToCalculator();
    });
});

// ---------------------------------------------------------------
// Basement toggle – show info note, no area input needed
// ---------------------------------------------------------------
document.getElementById('basementReq')?.addEventListener('change', function() {
    document.getElementById('basementNote').style.display =
        this.value === 'Yes' ? 'block' : 'none';
});

// ---------------------------------------------------------------
// Keep readonly fields (plot area, total builtup) updated live
// so user can see them change as they type – no cost calc yet
// ---------------------------------------------------------------
function updateReadonlyFields() {
    const len = +document.getElementById('plotLength').value || 0;
    const wid = +document.getElementById('plotWidth').value  || 0;
    if (len > 0 && wid > 0) {
        // Only auto-fill if both length and width are set
        document.getElementById('plotArea').value = (len * wid).toFixed(0);
    }

    const plotArea = +document.getElementById('plotArea').value || 0;
    const bpf      = +document.getElementById('builtupPerFloor').value || 0;
    const floors   = +document.getElementById('totalFloors').value     || 1;
    const builtup  = (bpf > plotArea && plotArea > 0 ? plotArea : bpf) * floors;
    document.getElementById('totalBuiltup').value = builtup.toFixed(0);
}

['plotLength','plotWidth','builtupPerFloor','totalFloors','plotArea'].forEach(id => {
    document.getElementById(id)?.addEventListener('input', updateReadonlyFields);
});

// ---------------------------------------------------------------
// MAIN CALCULATION – triggered ONLY by the button
// ---------------------------------------------------------------
function runCalculation() {
    const btn = document.getElementById('btnCalculate');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Calculating…';

    const len    = +document.getElementById('plotLength').value      || 0;
    const wid    = +document.getElementById('plotWidth').value       || 0;
    const bpf    = +document.getElementById('builtupPerFloor').value || 0;
    const floors = +document.getElementById('totalFloors').value     || 1;

    const plotArea     = +document.getElementById('plotArea').value || (len * wid);
    const safeBuiltup  = (bpf > plotArea && plotArea > 0) ? plotArea : bpf;
    const totalBuiltup = safeBuiltup * floors;

    document.getElementById('plotArea').value     = plotArea.toFixed(0);
    document.getElementById('totalBuiltup').value = totalBuiltup.toFixed(0);

    const hasBasement  = document.getElementById('basementReq').value === 'Yes';
    // Basement area = plot area automatically (no manual input)
    const basementArea = hasBasement ? plotArea : 0;

    const stQ = document.getElementById('structureQuality').value;
    const fiQ = document.getElementById('finishingQuality').value;
    const meQ = document.getElementById('mepQuality').value;
    const faQ = document.getElementById('facadeType').value;
    const exQ = document.getElementById('externalDev').value;
    const loc = document.getElementById('location').value;
    const con = document.getElementById('contingency').value;

    // ---- Core costs ----
    const structureCost  = totalBuiltup  * structureRates[stQ];                          // above-ground floors
    const basementCost   = basementArea  * structureRates[stQ] * BASEMENT_MULTIPLIER;    // basement @ DB multiplier×
    const finishingCost  = (totalBuiltup + basementArea) * finishingRates[fiQ];          // finishing whole built-up
    const mepCost        = (totalBuiltup + basementArea) * mepRates[meQ];                // MEP whole built-up
    const facadeCost     = plotArea      * facadeRates[faQ];                             // plot-area based
    const externalCost   = plotArea      * externalRates[exQ];                           // plot-area based

    // ---- Location factor ----
    const subtotal      = structureCost + basementCost + finishingCost + mepCost + facadeCost + externalCost;
    const locMulti      = locationMultiplier[loc];
    const locationAdded = subtotal * (locMulti - 1);
    const afterLocation = subtotal + locationAdded;

    // ---- Contingency ----
    const contingencyAmt = (con === 'Yes') ? afterLocation * 0.05 : 0;
    const totalCost      = afterLocation + contingencyAmt;

    // ---- Update summary DOM ----
    document.getElementById('structureCostVal').textContent  = fmt(structureCost);
    document.getElementById('basementCostVal').textContent   = fmt(basementCost);
    document.getElementById('finishingCostVal').textContent  = fmt(finishingCost);
    document.getElementById('mepCostVal').textContent        = fmt(mepCost);
    document.getElementById('facadeCostVal').textContent     = fmt(facadeCost);
    document.getElementById('externalCostVal').textContent   = fmt(externalCost);
    document.getElementById('locationFactorVal').textContent = fmt(locationAdded);
    document.getElementById('contingencyVal').textContent    = fmt(contingencyAmt);
    document.getElementById('totalCostVal').textContent      = fmt(totalCost);

    // Show / hide basement row in table
    document.querySelector('.basement-row').style.display = hasBasement ? 'table-row' : 'none';

    // Premium area & estimation charge
    const totalArea = totalBuiltup + basementArea;
    document.getElementById('premiumArea').textContent      = totalArea.toFixed(0);
    document.getElementById('estimationCharge').textContent = (totalArea * 4).toLocaleString('en-IN');

    // Show result panel & CTA
    document.getElementById('resultPlaceholder').style.display = 'none';
    document.getElementById('resultPanel').style.display = 'block';
    document.getElementById('resultPanel').classList.add('result-panel');
    document.getElementById('ctaPanel').style.display = 'block';

    // Scroll to result
    setTimeout(() => {
        document.getElementById('resultPanel').scrollIntoView({ behavior:'smooth', block:'start' });
    }, 100);

    // ---- Store enquiry via AJAX ----
    const payload = {
        _token:              CSRF,
        name:                document.getElementById('userName').value.trim(),
        email:               document.getElementById('userEmail').value.trim(),
        phone:               document.getElementById('userPhone').value.trim(),
        project_type:        document.getElementById('projectType').value,
        plot_length:         len,
        plot_width:          wid,
        plot_area:           plotArea,
        builtup_per_floor:   bpf,
        total_floors:        floors,
        total_builtup:       totalBuiltup,
        basement_required:   document.getElementById('basementReq').value,
        basement_area:       basementArea,
        structure_quality:   stQ,
        finishing_quality:   fiQ,
        mep_quality:         meQ,
        facade_type:         faQ,
        external_dev:        exQ,
        location:            loc,
        contingency:         con,
        structure_cost:      structureCost,
        basement_cost:       basementCost,
        finishing_cost:      finishingCost,
        mep_cost:            mepCost,
        facade_cost:         facadeCost,
        external_cost:       externalCost,
        location_factor:     locationAdded,
        contingency_amount:  contingencyAmt,
        total_cost:          totalCost,
    };

    fetch(STORE_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify(payload),
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            showToast('Estimate saved! Our team will reach you shortly.', 'success');
        }
    })
    .catch(() => {
        // Silently ignore – don't block the user experience
    })
    .finally(() => {
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-redo"></i> Recalculate';
    });
}

// ---------------------------------------------------------------
// Contact CTA button
// ---------------------------------------------------------------
document.getElementById('contactBtn')?.addEventListener('click', () => {
    const name  = document.getElementById('userName').value.trim();
    const phone = document.getElementById('userPhone').value.trim();
    const area  = document.getElementById('premiumArea').textContent;
    alert(`📞 Thank you ${name}!\nOur team will contact you at ${phone} with a detailed BOQ for ${area} sq.ft.`);
});
</script>
@endsection