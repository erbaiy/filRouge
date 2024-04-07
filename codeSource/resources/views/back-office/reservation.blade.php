@extends('back-office.app.layout')


@section('content')
    <div class="container table-responsive">

        <table class="table border" id="nn">
            <thead class="border">
                <tr>
                    <th scope="col" class="border">customer name</th>
                    <th scope="col" class="border">type of the room</th>
                    <th scope="col" class="border">total price</th>
                    <th scope="col" class="border">N night </th>
                    <th scope="col" class="border">accetpe</th>
                    <th scope="col" class="border">refuse</th>
                </tr>
            </thead>
            <tbody class="border">
                @foreach ($reservations as $row)
                    <tr class="border">
                        <td class="border">{{ $row->name }}</td>
                        <td class="border">{{ $row->room_type }}</td>
                        <td class="border">{{ $row->total_price }}</td>
                        <td class="border">{{ $row->number_of_nights }}</td>
                        <td class="border">
                            <button class="btn btn-outline-success">Edit</button>
                        </td>
                        <td class="border">
                            <form action="{{ route('users.destroy', ['id' => $row->id]) }}" method="POST">
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
        {{-- <div class="pagination">
            {{ $reservations->links('pagination::bootstrap-4') }}
        </div> --}}
    </div>
@endsection
