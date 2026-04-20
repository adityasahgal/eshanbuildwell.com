<?php
$genSetting = \App\Models\Setting::first();
?>
@extends('layouts.master')
@php
$meta_title = "Responsive Gallery | Karinya Villas - One, Two, and Three-Bedroom Villas in Nainital";
$meta_description = "Explore the responsive gallery of Karinya Villas, showcasing our luxurious one, two, and three-bedroom villas in Nainital. View stunning images of the villas, interiors, and breathtaking landscapes that make your stay unforgettable.";
$keywords = "Karinya Villas gallery, responsive gallery, one-bedroom villa images, two-bedroom villa gallery, three-bedroom villa photos, Nainital villa images, luxury villa photos, hill station villa gallery, Karinya Villas Nainital";

@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop
@section('content')

<style>
    .about-banner {
        background: url('<?php echo url('assets/img/IMG-20241116-WA0076.jpg'); ?>') center center / cover no-repeat;
        height: 400px;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .about-banner h1 {
        font-size: 3rem;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .about-banner h1 {
            font-size: 2rem;
        }
    }

    .gallery img {
        width: 100%;
        height: 220px;
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery img:hover {
        transform: scale(1.01);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>
<!-- Banner Section -->
<section class="hero-banner" style="{{ isset($banner) ? 'background-image:linear-gradient(rgba(15,25,50,0.7), rgba(15,25,50,0.7)), url('.url('storage/'.$banner->banner).');' : '' }}">
    <div class="container">
        <div class="hero-content">
            <h1>{{ isset($banner) ? $banner->name : 'Responsive Gallery' }}</h1>
            @if(isset($banner) && $banner->tag_line)
                <div class="hero-divider"></div>
                <p>{{ $banner->tag_line }}</p>
            @endif
        </div>
    </div>
</section>

<div class="container my-4">
    <div class="row g-3 gallery">
        <!-- Image 1 - Large Image -->
        <div class="col-12 col-md-4 col-lg-3">
            <img src="{{ url('assets/img/IMG-20241116-WA0008.jpg') }}" alt="Image 1" class="img-fluid" style="height: 460px">
        </div>

        <!-- Other images -->
        <div class="col-12 col-md-8 col-lg-9">
            <div class="row">
                <!-- Image 2 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="{{ url('assets/img/IMG-20241116-WA0005.jpg') }}" alt="Image 2" class="img-fluid">
                </div>

                <!-- Image 3 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="{{ url('assets/img/IMG-20241116-WA0006.jpg') }}" alt="Image 3" class="img-fluid">
                </div>

                <!-- Image 4 -->
                <div class="col-6 col-md-4 col-lg-6">
                    <img src="{{ url('assets/img/IMG-20241116-WA0008.jpg') }}" alt="Image 4" class="img-fluid">
                </div>

                <!-- Image 5 -->
                <div class="col-6 col-md-4 col-lg-6 mt-3">
                    <img src="{{ url('assets/img/IMG-20241116-WA0013.jpg') }}" alt="Image 5" class="img-fluid">
                </div>

                <!-- Image 6 -->
                <div class="col-6 col-md-4 col-lg-3 mt-3">
                    <img src="{{ url('assets/img/IMG-20241116-WA0011.jpg') }}" alt="Image 6" class="img-fluid">
                </div>

                <!-- Image 7 -->
                <div class="col-6 col-md-4 col-lg-3 mt-3">
                    <img src="{{ url('assets/img/IMG-20241116-WA0015.jpg') }}" alt="Image 7" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-4">
    <!-- <h2 class="text-center mb-4">Responsive Image Gallery</h2> -->
    <div class="row g-3 gallery">
        <!-- Image 1 - Large Image -->
        <!-- Other images -->
        <div class="col-12 col-md-8 col-lg-9">
            <div class="row">
                <!-- Image 2 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <img src=" {{ url('assets/img/IMG-20241116-WA0020.jpg') }}" alt="Image 2" class="img-fluid">
                </div>

                <!-- Image 3 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <img src=" {{ url('assets/img/IMG-20241116-WA0021.jpg') }} " alt="Image 3" class="img-fluid">
                </div>

                <!-- Image 4 -->
                <div class="col-6 col-md-4 col-lg-6">
                    <img src=" {{ url('assets/img/IMG-20241116-WA0022.jpg') }}" alt="Image 4" class="img-fluid">
                </div>

                <!-- Image 5 -->
                <div class="col-6 col-md-4 col-lg-6 mt-3">
                    <img src="{{ url('assets/img/IMG-20241116-WA0023.jpg') }}" alt="Image 5" class="img-fluid">
                </div>

                <!-- Image 6 -->
                <div class="col-6 col-md-4 col-lg-3 mt-3">
                    <img src="{{ url('assets/img/IMG-20241116-WA0024.jpg') }}" alt="Image 6" class="img-fluid">
                </div>

                <!-- Image 7 -->
                <div class="col-6 col-md-4 col-lg-3 mt-3">
                    <img src="{{ url('assets/img/IMG-20241116-WA0031.jpg') }}" alt="Image 7" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
            <img src="{{ url('assets/img/IMG-20241116-WA0029.jpg') }}" alt="Image 1" class="img-fluid" style="height: 460px">
        </div>
    </div>
</div>
@endsection