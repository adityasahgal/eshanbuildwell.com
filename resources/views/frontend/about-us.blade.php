@extends('layouts.master')
@php
$meta_title = "Eshan Buildwell ";
$meta_description = "";
$keywords = "";
@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop
@section('content')
<section class="hero-banner">
    <div class="container">
        <div class="hero-content">
            <h1>About Us</h1>
            <div class="hero-divider"></div>
            <p>Building Excellence, Delivering Trust</p>
        </div>
    </div>
</section>
<div class="breadcrumb-bar">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
        </nav>
    </div>
</div>

<!-- WHO WE ARE -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="sec-title mb-4"><i class="bi bi-buildings-fill me-2" style="color:var(--orange)"></i> About Eshan Buildwell India</h2>
        <div class="row g-4 align-items-center">
            <div class="col-12 col-lg-5">
                <img src="{{ asset('assets/images/Architecture.jpg') }}" alt="About Us" class="w-100 rounded-3 shadow-sm" style="max-height:450px;object-fit:cover" />
            </div>
            <div class="col-12 col-lg-7">
                <p><strong class="fs-5" style="font-family:'Barlow Condensed',sans-serif;color:var(--navy)">Eshan Buildwell India</strong> is a construction and project management firm committed to delivering residential, commercial, and industrial projects with clarity, discipline, and cost efficiency.</p>
                <p>With a strong foundation in engineering expertise and practical site experience, we focus on structured planning, transparent costing, and disciplined execution to ensure successful project delivery from concept to final handover.</p>
                <p>We specialize in building construction, project management consultancy (PMC), estimation & costing, and turnkey solutions, providing clients with end-to-end support under one roof. Our approach is driven by detailed planning, BOQ-based costing, and systematic coordination among all stakeholders.</p>
                <p>At Eshan Buildwell India, we believe that every successful project begins with proper planning and clear understanding. By combining technical knowledge with practical execution, we help clients achieve better quality, controlled budgets, and timely completion.</p>
                <p class="mb-0">Serving across North India, we aim to build not just structures, but long-term trust and reliable partnerships through professionalism, transparency, and commitment to excellence.</p>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-12 col-lg-4">
                <div class="mv-card h-100 shadow-sm border-0 bg-light p-4 rounded-3 text-center transition-hover">
                    <div class="icon fs-1 mb-3"><i class="bi bi-bullseye" style="color:var(--orange)"></i></div>
                    <h4 class="mb-3" style="color:var(--navy)">Our Vision</h4>
                    <p class="text-muted mb-0">To become a trusted name in the construction industry by delivering projects with structured execution, cost clarity, and consistent quality.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="mv-card h-100 shadow-sm border-0 bg-light p-4 rounded-3 text-center transition-hover">
                    <div class="icon fs-1 mb-3"><i class="bi bi-rocket-takeoff-fill" style="color:var(--orange)"></i></div>
                    <h4 class="mb-3" style="color:var(--navy)">Our Mission</h4>
                    <p class="text-muted mb-0">To provide end-to-end construction solutions with a focus on planning, transparency, and disciplined delivery, ensuring client satisfaction at every stage.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="mv-card h-100 shadow-sm border-0 bg-light p-4 rounded-3 transition-hover">
                    <div class="text-center">
                        <div class="icon fs-1 mb-3"><i class="bi bi-diagram-3-fill" style="color:var(--orange)"></i></div>
                    </div>
                    <h4 class="mb-3 text-center" style="color:var(--navy)">Our Core Values</h4>
                    <ul class="list-unstyled text-muted ps-2 mb-0">
                        <li class="mb-2"><i class="bi bi-check2-circle me-2 fw-bold" style="color:var(--orange)"></i>Planning First Approach</li>
                        <li class="mb-2"><i class="bi bi-check2-circle me-2 fw-bold" style="color:var(--orange)"></i>Transparency in Costing</li>
                        <li class="mb-2"><i class="bi bi-check2-circle me-2 fw-bold" style="color:var(--orange)"></i>Quality & Discipline</li>
                        <li class="mb-2"><i class="bi bi-check2-circle me-2 fw-bold" style="color:var(--orange)"></i>Client-Centric Execution</li>
                        <li class="mb-0"><i class="bi bi-check2-circle me-2 fw-bold" style="color:var(--orange)"></i>Timely Delivery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WHY CHOOSE - ABOUT US (Different from Home Page) -->
<style>
    .cred-section {
        background: var(--navy);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .cred-section::after {
        content: '';
        position: absolute;
        bottom: -60px;
        right: -60px;
        width: 300px;
        height: 300px;
        border: 60px solid rgba(232, 119, 34, 0.08);
        border-radius: 50%;
        pointer-events: none;
    }

    .cred-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        overflow: hidden;
        margin-top: 40px;
    }

    @media(max-width:991px) {
        .cred-row {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width:575px) {
        .cred-row {
            grid-template-columns: 1fr;
        }
    }

    .cred-item {
        background: rgba(255, 255, 255, 0.03);
        padding: 36px 28px;
        transition: background 0.3s;
    }

    .cred-item:hover {
        background: rgba(255, 255, 255, 0.07);
    }

    .cred-item-icon {
        font-size: 2rem;
        color: var(--orange);
        margin-bottom: 14px;
    }

    .cred-item h5 {
        color: #fff;
        font-weight: 700;
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1.2rem;
        margin-bottom: 8px;
    }

    .cred-item p {
        color: rgba(255, 255, 255, 0.65);
        font-size: 0.88rem;
        line-height: 1.7;
        margin: 0;
    }

    .cred-item .cred-tag {
        display: inline-block;
        background: rgba(232, 119, 34, 0.18);
        color: var(--orange);
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 3px 10px;
        border-radius: 20px;
        margin-bottom: 12px;
    }
</style>
<section class="cred-section">
    <div class="container">
        <p class="sec-title text-center" style="color:#fff">Our Credentials & Strengths</p>
        <div class="sec-line center mb-2"><span class="sec-sub" style="color:rgba(255,255,255,0.6)">Why Industry Leaders
                Choose to Partner with Us</span></div>
        <div class="cred-row">
            <div class="cred-item">
                <span class="cred-tag">Track Record</span>
                <div class="cred-item-icon"><i class="bi bi-graph-up-arrow"></i></div>
                <h5>15+ Years of Field Experience</h5>
                <p>Founded on real-world site experience, we've managed projects from groundbreaking to final handover
                    across North India for over 15 years.</p>
            </div>
            <div class="cred-item">
                <span class="cred-tag">Financial Clarity</span>
                <div class="cred-item-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
                <h5>BOQ-Based Cost Transparency</h5>
                <p>Every estimate we produce is backed by a detailed Bill of Quantities — zero hidden costs, full
                    line-item clarity for clients and investors.</p>
            </div>
            <div class="cred-item">
                <span class="cred-tag">Technology</span>
                <div class="cred-item-icon"><i class="bi bi-boxes"></i></div>
                <h5>BIM-Enabled Execution</h5>
                <p>We use Building Information Modeling (BIM) tools to plan, coordinate, and execute projects with
                    minimal errors and maximum precision.</p>
            </div>
            <div class="cred-item">
                <span class="cred-tag">Coverage</span>
                <div class="cred-item-icon"><i class="bi bi-pin-map-fill"></i></div>
                <h5>Active Across North India</h5>
                <p>From Delhi to Greater Noida, Gurugram to Ghaziabad — our project sites span multiple cities with
                    dedicated teams on the ground.</p>
            </div>
            <div class="cred-item">
                <span class="cred-tag">Quality</span>
                <div class="cred-item-icon"><i class="bi bi-patch-check-fill"></i></div>
                <h5>ISO-Aligned Quality Processes</h5>
                <p>Our construction quality checklists and site inspection protocols are aligned to ISO standard
                    practices for consistent excellence.</p>
            </div>
            <div class="cred-item">
                <span class="cred-tag">Team</span>
                <div class="cred-item-icon"><i class="bi bi-person-workspace"></i></div>
                <h5>Multi-Disciplinary Expert Team</h5>
                <p>Civil engineers, architects, MEP consultants, and PMC professionals working together under one
                    project structure for seamless delivery.</p>
            </div>
        </div>
    </div>
</section>

<!-- OUR TEAM - PREMIUM -->
<style>
    .team-section {
        padding: 90px 0;
        background: #f8f9fc;
    }

    .team-pro-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(26, 42, 74, 0.07);
        transition: all 0.4s ease;
        border: 1px solid #eef0f8;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .team-pro-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(26, 42, 74, 0.15);
        border-color: transparent;
    }

    .team-photo-wrap {
        position: relative;
        overflow: hidden;
        height: 280px;
        background: linear-gradient(135deg, #e8eaf8, #d5d8f0);
    }

    .team-photo-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
        transition: transform 0.5s ease;
    }

    .team-pro-card:hover {
        transform: translateY(-10px);
    }

    .team-pro-card:hover .team-photo-wrap img {
        transform: scale(1.06);
    }

    .team-ribbon {
        position: absolute;
        top: 16px;
        left: -2px;
        background: var(--orange);
        color: #fff;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 5px 14px 5px 10px;
        border-radius: 0 20px 20px 0;
        box-shadow: 0 4px 12px rgba(232, 119, 34, 0.4);
        z-index: 2;
    }

    .team-social-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(26, 42, 74, 0.85) 0%, transparent 50%);
        display: flex;
        align-items: flex-end;
        justify-content: center;
        padding-bottom: 18px;
        opacity: 0;
        transition: opacity 0.35s ease;
        gap: 10px;
    }

    .team-pro-card:hover .team-social-overlay {
        opacity: 1;
    }

    .team-social-overlay a {
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 0.95rem;
        transition: background 0.3s;
    }

    .team-social-overlay a:hover {
        background: var(--orange);
        border-color: var(--orange);
    }

    .team-pro-body {
        padding: 22px 22px 24px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .team-pro-body h5 {
        color: var(--navy);
        font-weight: 800;
        margin-bottom: 3px;
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1.3rem;
    }

    .team-role {
        color: var(--orange);
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 10px;
    }

    .team-divider {
        height: 2px;
        background: linear-gradient(to right, var(--orange), transparent);
        margin-bottom: 12px;
        border-radius: 2px;
    }

    .team-bio {
        color: #6b7280;
        font-size: 0.875rem;
        line-height: 1.7;
        margin-bottom: 14px;
        flex-grow: 1;
    }

    .team-skills {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
    }

    .team-skill-tag {
        background: rgba(26, 42, 74, 0.06);
        color: var(--navy);
        font-size: 0.7rem;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        border: 1px solid rgba(26, 42, 74, 0.1);
    }
</style>
<section class="team-section">
    <div class="container">
        <p class="sec-title text-center">Meet Our Expert Team</p>
        <div class="sec-line center mb-2"><span class="sec-sub">The professionals behind every successful project</span></div>
        <div class="row g-4 mt-3">
            @forelse($team as $member)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="team-pro-card">
                    <div class="team-photo-wrap">
                        @if($member->ribbon)
                        <span class="team-ribbon">{{ $member->ribbon }}</span>
                        @endif
                        <img src="{{ $member->resolved_image_url }}" alt="{{ $member->name }}">
                        <div class="team-social-overlay">
                            @if($member->linkedin)
                            <a href="{{ $member->linkedin }}" target="_blank" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                            @endif
                            @if($member->email)
                            <a href="mailto:{{ $member->email }}" title="Email"><i class="bi bi-envelope-fill"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="team-pro-body">
                        <h5>{{ $member->name }}</h5>
                        <div class="team-role">{{ $member->designation }}</div>
                        <div class="team-divider"></div>
                        @if($member->description)
                        <p class="team-bio">{{ $member->description }}</p>
                        @endif
                        
                        @if($member->skills)
                        <div class="team-skills">
                            @foreach(explode(',', $member->skills) as $skill)
                            <span class="team-skill-tag">{{ trim($skill) }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">
                <p>Establishing our team of excellence...</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- STATS -->
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

<!-- TESTIMONIALS -->
<section class="py-5 bg-white">
    <div class="container">
        <p class="sec-title text-center">Client Testimonials</p>
        <div class="sec-line center mb-4"></div>
        <div class="row g-4">
            @forelse($testimonials as $testi)
            <div class="col-md-4">
                <div class="testi-card">
                    <div class="testi-stars">
                        @for($i=1; $i<=5; $i++)
                            @if($i <= $testi->rating)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </div>
                    <blockquote>"{{ $testi->quote }}"</blockquote>
                    <div class="testi-author">
                        <div class="testi-avatar">{{ $testi->avatar_initials }}</div>
                        <div><strong>{{ $testi->name }}</strong><span>{{ $testi->project_info }}</span></div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">
                <p>Establishing our record of excellence...</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="cta-strip">
    <div class="container">
        <h2>Ready to Bring Your Dream Project to Life?</h2>
        <p>Let's Build Something Great Together!</p><a href="{{ url('contact-us') }}" class="btn-cta-lg">Contact Us</a>
    </div>
</section>

@endsection