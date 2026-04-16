@extends('layouts.master')

@php
$meta_title = "Eshan Buildwell – Building Estimate Calculator";
$meta_description = "Get a preliminary construction cost estimate for your residential or commercial project. Fill your
details and calculate instantly.";
$keywords = "construction cost calculator, building estimate, residential construction cost, Eshan Buildwell
calculator";
@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop

@section('content')
<section class="hero-banner">
    <div class="container">
        <div class="hero-content">
            <h1>Building Estimate Calculator</h1>
            <div class="hero-divider"></div>
            <p>Get an Instant Estimate for Your Construction Project</p>
        </div>
    </div>
</section>
<div class="breadcrumb-bar">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Building Estimate Calculator</li>
            </ol>
        </nav>
    </div>
</div>

{{-- ===================== STYLES ===================== --}}
<style>
    .estimate-pro {
        font-family: inherit;
    }

    /* ---- Cards ---- */
    .estimate-pro .ep-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .07);
        padding: 28px;
        margin-bottom: 24px;
        border: 1px solid #eaeaea;
    }

    .estimate-pro .ep-card-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 22px;
        color: var(--navy);
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* ---- Form grid ---- */
    .estimate-pro .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
        gap: 18px;
    }

    .estimate-pro .fg-full {
        grid-column: 1 / -1;
    }

    .estimate-pro .inp-wrap {
        display: flex;
        flex-direction: column;
    }

    .estimate-pro .inp-wrap label {
        font-size: .85rem;
        color: #4b5563;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .estimate-pro .inp-wrap input,
    .estimate-pro .inp-wrap select {
        padding: 10px 12px;
        border: 1.5px solid #d1d5db;
        border-radius: 7px;
        font-size: .97rem;
        outline: none;
        transition: border-color .2s, box-shadow .2s;
        width: 100%;
        background: #fff;
    }

    .estimate-pro .inp-wrap input:focus,
    .estimate-pro .inp-wrap select:focus {
        border-color: var(--orange);
        box-shadow: 0 0 0 3px rgba(255, 107, 0, .12);
    }

    .estimate-pro .inp-wrap input[readonly] {
        background: #f3f4f6;
        color: #6b7280;
        cursor: not-allowed;
    }

    .estimate-pro .inp-note {
        font-size: .75rem;
        color: #9ca3af;
        margin-top: 3px;
    }

    /* ---- Calculate button ---- */
    .btn-calculate {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, var(--orange), #ff7c26);
        color: #fff;
        border: none;
        border-radius: 9px;
        font-size: 1.05rem;
        font-weight: 700;
        cursor: pointer;
        transition: .25s;
        margin-top: 8px;
        box-shadow: 0 4px 15px rgba(255, 107, 0, .3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-calculate:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 22px rgba(255, 107, 0, .4);
    }

    .btn-calculate:disabled {
        opacity: .65;
        cursor: not-allowed;
        transform: none;
    }

    /* ---- Summary / Result ---- */
    .result-panel {
        display: none;
        animation: fadeUp .4s ease;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(16px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

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

    .estimate-pro .summary-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .estimate-pro .summary-table td {
        padding: 10px 4px;
        border-bottom: 1px solid #e5e7eb;
        font-size: .9rem;
        color: #374151;
        vertical-align: middle;
        word-break: break-word;
    }

    .estimate-pro .summary-table td:first-child {
        color: #4b5563;
    }

    .estimate-pro .summary-table td:last-child {
        text-align: right;
        font-weight: 600;
        color: #111827;
        white-space: nowrap;
    }

    .estimate-pro .summary-table .total-row td {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--orange);
        border-bottom: none;
        padding-top: 14px;
    }

    .summary-table .basement-row {
        display: none;
    }

    .gst-note {
        font-size: .8rem;
        color: #ef4444;
        text-align: right;
        margin-top: 6px;
        font-weight: 500;
    }

    .note-text {
        font-size: .8rem;
        color: #6b7280;
        line-height: 1.5;
        margin-top: 10px;
    }

    @media (max-width: 991px) {
        #resultCol {
            margin-top: 20px;
        }

        .estimate-pro .summary-table td {
            font-size: .82rem;
            padding: 8px 3px;
        }
    }

    @media (max-width: 480px) {
        .estimate-pro .summary-table td:last-child {
            font-size: .82rem;
        }

        .estimate-pro .summary-table .total-row td {
            font-size: 1rem;
        }
    }

    /* ---- Premium CTA ---- */
    .estimate-pro .premium-box {
        background: linear-gradient(135deg, var(--navy), #1e293b);
        color: white;
        border-radius: 12px;
        padding: 24px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .12);
    }

    .estimate-pro .premium-text h3 {
        margin: 0 0 8px 0;
        font-size: 1.2rem;
        color: #fff;
    }

    .estimate-pro .premium-text p {
        margin: 0 0 8px 0;
        color: #cbd5e1;
        font-size: .9rem;
    }

    .estimate-pro .btn-premium {
        background: var(--orange);
        color: white;
        border: none;
        padding: 12px 22px;
        border-radius: 7px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s;
        text-decoration: none;
        display: inline-block;
    }

    .estimate-pro .btn-premium:hover {
        background: #e65c00;
        color: white;
    }

    .estimate-pro .premium-price {
        font-size: 1.05rem;
        font-weight: 600;
        color: #fbbf24;
    }

    /* ---- Step 1 – User Info ---- */
    .user-info-wrapper {
        max-width: 560px;
        margin: 0 auto 40px auto;
    }

    .user-info-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 35px rgba(0, 0, 0, .10);
        padding: 40px 36px;
        border-top: 4px solid var(--orange);
    }

    .step-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--orange), #ff9d4d);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px auto;
        font-size: 1.6rem;
        color: #fff;
        box-shadow: 0 4px 14px rgba(255, 107, 0, .35);
    }

    .user-info-card h4 {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--navy);
        text-align: center;
        margin-bottom: 6px;
    }

    .user-info-card .sub {
        text-align: center;
        color: #6b7280;
        font-size: .9rem;
        margin-bottom: 28px;
    }

    .user-info-field {
        margin-bottom: 18px;
    }

    .user-info-field label {
        display: block;
        font-size: .88rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 6px;
    }

    .user-info-field input {
        width: 100%;
        padding: 12px 14px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        font-size: 1rem;
        outline: none;
        transition: .2s;
    }

    .user-info-field input:focus {
        border-color: var(--orange);
        box-shadow: 0 0 0 3px rgba(255, 107, 0, .12);
    }

    .user-info-field input.error-input {
        border-color: #ef4444;
    }

    .field-error {
        color: #ef4444;
        font-size: .79rem;
        margin-top: 4px;
        display: none;
    }

    .btn-proceed {
        width: 100%;
        padding: 13px;
        background: linear-gradient(135deg, var(--orange), #ff7c26);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: .25s;
        margin-top: 8px;
        box-shadow: 0 4px 15px rgba(255, 107, 0, .3);
    }

    .btn-proceed:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 20px rgba(255, 107, 0, .4);
    }

    /* ---- Step tracker ---- */
    .step-tracker {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 40px;
    }

    .step-node {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
    }

    .step-circle {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 2px solid #d1d5db;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: .9rem;
        color: #9ca3af;
        background: #fff;
        transition: .3s;
    }

    .step-circle.active {
        border-color: var(--orange);
        color: var(--orange);
        background: #fff7f0;
    }

    .step-circle.done {
        border-color: #22c55e;
        background: #22c55e;
        color: #fff;
    }

    .step-label {
        font-size: .75rem;
        color: #9ca3af;
        font-weight: 500;
    }

    .step-label.active {
        color: var(--orange);
    }

    .step-label.done {
        color: #22c55e;
    }

    .step-connector {
        width: 60px;
        height: 2px;
        background: #e5e7eb;
        margin: 0 4px;
        margin-bottom: 22px;
        transition: .3s;
    }

    .step-connector.done {
        background: #22c55e;
    }

    /* ---- User badge ---- */
    .user-badge {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #15803d;
        padding: 7px 14px;
        border-radius: 20px;
        font-size: .85rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 20px;
    }

    /* ---- Toast ---- */
    .ep-toast {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 9999;
        background: #1e293b;
        color: #fff;
        padding: 14px 22px;
        border-radius: 10px;
        font-size: .92rem;
        font-weight: 500;
        box-shadow: 0 8px 24px rgba(0, 0, 0, .18);
        display: flex;
        align-items: center;
        gap: 10px;
        transform: translateY(60px);
        opacity: 0;
        transition: .35s cubic-bezier(.4, 0, .2, 1);
        pointer-events: none;
    }

    .ep-toast.show {
        transform: translateY(0);
        opacity: 1;
    }

    .ep-toast.toast-success {
        border-left: 4px solid #22c55e;
    }

    .ep-toast.toast-error {
        border-left: 4px solid #ef4444;
    }

    /* ---- Payment / Lock Section ---- */
    .lock-banner {
        background: #fef9c3;
        border: 1px solid #fde047;
        border-radius: 9px;
        padding: 12px 16px;
        margin: 14px 0 10px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: .88rem;
        color: #713f12;
        font-weight: 600;
    }

    .lock-banner svg {
        flex-shrink: 0;
    }

    .qr-payment-box {
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        padding: 18px 14px;
        text-align: center;
        margin: 12px 0;
        background: #f9fafb;
    }

    .qr-payment-box h5 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 10px;
    }

    .qr-img {
        width: 170px;
        height: 170px;
        object-fit: contain;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
    }

    .qr-amount {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--orange);
        margin: 8px 0 4px;
    }

    .qr-sub {
        font-size: .78rem;
        color: #6b7280;
    }

    .btn-paid {
        width: 100%;
        padding: 13px;
        background: linear-gradient(135deg, #16a34a, #15803d);
        color: #fff;
        border: none;
        border-radius: 9px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: .25s;
        margin-top: 10px;
        box-shadow: 0 4px 14px rgba(21, 128, 61, .3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-paid:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 20px rgba(21, 128, 61, .4);
    }

    .paid-success-note {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 9px;
        padding: 10px 14px;
        margin-top: 10px;
        font-size: .83rem;
        color: #15803d;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* ---- Screenshot Upload ---- */
    .ss-upload-label {
        font-size: .85rem;
        font-weight: 600;
        color: #374151;
        margin: 12px 0 6px;
        display: block;
    }

    .ss-drop {
        border: 2px dashed #d1d5db;
        border-radius: 9px;
        padding: 14px;
        text-align: center;
        cursor: pointer;
        transition: .2s;
        background: #f9fafb;
    }

    .ss-drop:hover {
        border-color: var(--orange);
        background: #fff7f0;
    }

    .ss-drop .ss-placeholder {
        color: #6b7280;
        font-size: .88rem;
    }

    .ss-drop .ss-placeholder span {
        font-size: 1.4rem;
        display: block;
        margin-bottom: 4px;
    }

    .ss-preview {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .ss-preview img {
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #e5e7eb;
    }

    .ss-preview .ss-fname {
        font-size: .8rem;
        color: #374151;
        flex: 1;
        word-break: break-all;
        text-align: left;
    }

    .ss-clear {
        background: #fee2e2;
        color: #dc2626;
        border: none;
        border-radius: 5px;
        padding: 3px 8px;
        font-size: .8rem;
        cursor: pointer;
    }
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
                        <input type="tel" id="userPhone" placeholder="e.g. 9876543210" maxlength="15"
                            autocomplete="tel">
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
                                    <option value="Industrial">Industrial</option>
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
                                <input type="number" id="plotArea" readonly value="0" min="0" step="1">
                                <span class="inp-note">Auto-calculated: Length × Width</span>
                            </div>

                            {{-- Floors --}}
                            <div class="inp-wrap">
                                <label>Number of Floors <small style="color:#9ca3af">(incl. basement if
                                        applicable)</small></label>
                                <input type="number" id="totalFloors" value="1" min="1" step="1">
                            </div>
                            <div class="inp-wrap">
                                <label>Built-up Area per Floor (sq.ft)</label>
                                <input type="number" id="builtupPerFloor" value="0" min="0" step="50">
                                <span class="inp-note">Auto‑synced with Plot Area (you may override)</span>
                            </div>

                            {{-- Basement toggle only – no area input (auto = plot area) --}}
                            <div class="inp-wrap">
                                <label>Basement Required</label>
                                <select id="basementReq">
                                    <option value="No" selected>No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                                <span class="inp-note" id="basementNote" style="display:none;">Basement area = Plot Area
                                    &middot; charged at <span id="basementMultText">1.5</span>&times; structure
                                    rate</span>
                            </div>

                            {{-- Computed totals (editable) --}}
                            <div class="inp-wrap">
                                <label>Total Built-up Area (sq.ft)</label>
                                <input type="number" id="totalBuiltup" value="0" min="0" step="1">
                                <span class="inp-note">Auto-calculated: Floors × Built-up Per Floor (you may
                                    override)</span>
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
                                    <option value="Yes">Yes (+<span id="contingencyRateText">5</span>%)</option>
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
                            <p style="color:#9ca3af;font-size:.95rem;">Fill all project details on the left,<br>then
                                press <strong>Calculate My Estimate</strong>.</p>
                        </div>
                    </div>

                    {{-- Actual result --}}
                    <div class="ep-card result-panel" id="resultPanel" style="display:none;">
                        <div class="ep-card-title"><span>💰</span> Cost Estimate Summary</div>
                        <table class="summary-table">
                            <colgroup>
                                <col style="width:65%">
                                <col style="width:35%">
                            </colgroup>
                            {{-- LOCKED: populated by JS only after payment confirmation --}}
                            <tbody id="breakdownRows" style="display:none;"></tbody>
                            {{-- Total always visible --}}
                            <tbody>
                                <tr class="total-row">
                                    <td><strong>Total Estimated Project Cost</strong></td>
                                    <td id="totalCostVal">₹0</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="gst-note mt-2">⚠️ Plus GST Extra As Applicable</div>

                        {{-- PAYMENT GATE (visible before payment) --}}
                        <div id="paymentSection">
                            <div class="lock-banner">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <rect x="3" y="11" width="18" height="11" rx="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                                Full breakdown locked · Pay <strong style="margin:0 3px;">₹99</strong> &amp; upload
                                screenshot to unlock
                            </div>
                            <div class="qr-payment-box">
                                <h5>Scan &amp; Pay to Unlock Breakdown</h5>
                                {{-- ⚠ Replace with your actual QR image at public/images/payment-qr.png --}}
                                <img src="{{ asset('assets/images/pay.jpeg') }}" alt="Payment QR Code" class="qr-img">
                                <div class="qr-amount">₹99 <span
                                        style="font-size:.9rem;font-weight:500;color:#374151;">incl. GST</span></div>
                                <div class="qr-sub">UPI / PhonePe / GPay / Paytm · Any payment app</div>
                            </div>

                            {{-- Screenshot upload --}}
                            <span class="ss-upload-label">📎 Upload Payment Screenshot <span
                                    style="color:#ef4444">*</span></span>
                            <div class="ss-drop" id="ssDrop"
                                onclick="document.getElementById('paymentScreenshot').click()">
                                <input type="file" id="paymentScreenshot" accept="image/*" style="display:none"
                                    onchange="handleScreenshot(this)">
                                <div id="ssPlaceholder" class="ss-placeholder">
                                    <span>📷</span>Click here to select your payment screenshot
                                    <div style="font-size:.75rem;color:#9ca3af;margin-top:3px;">JPG · PNG · WEBP · max 5
                                        MB</div>
                                </div>
                                <div id="ssPreview" class="ss-preview" style="display:none">
                                    <img id="ssPreviewImg" src="" alt="Screenshot Preview">
                                    <span id="ssFileName" class="ss-fname"></span>
                                    <button type="button" class="ss-clear" onclick="clearScreenshot(event)">✕
                                        Remove</button>
                                </div>
                            </div>
                            <div id="ssError" class="field-error"
                                style="display:none;color:#ef4444;font-size:.79rem;margin-top:4px;">
                                Please upload your payment screenshot first.
                            </div>

                            <button class="btn-paid" id="btnConfirmPayment" onclick="confirmPayment()" disabled>
                                ✅ &nbsp;I've Paid – Show Full Breakdown
                            </button>
                        </div>

                        {{-- UNLOCKED NOTE (visible after payment) --}}
                        <div id="paidNote" style="display:none;">
                            <div class="paid-success-note">
                                ✅ Payment confirmed · Full breakdown unlocked below
                            </div>
                        </div>
                    </div>
                </div>

            </div>{{-- end .row --}}

            {{-- CTA Box (hidden until calculated) --}}
            <div id="ctaPanel" style="display:none;">
                <div class="premium-box mt-4">
                    <div class="premium-text">
                        <h3>📋 Detailed BOQ &amp; Accurate Estimation</h3>
                        <p>For a fully detailed BOQ with item-wise quantities, Rate, specifications, and accurate
                            costing, please contact us for our professional paid estimation service.</p>
                        <div><strong>Total Built-up area: </strong><span id="premiumArea">0</span> sq.ft</div>
                    </div>
                    <div class="mb-3 mb-md-0" style="text-align:right;">
                        <div class="premium-price">₹4/sq.ft <span
                                style="font-size:.85rem;color:#cbd5e1;font-weight:400;">(incl. GST)</span></div>
                        <div style="font-weight:700;margin-top:4px;font-size:1.05rem;">
                            Total Estimation Charges: ₹<span id="estimationCharge">0</span>
                        </div>
                    </div>
                    <button class="btn-premium" id="contactBtn">📞 Request Professional Estimate</button>
                </div>
                <div class="note-text text-center mt-1 mb-4">
                    *For a fully detailed BOQ with item-wise quantities, specifications &amp; accurate costing, contact
                    us for our professional paid estimation service.
                </div>
            </div>

        </div>{{-- end #step2 --}}
    </div>
</section>

{{-- Toast notification --}}
<div class="ep-toast" id="epToast"></div>

{{-- ===================== SCRIPTS (FIXED) ===================== --}}
<script>
    // Rate data from PHP
    const allPricingData = @json($allPricings);

    let activePricing = allPricingData['Residential'];

    let structureRates = {};
    let finishingRates = {};
    let mepRates = {};
    let facadeRates = {};
    let externalRates = {};
    let locationMultiplier = {};
    let BASEMENT_MULTIPLIER = 1.50;
    let CONTINGENCY_RATE = 5.00;

    // Stores all calculation results; breakdown only rendered after payment
    let _calc = null;

    const WA_NUMBER = '919015444490';

    function updateActiveRates() {
        const type = document.getElementById('projectType').value;
        activePricing = allPricingData[type] || allPricingData['Residential'];

        structureRates = {
            Basic: activePricing.structure_basic,
            Standard: activePricing.structure_standard,
            Premium: activePricing.structure_premium
        };
        finishingRates = {
            Basic: activePricing.finishing_basic,
            Standard: activePricing.finishing_standard,
            Premium: activePricing.finishing_premium
        };
        mepRates = {
            Basic: activePricing.mep_basic,
            Standard: activePricing.mep_standard,
            Premium: activePricing.mep_premium
        };
        facadeRates = {
            Basic: activePricing.facade_basic,
            Standard: activePricing.facade_standard,
            Premium: activePricing.facade_premium
        };
        externalRates = {
            Basic: activePricing.external_basic,
            Standard: activePricing.external_standard,
            Premium: activePricing.external_premium
        };
        locationMultiplier = {
            Metro: activePricing.location_metro,
            Urban: activePricing.location_urban,
            Hill: activePricing.location_hill
        };
        BASEMENT_MULTIPLIER = activePricing.basement_multiplier;
        CONTINGENCY_RATE = activePricing.contingency_rate;

        // Update UI elements that depend on these rates
        const multSpan = document.getElementById('basementMultText');
        if (multSpan) multSpan.textContent = BASEMENT_MULTIPLIER;
        const contSpan = document.getElementById('contingencyRateText');
        if (contSpan) contSpan.textContent = CONTINGENCY_RATE;
    }

    // Initial call
    updateActiveRates();

    // Listener for project type change
    document.getElementById('projectType').addEventListener('change', updateActiveRates);

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
        const name = document.getElementById('userName').value.trim();
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

        check(name, 'errName', 'userName', v => v.length >= 2);
        check(email, 'errEmail', 'userEmail', v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v));
        check(phone, 'errPhone', 'userPhone', v => /^[6-9]\d{9}$/.test(v));

        if (!valid) return;

        // Animate step tracker
        const sc1 = document.getElementById('sc1');
        sc1.classList.replace('active', 'done');
        sc1.innerHTML = '<i class="fas fa-check" style="font-size:.8rem"></i>';
        document.getElementById('sl1').className = 'step-label done';
        document.getElementById('conn1').classList.add('done');
        document.getElementById('sc2').classList.add('active');
        document.getElementById('sl2').classList.add('active');

        document.getElementById('badgeName').textContent = name;
        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'block';
        document.getElementById('step2').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });

        // Auto-update readonly fields when inputs change
        updateReadonlyFields();
    }

    // Allow Enter key
    ['userName', 'userEmail', 'userPhone'].forEach(id => {
        document.getElementById(id)?.addEventListener('keydown', e => {
            if (e.key === 'Enter') proceedToCalculator();
        });
    });

    // ---------------------------------------------------------------
    // Basement toggle – show info note, no area input needed
    // ---------------------------------------------------------------
    document.getElementById('basementReq')?.addEventListener('change', function() {
        const note = document.getElementById('basementNote');
        if (note) note.style.display = this.value === 'Yes' ? 'block' : 'none';
    });

    // ---------------------------------------------------------------
    // Keep readonly fields (plot area, total builtup) updated live
    // ---------------------------------------------------------------
    function updateReadonlyFields() {
        const len = +document.getElementById('plotLength').value || 0;
        const wid = +document.getElementById('plotWidth').value || 0;

        // Auto-calculate Plot Area
        const plotArea = len * wid;
        document.getElementById('plotArea').value = plotArea.toFixed(0);

        // Auto-sync builtupPerFloor with plotArea (user may override manually)
        document.getElementById('builtupPerFloor').value = plotArea.toFixed(0);

        const floors = +document.getElementById('totalFloors').value || 1;
        // Total Built-up Area = ALL floors × builtupPerFloor (actual total area incl. basement)
        document.getElementById('totalBuiltup').value = (plotArea * floors).toFixed(0);
    }

    function updateTotalBuiltup() {
        const builtupPerFloor = +document.getElementById('builtupPerFloor').value || 0;
        const floors = +document.getElementById('totalFloors').value || 1;
        // Total Built-up Area = ALL floors × builtupPerFloor (actual total area incl. basement)
        document.getElementById('totalBuiltup').value = (builtupPerFloor * floors).toFixed(0);
    }

    // Listen to dimension & floor changes
    ['plotLength', 'plotWidth', 'totalFloors'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', updateReadonlyFields);
    });

    // When user manually changes builtupPerFloor, recalculate totalBuiltup
    document.getElementById('builtupPerFloor')?.addEventListener('input', updateTotalBuiltup);

    // When basement toggle changes, recalculate totalBuiltup immediately
    document.getElementById('basementReq')?.addEventListener('change', updateTotalBuiltup);

    // ---------------------------------------------------------------
    // MAIN CALCULATION – triggered ONLY by the button
    // ---------------------------------------------------------------
    function runCalculation() {
        const btn = document.getElementById('btnCalculate');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Calculating…';

        // Get current values (all auto-synced already)
        const plotArea = +document.getElementById('plotArea').value || 0;
        const plotLength = +document.getElementById('plotLength').value || 0;
        const floors = +document.getElementById('totalFloors').value || 1;
        const builtupPerFloor = +document.getElementById('builtupPerFloor').value || plotArea;
        const totalBuiltup = +document.getElementById('totalBuiltup').value || (builtupPerFloor * floors);

        const hasBasement = document.getElementById('basementReq').value === 'Yes';

        const stQ = document.getElementById('structureQuality').value;
        const fiQ = document.getElementById('finishingQuality').value;
        const meQ = document.getElementById('mepQuality').value;
        const faQ = document.getElementById('facadeType').value;
        const exQ = document.getElementById('externalDev').value;
        const loc = document.getElementById('location').value;
        const con = document.getElementById('contingency').value;

        // ---- Core costs ----
        // Structure: when basement=Yes, (floors-1) above-ground + 1 basement at 1.5× rate
        const aboveGroundFloors = hasBasement ? (floors - 1) : floors;
        const structureCost = aboveGroundFloors * builtupPerFloor * structureRates[stQ];
        const basementCost = hasBasement ? (builtupPerFloor * structureRates[stQ] * BASEMENT_MULTIPLIER) : 0;
        const basementArea = hasBasement ? builtupPerFloor : 0;

        // Finishing & MEP: apply to full totalBuiltup (all floors incl. basement)
        const finishingCost = totalBuiltup * finishingRates[fiQ];
        const mepCost = totalBuiltup * mepRates[meQ];

        // Facade: plotLength × totalFloors × 10.50 (floor height) × facadeRate
        const FLOOR_HEIGHT = 10.50;
        const facadeCost = plotLength * floors * FLOOR_HEIGHT * facadeRates[faQ];

        // External Development: only on area NOT covered by building footprint
        const externalCost = (plotArea - builtupPerFloor) * externalRates[exQ];

        // ---- Location factor ----
        const subtotal = structureCost + basementCost + finishingCost + mepCost + facadeCost + externalCost;
        const locMulti = locationMultiplier[loc];
        const locationAdded = subtotal * (locMulti - 1);
        const afterLocation = subtotal + locationAdded;

        // ---- Contingency ----
        const contingencyAmt = (con === 'Yes') ? afterLocation * (CONTINGENCY_RATE / 100) : 0;
        const totalCost = afterLocation + contingencyAmt;

        // ---- Store all values (breakdown NOT written to DOM yet – payment gate) ----
        _calc = {
            structureCost,
            basementCost,
            finishingCost,
            mepCost,
            facadeCost,
            externalCost,
            locationAdded,
            contingencyAmt,
            totalCost,
            hasBasement,
            name: document.getElementById('userName').value.trim(),
            email: document.getElementById('userEmail').value.trim(),
            phone: document.getElementById('userPhone').value.trim(),
            projectType: document.getElementById('projectType').value,
            plotLength: +document.getElementById('plotLength').value || 0,
            plotWidth: +document.getElementById('plotWidth').value || 0,
            plotArea,
            floors,
            builtupPerFloor,
            totalBuiltup,
            basementArea,
            stQ,
            fiQ,
            meQ,
            faQ,
            exQ,
            loc,
            con,
        };

        // ---- Show only TOTAL; reset payment gate ----
        document.getElementById('totalCostVal').textContent = fmt(totalCost);
        document.getElementById('breakdownRows').style.display = 'none';
        document.getElementById('breakdownRows').innerHTML = '';
        document.getElementById('paymentSection').style.display = 'block';
        document.getElementById('paidNote').style.display = 'none';

        // Premium area & estimation charge (CTA box)
        const totalArea = totalBuiltup + basementArea;
        document.getElementById('premiumArea').textContent = totalArea.toFixed(0);
        document.getElementById('estimationCharge').textContent = (totalArea * 4).toLocaleString('en-IN');

        // Show result panel & CTA
        document.getElementById('resultPlaceholder').style.display = 'none';
        document.getElementById('resultPanel').style.display = 'block';
        document.getElementById('ctaPanel').style.display = 'block';

        // Scroll to result
        setTimeout(() => {
            document.getElementById('resultPanel').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }, 100);

        // ---- Store enquiry in DB (admin) ----
        const payload = {
            _token: CSRF,
            name: _calc.name,
            email: _calc.email,
            phone: _calc.phone,
            project_type: _calc.projectType,
            plot_length: _calc.plotLength,
            plot_width: _calc.plotWidth,
            plot_area: plotArea,
            builtup_per_floor: builtupPerFloor,
            total_floors: floors,
            total_builtup: totalBuiltup,
            basement_required: document.getElementById('basementReq').value,
            basement_area: basementArea,
            structure_quality: stQ,
            finishing_quality: fiQ,
            mep_quality: meQ,
            facade_type: faQ,
            external_dev: exQ,
            location: loc,
            contingency: con,
            structure_cost: structureCost,
            basement_cost: basementCost,
            finishing_cost: finishingCost,
            mep_cost: mepCost,
            facade_cost: facadeCost,
            external_cost: externalCost,
            location_factor: locationAdded,
            contingency_amount: contingencyAmt,
            total_cost: totalCost,
        };

        fetch(STORE_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF
                },
                body: JSON.stringify(payload),
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) showToast('Estimate saved! Scan QR to unlock full breakdown.', 'success');
            })
            .catch(() => {})
            .finally(() => {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-redo"></i> Recalculate';
            });

        // ---- WhatsApp: send basic enquiry to admin ----
        sendWhatsAppEnquiry();
    }

    // ---------------------------------------------------------------
    // WhatsApp: basic enquiry (on Calculate)
    // ---------------------------------------------------------------
    function sendWhatsAppEnquiry() {
        if (!_calc) return;
        const c = _calc;
        const msg =
            `🏗 New Calculator Enquiry – Eshan Buildwell
──────────────────────
👤 Name : ${c.name}
📞 Phone: ${c.phone}
📧 Email: ${c.email}
──────────────────────
📐 Project Details
• Type     : ${c.projectType}
• Plot     : ${c.plotLength} ft × ${c.plotWidth} ft = ${c.plotArea} sq.ft
• Floors   : ${c.floors} (incl. basement if applicable)
• Basement : ${c.hasBasement ? 'Yes' : 'No'}
• Location : ${c.loc}
• Structure: ${c.stQ} | Finishing: ${c.fiQ} | MEP: ${c.meQ}
──────────────────────
💰 Total Estimated Cost: ${fmt(c.totalCost)}
(Breakdown pending ₹99 payment)
──────────────────────
Sent via EshanBuildwell.com Calculator`;

        window.open(`https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(msg)}`, '_blank');
    }

    // ---------------------------------------------------------------
    // Screenshot upload handlers
    // ---------------------------------------------------------------
    function handleScreenshot(input) {
        const file = input.files[0];
        if (!file) return;
        if (!file.type.startsWith('image/')) {
            showToast('Please select an image file (JPG/PNG/WEBP)', 'error');
            input.value = '';
            return;
        }
        if (file.size > 5 * 1024 * 1024) {
            showToast('Image must be under 5 MB', 'error');
            input.value = '';
            return;
        }
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('ssPreviewImg').src = e.target.result;
            document.getElementById('ssFileName').textContent = file.name;
            document.getElementById('ssPlaceholder').style.display = 'none';
            document.getElementById('ssPreview').style.display = 'flex';
            document.getElementById('btnConfirmPayment').disabled = false;
            document.getElementById('ssError').style.display = 'none';
        };
        reader.readAsDataURL(file);
    }

    function clearScreenshot(evt) {
        evt.stopPropagation();
        document.getElementById('paymentScreenshot').value = '';
        document.getElementById('ssPreviewImg').src = '';
        document.getElementById('ssFileName').textContent = '';
        document.getElementById('ssPlaceholder').style.display = 'block';
        document.getElementById('ssPreview').style.display = 'none';
        document.getElementById('btnConfirmPayment').disabled = true;
    }

    // ---------------------------------------------------------------
    // Payment confirmed – upload screenshot, reveal breakdown, WhatsApp both
    // ---------------------------------------------------------------
    function confirmPayment() {
        if (!_calc) return;

        const fileInput = document.getElementById('paymentScreenshot');
        if (!fileInput.files.length) {
            document.getElementById('ssError').style.display = 'block';
            return;
        }

        const btn = document.getElementById('btnConfirmPayment');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Uploading & Unlocking…';

        // Upload screenshot to server
        const formData = new FormData();
        formData.append('screenshot', fileInput.files[0]);
        formData.append('enquiry_name', _calc.name);
        formData.append('enquiry_phone', _calc.phone);
        formData.append('_token', CSRF);

        fetch('{{ route("calculator.payment.confirm") }}', {
                method: 'POST',
                body: formData,
            })
            .then(r => r.json())
            .catch(() => ({
                success: false
            }))
            .finally(() => {
                // Reveal breakdown regardless of upload outcome
                revealBreakdown();
                btn.disabled = false;
                btn.innerHTML = '✅ Breakdown Unlocked';
            });
    }

    function revealBreakdown() {
        const c = _calc;

        // Build breakdown rows now (first time entering DOM)
        const tbody = document.getElementById('breakdownRows');
        tbody.innerHTML = `
        <tr><td>Structure Cost</td><td>${fmt(c.structureCost)}</td></tr>
        ${c.hasBasement ? `<tr><td>Basement Cost</td><td>${fmt(c.basementCost)}</td></tr>` : ''}
        <tr><td>Finishing Cost</td><td>${fmt(c.finishingCost)}</td></tr>
        <tr><td>MEP Services</td><td>${fmt(c.mepCost)}</td></tr>
        <tr><td>Front Facade Cost</td><td>${fmt(c.facadeCost)}</td></tr>
        <tr><td>External Work Cost</td><td>${fmt(c.externalCost)}</td></tr>
        <tr><td>Location Factor</td><td>${fmt(c.locationAdded)}</td></tr>
        <tr><td>Contingency (Extra Buffer)</td><td>${fmt(c.contingencyAmt)}</td></tr>`;
        tbody.style.display = '';

        document.getElementById('paymentSection').style.display = 'none';
        document.getElementById('paidNote').style.display = 'block';

        showToast('Breakdown unlocked! Summary sent to your WhatsApp.', 'success');

        // Send breakdown to OWNER WhatsApp
        sendWhatsAppBreakdown(WA_NUMBER);

        // Send same breakdown to USER WhatsApp (1.5s delay so both windows open)
        setTimeout(() => {
            const userWa = formatWANumber(_calc.phone);
            if (userWa) sendWhatsAppBreakdown(userWa);
        }, 1500);
    }

    // Format Indian phone number for WhatsApp (add 91 if 10 digits)
    function formatWANumber(phone) {
        const digits = phone.replace(/\D/g, '');
        if (digits.length === 10) return '91' + digits;
        if (digits.length === 12 && digits.startsWith('91')) return digits;
        return digits.length >= 10 ? digits : null;
    }

    // ---------------------------------------------------------------
    // WhatsApp: full breakdown (after payment) — toNumber can be owner or user
    // ---------------------------------------------------------------
    function sendWhatsAppBreakdown(toNumber) {
        if (!_calc) return;
        const c = _calc;
        let breakdown =
            `✅ Payment Confirmed – Full Breakdown
──────────────────────
👤 Name : ${c.name}
📞 Phone: ${c.phone}
📧 Email: ${c.email}
──────────────────────
📊 Cost Breakdown
• Structure Cost  : ${fmt(c.structureCost)}`;

        if (c.hasBasement)
            breakdown += `\n• Basement Cost   : ${fmt(c.basementCost)}`;

        breakdown +=
            `
• Finishing Cost  : ${fmt(c.finishingCost)}
• MEP Services    : ${fmt(c.mepCost)}
• Front Facade    : ${fmt(c.facadeCost)}
• External Work   : ${fmt(c.externalCost)}
• Location Factor : ${fmt(c.locationAdded)}
• Contingency     : ${fmt(c.contingencyAmt)}
──────────────────────
💰 TOTAL: ${fmt(c.totalCost)}
⚠ Plus GST Extra As Applicable
──────────────────────
Sent via EshanBuildwell.com Calculator`;

        window.open(`https://wa.me/${toNumber}?text=${encodeURIComponent(breakdown)}`, '_blank');
    }

    // ---------------------------------------------------------------
    // Contact CTA button (Detailed BOQ enquiry via WhatsApp)
    // ---------------------------------------------------------------
    document.getElementById('contactBtn')?.addEventListener('click', () => {
        if (!_calc) return;
        const area = document.getElementById('premiumArea').textContent;
        const charge = document.getElementById('estimationCharge').textContent;
        const msg =
            `📋 Detailed BOQ Request – Eshan Buildwell
👤 Name : ${_calc.name}
📞 Phone: ${_calc.phone}
📐 Total Built-up Area: ${area} sq.ft
💰 Estimation Charges: ₹${charge} (₹4/sq.ft incl. GST)
Request for full detailed BOQ with item-wise quantities & specifications.`;
        window.open(`https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(msg)}`, '_blank');
    });
</script>
@endsection