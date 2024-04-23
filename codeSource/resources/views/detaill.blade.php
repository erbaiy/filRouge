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

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>




    <script defer data-site="demos.creative-tim.com" src="../../../api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class>
    <noscript><iframe src="https://wwwmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12 ">

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
                            @endif
                            <li class="nav-item d-flex align-items-center">


                                <a class="" href="{{ route('profile') }}">
                                    <img src="../assets/img/bruce-mars.jpg" alt="profile_image"
                                        class="w-100 border rounded-circle shadow" style="    height: 41px;">
                                </a>

                            </li>


                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
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
                                    class="img-fluid main-img"
                                    style="border-radius: 20px; width: 100%; height: auto;">
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
                                                src="{{ asset('assets/img/' . $serviceImage) }}"
                                                class="service-image">
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
                                    <li>Category: <span>{{ $room->category_id }}</span></li>
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



    <footer class="footer py-5 mt-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 mx-auto text-center">
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Company
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        About Us
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Team
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Products
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Blog
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Pricing
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



</body>

<!-- Mirrored from demos.creative-tim.com/soft-ui-dashboard/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 08:22:18 GMT -->

</html>
