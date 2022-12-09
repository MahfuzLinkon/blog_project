@extends('admin.master')
@section('title')
    Manage Category
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Manage Category</h4>
                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{ Session::has('message') ? Session::get('message') : '' }}</p>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <a href="{{ route('edit.category', [ 'id' => $category->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('delete.category', [ 'id' => $category->id]) }}" class="btn btn-danger" onclick="return confirm('Are You Sure ?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
