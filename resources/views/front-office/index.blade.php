@extends('front-office.app.layout')
@section('content')
    <main class="main-content  mt-0">

        <section>
            <div class="page-header min-vh-75">

                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8 ml-3">

                        <div class="card-body">

                            <div class="book-room">
                                <h1>Book a Room Online</h1>
                                <form class="book-now">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="arrival">Arrival Date:</label>
                                            <input type="date" class="form-control" id="checkin" name="checkin"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="departure">Departure Date:</label>
                                            <input type="date" class="form-control" id="checkout" name="checkout"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="departure">Rooms Type</label>
                                            <select name="room_type" id="roomTypeSelect" class="form-control" required>
                                                <option value="">Select Room Type</option>
                                                @foreach (['double', 'single', 'suite'] as $type)
                                                    <option value="{{ $type }}">{{ ucfirst($type) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" name="" id="roomTypeSelect"> --}}


                                        </div>

                                        <div class="col-md-4 pt-" style="padding-top: 2rem !important;">
                                            <button type="submit" class="btn btn-primary">Book Now</button>
                                            {{-- <button id="filterButton" onclick="handleSearch()">Filter Rooms</button> --}}

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                            style="background-image:url('https://www.teledataict.com/media/2021/08/hotel_technology-1024x576.jpg')">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section>

            @if ($errors->any())
                <script>
                    setTimeout(function() {
                        alert("{{ implode(' ', $errors->all()) }}");
                    }, 3000); // 3000 milliseconds = 3 seconds
                </script>
            @endif

            <div class="container">
                <div class="row">
                    <div class="container">
                        @if (session('success'))
                            <div id="successAlert" class="alert alert-success"
                                style="color: green; background-color: #ccffcc; border: 1px solid green; padding: 10px; margin-top: 20px; border-radius: 5px; text-align: center;">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('failed'))
                            <div id="failedAlert" class="alert alert-danger"
                                style="color: red; background-color: #ffcccc; border: 1px solid red; padding: 10px; margin-top: 20px; border-radius: 5px; text-align: center;">
                                <span style="color: white
                                "></span>
                                {{ session('failed') }}</span>
                            </div>
                        @endif

                        <script>
                            // Function to remove success message after 3 seconds
                            setTimeout(function() {
                                var successAlert = document.getElementById('successAlert');
                                if (successAlert) {
                                    successAlert.parentNode.removeChild(successAlert);
                                }
                            }, 3000);

                            // Function to remove error message after 3 seconds
                            setTimeout(function() {
                                var failedAlert = document.getElementById('failedAlert');
                                if (failedAlert) {
                                    failedAlert.parentNode.removeChild(failedAlert);
                                }
                            }, 3000);
                        </script>

                        <div class="row" style="justify-content: center">
                            <div class="col-md-12">
                                <div class="titlepage text-center" style="margin: 40px;">
                                    <h3>Our Rooms</h3>

                                    <p class="mb-0">Welcome to our official booking website. Book now and enjoy the
                                        best luxury hotel experience.</p>
                                </div>
                            </div>

                        </div>

                        <div class="row" id="resultArea">


                            @foreach ($roomsWithServices as $roomData)
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card card-blog card-plain">
                                        <div class="position-relative">
                                            <a class="d-block shadow-xl border-radius-xl"
                                                href="{{ route('rooms.detail', ['id' => $roomData['room']->id]) }}">
                                                <img src="{{ 'assets/img/' . $roomData['room']->image }}"
                                                    alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">

                                            </a>
                                        </div>
                                        <div class="card-body px-1 pb-0">
                                            <p class="text-gradient text-dark mb-2 text-sm">
                                                {{ $roomData['room']->price }}$</p>
                                            <a href="javascript:;">
                                                <h5>
                                                    {{ $roomData['room']->room_type }}
                                                </h5>
                                            </a>
                                            <p class="mb-4 text-sm">
                                                {{ $roomData['room']->description }}
                                            </p>

                                            <div class="d-flex align-items-center justify-content-between"
                                                style="margin-bottom: 20px;">
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#fullScreenModal{{ $roomData['room']->id }}"
                                                    class="btn btn-outline-primary btn-sm mb-0">reserve</button>
                                                {{-- modal start --}}

                                                <div class="modal fade" id="fullScreenModal{{ $roomData['room']->id }}"
                                                    tabindex="-1" aria-labelledby="fullScreenModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="fullScreenModalLabel">
                                                                    Full-Screen Modal</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('reserve') }}" method="post"
                                                                id="payment-form">
                                                                @csrf

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <ul class="nav nav-tabs">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                    href="#">Account</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link active"
                                                                                    href="#">Payment</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <input type="hidden" name="stripeToken">
                                                                    <div class="card-body">
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ session('id') }}">
                                                                        <input type="hidden" name="room_id"
                                                                            value="{{ $roomData['room']->id }}">
                                                                        <input type="hidden" name="price"
                                                                            value="{{ $roomData['room']->price }}">

                                                                        <div class="row mb-3">
                                                                            <label for="checkin"
                                                                                class="col-sm-3 col-form-label">Check-in</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="date" class="form-control"
                                                                                    id="checkin" name="checkin"
                                                                                    placeholder="Check-in date" required>
                                                                                <div class="invalid-feedback">Please
                                                                                    enter a valid check-in date.</div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="checkout"
                                                                                class="col-sm-3 col-form-label">Check-out</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="date" class="form-control"
                                                                                    id="checkout" name="checkout"
                                                                                    placeholder="Check-out date" required>
                                                                                <div class="invalid-feedback">Please
                                                                                    enter a valid check-out date.</div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="cardNumber">Card Number</label>
                                                                            <input type="text" class="form-control"
                                                                                id="cardNumber" name="cardNumber"
                                                                                placeholder="Enter card number">
                                                                            @error('cardNumber')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="expiryDate">Expiration
                                                                                Date</label>
                                                                            <input type="text" class="form-control"
                                                                                id="expiryDate" name="expiryDate"
                                                                                placeholder="MM/YY">
                                                                            @error('expiryDate')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="cvv">CVV</label>
                                                                            <input type="text" class="form-control"
                                                                                id="cvv" name="cvv"
                                                                                placeholder="Enter CVV">
                                                                            @error('cvv')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div id="card-errors" role="alert"></div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary mt-3 mt-md-0">Reserve
                                                                            Now</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- modale end --}}
                                                <div class="avatar-group mt-2"
                                                    style="margin-bottom: 27px; display: flex;
                                                    justify-content: space-between;
                                                    align-items: center;
                                                    gap: 20px;
                                                ">
                                                    @foreach ($roomData['services'] as $service)
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="{{ $service['name'] }}">
                                                            <div class="service-item">
                                                                <img alt="Image placeholder"
                                                                    src="{{ asset('assets/img/' . $service['image']) }}"
                                                                    class="service-image">
                                                                <span class="service-name">{{ $service['name'] }}</span>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                </div>

                                                <style>
                                                    .service-item {
                                                        position: relative;
                                                        display: inline-block;
                                                    }

                                                    .service-item .service-image {
                                                        width: 40px;
                                                        height: 40px;
                                                        transition: all 0.3s ease-in-out;
                                                    }

                                                    .service-item:hover .service-image {
                                                        width: 80px;
                                                        height: 80px;
                                                    }

                                                    .service-name {
                                                        position: absolute;
                                                        bottom: -20px;
                                                        left: 50%;
                                                        transform: translateX(-50%);
                                                        background-color: #000;
                                                        color: #fff;
                                                        padding: 5px 10px;
                                                        border-radius: 5px;
                                                        opacity: 0;
                                                        transition: opacity 0.3s ease-in-out;
                                                    }

                                                    .service-item:hover .service-name {
                                                        opacity: 1;
                                                    }
                                                </style>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the elements
            let roomTypeSelect = document.getElementById('roomTypeSelect');
            let checkin = document.getElementById('checkin');
            let checkout = document.getElementById('checkout');

            // Function to handle the search
            function handleSearch() {
                let categoryId = roomTypeSelect.value;
                let checkinDate = checkin.value;
                let checkoutDate = checkout.value;

                // Debugging: Output the selected values
                console.log(categoryId);
                console.log(checkinDate);
                console.log(checkoutDate);

                if (categoryId && checkinDate && checkoutDate) {
                    let url = `/filterRooms/${categoryId}/${checkinDate}/${checkoutDate}`;
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', url);
                    xhr.responseType = 'text'; // Expecting HTML in return

                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            document.getElementById('resultArea').innerHTML = xhr.responseText;
                            console.log(xhr.responseText);
                        } else {
                            console.error("Error loading data:", xhr.responseText);
                        }
                    };

                    xhr.onerror = function() {
                        console.error("Error loading data");
                    };

                    xhr.send();
                } else {
                    console.error('Missing data'); // Error handling if data is missing
                }
            }

            // Attach handleSearch to events
            roomTypeSelect.addEventListener('change', handleSearch);
            checkin.addEventListener('change', handleSearch);
            checkout.addEventListener('change', handleSearch);
        });
    </script>
@endsection
