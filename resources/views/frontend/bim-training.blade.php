@extends('layouts.master')

@php
$meta_title = "BIM Training Program – Eshan Buildwell | Revit, Navisworks & BIM Coordination";
$meta_description = "Join Eshan Buildwell's industry-focused BIM Training Program. Master Autodesk Revit, Navisworks,
BIM coordination, and clash detection from real project experts. Certification provided. Enroll now!";
$keywords = "BIM Training, Revit Training, Navisworks Course, Building Information Modeling, BIM Coordination,
Construction Technology Training, Eshan Buildwell Training, Delhi NCR BIM Course";
@endphp

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop

@section('content')

<style>
    /* ======= BIM TRAINING PAGE THEME ENHANCEMENTS ======= */
    .bim-enroll-sidebar {
        position: sticky;
        top: 100px;
        z-index: 10;
    }

    .module-card {
        background: #fff;
        border-radius: var(--radius-lg);
        padding: 30px;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border);
        height: 100%;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .module-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: rgba(232, 119, 34, 0.2);
    }

    .module-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: var(--orange);
        opacity: 0.8;
    }

    .module-num {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 3.5rem;
        font-weight: 800;
        color: rgba(26, 42, 74, 0.04);
        position: absolute;
        top: 10px;
        right: 20px;
        line-height: 1;
    }

    .module-icon {
        width: 52px;
        height: 52px;
        background: var(--orange-lt);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--orange);
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    .module-topics {
        list-style: none;
        padding: 0;
        margin: 15px 0 0;
    }

    .module-topics li {
        font-size: 0.9rem;
        color: var(--text);
        padding: 4px 0;
        display: flex;
        gap: 10px;
    }

    .module-topics li i {
        color: var(--orange);
        font-size: 0.8rem;
        margin-top: 5px;
    }

    .module-duration {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--gray-bg);
        color: var(--navy);
        font-size: 0.75rem;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 20px;
        margin-top: 20px;
    }

    /* Enrollment Card Enhancement */
    .enroll-card {
        background: var(--navy);
        border-radius: var(--radius-lg);
        padding: 35px 30px;
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: var(--shadow-lg);
    }

    .enroll-detail {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .enroll-detail:last-child {
        border: none;
    }

    .enroll-detail i {
        width: 38px;
        height: 38px;
        background: rgba(232, 119, 34, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--orange);
        font-size: 1.1rem;
    }

    .enroll-detail-txt .lbl {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.6);
    }

    .enroll-detail-txt .val {
        font-weight: 600;
        font-size: 1rem;
        color: #fff;
    }

    /* Tool Pill */
    .tool-pill {
        background: #fff;
        border: 1px solid var(--border);
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--navy);
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
    }

    .tool-pill:hover {
        background: var(--orange-lt);
        border-color: var(--orange);
        color: var(--orange);
    }

    .tool-pill i {
        color: var(--orange);
    }

    /* Whom Card */
    .whom-card {
        background: #fff;
        padding: 24px;
        border-radius: var(--radius-md);
        border: 1px solid var(--border);
        display: flex;
        gap: 1.2rem;
        transition: all 0.3s ease;
        height: 100%;
    }

    .whom-card:hover {
        transform: translateX(8px);
        border-color: var(--orange);
        background: var(--orange-lt);
    }

    .whom-icon {
        width: 48px;
        height: 48px;
        background: var(--navy);
        color: #fff;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    /* FAQ */
    .faq-box {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 12px;
        margin-bottom: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-box.open {
        border-color: var(--orange);
        box-shadow: var(--shadow-sm);
    }

    .faq-btn {
        width: 100%;
        padding: 1.2rem 1.5rem;
        border: none;
        background: none;
        text-align: left;
        font-weight: 700;
        color: var(--navy);
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 1.1rem;
        font-family: 'Barlow Condensed', sans-serif;
    }

    .faq-box i {
        color: var(--orange);
        transition: transform 0.3s;
        font-size: 1.1rem;
    }

    .faq-box.open i {
        transform: rotate(45deg);
    }

    .faq-ans {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .faq-ans-inner {
        padding: 0 1.5rem 1.2rem;
        font-size: 0.92rem;
        color: var(--muted);
        border-top: 1px solid var(--border);
        padding-top: 1rem;
        line-height: 1.7;
    }

    .faq-box.open .faq-ans {
        max-height: 300px;
    }

    @media (max-width: 991px) {
        .bim-enroll-sidebar {
            position: static;
            margin-top: 40px;
        }
    }
</style>

<div class="bim-page">
    <!-- ===== HERO ===== -->
    <section class="hero-banner">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="hero-content">
                        <span class="cat-badge">Professional Training</span>
                        <h1>BIM Training <span>Program 2025</span></h1>
                        <div class="hero-divider"></div>
                        <p>Master Building Information Modeling with Autodesk Revit, Navisworks & advanced BIM
                            coordination. Industry-ready skills from project experts.</p>

                        <div class="hero-meta mt-4">
                            <span><i class="bi bi-patch-check-fill"></i> Certification</span>
                            <span><i class="bi bi-people-fill"></i> Small Batches</span>
                            <span><i class="bi bi-briefcase-fill"></i> Job Support</span>
                        </div>

                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a href="{{ url('contact-us') }}" class="btn-est">Enroll Now <i
                                    class="bi bi-chevron-right"></i></a>
                            <a href="#curriculum" class="btn-cta-outline">View Curriculum</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="p-4 rounded-4"
                        style="background:rgba(255,255,255,0.05); backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,0.1)">
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="h2 fw-bold mb-0"
                                        style="color:var(--orange); font-family:'Barlow Condensed'">500+</div>
                                    <div class="small text-white-50">Students Trained</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="h2 fw-bold mb-0"
                                        style="color:var(--orange); font-family:'Barlow Condensed'">95%</div>
                                    <div class="small text-white-50">Placement Rate</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="h2 fw-bold mb-0"
                                        style="color:var(--orange); font-family:'Barlow Condensed'">03</div>
                                    <div class="small text-white-50">Months Duration</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="h2 fw-bold mb-0"
                                        style="color:var(--orange); font-family:'Barlow Condensed'">Live</div>
                                    <div class="small text-white-50">Project Training</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb bar -->
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">BIM Training Program</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- ===== TOOLS STRIP ===== -->
    <div class="py-4 border-bottom bg-white">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 gap-md-4">
                <span
                    style="color:var(--muted); font-size:0.8rem; text-transform:uppercase; letter-spacing:2px; font-weight:700; margin-right:5px;">Tools
                    Covered:</span>
                <div class="tool-pill"><i class="bi bi-box"></i> Revit</div>
                <div class="tool-pill"><i class="bi bi-grid-3x3-gap-fill"></i> Navisworks</div>
                <div class="tool-pill"><i class="bi bi-pencil-square"></i> AutoCAD</div>
                <div class="tool-pill"><i class="bi bi-diagram-3-fill"></i> BIM 360</div>
                <div class="tool-pill"><i class="bi bi-cloud-fill"></i> ISO 19650</div>
            </div>
        </div>
    </div>

    <!-- ===== WHY BIM ===== -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-lg-6">
                    <p class="sec-eyebrow">The Future of Construction</p>
                    <h2 class="sec-title">What is BIM & Why it Matters?</h2>
                    <div class="sec-line mb-4"></div>
                    <p class="mb-4 text-muted">Building Information Modeling (BIM) is not just 3D modeling — it's a
                        data-driven process that integrates planning, design, and construction for superior project
                        delivery. It reduces errors, saves costs, and improves coordination between disciplines.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill" style="color:var(--orange)"></i>
                                <span class="fw-bold" style="color:var(--navy)">100% Practical Learning</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill" style="color:var(--orange)"></i>
                                <span class="fw-bold" style="color:var(--navy)">Real Project Case Studies</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill" style="color:var(--orange)"></i>
                                <span class="fw-bold" style="color:var(--navy)">Portfolio Building</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill" style="color:var(--orange)"></i>
                                <span class="fw-bold" style="color:var(--navy)">Placement Assistance</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ url('contact-us') }}" class="btn-read">Enquire Now <i
                                class="bi bi-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=800&q=80"
                            alt="BIM Training" class="img-fluid rounded-4 shadow-lg">
                        <div class="position-absolute d-none d-md-block"
                            style="bottom:-20px; left:-20px; background:#fff; padding:20px; border-radius:15px; box-shadow:var(--shadow-md); border:1px solid var(--border);">
                            <div class="text-center">
                                <div class="h3 fw-bold mb-0"
                                    style="color:var(--orange); font-family:'Barlow Condensed'">95%</div>
                                <div class="small text-muted">Placement Track Record</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CURRICULUM ===== -->
    <section class="py-5" style="background:var(--gray-bg)" id="curriculum">
        <div class="container">
            <div class="text-center mb-5">
                <p class="sec-eyebrow">Practical Curriculum</p>
                <h2 class="sec-title">What You Will Learn</h2>
                <div class="sec-line center"><span class="sec-sub">Comprehensive modules designed for industry
                        readiness</span></div>
            </div>
            <div class="row g-4 mt-2">
                <!-- Module 1 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="module-card">
                        <div class="module-num">01</div>
                        <div class="module-icon"><i class="bi bi-layers-fill"></i></div>
                        <h4>BIM Fundamentals</h4>
                        <p>Foundation of BIM levels, industry standards (ISO 19650), and the digital ecosystem.</p>
                        <ul class="module-topics">
                            <li><i class="bi bi-check2"></i> BIM Levels & LOD Standards</li>
                            <li><i class="bi bi-check2"></i> BEP & ISO 19650 Workflows</li>
                            <li><i class="bi bi-check2"></i> CDE & Project Collaboration</li>
                        </ul>
                        <div class="module-duration"><i class="bi bi-clock"></i> 2 Weeks</div>
                    </div>
                </div>
                <!-- Module 2 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="module-card">
                        <div class="module-num">02</div>
                        <div class="module-icon"><i class="bi bi-vector-pen"></i></div>
                        <h4>Revit Architecture</h4>
                        <p>Master Autodesk Revit for architectural modeling, families, and detailed documentation.</p>
                        <ul class="module-topics">
                            <li><i class="bi bi-check2"></i> 3D Modeling & Families</li>
                            <li><i class="bi bi-check2"></i> View & Plot Management</li>
                            <li><i class="bi bi-check2"></i> BOQ & Schedule Extraction</li>
                        </ul>
                        <div class="module-duration"><i class="bi bi-clock"></i> 4 Weeks</div>
                    </div>
                </div>
                <!-- Module 3 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="module-card">
                        <div class="module-num">03</div>
                        <div class="module-icon"><i class="bi bi-lightning-charge-fill"></i></div>
                        <h4>Revit MEP & Structural</h4>
                        <p>Engineering coordination modeling for HVAC, Plumbing, and Structural systems.</p>
                        <ul class="module-topics">
                            <li><i class="bi bi-check2"></i> MEP Systems Modeling</li>
                            <li><i class="bi bi-check2"></i> Structural Foundation & Rebar</li>
                            <li><i class="bi bi-check2"></i> System Analysis Workflows</li>
                        </ul>
                        <div class="module-duration"><i class="bi bi-clock"></i> 4 Weeks</div>
                    </div>
                </div>
                <!-- Module 4 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="module-card">
                        <div class="module-num">04</div>
                        <div class="module-icon"><i class="bi bi-shield-exclamation"></i></div>
                        <h4>Navisworks & Clash</h4>
                        <p>Multi-discipline coordination, clash detection, and 4D construction simulation.</p>
                        <ul class="module-topics">
                            <li><i class="bi bi-check2"></i> Clash Detection Reports</li>
                            <li><i class="bi bi-check2"></i> Timeliner (4D Simulation)</li>
                            <li><i class="bi bi-check2"></i> Model Coordination Meetings</li>
                        </ul>
                        <div class="module-duration"><i class="bi bi-clock"></i> 2 Weeks</div>
                    </div>
                </div>
                <!-- Module 5 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="module-card">
                        <div class="module-num">05</div>
                        <div class="module-icon"><i class="bi bi-kanban-fill"></i></div>
                        <h4>Live Project Training</h4>
                        <p>Real-world project execution, coordination, and submission of final BIM deliverables.</p>
                        <ul class="module-topics">
                            <li><i class="bi bi-check2"></i> Live Sample Project Execution</li>
                            <li><i class="bi bi-check2"></i> Deliverable & Report Creation</li>
                            <li><i class="bi bi-check2"></i> As-Built Model Handling</li>
                        </ul>
                        <div class="module-duration"><i class="bi bi-clock"></i> 2 Weeks</div>
                    </div>
                </div>
                <!-- Bonus -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="module-card">
                        <div class="module-num">06</div>
                        <div class="module-icon"><i class="bi bi-mortarboard-fill"></i></div>
                        <h4 style="color:#fff">Career Support</h4>
                        <p>Resume building, mock interviews, and job placement assistance.</p>
                        <ul class="module-topics">
                            <li><i class="bi bi-check2"></i> Resume & LinkedIn Optimization</li>
                            <li><i class="bi bi-check2"></i> Mock Interview Sessions</li>
                            <li><i class="bi bi-check2"></i> Industry Networking</li>
                        </ul>
                        <div class="module-duration" style="background:rgba(232,119,34,0.15)"><i
                                class="bi bi-stars"></i> Bonus Module</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== WHO SHOULD JOIN & ENROLL ===== -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-lg-7">
                    <p class="sec-eyebrow">Is This For You?</p>
                    <h2 class="sec-title">Who Should Enroll?</h2>
                    <div class="sec-line mb-5"></div>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="whom-card">
                                <div class="whom-icon"><i class="bi bi-mortarboard-fill"></i></div>
                                <div>
                                    <h5>Civil Engineers & Architects</h5>
                                    <p class="text-muted">Students and fresh graduates looking to upskill and secure
                                        high-paying BIM specialist roles in global firms.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="whom-card">
                                <div class="whom-icon"><i class="bi bi-person-workspace"></i></div>
                                <div>
                                    <h5>Working Professionals</h5>
                                    <p class="text-muted">Engineers and architects wanting to transition from 2D
                                        drafting to modern, data-rich BIM workflows.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="whom-card">
                                <div class="whom-icon"><i class="bi bi-buildings-fill"></i></div>
                                <div>
                                    <h5>Contractors & Project Firms</h5>
                                    <p class="text-muted">Construction companies looking to train their teams on digital
                                        coordination and ISO 19650 standards.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="bim-enroll-sidebar">
                        <div class="enroll-card">
                            <span class="enroll-badge"><i class="bi bi-fire me-1"></i> Special Batch Starting
                                Soon</span>
                            <h3 class="mb-4">Enroll in BIM Training</h3>

                            <div class="enroll-detail">
                                <i class="bi bi-calendar-check"></i>
                                <div class="enroll-detail-txt">
                                    <div class="lbl">Next Batch</div>
                                    <div class="val">1st of Every Month</div>
                                </div>
                            </div>

                            <div class="enroll-detail">
                                <i class="bi bi-clock-history"></i>
                                <div class="enroll-detail-txt">
                                    <div class="lbl">Duration</div>
                                    <div class="val">3 Months (Weekend Option Available)</div>
                                </div>
                            </div>

                            <div class="enroll-detail">
                                <i class="bi bi-geo-alt"></i>
                                <div class="enroll-detail-txt">
                                    <div class="lbl">Location</div>
                                    <div class="val">Delhi NCR + Online Live Sessions</div>
                                </div>
                            </div>

                            <div class="enroll-detail">
                                <i class="bi bi-award"></i>
                                <div class="enroll-detail-txt">
                                    <div class="lbl">Certification</div>
                                    <div class="val">Course Completion Certificate Provided</div>
                                </div>
                            </div>

                            <a href="{{ url('contact-us') }}" class="btn-enroll-now">Enquire & Enroll Now <i
                                    class="bi bi-arrow-right ms-2"></i></a>

                            <div class="mt-4 text-center">
                                <small style="color:rgba(255,255,255,0.5)"><i class="bi bi-info-circle me-1"></i>
                                    Detailed syllabus sent upon enquiry</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FAQ ===== -->
    <section class="py-5" style="background:var(--gray-bg)">
        <div class="container">
            <div class="text-center mb-5">
                <p class="sec-eyebrow">Common Queries</p>
                <h2 class="sec-title">Frequently Asked Questions</h2>
                <div class="sec-line center"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="faq-box open" id="f1">
                        <button class="faq-btn" onclick="toggleT('f1')">Do I need prior BIM experience? <i
                                class="bi bi-plus-lg"></i></button>
                        <div class="faq-ans">
                            <div class="faq-ans-inner">No! We start from the absolute basics. However, a background in
                                Civil Engineering, Architecture, or Mechanical Engineering is highly recommended for
                                better understanding.</div>
                        </div>
                    </div>
                    <div class="faq-box" id="f2">
                        <button class="faq-btn" onclick="toggleT('f2')">Which software will be taught? <i
                                class="bi bi-plus-lg"></i></button>
                        <div class="faq-ans">
                            <div class="faq-ans-inner">The core focus is on Autodesk Revit (Architecture, Structural,
                                and MEP disciplines) and Navisworks for coordination. We also cover BIM 360 and ISO
                                19650 documentation standards.</div>
                        </div>
                    </div>
                    <div class="faq-box" id="f3">
                        <button class="faq-btn" onclick="toggleT('f3')">Is there any placement assistance? <i
                                class="bi bi-plus-lg"></i></button>
                        <div class="faq-ans">
                            <div class="faq-ans-inner">Yes! We provide dedicated career support, including resume
                                optimization for BIM roles, mock technical interviews, and connecting you with our
                                network of industry partners.</div>
                        </div>
                    </div>
                    <div class="faq-box" id="f4">
                        <button class="faq-btn" onclick="toggleT('f4')">Are these live sessions or recorded? <i
                                class="bi bi-plus-lg"></i></button>
                        <div class="faq-ans">
                            <div class="faq-ans-inner">All our sessions are conducted LIVE by project experts. This
                                ensures you can ask questions in real-time and get immediate feedback on your project
                                work.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS BAR -->
    <section class="stats-bar">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="stat-item">
                    <div class="stat-num">200+</div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat-sep d-none d-md-block"></div>
                <div class="stat-item">
                    <div class="stat-num">15+</div>
                    <div class="stat-label">Years Experience</div>
                </div>
                <div class="stat-sep d-none d-md-block"></div>
                <div class="stat-item">
                    <div class="stat-num">500+</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
                <div class="stat-sep d-none d-md-block"></div>
                <div class="stat-item">
                    <div class="stat-num">100%</div>
                    <div class="stat-label">On-Time Delivery</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA STRIP -->
    <section class="cta-strip">
        <div class="container">
            <h2>Ready to Master BIM & Advance Your Career?</h2>
            <p>Join the upcoming batch and learn from project experts.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ url('contact-us') }}" class="btn-cta-lg">Enquire Now <i
                        class="bi bi-chevron-right ms-2"></i></a>
                <a href="tel:+918800000000" class="btn-cta-outline"><i class="bi bi-telephone-fill me-2"></i> Call for
                    Details</a>
            </div>
        </div>
    </section>

</div>

@push('scripts')
<script>
    function toggleT(id) {
        const el = document.getElementById(id);
        const isOpen = el.classList.contains('open');
        document.querySelectorAll('.faq-box').forEach(b => b.classList.remove('open'));
        if (!isOpen) el.classList.add('open');
    }
</script>
@endpush

@endsection