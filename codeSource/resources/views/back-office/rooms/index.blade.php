@extends('back-office.app.layout')


@section('content')
    <div class="container">


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTagModal">
            Add New role
        </button>
        <table class="table border" id="nn">
            <thead class="border">
                <tr>
                    <th scope="col" class="border">image</th>
                    <th scope="col" class="border">description</th>

                    <th scope="col" class="border">availability</th>
                    <th scope="col" class="border">edit</th>
                    <th scope="col" class="border">delete</th>
                </tr>
            </thead>
            <tbody class="border">

                @foreach ($rooms as $row)
                    <tr class="border">
                        @php
                            $filename = basename($row->image);
                            $imagePath = 'assets/img/' . $filename;
                        @endphp


                        <td class="border">
                            <img src="{{ $imagePath }}"
                                style="     width: 100px;
                            height: 100px;
                            border-radius: 50px;"
                                alt="Room Image">
                        </td>
                        <td class="border">{{ $row->description }}</td>
                        <td class="border">{{ $row->availability }}</td>

                        <td class="border">
                            <button class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $row->id }}">Edit</button>
                            <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit modal</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('room.update', $row->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="roomType" class="form-label">Room Type</label>
                                                        <select name="room_type" id="roomType" class="form-control"
                                                            required>
                                                            <option value="">Select Room Type</option>
                                                            @foreach (['double', 'single', 'suite'] as $type)
                                                                <option value="{{ $type }}">{{ ucfirst($type) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Description</label>
                                                        <input type="text" name="description" class="form-control"
                                                            id="description" value="{{ $row->description }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Image</label>
                                                        <input type="file" name="image" class="form-control"
                                                            id="image" required>
                                                        @if (old('image'))
                                                            <p>Previously uploaded image: {{ old('image') }}</p>
                                                        @endif

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="typeAccept" class="form-label">Type Accept</label>
                                                        <select name="type_accept" id="typeAccept" class="form-control"
                                                            required>
                                                            <option value="auto"
                                                                @if ($row->typeAccept === 'auto') selected @endif>Automatic
                                                            </option>
                                                            <option value="manuelle"
                                                                @if ($row->typeAccept === 'manuelle') selected @endif>manuelle
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="category" class="form-label">Category</label>
                                                        <select name="category_id" id="category" class="form-control"
                                                            required>
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="service" class="form-label">Service</label>
                                                        <select name="service_id[]" id="category" class="form-control"
                                                            multiple required>
                                                            <option value="">Select Service</option>
                                                            @foreach ($services as $service)
                                                                <option value="{{ $service->id }}">{{ $service->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">Night Price</label>
                                                        <input type="text" name="price" class="form-control"
                                                            id="price" required value="{{ $row->price }}">
                                                        <input type="hidden" name="user_id"
                                                            value="{{ session('id') }}">
                                                    </div>
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
                        </td>
                        <td class="border">
                            <form action="{{ route('room.destroy', ['id' => $row->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Display pagination links -->
        <div class="pagination">
            {{ $rooms->links('pagination::bootstrap-4') }}
        </div>
    </div>


    <!-- Modal add -->
    <div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addTagModalLabel">Add New role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <form id="addTagForm" action="{{ route('room.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="roomType" class="form-label">Room Type</label>
                            <select name="room_type" id="roomType" class="form-control" required>
                                <option value="">Select Room Type</option>
                                @foreach (['double', 'single', 'suite'] as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" id="description" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="typeAccept" class="form-label">Type Accept</label>
                            <select name="type_accept" id="typeAccept" class="form-control" required>
                                <option value="">Select Type Accept</option>
                                @foreach (['auto', 'manuelle'] as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" id="category" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="service" class="form-label">Service</label>
                            <select name="service_id[]" id="category" class="form-control" multiple required>
                                <option value="">Select Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Night Price</label>
                            <input type="text" name="price" class="form-control" id="price" required>
                            <input type="hidden" name="user_id" id="" value="{{ session('id') }}">
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
