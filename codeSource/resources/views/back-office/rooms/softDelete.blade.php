@extends('back-office.app.layout')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTagModal">
            Add New role
        </button>
        <table class="table border" id="nn">
            <thead class="border">
                <tr>
                    <th scope="col" class="border">image</th>
                    <th scope="col" class="border">room</th>
                    <th scope="col" class="border">restore</th>
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

                        <td class="border">
                            <form action="{{ route('room.restoreRoom', ['id' => $row->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <button type="submit" class="btn btn-outline-success">Restore</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Display pagination links -->
        {{-- <div class="pagination">
            {{ $rooms->links('pagination::bootstrap-4') }}
        </div> --}}
    </div>
@endsection
