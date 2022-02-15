@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                {{-- Table --}}
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Desc</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($posts as $key => $item)
                        {{-- @foreach ($posts as $key => $item) --}}
                            <tr>
                                {{-- <th scope="row">{{ ++$key }}</th> --}}
                                <td style="font-weight:bold ">{{ $posts->firstItem()+$key }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{  Str::limit( strip_tags( $item->desc ), 60 ) }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    <form method="POST" action="{{route('posts.restore', $item->id)}}" class="d-inline">
                                    @csrf
                                        <input type="submit" value="Restore" class="btn btn-success btn-sm"/>
                                    </form>
                                    <form method="POST" action="{{route('posts.deletePermanent', $item->id)}}" class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
                                    @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
