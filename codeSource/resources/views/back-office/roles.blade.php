@extends('back-office.app.layout')


@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success"
                style="color: green; background-color: #ccffcc; border: 1px solid green; padding: 10px; margin-top: 20px; border-radius: 5px; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger"
                style="color: red; background-color: #ffcccc; border: 1px solid red; padding: 10px; margin-top: 20px; border-radius: 5px; text-align: center;">
                {{ session('error') }}
            </div>
        @endif
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTagModal">
            Add New role
        </button>
        <table class="table border" id="nn">
            <thead class="border">
                <tr>
                    <th scope="col" class="border">name</th>
                    <th scope="col" class="border">edit</th>
                    <th scope="col" class="border">delete</th>
                </tr>
            </thead>
            <tbody class="border">

                @foreach ($roles as $row)
                    <tr class="border">
                        <td class="border">{{ $row->name }}</td>
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
                                            <form action="{{ route('roles.update', $row->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="tagName" class="form-label">role name</label>
                                                    <input type="hidden" name="id" value="{{ $row->id }}"
                                                        class="form-control" id="tagName" required>
                                                    <input type="text" name="name" class="form-control" id="tagName"
                                                        required value="{{ $row->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tagName" class="form-label">Permission Name</label>
                                                    <select name="uri[]" multiple class="form-control">
                                                        <option value="">slect permission</option>
                                                        @foreach ($routes as $route)
                                                            <option value="{{ $route->id }}">{{ $route->uri }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="border">
                            <form action="{{ route('roles.destroy', ['id' => $row->id]) }}" method="POST">
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
            {{ $roles->links('pagination::bootstrap-4') }}
        </div> --}}

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
                <form id="addTagForm" action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tagName" class="form-label">Role Name</label>
                            <input type="text" name="name" class="form-control" id="tagName" required>
                            <input type="hidden" name="role_id" value="">
                        </div>
                        <div class="mb-3">
                            <label for="tagName" class="form-label">Permission Name</label>
                            <select name="uri[]" class="form-control" multiple>
                                <option value="">slect permission</option>
                                @foreach ($routes as $route)
                                    <option value="{{ $route->id }}">{{ $route->uri }}</option>
                                @endforeach
                            </select>
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
