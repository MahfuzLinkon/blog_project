@extends('admin.master')
@section('title')
    Edit Brand
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Brand</h4>
                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{ Session::has('message') ? Session::get('message') : '' }}</p>
                    <form action="{{ route('update.brand', ['id' => $brand->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <label for="" class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" value="{{ $brand->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-3">Status</label>
                            <div class="col-md-9">
                                <label for=""><input type="radio" name="status" value="1" {{ $brand->status == 1 ? 'checked' : '' }}>Published</label>
                                <label for=""><input class="ms-2" type="radio" name="status" value="0" {{ $brand->status == 0 ? 'checked' : '' }} >Unpublished</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success form-control" value="Update Brand">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
