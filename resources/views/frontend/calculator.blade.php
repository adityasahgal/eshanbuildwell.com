@extends('layouts.master')

@php
$meta_title = "Eshan Buildwell – Expert Construction Services";
$meta_description = "Eshan Buildwell offers expert construction services for residential, commercial, and industrial projects. With 15+ years of experience, we deliver quality workmanship, accurate BOQ preparation, and on-time project completion. Get your free estimate now!";
$keywords = "Eshan Buildwell, construction services, residential construction, commercial construction, industrial construction, project management consultancy, turnkey construction, accurate BOQ preparation, quality workmanship, construction company Delhi NCR";
@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop

@section('content')
<section class="hero-banner"><div class="container"><div class="hero-content"><h1>Building Estimate Calculator</h1><div class="hero-divider"></div><p>Get an Instant Estimate for Your Construction Project</p></div></div></section>
<div class="breadcrumb-bar"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.html">Home</a></li><li class="breadcrumb-item active">Building Estimate Calculator</li></ol></nav></div></div>
<style>
    .estimate-pro {
        font-family: inherit;
    }
    .estimate-pro .card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        padding: 24px;
        margin-bottom: 24px;
        border: 1px solid #eaeaea;
    }
    .estimate-pro .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: var(--navy);
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .estimate-pro .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 20px;
    }
    .estimate-pro .input-group {
        display: flex;
        flex-direction: column;
    }
    .estimate-pro .input-group label {
        font-size: 0.9rem;
        color: #4b5563;
        margin-bottom: 8px;
        font-weight: 500;
    }
    .estimate-pro .input-group input, .estimate-pro .input-group select {
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 1rem;
        outline: none;
        transition: border-color 0.2s;
        width: 100%;
        background-color: #fff;
    }
    .estimate-pro .input-group input:focus, .estimate-pro .input-group select:focus {
        border-color: var(--orange);
    }
    .estimate-pro .input-group input[readonly] {
        background: #f3f4f6;
        color: #6b7280;
        cursor: not-allowed;
    }
    .estimate-pro .badge {
        background: #e0e7ff;
        color: #4338ca;
        font-size: 0.7rem;
        padding: 2px 6px;
        border-radius: 4px;
        margin-left: 5px;
    }
    .estimate-pro .summary-table {
        width: 100%;
        border-collapse: collapse;
    }
    .estimate-pro .summary-table td {
        padding: 12px 0;
        border-bottom: 1px solid #e5e7eb;
        font-size: 0.95rem;
        color: #374151;
    }
    .estimate-pro .summary-table td:last-child {
        text-align: right;
        font-weight: 600;
        color: #111827;
    }
    .estimate-pro .summary-table .total-row td {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--orange);
        border-bottom: none;
        padding-top: 16px;
    }
    .estimate-pro .gst-note {
        font-size: 0.85rem;
        color: #ef4444;
        text-align: right;
        margin-top: 8px;
        font-weight: 500;
    }
    .estimate-pro .note-text {
        font-size: 0.85rem;
        color: #6b7280;
        line-height: 1.5;
        margin-top: 15px;
    }
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
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .estimate-pro .premium-text h3 {
        margin: 0 0 10px 0;
        font-size: 1.3rem;
        color: #fff;
    }
    .estimate-pro .premium-text p {
        margin: 0 0 10px 0;
        color: #cbd5e1;
        font-size: 0.95rem;
    }
    .estimate-pro .btn-premium {
        background: var(--orange);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
        text-decoration: none;
        display: inline-block;
    }
    .estimate-pro .btn-premium:hover {
        background: #e65c00;
        color: white;
    }
    .estimate-pro .price-block {
        text-align: right;
    }
    .estimate-pro .premium-price {
        font-size: 1.1rem;
        font-weight: 600;
        color: #fbbf24;
    }
    
    /* Paywall styling */
    .estimate-pro .locked-wrapper {
        position: relative;
    }
    .estimate-pro .locked-content {
        filter: blur(8px);
        pointer-events: none;
        user-select: none;
        opacity: 0.5;
        transition: filter 0.5s ease, opacity 0.5s ease;
    }
    .estimate-pro .locked-content.unlocked {
        filter: blur(0);
        pointer-events: auto;
        opacity: 1;
    }
    .estimate-pro .paywall-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        border-radius: 12px;
        background: rgba(255,255,255,0.3);
        transition: opacity 0.4s ease;
    }
    .estimate-pro .paywall-overlay.hidden {
        opacity: 0;
        pointer-events: none;
    }
    .estimate-pro .paywall-card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        text-align: center;
        max-width: 400px;
        border: 1px solid #f1f5f9;
        margin: 15px;
    }
    .estimate-pro .paywall-card i {
        font-size: 2.5rem;
        color: var(--orange);
        margin-bottom: 15px;
    }
    .estimate-pro .paywall-card h4 {
        color: var(--navy);
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 1.3rem;
    }
    .estimate-pro .paywall-card p {
        color: #475569;
        font-size: 0.95rem;
        margin-bottom: 20px;
    }
</style>

<section class="py-5 bg-light estimate-pro">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="sec-title mb-2">🏗️ EstimatePro</h2>
            <p class="sec-sub">Preliminary construction estimate • Real-time calculations</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-title">
                        <span>📐</span> Project Inputs
                    </div>
                    <div class="form-grid">
                        <div class="input-group">
                            <label>Project Type <span class="badge">Client visible</span></label>
                            <select id="projectType">
                                <option value="Residential">Residential</option>
                                <option value="Commercial">Commercial</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Plot Length (ft)</label>
                            <input type="number" id="plotLength" value="30" step="1">
                        </div>
                        <div class="input-group">
                            <label>Plot Width (ft)</label>
                            <input type="number" id="plotWidth" value="60" step="1">
                        </div>
                        <div class="input-group">
                            <label>Plot Area (sq.ft)</label>
                            <input type="number" id="plotArea" readonly>
                        </div>
                        <div class="input-group">
                            <label>Built-up Area per Floor (sq.ft)</label>
                            <input type="number" id="builtupPerFloor" value="1800" step="100">
                        </div>
                        <div class="input-group">
                            <label>Total Floors (incl. basement)</label>
                            <input type="number" id="totalFloors" value="4" step="1" min="1">
                        </div>
                        <div class="input-group">
                            <label>Total Built-up Area (sq.ft)</label>
                            <input type="number" id="totalBuiltup" readonly>
                        </div>
                        <div class="input-group">
                            <label>Basement Required</label>
                            <select id="basementReq">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Structure Quality</label>
                            <select id="structureQuality">
                                <option value="Basic">Basic</option>
                                <option value="Standard" selected>Standard</option>
                                <option value="Premium">Premium</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Finishing Quality</label>
                            <select id="finishingQuality">
                                <option value="Basic">Basic</option>
                                <option value="Standard" selected>Standard</option>
                                <option value="Premium">Premium</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>MEP Services</label>
                            <select id="mepQuality">
                                <option value="Basic">Basic</option>
                                <option value="Standard" selected>Standard</option>
                                <option value="Premium">Premium</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Front Facade Type</label>
                            <select id="facadeType">
                                <option value="Basic">Basic</option>
                                <option value="Standard" selected>Standard</option>
                                <option value="Premium">Premium</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>External Development</label>
                            <select id="externalDev">
                                <option value="Basic">Basic</option>
                                <option value="Standard" selected>Standard</option>
                                <option value="Premium">Premium</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Project Location</label>
                            <select id="location">
                                <option value="Metro">Metro</option>
                                <option value="Urban" selected>Urban</option>
                                <option value="Hill">Hill</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Contingency (Extra Buffer)</label>
                            <select id="contingency">
                                <option value="Yes">Yes (5%)</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="locked-wrapper h-100">
                    <div class="card h-100 locked-content" id="summaryContent">
                        <div class="card-title">
                            <span>💰</span> Cost Estimate Summary
                        </div>
                        <table class="summary-table" id="summaryTable">
                            <tr><td>Structure Cost</td><td id="structureCostVal">₹0</td></tr>
                            <tr><td>Finishing Cost</td><td id="finishingCostVal">₹0</td></tr>
                            <tr><td>MEP Services</td><td id="mepCostVal">₹0</td></tr>
                            <tr><td>Front Facade Cost</td><td id="facadeCostVal">₹0</td></tr>
                            <tr><td>External Work Cost</td><td id="externalCostVal">₹0</td></tr>
                            <tr><td>Location Factor</td><td id="locationFactorVal">₹0</td></tr>
                            <tr><td>Contingency (Buffer)</td><td id="contingencyVal">₹0</td></tr>
                            <tr class="total-row"><td>Total Estimated Cost</td><td id="totalCostVal">₹0</td></tr>
                        </table>
                        <div class="gst-note">⚠️ Plus GST extra as applicable</div>
                        <div class="note-text">
                            🔍 This is an approximate cost estimate based on basic inputs. Final cost may vary based on design, specifications, and site conditions.
                        </div>
                    </div>
                    
                    <div class="paywall-overlay" id="paywallOverlay">
                        <div class="paywall-card">
                            <i class="bi bi-shield-lock-fill"></i>
                            <h4>Result is Ready!</h4>
                            <p>Pay a small fee to unlock your customized comprehensive cost summary generated in real-time.</p>
                            <button class="btn-premium w-100 mb-3" onclick="unlockEstimate()">💳 Pay ₹199 to Unlock Estimate</button>
                            <small class="text-muted d-block">Secure payment simulation.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="premium-box mt-4">
            <div class="premium-text">
                <h3>📋 Detailed BOQ & Accurate Estimation</h3>
                <p>Get item-wise quantities, rates, specifications & accurate costing</p>
                <div><strong>Total Built-up area: </strong><span id="premiumArea">7200</span> sq.ft</div>
            </div>
            <div class="price-block mb-3 mb-md-0">
                <div class="premium-price">₹4/sq.ft <span style="font-size: 0.9rem; color: #cbd5e1; font-weight: 400;">(incl. GST)</span></div>
                <div style="font-weight: 700; margin-top: 5px; font-size: 1.1rem;">Estimation Charges: ₹<span id="estimationCharge">28800</span></div>
            </div>
            <button class="btn-premium" id="contactBtn">📞 Request Professional Estimate</button>
        </div>
        <div class="note-text text-center mt-3">
            *For a fully detailed BOQ with item-wise quantities, specifications, and accurate costing, please contact us for our professional paid estimation service.
        </div>
    </div>
</section>

<script>
    // Rate Tables (per sqft built-up area)
    const structureRates = { Basic: 1100, Standard: 1450, Premium: 1900 };
    const finishingRates = { Basic: 500, Standard: 800, Premium: 1250 };
    const mepRates = { Basic: 200, Standard: 350, Premium: 550 };
    const facadeRates = { Basic: 105, Standard: 180, Premium: 280 };   // based on Plot Area
    const externalRates = { Basic: 0, Standard: 80, Premium: 150 };      // per plot area

    // Location Multipliers
    const locationMultiplier = { Metro: 1.1, Urban: 1.0, Hill: 1.2 };

    // DOM Elements
    const plotLength = document.getElementById('plotLength');
    const plotWidth = document.getElementById('plotWidth');
    const plotAreaInput = document.getElementById('plotArea');
    const builtupPerFloor = document.getElementById('builtupPerFloor');
    const totalFloors = document.getElementById('totalFloors');
    const totalBuiltupInput = document.getElementById('totalBuiltup');
    const structureQuality = document.getElementById('structureQuality');
    const finishingQuality = document.getElementById('finishingQuality');
    const mepQuality = document.getElementById('mepQuality');
    const facadeType = document.getElementById('facadeType');
    const externalDev = document.getElementById('externalDev');
    const locationSelect = document.getElementById('location');
    const contingencySelect = document.getElementById('contingency');

    // Summary cells
    const structureCostVal = document.getElementById('structureCostVal');
    const finishingCostVal = document.getElementById('finishingCostVal');
    const mepCostVal = document.getElementById('mepCostVal');
    const facadeCostVal = document.getElementById('facadeCostVal');
    const externalCostVal = document.getElementById('externalCostVal');
    const locationFactorVal = document.getElementById('locationFactorVal');
    const contingencyVal = document.getElementById('contingencyVal');
    const totalCostVal = document.getElementById('totalCostVal');
    const premiumAreaSpan = document.getElementById('premiumArea');
    const estimationChargeSpan = document.getElementById('estimationCharge');

    let isUnlocked = false;

    function calculateAll() {
        // Plot Area
        let length = parseFloat(plotLength.value) || 0;
        let width = parseFloat(plotWidth.value) || 0;
        let plotArea = length * width;
        plotAreaInput.value = plotArea.toFixed(0);

        // Built-up validation: must be <= plot area
        let builtupPerFloorVal = parseFloat(builtupPerFloor.value) || 0;
        if (builtupPerFloorVal > plotArea && plotArea > 0) {
            builtupPerFloorVal = plotArea;
            builtupPerFloor.value = plotArea;
        }
        let floors = parseFloat(totalFloors.value) || 1;
        let totalBuiltup = builtupPerFloorVal * floors;
        totalBuiltupInput.value = totalBuiltup.toFixed(0);
        
        // Update premium area display
        premiumAreaSpan.innerText = totalBuiltup.toFixed(0);

        // Structure Cost
        let structureRate = structureRates[structureQuality.value];
        let structureCost = totalBuiltup * structureRate;
        
        // Finishing Cost
        let finishRate = finishingRates[finishingQuality.value];
        let finishingCost = totalBuiltup * finishRate;
        
        // MEP Cost
        let mepRate = mepRates[mepQuality.value];
        let mepCost = totalBuiltup * mepRate;
        
        // Front Facade Cost (based on Plot Area)
        let facadeRate = facadeRates[facadeType.value];
        let facadeCost = plotArea * facadeRate;
        
        // External Development Cost (based on Plot Area)
        let extRate = externalRates[externalDev.value];
        let externalCost = plotArea * extRate;
        
        // Subtotal before location factor
        let subtotal = structureCost + finishingCost + mepCost + facadeCost + externalCost;
        
        // Location Factor
        let locMulti = locationMultiplier[locationSelect.value];
        let locationAdded = subtotal * (locMulti - 1);
        let afterLocation = subtotal + locationAdded;
        
        // Contingency (5% if Yes)
        let contingencyAmount = 0;
        let isContingency = contingencySelect.value === 'Yes';
        if (isContingency) {
            contingencyAmount = afterLocation * 0.05;
        }
        let totalCost = afterLocation + contingencyAmount;
        
        // Update DOM with formatting
        structureCostVal.innerText = formatCurrency(structureCost);
        finishingCostVal.innerText = formatCurrency(finishingCost);
        mepCostVal.innerText = formatCurrency(mepCost);
        facadeCostVal.innerText = formatCurrency(facadeCost);
        externalCostVal.innerText = formatCurrency(externalCost);
        locationFactorVal.innerText = formatCurrency(locationAdded);
        contingencyVal.innerText = formatCurrency(contingencyAmount);
        totalCostVal.innerText = formatCurrency(totalCost);
        
        // Accurate estimation service charge
        let estimationTotal = totalBuiltup * 4;
        estimationChargeSpan.innerText = estimationTotal.toLocaleString('en-IN');
    }
    
    function formatCurrency(value) {
        return '₹' + Math.round(value).toLocaleString('en-IN');
    }
    
    // Add event listeners to all inputs
    const inputs = [
        plotLength, plotWidth, builtupPerFloor, totalFloors,
        structureQuality, finishingQuality, mepQuality, facadeType,
        externalDev, locationSelect, contingencySelect
    ];
    inputs.forEach(input => {
        input.addEventListener('input', calculateAll);
        input.addEventListener('change', calculateAll);
    });
    
    // Additional validation: ensure builtup per floor not > plot area when plot area changes
    function validateBuiltup() {
        let plotAreaVal = parseFloat(plotAreaInput.value) || 0;
        let currentBuiltup = parseFloat(builtupPerFloor.value) || 0;
        if (currentBuiltup > plotAreaVal && plotAreaVal > 0) {
            builtupPerFloor.value = plotAreaVal;
        }
        calculateAll();
    }
    
    plotLength.addEventListener('input', () => {
        calculateAll();
        validateBuiltup();
    });
    plotWidth.addEventListener('input', () => {
        calculateAll();
        validateBuiltup();
    });
    builtupPerFloor.addEventListener('input', validateBuiltup);
    
    // Contact button demo action
    document.getElementById('contactBtn').addEventListener('click', () => {
        alert("📞 Thank you for your interest! Our expert team will get in touch with a detailed BOQ & accurate estimation.");
    });
    
    function unlockEstimate() {
        // Simulate a payment gateway integration
        let conf = confirm("Simulating Payment Gateway...\nDo you want to complete the payment of ₹199?");
        if (conf) {
            isUnlocked = true;
            document.getElementById('summaryContent').classList.add('unlocked');
            document.getElementById('paywallOverlay').classList.add('hidden');
            // alert("Payment successful! Estimate summary is now unlocked.");
        }
    }

    // Initial load
    calculateAll();
</script>

@endsection 