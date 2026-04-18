@extends('layouts.master')

@php
$meta_title = "Eshan Buildwell – Expert Construction Services";
$meta_description = "Eshan Buildwell offers expert construction services for residential, commercial, and industrial
projects. With 15+ years of experience, we deliver quality workmanship, accurate BOQ preparation, and on-time project
completion. Get your free estimate now!";
$keywords = "Eshan Buildwell, construction services, residential construction, commercial construction, industrial
construction, project management consultancy, turnkey construction, accurate BOQ preparation, quality workmanship,
construction company Delhi NCR";
@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop

@section('content')
<!-- HERO -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>Expert Construction Services<br>For <span>Residential, Commercial</span><br>&amp;
                <span>Industrial</span> Projects
            </h1>
            <p class="mt-2 mb-4">We provide end-to-end construction solutions with precision &amp; quality</p>
            <a href="{{ url('calculator') }}" class="btn-est">Get Your Free Estimate <i
                    class="bi bi-chevron-right"></i></a>
            <a href="https://wa.me/919015444490?text=Hi%20I%20want%20to%20book%20a%20consultation" class="btn-est"
                target="_blank">
                Book Your Consultation <i class="bi bi-chevron-right"></i>
            </a>
        </div>
    </div>
</section>


<!-- TRUST BAR -->
<div class="trust-bar">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="trust-item"><i class="bi bi-clipboard-check"></i> Accurate BOQ Preparation</div>
            <div class="trust-sep d-none d-md-block"></div>
            <div class="trust-item"><i class="bi bi-currency-rupee"></i> Transparent Pricing</div>
            <div class="trust-sep d-none d-md-block"></div>
            <div class="trust-item"><i class="bi bi-clock"></i> On-Time Delivery</div>
            <div class="trust-sep d-none d-md-block"></div>
            <div class="trust-item"><i class="bi bi-star"></i> Quality Workmanship</div>
            <div class="trust-sep d-none d-md-block"></div>
            <div class="trust-item"><i class="bi bi-trophy"></i> Proven Results</div>
        </div>
    </div>
</div>

<!-- ABOUT ESHAN -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-12 col-lg-6">
                <p class="sec-eyebrow">About Us</p>
                <h2 class="sec-title mb-4">🏗️ About Eshan Buildwell India</h2>
                <div class="sec-line mb-4"></div>
                <p><strong>Eshan Buildwell India</strong> is a construction and project management firm committed to delivering residential, commercial, and industrial projects with clarity, discipline, and cost efficiency.</p>
                <p>With a strong foundation in engineering expertise and practical site experience, we focus on structured planning, transparent costing, and disciplined execution to ensure successful project delivery from concept to final handover.</p>
                <p class="mb-4">We specialize in building construction, project management consultancy (PMC), estimation & costing, and turnkey solutions, providing clients with end-to-end support under one roof.</p>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-3 rounded-2 bg-light border-start border-4" style="border-color:var(--orange) !important">
                            <h6 class="fw-bold mb-1">Our Vision</h6>
                            <p class="small text-muted mb-0">Structured execution, cost clarity, and consistent quality.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-2 bg-light border-start border-4" style="border-color:var(--navy) !important">
                            <h6 class="fw-bold mb-1">Our Mission</h6>
                            <p class="small text-muted mb-0">End-to-end solutions for all your construction needs.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ url('about-us') }}" class="btn-read">Read More About Us <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/Architecture.jpg') }}" alt="About Eshan Buildwell" class="w-100 rounded-4 shadow-lg" style="height:450px;object-fit:cover;">
                    <div class="position-absolute bottom-0 start-0 p-4 w-100">
                        <div class="bg-white p-3 rounded-3 shadow-sm d-flex align-items-center gap-3" style="max-width:280px;">
                            <div class="text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px;height:50px;background:var(--orange)">
                                <i class="bi bi-award-fill fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">15+ Years</h6>
                                <p class="small text-muted mb-0">Engineering Excellence</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="py-5" style="background:var(--gray-bg)">
    <div class="container">
        <p class="sec-title text-center">Our Services</p>
        <div class="sec-line center mb-4"><span class="sec-sub">We Build with Precision</span></div>
        <div class="row g-4">
            @forelse($services as $service)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="svc-card">
                    <div class="svc-img-wrap">
                        <img src="{{ $service->resolved_thumbnail_url }}" alt="{{ $service->name }}" />
                        <span class="svc-badge">{{ $service->service_badge ?: 'Service' }}</span>
                    </div>
                    <div class="svc-body">
                        <h4>{{ $service->name }}</h4>
                        <p>{{ $service->short_description ?: strip_tags($service->description) }}</p>
                        @if(!empty($service->service_points_array))
                        <ul class="feat-list">
                            @foreach(array_slice($service->service_points_array, 0, 4) as $point)
                            <li><i class="bi bi-check-circle-fill"></i>{{ $point }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <a href="{{ $service->service_cta_link ?: url('contact-us') }}" class="btn-read">{{ $service->service_cta_text ?: 'Get in touch' }} <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">
                <p>Services will appear here once added from admin.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- PROJECTS SLIDER -->
<style>
    .project-slider-sec {
        padding: 90px 0;
        background: linear-gradient(135deg, #f8f9fc 0%, #eef1f8 100%);
        position: relative;
        overflow: hidden;
    }

    .project-slider-sec::before {
        content: '';
        position: absolute;
        /* top: -80px;
    right: -80px; */
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(232, 119, 34, 0.08) 0%, transparent 70%);
        pointer-events: none;
    }

    .proj-slider-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 40px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .proj-slide-counter {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--navy);
        letter-spacing: 1px;
    }

    .proj-slide-counter span {
        color: var(--orange);
        font-size: 1.6rem;
    }

    .swiper-projects {
        padding: 10px 5px 60px;
        position: relative;
    }

    .proj-slide-card {
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        aspect-ratio: 4/3;
        box-shadow: 0 15px 40px rgba(26, 42, 74, 0.12);
        background: #1a2a4a;
        cursor: pointer;
    }

    .proj-slide-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(0.165, 0.84, 0.44, 1);
        filter: brightness(0.92);
    }

    .proj-slide-card:hover img {
        transform: scale(1.08);
        filter: brightness(0.75);
    }

    /* Category Badge - top left */
    .proj-cat-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        background: var(--orange);
        color: #fff;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        padding: 5px 12px;
        border-radius: 20px;
        z-index: 5;
        box-shadow: 0 4px 12px rgba(232, 119, 34, 0.4);
    }

    /* Status badge - top right */
    .proj-status-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(8px);
        color: #fff;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 20px;
        z-index: 5;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .proj-status-badge.done {
        background: rgba(34, 197, 94, 0.25);
        border-color: rgba(34, 197, 94, 0.5);
        color: #4ade80;
    }

    /* Overlay */
    .proj-slide-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(15, 25, 50, 0.98) 0%, rgba(15, 25, 50, 0.7) 60%, transparent 100%);
        padding: 60px 22px 22px;
        color: #fff;
        transform: translateY(0);
        transition: all 0.4s ease;
    }

    .proj-slide-overlay .proj-location {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 6px;
    }

    .proj-slide-overlay h5 {
        margin: 0 0 6px;
        font-size: 1.15rem;
        font-weight: 700;
        color: #fff;
        font-family: 'Barlow Condensed', sans-serif;
        line-height: 1.3;
    }

    .proj-slide-overlay .proj-type {
        font-size: 0.82rem;
        color: var(--orange);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* View link that appears on hover */
    .proj-view-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 12px;
        color: #fff;
        font-size: 0.88rem;
        font-weight: 600;
        opacity: 0;
        transform: translateY(8px);
        transition: all 0.35s ease;
        background: var(--orange);
        padding: 7px 16px;
        border-radius: 25px;
        text-decoration: none;
    }

    .proj-slide-card:hover .proj-view-link {
        opacity: 1;
        transform: translateY(0);
    }

    /* Navigation */
    .proj-nav-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .proj-nav-btn {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: #fff;
        color: var(--navy);
        border: 2px solid #e8e8f0;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1rem;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    }

    .proj-nav-btn:hover {
        background: var(--orange);
        color: #fff;
        border-color: var(--orange);
        transform: scale(1.05);
    }

    /* Hide default swiper nav */
    .swiper-projects .swiper-button-next,
    .swiper-projects .swiper-button-prev {
        display: none;
    }

    /* Pagination */
    .swiper-projects .swiper-pagination {
        bottom: 10px;
    }

    .swiper-projects .swiper-pagination-bullet {
        width: 8px;
        height: 8px;
        background: #c5c5d8;
        opacity: 1;
        transition: all 0.3s ease;
    }

    .swiper-projects .swiper-pagination-bullet-active {
        background: var(--orange);
        width: 28px;
        border-radius: 4px;
    }

    /* Progress bar */
    .proj-progress-bar {
        height: 3px;
        background: #e0e0ef;
        border-radius: 3px;
        overflow: hidden;
        flex: 1;
        min-width: 80px;
    }

    .proj-progress-fill {
        height: 100%;
        background: var(--orange);
        border-radius: 3px;
        transition: width 3s linear;
        width: 0%;
    }

    @media (max-width: 768px) {
        .proj-slider-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
<section class="project-slider-sec">
    <div class="container">
        @php
        $projectSliderCount = isset($projectSliders) ? $projectSliders->count() : 0;
        @endphp
        <div class="proj-slider-header">
            <div>
                <p class="sec-title mb-1">Our Featured Projects</p>
                <div class="sec-line"><span class="sec-sub">Quality & Excellence Across Every Landmark</span></div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="proj-progress-bar">
                    <div class="proj-progress-fill" id="projProgressFill"></div>
                </div>
                <div class="proj-nav-wrap">
                    <button class="proj-nav-btn" id="projPrev"><i class="bi bi-chevron-left"></i></button>
                    <div class="proj-slide-counter"><span id="projCurrent">{{ $projectSliderCount > 0 ? 1 : 0 }}</span> / <span id="projTotal">{{ $projectSliderCount }}</span>
                    </div>
                    <button class="proj-nav-btn" id="projNext"><i class="bi bi-chevron-right"></i></button>
                </div>
            </div>
        </div>

        <div class="swiper swiper-projects">
            <div class="swiper-wrapper" style="height:40%;">
                @forelse($projectSliders as $slide)
                <div class="swiper-slide">
                    <div class="proj-slide-card">
                        <span class="proj-cat-badge">{{ $slide->category }}</span>
                        <span class="proj-status-badge {{ \Illuminate\Support\Str::contains(strtolower($slide->status_label), ['complete', 'completed', 'done']) ? 'done' : '' }}"><i
                                class="bi bi-check-circle-fill me-1"></i>{{ $slide->status_label }}</span>
                        <img src="{{ $slide->resolved_image_url }}" alt="{{ $slide->image_alt ?: $slide->title }}">
                        <div class="proj-slide-overlay">
                            <div class="proj-location"><i class="bi bi-geo-alt-fill"></i> {{ $slide->location }}</div>
                            <h5>{{ $slide->title }}</h5>
                            <div class="proj-type">{{ $slide->project_type }}</div>
                            <a href="{{ $slide->url_link ?: url('projects') }}" class="proj-view-link">View Details <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="swiper-slide">
                    <div class="proj-slide-card">
                        <img src="{{ asset('assets/images/Project1.jpg') }}" alt="Featured project">
                        <div class="proj-slide-overlay">
                            <div class="proj-location"><i class="bi bi-geo-alt-fill"></i> Featured Projects</div>
                            <h5>Projects will appear here once added from admin.</h5>
                            <div class="proj-type">Admin Managed Slider</div>
                            <a href="{{ url('projects') }}" class="proj-view-link" style="opacity:1;transform:none;">Explore Projects <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('projects') }}" class="btn-est">Explore All Projects <i class="bi bi-chevron-right"></i></a>
        </div>
    </div>
</section>

<!-- WHY CHOOSE -->
<style>
    .why-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin-top: 40px;
    }

    @media (max-width: 991px) {
        .why-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 575px) {
        .why-grid {
            grid-template-columns: 1fr;
        }
    }

    .why-card {
        background: #fff;
        border-radius: 16px;
        padding: 30px 24px;
        position: relative;
        overflow: hidden;
        transition: all 0.35s ease;
        border: 1px solid #edeef5;
    }

    .why-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--orange);
        transform: scaleY(0);
        transition: transform 0.35s ease;
        transform-origin: bottom;
    }

    .why-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 50px rgba(26, 42, 74, 0.1);
        border-color: transparent;
    }

    .why-card:hover::before {
        transform: scaleY(1);
    }

    .why-card-icon {
        width: 56px;
        height: 56px;
        background: var(--orange-lt);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--orange);
        margin-bottom: 18px;
        transition: all 0.35s ease;
    }

    .why-card:hover .why-card-icon {
        background: var(--orange);
        color: #fff;
    }

    .why-card h5 {
        color: var(--navy);
        font-weight: 700;
        font-size: 1.05rem;
        margin-bottom: 8px;
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1.2rem;
    }

    .why-card p {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.7;
        margin: 0;
    }

    .why-card .why-num {
        position: absolute;
        top: 18px;
        right: 20px;
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 2.8rem;
        font-weight: 800;
        color: rgba(26, 42, 74, 0.05);
        line-height: 1;
        pointer-events: none;
    }
</style>
<section class="py-5" style="background:var(--gray-bg)">
    <div class="container">
        <p class="sec-title text-center">WHY CHOOSE ESHAN BUILDWELL INDIA?</p>
        <div class="sec-line center mb-4"><span class="sec-sub">The pillars of trust that set us apart</span></div>
        <div class="why-grid">
            <div class="why-card">
                <div class="why-num">01</div>
                <div class="why-card-icon"><i class="bi bi-layout-text-window-reverse"></i></div>
                <h5>Structured Planning</h5>
                <p>Every project starts with clear planning and BOQ-based execution to avoid confusion and cost overruns.</p>
            </div>
            <div class="why-card">
                <div class="why-num">02</div>
                <div class="why-card-icon"><i class="bi bi-currency-rupee"></i></div>
                <h5>Transparent Costing</h5>
                <p>No hidden charges. Detailed estimation and billing ensure full financial clarity at every stage.</p>
            </div>
            <div class="why-card">
                <div class="why-num">03</div>
                <div class="why-card-icon"><i class="bi bi-gear-wide-connected"></i></div>
                <h5>Disciplined Execution</h5>
                <p>We follow systematic processes, timelines, and quality checks for smooth project delivery.</p>
            </div>
            <div class="why-card">
                <div class="why-num">04</div>
                <div class="why-card-icon"><i class="bi bi-person-workspace"></i></div>
                <h5>Experienced Leadership</h5>
                <p>Led by experienced engineers with strong site knowledge and practical execution expertise.</p>
            </div>
            <div class="why-card">
                <div class="why-num">05</div>
                <div class="why-card-icon"><i class="bi bi-box-seam-fill"></i></div>
                <h5>End-to-End Solutions</h5>
                <p>From design, estimation, planning to construction and final handover — everything under one roof.</p>
            </div>
            <div class="why-card">
                <div class="why-num">06</div>
                <div class="why-card-icon"><i class="bi bi-shield-fill-check"></i></div>
                <h5>Quality & Safety Focus</h5>
                <p>Strict quality control and site safety practices to ensure durable and reliable construction.</p>
            </div>
            <div class="why-card">
                <div class="why-num">07</div>
                <div class="why-card-icon"><i class="bi bi-people-fill"></i></div>
                <h5>Client-Centric Approach</h5>
                <p>Regular updates, coordination, and clear communication with clients at every step.</p>
            </div>
            <div class="why-card">
                <div class="why-num">08</div>
                <div class="why-card-icon"><i class="bi bi-lightning-charge-fill"></i></div>
                <h5>Cost & Time Efficiency</h5>
                <p>Optimized planning and execution help save both time and money without compromising on quality.</p>
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

<!-- TESTIMONIALS -->
<section class="py-5 bg-white">
    <div class="container">
        <p class="sec-title text-center">Client Testimonials</p>
        <div class="sec-line center mb-4"><span class="sec-sub">What Our Clients Say</span></div>
        <div class="row g-4">
            @forelse($testimonials as $testi)
            <div class="col-md-4">
                <div class="testi-card">
                    <div class="testi-stars">
                        @for($i=1; $i<=5; $i++)
                            @if($i <= $testi->rating) ★ @else ☆ @endif
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

<!-- CONSTRUCTION PROCESS -->
<section style="background:var(--navy);padding:80px 0">
  <div class="container">
    <div class="text-center mb-5">
      <p class="sec-eyebrow" style="color:rgba(255,255,255,.6)">How We Work</p>
      <h2 class="sec-title" style="color:#fff">🏗️ Our Construction Process</h2>
      <p class="sec-sub mx-auto mt-2" style="color:rgba(255,255,255,.6)">A streamlined, transparent approach that keeps you informed at every stage</p>
    </div>
    <div class="row g-4 justify-content-center">
      <div class="col-12 col-md-4">
        <div class="step-card h-100 p-4 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10 text-white">
          <div class="step-num fs-1 fw-bold opacity-25 mb-3" style="color:var(--orange)">01</div>
          <h5 class="fw-bold mb-3" style="font-family:'Barlow Condensed',sans-serif">Consultation</h5>
          <p class="small opacity-75">We begin with understanding your requirements, vision, and budget. This stage helps us align expectations and define the project scope clearly.</p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="step-card h-100 p-4 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10 text-white">
          <div class="step-num fs-1 fw-bold opacity-25 mb-3" style="color:var(--orange)">02</div>
          <h5 class="fw-bold mb-3" style="font-family:'Barlow Condensed',sans-serif">Approx Estimate</h5>
          <p class="small opacity-75">Based on initial inputs, we provide a rough cost estimate to give you a clear idea of project feasibility and budget planning.</p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="step-card h-100 p-4 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10 text-white">
          <div class="step-num fs-1 fw-bold opacity-25 mb-3" style="color:var(--orange)">03</div>
          <h5 class="fw-bold mb-3" style="font-family:'Barlow Condensed',sans-serif">Design & Planning</h5>
          <p class="small opacity-75">Our team develops architectural designs and detailed planning, ensuring proper space utilization, functionality, and execution strategy.</p>
        </div>
      </div>
      <div class="col-12 col-md-4 mt-md-4">
        <div class="step-card h-100 p-4 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10 text-white">
          <div class="step-num fs-1 fw-bold opacity-25 mb-3" style="color:var(--orange)">04</div>
          <h5 class="fw-bold mb-3" style="font-family:'Barlow Condensed',sans-serif">Accurate Costing of Project</h5>
          <p class="small opacity-75">We prepare a detailed BOQ and cost analysis with material specifications, ensuring transparency and eliminating hidden costs.</p>
        </div>
      </div>
      <div class="col-12 col-md-4 mt-md-4">
        <div class="step-card h-100 p-4 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10 text-white">
          <div class="step-num fs-1 fw-bold opacity-25 mb-3" style="color:var(--orange)">05</div>
          <h5 class="fw-bold mb-3" style="font-family:'Barlow Condensed',sans-serif">Construction</h5>
          <p class="small opacity-75">Execution begins with strict quality control, site supervision, and regular coordination to ensure timely and disciplined project delivery.</p>
        </div>
      </div>
      <div class="col-12 col-md-4 mt-md-4">
        <div class="step-card h-100 p-4 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10 text-white">
          <div class="step-num fs-1 fw-bold opacity-25 mb-3" style="color:var(--orange)">06</div>
          <h5 class="fw-bold mb-3" style="font-family:'Barlow Condensed',sans-serif">Handover</h5>
          <p class="small opacity-75">After completion, we deliver the project with proper finishing, quality checks, and final approvals—ready for use.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-strip">
    <div class="container">
        <h2>Get Your Free Construction Estimate Now!</h2>
        <br>
        <a href="{{ url('calculator') }}" class="btn-est">Get Your Free Estimate <i class="bi bi-calculator"></i></a>
    </div>
</section>

@push('scripts')
<script>
    const projectSlidesCount = {{ $projectSliderCount }};
    const shouldLoopProjects = projectSlidesCount > 1;

    const projSwiper = new Swiper('.swiper-projects', {
        loop: shouldLoopProjects,
        slidesPerView: 1,
        spaceBetween: 24,
        speed: 700,
        pagination: {
            el: '.swiper-projects .swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 1.5
            },
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            },
        },
        autoplay: projectSlidesCount > 1 ? {
            delay: 3000,
            disableOnInteraction: false,
        } : false,
        on: {
            slideChange: function() {
                const real = (this.realIndex) + 1;
                const el = document.getElementById('projCurrent');
                if (el) el.textContent = real;
                const fill = document.getElementById('projProgressFill');
                if (fill) {
                    fill.style.transition = 'none';
                    fill.style.width = '0%';
                    setTimeout(() => {
                        fill.style.transition = 'width 3s linear';
                        fill.style.width = '100%';
                    }, 50);
                }
            }
        }
    });

    document.getElementById('projNext')?.addEventListener('click', () => projSwiper.slideNext());
    document.getElementById('projPrev')?.addEventListener('click', () => projSwiper.slidePrev());

    const initFill = document.getElementById('projProgressFill');
    if (initFill && projectSlidesCount > 0) {
        initFill.style.width = '100%';
    }
</script>
@endpush
@endsection
