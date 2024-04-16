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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
    <script src="https://js.stripe.com/v3/"></script>



    {{-- <script>
        (function(a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.start = 1 * new Date;
            h.end = i = function() {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function() {
                i();
                h.end = null
            }, c);
            h.timeout = c;
        })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
            'GTM-K9BGS8K': true
        });
    </script> --}}

    {{-- <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-46172202-22', 'auto', {
            allowLinker: true
        });
        ga('set', 'anonymizeIp', true);
        ga('require', 'GTM-K9BGS8K');
        ga('require', 'displayfeatures');
        ga('require', 'linker');
        ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
    </script> --}}

    {{-- 
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script> --}}



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
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="dashboard.html"
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
                                        href="dashboard.html">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                        Rooms
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="profile.html">
                                        <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                        Services
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link me-2" href="sign-in.html">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Gallery
                                    </a>
                                </li>
                            </ul>
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-round btn-sm mb-0 btn-outline-primary me-2" target="_blank"
                                    href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Reserve
                                </a>
                            </li>
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/product/soft-ui-dashboard"
                                        class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Sing In</a>
                                </li>

                            </ul>
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link  active" href="">
                                        <div
                                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-user default-icon"></i>

                                        </div>
                                    </a>


                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        {{-- <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8 ml-3">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">

                                    <div class="book-room">
                                        <h1>Book a Room Online</h1>
                                        <form class="book-now">
                                            <div class="form-group row">
                                                <label for="arrival" class="col-sm-2 col-form-label">Arrival</label>
                                                <div class="col-sm-10">
                                                    <img class="date-icon" src="images/date.png" alt="Calendar icon">
                                                    <input type="date" class="form-control online-book"
                                                        id="arrival" name="arrival" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="departure"
                                                    class="col-sm-2 col-form-label">Departure</label>
                                                <div class="col-sm-10">
                                                    <img class="date-icon" src="images/date.png" alt="Calendar icon">
                                                    <input type="date" class="form-control online-book"
                                                        id="departure" name="departure" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 text-center">
                                                    <button type="submit" class="btn btn-primary book-btn">Book
                                                        Now</button>
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
                </div>
            </div>
        </section> --}}
        <section>
            <div class="page-header min-vh-75">

                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8 ml-3">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                            <p class="mb-0">Enter your email and password to sign in</p>
                        </div>
                        <div class="card-body">

                            <div class="book-room">
                                <h1>Book a Room Online</h1>
                                <form class="book-now">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="arrival">Arrival Date:</label>
                                            <input type="date" class="form-control" id="arrival" name="arrival"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="departure">Departure Date:</label>
                                            <input type="date" class="form-control" id="departure"
                                                name="departure" placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="departure">travels</label>
                                            <select class="form-control" name="" id="">
                                                <option value="oneway">One Way</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 pt-" style="padding-top: 2rem !important;">
                                            <button type="submit" class="btn btn-primary">Book Now</button>
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
                    alert("{{ implode(' ', $errors->all()) }}");
                </script>
            @endif
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="row" style="justify-content: center">
                            <div class="col-md-12">
                                <div class="titlepage text-center" style="margin: 40px;">
                                    <h3>Our Rooms</h3>

                                    <p class="mb-0">Welcome to our official booking website. Book now and enjoy the
                                        best luxury hotel experience.</p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            @foreach ($rooms as $room)
                                <div class="col-md-4 col-sm-6">
                                    <div class="room">
                                        <div class="room_img">
                                            <figure>
                                                <img src="{{ 'assets/img/' . $room->image }}" alt="#"
                                                    style="width: 100%; border-radius: 15px;">
                                            </figure>
                                        </div>
                                        <div class="bed_room">
                                            <div
                                                style="  
                                              display: flex;
                                        justify-content: space-between;    
                                        padding: 0px 20px;">
                                                <div>
                                                    <h4>{{ $room->room_type }}</h4>
                                                </div>
                                                <div>
                                                    <span>
                                                        {{ $room->price }}$
                                                    </span>
                                                </div>
                                            </div>
                                            <div>
                                                {{ $room->description }}
                                            </div>
                                            <div class="card-footer"
                                                style="    display: flex;
                                        justify-content: space-between;
                                        align-items: center;">
                                                <span class="float-left price">services</span>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#fullScreenModal{{ $room->id }}"
                                                    class="btn btn-outline-success float-right">Reserve</button>
                                                {{-- modal start --}}

                                                <div class="modal fade" id="fullScreenModal{{ $room->id }}"
                                                    tabindex="-1" aria-labelledby="fullScreenModalLabel"
                                                    aria-hidden="true">
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
                                                                            value="{{ $room->id }}">
                                                                        <input type="hidden" name="price"
                                                                            value="{{ $room->price }}">

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

                                                                        <div class="row mb-3">
                                                                            <label for="card-element"
                                                                                class="col-sm-3 col-form-label">Payment
                                                                                Card</label>
                                                                            <div class="col-sm-9">
                                                                                <div id="card-element"></div>
                                                                                <div class="invalid-feedback">Please
                                                                                    enter valid card details.</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div id="card-errors" role="alert"></div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary mt-3 mt-md-0">Reserve
                                                                            Now</button>
                                                                    </div>
                                                                </div>
                                                            </form>


                                                            {{-- <form action="{{ route('reserve') }}" method="POST"
                                                                id="payment-form">
                                                                @csrf
                                                                <input type="hidden" name="token"
                                                                    value="{{ bin2hex(random_bytes(16)) }}">
                                                                <div class="modal-body">
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
                                                                        <div class="card-body">
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ session('id') }}"
                                                                                id="">
                                                                            <input type="hidden" name="room_id"
                                                                                value="{{ $room->id }}"
                                                                                id="">
                                                                            <input type="hidden" name="price"
                                                                                value="{{ $room->price }}"
                                                                                id="">
                                                                            <div id="card-element">
                                                                                <div class="row mb-3">
                                                                                    <label
                                                                                        for="">Check-in</label>
                                                                                    <div class="col-7">
                                                                                        <input type="date"
                                                                                            name="checkin"
                                                                                            class="form-control"
                                                                                            placeholder="Check-in">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <label
                                                                                        for="">Check-out</label>
                                                                                    <div class="col-7">
                                                                                        <input type="date"
                                                                                            name="checkout"
                                                                                            class="form-control"
                                                                                            placeholder="Check-out">
                                                                                    </div>
                                                                                </div>
                                                                                <h5 class="card-title">Saved cards:
                                                                                </h5>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-2">
                                                                                        <img class="img-fluid"
                                                                                            src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                                                                                    </div>
                                                                                    <div class="col-7">
                                                                                        <input type="text"
                                                                                            name="token"
                                                                                            class="form-control"
                                                                                            placeholder="**** **** **** 3193">
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <a href="#"
                                                                                            class="btn btn-link">Remove
                                                                                            card</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-2">
                                                                                        <img class="img-fluid"
                                                                                            src="https://img.icons8.com/color/48/000000/visa.png" />
                                                                                    </div>
                                                                                    <div class="col-7">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            placeholder="**** **** **** 4296">
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <a href="#"
                                                                                            class="btn btn-link">Remove
                                                                                            card</a>
                                                                                    </div>
                                                                                </div>
                                                                                <h5 class="card-title">Add new card:
                                                                                </h5>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-12">
                                                                                        <label for="cardHolderName"
                                                                                            class="form-label">Card
                                                                                            holder name</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="cardHolderName"
                                                                                            placeholder="Bojan Viner">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-12 col-md-7">
                                                                                        <label for="cardNumber"
                                                                                            class="form-label">Card
                                                                                            number</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="cardNumber"
                                                                                            placeholder="5134-5264-4">
                                                                                    </div>
                                                                                    <div class="col-6 col-md-2">
                                                                                        <label for="expDate"
                                                                                            class="form-label">Exp.
                                                                                            date</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="expDate"
                                                                                            placeholder="MM/YY">
                                                                                    </div>
                                                                                    <div class="col-6 col-md-2">
                                                                                        <label for="cvv"
                                                                                            class="form-label">CVV</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="cvv"
                                                                                            placeholder="CVV">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="button" id="submit-payment">Add
                                                                    card</button>

                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-primary mt-3 mt-md-0">Add
                                                                        card</button>
                                                                    <button type="button" class="btn btn"
                                                                        data-bs-dismiss="modal">Save</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- modale end --}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach



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


                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <footer class="footer py-5">
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


    {{-- stripe --}}
    {{-- <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create a Stripe client using your public key
            var stripe = Stripe('{{ config('services.stripe.key') }}');
            var elements = stripe.elements();

            // Custom styling for the Stripe card element
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element and mount it
            var card = elements.create('card', {
                style: style
            });
            card.mount('#card-element');

            // Real-time validation errors for the card element
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Insert the token ID into the form so it gets submitted to the server
            function stripeTokenHandler(token) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        });
    </script> --}}


</body>

<!-- Mirrored from demos.creative-tim.com/soft-ui-dashboard/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 08:22:18 GMT -->

</html>
