@extends('front-office.app.layout')

@section('content')
    <style>
        .async-hide {
            opacity: 0 !important
        }


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
    </style>



    <main class="main-content mt-10">
        <div class="row" style="justify-content: center">
            <div class="col-md-12">
                <div class="titlepage text-center" style="margin: 40px;">
                    <h3>Blog of Rooms</h3>

                    <p class="mb-0">Welcome to our official booking website. Book now and enjoy the
                        best luxury hotel experience.</p>
                </div>
            </div>

        </div>

        <div class="container">
            <div class="row">
                @foreach ($rooms as $service_image)
                    <div class="col-lg-6 col-md-4 col-sm-6 mb-4">
                        <div class="img-display">
                            <img src="{{ asset('assets/img/' . $service_image) }}" alt="Room image"
                                class="img-fluid main-img rounded">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>
@endsection
