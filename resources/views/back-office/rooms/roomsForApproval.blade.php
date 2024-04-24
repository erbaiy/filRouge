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
                    <th scope="col" class="border">room</th>
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
                        <td class="border">
                            <form action="{{ route('room.accept', ['id' => $row->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <button type="submit" class="btn btn-outline-success">Accept</button>

                        </td>
                        <td class="border">
                            <form action="{{ route('room.refuse', ['id' => $row->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <button type="submit" class="btn btn-outline-danger">Refuse</button>
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
@endsection
