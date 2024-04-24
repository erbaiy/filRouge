@extends('back-office.app.layout')


@section('content')
    <div class="container">


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

                @foreach ($categories as $row)
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
                                            <form action="{{ route('category.update', $row->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="tagName" class="form-label">Category name</label>
                                                    <input type="hidden" name="id" value="{{ $row->id }}"
                                                        class="form-control" id="tagName" required>
                                                    <input type="text" name="name" class="form-control" id="tagName"
                                                        required value="{{ $row->name }}">
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
                            <form action="{{ route('category.destroy', ['id' => $row->id]) }}" method="POST">
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
            {{ $categories->links('pagination::bootstrap-4') }}
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
                <form id="addTagForm" action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tagName" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="tagName" required>
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
