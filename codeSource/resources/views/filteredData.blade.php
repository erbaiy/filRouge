@foreach ($roomsWithServices as $roomData)
    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
        <div class="card card-blog card-plain">
            <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                    <img src="{{ 'assets/img/' . $roomData['room']->image }}"
                        href="{{ route('rooms.detail', ['id' => $roomData['room']->id]) }}" alt="img-blur-shadow"
                        class="img-fluid shadow border-radius-lg">

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

                <div class="d-flex align-items-center justify-content-between">
                    <button type="button" data-bs-toggle="modal"
                        data-bs-target="#fullScreenModal{{ $roomData['room']->id }}"
                        class="btn btn-outline-primary btn-sm mb-0">reserve</button>
                    {{-- modal start --}}

                    <div class="modal fade" id="fullScreenModal{{ $roomData['room']->id }}" tabindex="-1"
                        aria-labelledby="fullScreenModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="fullScreenModalLabel">
                                        Full-Screen Modal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('reserve') }}" method="post" id="payment-form">
                                    @csrf

                                    <div class="card">
                                        <div class="card-header">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Account</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#">Payment</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="hidden" name="stripeToken">
                                        <div class="card-body">
                                            <input type="hidden" name="user_id" value="{{ session('id') }}">
                                            <input type="hidden" name="room_id" value="{{ $roomData['room']->id }}">

                                            <input type="hidden" name="price"
                                                value="{{ $roomData['room']->price }}">

                                            <div class="row mb-3">
                                                <label for="checkin" class="col-sm-3 col-form-label">Check-in</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" id="checkin"
                                                        name="checkin" placeholder="Check-in date" required>
                                                    <div class="invalid-feedback">Please
                                                        enter a valid check-in date.</div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="checkout" class="col-sm-3 col-form-label">Check-out</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" id="checkout"
                                                        name="checkout" placeholder="Check-out date" required>
                                                    <div class="invalid-feedback">Please
                                                        enter a valid check-out date.</div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="cardNumber">Card Number</label>
                                                <input type="text" class="form-control" id="cardNumber"
                                                    name="cardNumber" placeholder="Enter card number">
                                                @error('cardNumber')
                                                    <div class="text-danger">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="expiryDate">Expiration
                                                    Date</label>
                                                <input type="text" class="form-control" id="expiryDate"
                                                    name="expiryDate" placeholder="MM/YY">
                                                @error('expiryDate')
                                                    <div class="text-danger">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="cvv">CVV</label>
                                                <input type="text" class="form-control" id="cvv" name="cvv"
                                                    placeholder="Enter CVV">
                                                @error('cvv')
                                                    <div class="text-danger">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div id="card-errors" role="alert"></div>

                                        <div class="modal-footer"> <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                            <button type="submit" class="btn btn-primary mt-3 mt-md-0">Reserve
                                                Now</button>

                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    {{-- modale end --}}
                    <div class="avatar-group mt-2">
                        @foreach ($roomData['services'] as $service)
                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="{{ $service['name'] }}">
                                <div class="service-item">
                                    <img alt="Image placeholder" src="{{ asset('assets/img/' . $service['image']) }}"
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
