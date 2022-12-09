@extends('admin.master')
@section('title')
    Manage Brand
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Manage Brand</h4>
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
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <a href="{{ route('edit.brand', [ 'id' => $brand->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('delete.brand', [ 'id' => $brand->id]) }}" class="btn btn-danger" onclick="return confirm('Are You Sure ?')">Delete</a>
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
