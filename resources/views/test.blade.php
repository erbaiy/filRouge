<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/soft-ui-dashboard/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 08:22:18 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        HOTELO
    </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-DaY+sZiBsFiDO6oB/uN04c9sg9UpFPnIBYbUHfjZ1IyQ31QbH2VDvuRdK4tXz11WmowqKhA7MFHRzgaKbkRXTg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="canonical" href="https://www.creative-tim.com/product/soft-ui-dashboard" />

    <meta name="keywords"
        content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, Soft UI Dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, free dashboard, free admin dashboard, free bootstrap 5 admin dashboard">
    <meta name="description"
        content="Soft UI Dashboard is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Soft UI Dashboard by Creative Tim">
    <meta name="twitter:description"
        content="Soft UI Dashboard is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="../../../s3.amazonaws.com/creativetim_bucket/products/450/original/opt_sd_free_thumbnail.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Soft UI Dashboard by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://demos.creative-tim.com/soft-ui-dashboard/examples/dashboard.html" />
    <meta property="og:image"
        content="../../../s3.amazonaws.com/creativetim_bucket/products/450/original/opt_sd_free_thumbnail.png" />
    <meta property="og:description"
        content="Soft UI Dashboard is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <script src="../../../kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.minf2ad.css?v=1.0.7" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXxZ8SCZFbbFI1vUB4=" crossorigin="anonymous"></script>

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
    <script src="https://js.stripe.com/v3/"></script>
    <script defer data-site="demos.creative-tim.com" src="../../../api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">

                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('acceuille') }}"
                            style="font-family: fangsong;">
                            Hotelo
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                        href="{{ '/acceuille' }}">
                                        Rooms
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('rooms.services') }}">
                                        Services
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('rooms.gallery') }}">
                                        Blog
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('rooms.gallery') }}">
                                        About us
                                    </a>
                                </li>
                            </ul>
                            {{-- <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-round btn-sm mb-0 btn-outline-primary me-2" target="_blank"
                                    href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Reserve
                                </a>
                            </li> --}}
                            @if (!session('id'))
                                <ul class="navbar-nav d-lg-block d-none">
                                    <li class="nav-item">
                                        <a href="{{ route('auth_getLogin') }}"
                                            class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Sing In</a>
                                    </li>


                                </ul>
                            @else
                                <li class="nav-item d-flex align-items-center" style="    margin-right: 10px;">

                                    <a class="" href="{{ route('auth_Logout') }}">
                                        <img src="https://static.vecteezy.com/system/resources/previews/000/421/556/original/logout-icon-vector-illustration.jpg"
                                            alt="profile_image" class="w-100 border rounded-circle shadow"
                                            style="    height: 31px;">
                                    </a>

                                </li>

                                <li class="nav-item d-flex align-items-center">


                                    <a class="" href="{{ route('profile') }}">
                                        <img src="../assets/img/bruce-mars.jpg" alt="profile_image"
                                            class="w-100 border rounded-circle shadow" style="    height: 41px;">
                                    </a>

                                </li>
                            @endif


                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
    <main class="main-content  mt-0">

        <section>
            <div class="page-header min-vh-75">

                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8 ml-3">
                        {{-- <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                            <p class="mb-0">Enter your email and password to sign in</p>
                        </div> --}}
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
                                            <input type="date" class="form-control" id="checkout"
                                                name="checkout" placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="departure">Rooms Type</label>
                                            <select name="room_type" id="roomTypeSelect" class="form-control"
                                                required>
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
                                {{ session('failed') }}
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



                            {{-- <div class="col-md-4 col-sm-6">
                                <div class="room">
                                    <div class="room_img">
                                        <figure>
                                            <img src="https://www.beleontours.com/Media/Hotels/rooms_76938894_NJV%20Athens%20Plaza%20-%20Rooms%20H%20(7).jpg?w=750&h=430&mode=crop&scale=both"
                                                alt="#" style="width:100%;border-radius:15px;">
                                        </figure>
                                    </div>
                                    <div class="bed_room">

                                        <h3>Bed Room</h3>
                                        <div>
                                            A parais
                                        </div>

                                        <div class="card-footer"
                                            style="    display: flex;
                                        justify-content: space-between;
                                        align-items: center;">
                                            <span class="float-left price">$59/night</span>
                                            <a href="#" class="btn btn-outline-success float-right">Reserve</a>
                                        </div>
                                    </div>
                                </div>

                            </div> --}}
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

                                                <div class="modal fade"
                                                    id="fullScreenModal{{ $roomData['room']->id }}" tabindex="-1"
                                                    aria-labelledby="fullScreenModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="fullScreenModalLabel">
                                                                    Full-Screen Modal</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
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
                                                                                <input type="date"
                                                                                    class="form-control"
                                                                                    id="checkin" name="checkin"
                                                                                    placeholder="Check-in date"
                                                                                    required>
                                                                                <div class="invalid-feedback">Please
                                                                                    enter a valid check-in date.</div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="checkout"
                                                                                class="col-sm-3 col-form-label">Check-out</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="date"
                                                                                    class="form-control"
                                                                                    id="checkout" name="checkout"
                                                                                    placeholder="Check-out date"
                                                                                    required>
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
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
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
                                                                <span
                                                                    class="service-name">{{ $service['name'] }}</span>
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

    <footer class="footer py-5 mt-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 mx-auto text-center">
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Company
                    </a>
                    <a href="" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        About Us
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Team
                    </a>

                    <a href="{{ route('rooms.gallery') }}" target="_blank"
                        class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Blog
                    </a>
                    <a href="{{ route('rooms.services') }}" target="_blank"
                        class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Services
                    </a>
                </div>
                <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-dribbble"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-twitter"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-instagram"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-pinterest"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-github"></span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright Â©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Soft by Creative Tim.
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="../../../buttons.github.io/buttons.js"></script>

    <script src="../assets/js/soft-ui-dashboard.minf2ad.js?v=1.0.7"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"84338226b95c6689","b":1,"version":"2023.10.0","token":"1b7cbb72744b40c580f8633c6b62637e"}'
        crossorigin="anonymous"></script>




    {{-- fiter with ajax  --}}
    <!-- Ensure you have jQuery included -->


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
                    // Perform an AJAX request
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




</body>

<!-- Mirrored from demos.creative-tim.com/soft-ui-dashboard/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 08:22:18 GMT -->

</html>