@extends('front-office.app.layout')
@section('content')
    <main class="main-content mt-10">
        <div class="row" style="justify-content: center">
            <div class="col-md-12">
                <div class="titlepage text-center" style="margin: 40px;">
                    <h3>Our Services</h3>

                    <p class="mb-0">Welcome to our official booking website. Book now and enjoy the
                        best luxury hotel experience.</p>
                </div>
            </div>

        </div>

        <div class="container">

            <div class="card-body p-3">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="position-relative">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="{{ asset('assets/img/' . $service->image) }}" alt="img-blur-shadow"
                                            class="img-fluid shadow border-radius-xl">
                                    </a>
                                </div>
                                <div class="card-body px-1 pb-0">
                                    <p class="text-gradient text-dark mb-2 text-sm">
                                        {{ $service->price }}$</p>
                                    <a href="javascript:;">
                                        <h5>{{ $service->name }}</h5>
                                    </a>
                                    <p class="mb-4 text-sm">{{ $service->description }}.</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
        {{-- <style>
        /* Custom style for the room gallery */
        .main-content {
            padding: 20px 0;
        }

        .img-display {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .main-img {
            transition: transform 0.3s ease-in-out;
        }

        .img-display:hover .main-img {
            transform: scale(1.05);
        }
    </style> --}}
    </main>
@endsection
