<?php
$genSetting = \App\Models\Setting::first();
?>
@extends('layouts.master')
@php
$meta_title = "Eshan Buildwell | Latest Blogs";
$meta_description = "Stay updated with the latest blogs from Eshan Buildwell.";
$keywords = "Eshan Buildwell blog, latest updates, construction tips, Eshan Buildwell updates";
@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop
@section('content')
<section class="hero-banner" style="{{ isset($banner) ? 'background-image:linear-gradient(rgba(15,25,50,0.2), rgba(15,25,50,0.2)), url('.url('storage/'.$banner->banner).');' : '' }}">
  <div class="container">
    <div class="hero-content">
      <h1>{{ isset($banner) ? $banner->name : 'Our Blog' }}</h1>
      <div class="hero-divider"></div>
      <p>{{ isset($banner) ? $banner->tag_line : 'Stay Updated with Our Latest News & Insights' }}</p>
      <div class="search-bar mt-3">
        <input type="text" placeholder="Search blog posts..." aria-label="Search"/>
        <button type="button"><i class="bi bi-search"></i></button>
      </div>
    </div>
  </div>
</section>
<div class="breadcrumb-bar"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li><li class="breadcrumb-item active">Blog</li></ol></nav></div></div>

<section class="py-5" style="background:var(--gray-bg)">
  <div class="container">
    <h2 class="sec-title mb-4">Latest Blog Posts</h2>
    <div class="row g-4">
      @php
          $blogs = \App\Models\Blog::where('status', 1)->orderBy('id', 'DESC')->paginate(9);
      @endphp
      @foreach($blogs as $blog)
      <div class="col-12 col-md-6 col-lg-4">
        <div class="blog-card">
          <img class="blog-card-img" src="{{ url('storage/'.$blog->banner) }}" alt="{{ $blog->image_alt ?? $blog->name }}" style="height: 250px; object-fit: cover; width: 100%; border-top-left-radius: inherit; border-top-right-radius: inherit;"/>
          <div class="blog-card-body">
            <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->name }}</a></h5>
            <div class="blog-meta">
              <span><i class="bi bi-calendar3"></i>{{ date('d F Y', strtotime($blog->created_at)) }}</span>
              <span><i class="bi bi-person"></i>Admin</span>
            </div>
            <p class="text-muted small mb-3">{{ Str::limit($blog->short_description, 100) }}</p>
            <a href="{{ url('blog/'.$blog->slug) }}" class="btn-read">Get in touch</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    
    <div class="d-flex justify-content-center mt-5">
      @if ($blogs->hasPages())
        <nav aria-label="Blog pagination">
          <ul class="pagination gap-1">
            @if ($blogs->onFirstPage())
                <li class="page-item disabled"><span class="page-link rounded"><i class="bi bi-chevron-left" style="font-size:.75rem"></i></span></li>
            @else
                <li class="page-item"><a class="page-link rounded" href="{{ $blogs->previousPageUrl() }}"><i class="bi bi-chevron-left" style="font-size:.75rem"></i></a></li>
            @endif

            @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                @if ($page == $blogs->currentPage())
                    <li class="page-item active"><span class="page-link rounded">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link rounded" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            @if ($blogs->hasMorePages())
                <li class="page-item"><a class="page-link rounded" href="{{ $blogs->nextPageUrl() }}"><i class="bi bi-chevron-right" style="font-size:.75rem"></i></a></li>
            @else
                <li class="page-item disabled"><span class="page-link rounded"><i class="bi bi-chevron-right" style="font-size:.75rem"></i></span></li>
            @endif
          </ul>
        </nav>
      @endif
    </div>
  </div>
</section>
<section class="cta-strip"><div class="container">    <h2>Ready to Build Your Dream Project?</h2><br>
    <a href="{{ url('calculator') }}" class="btn-cta-lg">Get Your Free Estimate</a>
  </div><a href="tel:{{ $genSetting['phone'] ?? '+919876543210' }}" class="btn-cta-lg"><i class="bi bi-telephone-fill"></i> Call Us: {{ $genSetting['phone'] ?? '+91 9876543210' }}</a></div></section>

@endsection