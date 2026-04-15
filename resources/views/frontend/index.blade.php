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

<!-- SERVICES -->
<section class="py-5" style="background:var(--gray-bg)">
  <div class="container">
    <p class="sec-title text-center">Our Services</p>
    <div class="sec-line center mb-4"><span class="sec-sub">We Build with Precision</span></div>
    <div class="row g-4">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="svc-card">
          <div class="svc-img-wrap"><img src="{{ asset('assets/images/PMC 2.png') }}"
              alt="Building Construction" /><span class="svc-badge">Residential &amp; Commercial</span>
          </div>
          <div class="svc-body">
            <h4>Building Construction</h4>
            <p>Complete construction for residential, commercial &amp; industrial projects with quality
              workmanship and attention to detail.</p>
            <ul class="feat-list">
              <li><i class="bi bi-check-circle-fill"></i>Site supervision &amp; execution control</li>
              <li><i class="bi bi-check-circle-fill"></i>Quality material sourcing</li>
            </ul><a href="{{ url('services') }}" class="btn-read">Get in touch</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="svc-card">
          <div class="svc-img-wrap"><img src="{{ asset('assets/images/project2.jpg') }}"
              alt="Turnkey Construction" /><span class="svc-badge">End-to-End</span></div>
          <div class="svc-body">
            <h4>Turnkey Construction</h4>
            <p>End-to-end service (Design → Planning → Construction → Handover). One contract, zero hassle.
            </p>
            <ul class="feat-list">
              <li><i class="bi bi-check-circle-fill"></i>Covering all aspects in a single contract</li>
              <li><i class="bi bi-check-circle-fill"></i>Ready-to-occupy handover</li>
            </ul><a href="{{ url('services') }}" class="btn-read">Get in touch</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="svc-card">
          <div class="svc-img-wrap"><img src="{{ asset('assets/images/project3.jpg') }}" alt="PMC" /><span
              class="svc-badge">PMC</span></div>
          <div class="svc-body">
            <h4>Project Management Consultancy (PMC)</h4>
            <p>Contractor selection guidance, site monitoring &amp; risk reduction.</p>
            <ul class="feat-list">
              <li><i class="bi bi-check-circle-fill"></i>Timeline management &amp; complete oversight</li>
            </ul><a href="{{ url('services') }}" class="btn-read">Get in touch</a>
          </div>
        </div>
      </div>
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
          <div class="proj-slide-counter"><span id="projCurrent">1</span> / <span id="projTotal">5</span>
          </div>
          <button class="proj-nav-btn" id="projNext"><i class="bi bi-chevron-right"></i></button>
        </div>
      </div>
    </div>

    <div class="swiper swiper-projects">
      <div class="swiper-wrapper" style="height:40%;">

        <div class="swiper-slide">
          <div class="proj-slide-card">
            <span class="proj-cat-badge">Residential</span>
            <span class="proj-status-badge done"><i
                class="bi bi-check-circle-fill me-1"></i>Completed</span>
            <img src="{{ asset('assets/images/Project1.jpg') }}" alt="A32 P-04 Greater Noida">
            <div class="proj-slide-overlay">
              <div class="proj-location"><i class="bi bi-geo-alt-fill"></i> Greater Noida, UP</div>
              <h5>A32, P-04, Greater Noida</h5>
              <div class="proj-type">Residential Project</div>
              <a href="{{ url('projects') }}" class="proj-view-link">View Details <i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="proj-slide-card">
            <span class="proj-cat-badge">Commercial</span>
            <span class="proj-status-badge done"><i
                class="bi bi-check-circle-fill me-1"></i>Completed</span>
            <img src="{{ asset('assets/images/Project2.jpg') }}" alt="G202 Sector 63 Noida">
            <div class="proj-slide-overlay">
              <div class="proj-location"><i class="bi bi-geo-alt-fill"></i> Sector 63, Noida</div>
              <h5>G202, Sector 63, Noida</h5>
              <div class="proj-type">Commercial Project</div>
              <a href="{{ url('projects') }}" class="proj-view-link">View Details <i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="proj-slide-card">
            <span class="proj-cat-badge">Government</span>
            <span class="proj-status-badge done"><i class="bi bi-check-circle-fill me-1"></i>Phase 1
              Done</span>
            <img src="{{ asset('assets/images/Project3.jpg') }}" alt="Dept of Science Technology">
            <div class="proj-slide-overlay">
              <div class="proj-location"><i class="bi bi-geo-alt-fill"></i> Delhi, India</div>
              <h5>Dept of Science & Technology</h5>
              <div class="proj-type">Major Institutional Project</div>
              <a href="{{ url('projects') }}" class="proj-view-link">View Details <i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="proj-slide-card">
            <span class="proj-cat-badge">Commercial</span>
            <span class="proj-status-badge done"><i
                class="bi bi-check-circle-fill me-1"></i>Completed</span>
            <img src="{{ asset('assets/images/Project4.jpg') }}" alt="Ocus 24K Mall Gurugram">
            <div class="proj-slide-overlay">
              <div class="proj-location"><i class="bi bi-geo-alt-fill"></i> Gurugram, Haryana</div>
              <h5>Ocus 24K Mall, Gurugram</h5>
              <div class="proj-type">Commercial Landmark</div>
              <a href="{{ url('projects') }}" class="proj-view-link">View Details <i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="proj-slide-card">
            <span class="proj-cat-badge">Mall</span>
            <span class="proj-status-badge done"><i
                class="bi bi-check-circle-fill me-1"></i>Completed</span>
            <img src="{{ asset('assets/images/Project06.jpg') }}" alt="Gallexie 91 Mall Gurugram">
            <div class="proj-slide-overlay">
              <div class="proj-location"><i class="bi bi-geo-alt-fill"></i> Gurugram, Haryana</div>
              <h5>Gallexie 91 Mall, Gurugram</h5>
              <div class="proj-type">Structure Completed</div>
              <a href="{{ url('projects') }}" class="proj-view-link">View Details <i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

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
    <p class="sec-title text-center">Why Choose Eshan Buildwell?</p>
    <div class="sec-line center mb-2"><span class="sec-sub">The pillars of trust that set us apart</span></div>
    <div class="why-grid">
      <div class="why-card">
        <div class="why-num">01</div>
        <div class="why-card-icon"><i class="bi bi-calendar2-check-fill"></i></div>
        <h5>On-Time Delivery</h5>
        <p>We have a proven track record of completing every project within the committed timeline — no delays,
          no excuses.</p>
      </div>
      <div class="why-card">
        <div class="why-num">02</div>
        <div class="why-card-icon"><i class="bi bi-shield-check"></i></div>
        <h5>Quality Assured Construction</h5>
        <p>Every project goes through rigorous quality checks at each stage to ensure premium materials and
          flawless finish.</p>
      </div>
      <div class="why-card">
        <div class="why-num">03</div>
        <div class="why-card-icon"><i class="bi bi-clipboard2-check-fill"></i></div>
        <h5>Accurate BOQ & Costing</h5>
        <p>Our BOQ-based cost estimates eliminate surprises. You get full financial clarity from planning to
          handover.</p>
      </div>
      <div class="why-card">
        <div class="why-num">04</div>
        <div class="why-card-icon"><i class="bi bi-person-lines-fill"></i></div>
        <h5>Dedicated Project Manager</h5>
        <p>A single point of contact handles your entire project — keeping you informed, stress-free, and in
          control.</p>
      </div>
      <div class="why-card">
        <div class="why-num">05</div>
        <div class="why-card-icon"><i class="bi bi-buildings-fill"></i></div>
        <h5>200+ Projects Delivered</h5>
        <p>Across residential, commercial, and institutional sectors — our portfolio speaks the language of
          performance and trust.</p>
      </div>
      <div class="why-card">
        <div class="why-num">06</div>
        <div class="why-card-icon"><i class="bi bi-geo-alt-fill"></i></div>
        <h5>Pan North India Presence</h5>
        <p>We actively serve Delhi, Noida, Gurugram, Greater Noida, and across North India with a strong site
          network.</p>
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
      <div class="col-md-4">
        <div class="testi-card">
          <div class="testi-stars">★★★★★</div>
          <blockquote>"Eshan Buildwell delivered our commercial project ahead of schedule with impeccable
            quality. Highly recommended!"</blockquote>
          <div class="testi-author">
            <div class="testi-avatar">RS</div>
            <div><strong>Rajesh Sharma</strong><span>Commercial Project, Delhi</span></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card">
          <div class="testi-stars">★★★★★</div>
          <blockquote>"Transparent pricing with zero hidden costs. The team was professional throughout our
            home renovation."</blockquote>
          <div class="testi-author">
            <div class="testi-avatar">PV</div>
            <div><strong>Priya Verma</strong><span>Luxury Villa, Noida</span></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card">
          <div class="testi-stars">★★★★★</div>
          <blockquote>"Outstanding project management for our industrial facility. Every milestone was met on
            time."</blockquote>
          <div class="testi-author">
            <div class="testi-avatar">AG</div>
            <div><strong>Amit Gupta</strong><span>Industrial Facility, Gurugram</span></div>
          </div>
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
    <a href="{{ url('calculator') }}" class="btn-cta-lg">Get Estimate</a>
  </div>
</section>

@push('scripts')
<script>
  const projSwiper = new Swiper('.swiper-projects', {
    loop: true,
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
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    on: {
      slideChange: function() {
        const real = (this.realIndex) + 1;
        const el = document.getElementById('projCurrent');
        if (el) el.textContent = real;
        // Reset & animate progress bar
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
  // Custom nav buttons
  document.getElementById('projNext').addEventListener('click', () => projSwiper.slideNext());
  document.getElementById('projPrev').addEventListener('click', () => projSwiper.slidePrev());
  // Init progress bar
  const initFill = document.getElementById('projProgressFill');
  if (initFill) {
    initFill.style.width = '100%';
  }
</script>
@endpush
@endsection