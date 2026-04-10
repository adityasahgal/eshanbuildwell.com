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
<section class="hero-banner"><div class="container"><div class="hero-content"><h1>Our Featured Projects</h1><div class="hero-divider"></div><p>A Showcase of Our Expertise and Quality Work</p></div></div></section>
<div class="breadcrumb-bar"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.html">Home</a></li><li class="breadcrumb-item active">Projects</li></ol></nav></div></div>

<!-- FEATURED -->
<section class="py-5 bg-white">
  <div class="container">
    <p class="sec-title text-center">Our Featured Projects</p>
    <div class="sec-line center mb-4"><span class="sec-sub">A Showcase of Our Expertise and Quality Work</span></div>
    <div class="row g-4">
      <div class="col-12 col-md-4"><div class="proj-card"><img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=600&q=80" alt="Luxury Villa"/><div class="proj-label"><h5>Luxury Villa</h5><p>Completed in 8 Months</p></div><div class="proj-footer"><a href="#" class="btn-view">View Project</a></div></div></div>
      <div class="col-12 col-md-4"><div class="proj-card"><img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=600&q=80" alt="Modern Office"/><div class="proj-label"><h5>Modern Office</h5><p>Commercial Project</p></div><div class="proj-footer"><a href="#" class="btn-view">View Project</a></div></div></div>
      <div class="col-12 col-md-4"><div class="proj-card"><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" alt="Industrial Facility"/><div class="proj-label"><h5>Industrial Facility</h5><p>Factory Construction</p></div><div class="proj-footer"><a href="#" class="btn-view">View Project</a></div></div></div>
    </div>
    <div class="text-center mt-4"><a href="#gallery" class="btn-navy">View All Projects <i class="bi bi-chevron-right"></i></a></div>
  </div>
</section>

<!-- GALLERY -->
<section class="py-5" style="background:var(--gray-bg)" id="gallery">
  <div class="container">
    <p class="sec-title text-center">Project Gallery</p>
    <div class="sec-line center mb-4"></div>
    <div class="filter-btns d-flex flex-wrap gap-2 justify-content-center mb-4">
      <button class="btn-filter active" data-filter="all">All Projects</button>
      <button class="btn-filter" data-filter="residential">Residential</button>
      <button class="btn-filter" data-filter="commercial">Commercial</button>
      <button class="btn-filter" data-filter="industrial">Industrial</button>
    </div>
    <div class="gallery-grid" id="galleryGrid">
      <div class="gallery-item" data-cat="residential" onclick="openLightbox(this)"><img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=600&q=80" alt="Residential 1"/><div class="overlay"><i class="bi bi-zoom-in"></i></div></div>
      <div class="gallery-item" data-cat="commercial" onclick="openLightbox(this)"><img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=600&q=80" alt="Commercial 1"/><div class="overlay"><i class="bi bi-zoom-in"></i></div></div>
      <div class="gallery-item" data-cat="industrial" onclick="openLightbox(this)"><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" alt="Industrial 1"/><div class="overlay"><i class="bi bi-zoom-in"></i></div></div>
      <div class="gallery-item" data-cat="commercial" onclick="openLightbox(this)"><img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80" alt="Commercial 2"/><div class="overlay"><i class="bi bi-zoom-in"></i></div></div>
      <div class="gallery-item" data-cat="residential" onclick="openLightbox(this)"><img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=600&q=80" alt="Residential 2"/><div class="overlay"><i class="bi bi-zoom-in"></i></div></div>
      <div class="gallery-item" data-cat="industrial" onclick="openLightbox(this)"><img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&q=80" alt="Industrial 2"/><div class="overlay"><i class="bi bi-zoom-in"></i></div></div>
    </div>
  </div>
</section>
<div class="lightbox" id="lightbox" onclick="closeLightbox(event)"><button class="lightbox-close" onclick="closeLightbox()"><i class="bi bi-x-lg"></i></button><img id="lightboxImg" src="" alt=""/></div>
<section class="cta-strip"><div class="container"><h2>Ready to Build Your Dream Project?</h2><br><a href="calculator.html" class="btn-cta-lg">Get Your Free Estimate</a></div></section>

<script>
document.querySelectorAll('.btn-filter').forEach(btn=>{btn.addEventListener('click',()=>{document.querySelectorAll('.btn-filter').forEach(b=>b.classList.remove('active'));btn.classList.add('active');const f=btn.dataset.filter;document.querySelectorAll('.gallery-item').forEach(item=>{item.classList.toggle('hidden',f!=='all'&&item.dataset.cat!==f);});});});
function openLightbox(el){document.getElementById('lightboxImg').src=el.querySelector('img').src;document.getElementById('lightbox').classList.add('show');}
function closeLightbox(e){if(!e||e.target!==document.getElementById('lightboxImg'))document.getElementById('lightbox').classList.remove('show');}
document.querySelector('.lightbox-close').addEventListener('click',()=>document.getElementById('lightbox').classList.remove('show'));
</script>

@endsection