@extends('front-office.app.layout')
@section('content')
    <main class="main-content mt-10">
        <div class="card-wrapper container">
            <div class="card">
                <div class="row">
                    <!-- Card left - Image Gallery -->
                    <div class="col-md-6">
                        <div class="product-imgs">
                            <!-- Main Image Display -->
                            <div class="img-display" style="width: 100%;">
                                <img src="{{ asset('assets/img/' . $room->image) }}" alt="Room Image"
                                    class="img-fluid main-img" style="border-radius: 20px; width: 100%; height: auto;">
                            </div>
                            <!-- Thumbnail Images -->
                            <div class="d-flex justify-content-center align-items-center"
                                style="gap: 20px; width: 50%; flex-direction: row;">
                                @php
                                    $serviceImages = explode(',', $room->service_images);
                                    $serviceNames = explode(',', $room->service_names);
                                @endphp
                                @foreach ($serviceImages as $key => $serviceImage)
                                    <a href="javascript:;" class="avatar-xs rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="{{ $serviceNames[$key] }}">
                                        <div class="service-item" style="margin-right: 10px; position: relative;">
                                            <img alt="Service Image" style="width: 50px;"
                                                src="{{ asset('assets/img/' . $serviceImage) }}" class="service-image">
                                            <span class="service-name"
                                                style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); background-color: rgba(0, 0, 0, 0.7); color: #fff; padding: 5px; border-radius: 5px; opacity: 0; transition: opacity 0.3s;">{{ $serviceNames[$key] }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Card right - Product Details -->
                    <div class="col-md-6">
                        <div class="product-content">
                            <h2 class="product-title">Hotel Room</h2>
                            <a href="#" class="product-link">Visit Hotel Website</a>
                            <div class="product-rating">
                                <!-- Rating Stars -->
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div class="product-price">
                                <!-- Price Information -->
                                <p class="last-price">Room Price: <span>${{ $room->price }}</span></p>
                            </div>
                            <div class="product-detail">
                                <!-- Room Details -->
                                <h2>About This Room:</h2>
                                <p>{{ $room->description }}</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis
                                    eius. Dignissimos, labore suscipit. Unde.</p>
                                <ul>
                                    <!-- Room Specifications -->
                                    <li>Room Type: <span>{{ $room->room_type }}</span></li>
                                </ul>
                            </div>
                            <div class="purchase-info">
                                <!-- Add to Cart Button -->
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#fullScreenModal{{ $room->id }}"
                                    class="btn btn-outline-primary btn-sm mb-0">Reserve</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <style>
        .service-item {
            margin-right: 20px;
            /* Adjust as needed */
        }

        .service-name {
            display: none;
            position: absolute;
            bottom: -25px;
            /* Adjust as needed */
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .service-item:hover .service-name {
            display: block;
        }
    </style>
@endsection
