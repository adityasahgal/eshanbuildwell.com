@extends('layouts.master')
@php
$meta_title = "About Karinya Villas | Luxurious One, Two, and Three-Bedroom Villas in Nainital";
$meta_description = "Learn about Karinya Villas, offering luxurious one, two, and three-bedroom villas in Nainital.
Experience elegance, comfort, and breathtaking views in the heart of nature.";
$keywords = "About Karinya Villas, one-bedroom villa Nainital, two-bedroom villa Nainital, three-bedroom villa Nainital,
luxury villas in Nainital, Nainital accommodations, serene stays, Karinya Villas Uttarakhand, hill station villas";
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
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
            <div class="col-12 col-lg-5"><img
                    src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=700&q=80" alt="About Us"
                    class="w-100 rounded-3 shadow-sm" style="max-height:450px;object-fit:cover" /></div>
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
                    <div class="text-center"><div class="icon fs-1 mb-3"><i class="bi bi-diagram-3-fill" style="color:var(--orange)"></i></div></div>
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

<!-- WHY CHOOSE -->
<section class="py-5" style="background:var(--gray-bg)">
    <div class="container">
        <p class="sec-title text-center">Why Choose Eshan Buildwell?</p>
        <div class="sec-line center mb-4"></div>
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="feat-card">
                    <div class="feat-icon"><i class="bi bi-people-fill"></i></div>
                    <div>
                        <h5>Expert Team</h5>
                        <p>Our team of experienced engineers, architects, and project managers is dedicated to
                            delivering the best results for every project.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="feat-card">
                    <div class="feat-icon"><i class="bi bi-clipboard2-data"></i></div>
                    <div>
                        <h5>Transparent Pricing</h5>
                        <p>We provide detailed, upfront costing with no hidden charges, ensuring you know exactly what
                            to expect throughout the project.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="feat-card">
                    <div class="feat-icon"><i class="bi bi-person-check-fill"></i></div>
                    <div>
                        <h5>Client-Centric Approach</h5>
                        <p>We understand our clients' needs and work collaboratively to turn their vision into reality
                            with personalized solutions.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="feat-card">
                    <div class="feat-icon"><i class="bi bi-award-fill"></i></div>
                    <div>
                        <h5>Proven Track Record</h5>
                        <p>Our portfolio showcases numerous successful residential, commercial, and industrial projects
                            completed on time and within budget.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OUR TEAM -->
<style>
    .team-card {
        transition: all 0.3s ease;
        background-color: #fff;
        height: 100%;
    }
    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
</style>
<section class="py-5 bg-white">
    <div class="container">
        <p class="sec-title text-center">Meet Our Team</p>
        <div class="sec-line center mb-5"></div>
        <div class="row g-4 justify-content-center">
            <!-- Team Member 1 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="team-card text-center p-4 border rounded shadow-sm">
                    <img src="https://ui-avatars.com/api/?name=Aditya+Sahgal&background=0D8ABC&color=fff&rounded=true&size=150" alt="Aditya Sahgal" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid var(--orange);">
                    <h5 class="mb-1" style="color:var(--navy)">Aditya Sahgal</h5>
                    <p class="small fw-bold mb-3" style="color:var(--orange)">Founder & CEO</p>
                    <p class="small text-muted mb-0">Aditya leads the vision and strategy of Eshan Buildwell, ensuring excellence in every project.</p>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="team-card text-center p-4 border rounded shadow-sm">
                    <img src="https://ui-avatars.com/api/?name=Ravi+Kumar&background=E56C25&color=fff&rounded=true&size=150" alt="Ravi Kumar" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid var(--orange);">
                    <h5 class="mb-1" style="color:var(--navy)">Ravi Kumar</h5>
                    <p class="small fw-bold mb-3" style="color:var(--orange)">Chief Engineer</p>
                    <p class="small text-muted mb-0">Ravi oversees all technical aspects, ensuring structural integrity and adherence to quality standards.</p>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="team-card text-center p-4 border rounded shadow-sm">
                    <img src="https://ui-avatars.com/api/?name=Priya+Singh&background=0D8ABC&color=fff&rounded=true&size=150" alt="Priya Singh" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid var(--orange);">
                    <h5 class="mb-1" style="color:var(--navy)">Priya Singh</h5>
                    <p class="small fw-bold mb-3" style="color:var(--orange)">Project Manager</p>
                    <p class="small text-muted mb-0">Priya coordinates between teams and clients to deliver projects on time and within budget.</p>
                </div>
            </div>
            <!-- Team Member 4 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="team-card text-center p-4 border rounded shadow-sm">
                    <img src="https://ui-avatars.com/api/?name=Amit+Sharma&background=E56C25&color=fff&rounded=true&size=150" alt="Amit Sharma" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid var(--orange);">
                    <h5 class="mb-1" style="color:var(--navy)">Amit Sharma</h5>
                    <p class="small fw-bold mb-3" style="color:var(--orange)">Lead Architect</p>
                    <p class="small text-muted mb-0">Amit brings creative designs to life, optimizing space and aesthetics for all constructions.</p>
                </div>
            </div>
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
            <div class="col-md-4">
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <blockquote>"Eshan Buildwell delivered our commercial project ahead of schedule with impeccable
                        quality."</blockquote>
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

<section class="cta-strip">
    <div class="container">
        <h2>Ready to Bring Your Dream Project to Life?</h2>
        <p>Let's Build Something Great Together!</p><a href="contact.html" class="btn-cta-lg">Contact Us</a>
    </div>
</section>

@endsection