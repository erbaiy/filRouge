@extends('front-office.app.layout')
@section('content')
    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Our Room</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_room -->
    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text-center">
                        <h2>Lorem Ipsum Available, but the Majority Have Suffered</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($rooms as $room)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="room card">
                            <img src="{{ asset('assets/img/' . $room->image) }}" class="card-img-top"
                                alt="{{ $room->room_type }}">
                            <div class="card-body">
                                <h3 class="card-title">{{ $room->room_type }}</h3>
                                <p class="card-text">{{ $room->description }}</p>
                            </div>
                            <div class="card-footer">
                                <span class="float-left price">${{ number_format($room->price, 0) }} / night</span>
                                <button class="btn btn-outline-success float-right" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $room->id }}">Edit</button>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal{{ $room->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit modal</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('service', $room->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <!-- Place your form fields and content here -->
                                            </div>
                                            <!-- Modal Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end our_room -->
@endsection
