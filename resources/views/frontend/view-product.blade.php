<?php
$genSetting = \App\Models\Setting::first();
?>
@extends('layouts.master')

@section('meta_title'){{ $productrow->meta_title }}@stop

@section('meta_description'){{ $productrow->meta_description }}@stop

@section('meta_keywords'){{ $productrow->keywords }}@stop

@section('content')

<style>
    .section-heading {
        margin-top: 30px;
        margin-bottom: 20px;
    }

    .facilities-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 30px;
        /* Adds space between columns */
    }

    .facility-section {
        flex: 1;
        min-width: 300px;
        /* Ensures the columns don't shrink too much */
        margin-bottom: 30px;
    }

    .facility-section h3 {
        margin-bottom: 10px;
    }

    .area-info-col {
        margin-bottom: 20px;
    }

    .about-banner {
        background: url('<?php echo url('assets/image/room-1.jpg'); ?>') center center / cover no-repeat;
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

    .amenities-list li {
        list-style: none;
        margin-bottom: 10px;
    }

    .amenities-list li::before {
        content: "✔️ ";
        color: green;
        margin-right: 10px;
    }
</style>
<!-- Banner Section -->
<section class="about-banner home-banner">
    <h1 style=" font-size: 32px; color: #fff; text-shadow: 2px 2px black; font-weight: 700;">{{ $productrow->name }}</h1>
</section>

<!-- Main Content -->
<div class="container my-5">
    <div class="row">
        <!-- Property Images -->
        <div class="col-lg-6">
            <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img rel="preload" src="{{ url('storage/' . $productrow->thumbnail_img) }}" class="d-block " style="height: 400px; width: 700px;"
                            alt="{{ $productrow->image_alt }}">
                    </div>
                    @foreach (json_decode($productrow->photos) as $photo)
                    <div class="carousel-item">
                        <img loading="lazy" src="{{ url('storage/' . $photo) }}" class="d-block" style="height: 400px; width: 700px;"
                            alt="{{ $productrow->imgage_alt }}">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Property Details -->
        <div class="col-lg-6">
            <!-- <ul class="list-unstyled">
                <li><strong>Price:</strong> ₹{{ $productrow->price }} / Night</li>
            </ul> -->
            <!-- Detailed Description -->
            <div class="row mt-2">
                <div class="col-12">
                    <h3>Description</h3>
                    <div style="text-align: justify;">{!! $productrow->description !!}</div>
                </div>
                <div style="text-align: justify;">{{ $productrow->short_description }}</div>
            </div>
            <a href="{{ config('app.book_now_url') }}" target="_blank"><button class="btn btn-danger mt-2">Book Now</button></a>
        </div>
    </div>




</div>

<div class="container my-5">

    <!-- Area Info Section with Two Columns -->
    <div class="row">
        <div class="col-lg-6 area-info-col">
            <h2 class="section-heading">What's Nearby</h2>
            <ul class="amenities-list">
                <li>M T Park-Jeolikote: 4.6 km</li>
                <li>Sadiyatal Cascade-Botanical Garden: 15 km</li>
                <li>Basket Ball Ground: 16 km</li>
                <li>Darshan Ghar Park-Tallital: 16 km</li>
                <li>Eco Cave Gardens: 17 km</li>
                <li>Pratap Udyan-Tallital: 17 km</li>
                <li>Chhawani Pushp Vatika-Bhowali Road: 17 km</li>
                <li>Rockut Compound Nainital: 19 km</li>
            </ul>
        </div>
        <div class="col-lg-6 area-info-col">
            <h2 class="section-heading">Restaurants & Cafes</h2>
            <ul class="amenities-list">
                <li>Sanguri Jalpan Grah: 3.2 km</li>
                <li>Devbhoomi Restaurant: 3.8 km</li>
                <li>H. Dev Restaurant: 4.1 km</li>
            </ul>
            <h2 class="section-heading">Closest Airports</h2>
            <ul class="amenities-list">
                <li>Pantnagar Airport: 58 km</li>
            </ul>
        </div>
    </div>

    <!-- Facilities Section -->
    <div class="container my-5">
        <!-- Main Facilities & Information Section -->
        <div class="row">
            <h2 class="section-heading">Facilities & Amenities</h2>
            <div class="col-lg-6">
                <!-- Facilities Section (Left Side) -->
                <div class="facilities-section">

                    <div class="facility-item">
                        <h3 class="section-heading">Parking</h3>
                        <ul class="amenities-list">
                            <li>Free private parking is available on site (reservation is needed)</li>
                            <li>Valet parking</li>
                            <li>Parking garage</li>
                            <li>Accessible parking</li>
                        </ul>
                    </div>

                    <div class="facility-item">
                        <h3 class="section-heading">Internet</h3>
                        <ul class="amenities-list">
                            <li>Wifi is available in all areas and is free of charge</li>
                        </ul>
                    </div>

                    <div class="facility-item">
                        <h3 class="section-heading">Kitchen</h3>
                        <ul class="amenities-list">
                            <li>Shared kitchen</li>
                            <li>Dining table</li>
                            <li>Coffee machine</li>
                            <li>Cleaning products</li>
                            <li>Toaster</li>
                            <li>Stovetop</li>
                            <li>Oven</li>
                            <li>Dryer</li>
                            <li>Kitchenware</li>
                            <li>Electric kettle</li>
                            <li>Washing machine</li>
                            <li>Microwave</li>
                            <li>Refrigerator</li>
                            <li>Kitchenette</li>
                        </ul>
                    </div>

                    <div class="facility-item">
                        <h3 class="section-heading">Bedroom</h3>
                        <ul class="amenities-list">
                            <li>Linens</li>
                            <li>Wardrobe or closet</li>
                            <li>Alarm clock</li>
                            <li>Walk-in closet</li>
                            <li>Extra long beds (> 6.5 ft)</li>
                        </ul>
                    </div>
                    <div class="facility-item">
                        <h3 class="section-heading">Living Area</h3>
                        <ul class="amenities-list">
                            <li>Dining area</li>
                            <li>Sofa</li>
                            <li>Sitting area</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <!-- Additional Information Section (Right Side) -->
                <div class="facility-item">
                    <h3 class="section-heading">Bathroom</h3>
                    <ul class="amenities-list">
                        <li>Toilet paper</li>
                        <li>Towels</li>
                        <li>Towels/Sheets (extra fee)</li>
                        <li>Guest bathroom</li>
                        <li>Bathtub or shower</li>
                        <li>Slippers</li>
                        <li>Private Bathroom</li>
                        <li>Toilet</li>
                        <li>Free toiletries</li>
                        <li>Bathrobe</li>
                        <li>Hairdryer</li>
                        <li>Shower</li>
                    </ul>
                </div>

                <div class="facility-item">
                    <h3 class="section-heading">Media & Technology</h3>
                    <ul class="amenities-list">
                        <li>Streaming service (like Netflix)</li>
                        <li>Blu-ray player</li>
                        <li>Flat-screen TV</li>
                        <li>Laptop safe</li>
                        <li>Satellite channels</li>
                        <li>Radio</li>
                        <li>TV</li>
                    </ul>
                </div>

                <div class="facility-item">
                    <h3 class="section-heading">Room Amenities</h3>
                    <ul class="amenities-list">
                        <li>Socket near the bed</li>
                        <li>Drying rack for clothing</li>
                        <li>Fold-up bed</li>
                        <li>Clothes rack</li>
                        <li>Mosquito net</li>
                        <li>Tile/Marble floor</li>
                        <li>Private entrance</li>
                        <li>Interconnecting room(s) available</li>
                        <li>Fan</li>
                        <li>Ironing facilities</li>
                        <li>Iron</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection