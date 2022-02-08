@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <button class="btn btn-primary my-3" type="button" data-toggle="modal" data-target="#addModal">
                    Add Category
                </button>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                {{-- Table --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Keywords</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $item)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->keywords }}</td>
                                <td>
                                    {{-- Button Action --}}
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $item->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('categories.destroy', [$item->id]) }}" class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
                                    @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                    {{-- End Button Delete --}}
                                </td>
                            </tr>
                            {{-- Edit Modal --}}
                            <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('categories.update', [$item->id]) }}" method="post">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">Slug</label>
                                                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $item->slug }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="keywords">Keywords</label>
                                                    <input type="text" name="keywords" id="keywords" class="form-control" value="{{ $item->keywords }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="meta_desc">Meta Description</label>
                                                    <input type="text" name="meta_desc" id="meta_desc" class="form-control" value="{{ $item->meta_desc }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal Edit --}}
                        @endforeach
                    </tbody>
                </table>
                {{-- End Table --}}
            </div>
        </div>
    </div>
    {{-- Add Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="keywords">Keywords</label>
                            <input type="text" name="keywords" id="keywords" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="meta_desc">Meta Description</label>
                            <input type="text" name="meta_desc" id="meta_desc" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Add --}}
@endsection
