@extends('back-office.app.layout')


@section('content')
    @if (session('seccess'))
        <div id="successAlert" class="alert alert-success"
            style="color: green; background-color: #ccffcc; border: 1px solid green; padding: 10px; margin-top: 20px; border-radius: 5px; text-align: center;">
        </div>
    @else
        <div id="failedAlert" class="alert alert-danger"
            style="color: red; background-color: #ffcccc; border: 1px solid red; padding: 10px; margin-top: 20px; border-radius: 5px; text-align: center;">
            {{ session('error') }}</div>
    @endif
    <div class="container table-responsive">

        <table class="table border" id="nn">
            <thead class="border">
                <tr>
                    <th scope="col" class="border">name</th>
                    <th scope="col" class="border">email</th>
                    <th scope="col" class="border">role</th>
                    <th scope="col" class="border">edit</th>
                    <th scope="col" class="border">delete</th>
                    <th scope="col" class="border">Block</th>
                </tr>
            </thead>
            <tbody class="border">
                @foreach ($users as $row)
                    <tr class="border">
                        <td class="border">{{ $row->name }}</td>
                        <td class="border">{{ $row->email }}</td>
                        <td class="border">{{ $row->role_name }}</td>
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
                                            <form action="{{ route('users.update', $row->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <select class="form-control" name="role_id" id="">
                                                            <option value="choose_permissions">update role</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}">
                                                                    {{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
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
                            <form action="{{ route('users.destroy', $row->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                        <td class="border">
                            <form action="{{ route('blockUser', $row->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <button type="submit" class="btn btn-outline-danger">block</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Display pagination links -->
        {{-- <div class="pagination">
            {{ $users->links('pagination::bootstrap-4') }}
        </div> --}}

    </div>
    <script>
        // Function to remove success message after 3 seconds
        setTimeout(function() {
            var successAlert = document.getElementById('successAlert');
            if (successAlert) {
                successAlert.parentNode.removeChild(successAlert);
            }
        }, 3000);

        // Function to remove error message after 3 seconds
        setTimeout(function() {
            var failedAlert = document.getElementById('failedAlert');
            if (failedAlert) {
                failedAlert.parentNode.removeChild(failedAlert);
            }
        }, 3000);
    </script>
@endsection
