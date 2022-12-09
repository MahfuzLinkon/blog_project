@extends('admin.master')
@section('title')
    Create Category
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Create Category</h4>
                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{ Session::has('message') ? Session::get('message') : '' }}</p>
                    <form action="{{ route('store.category') }}" method="post">
                        @csrf
                        <div class="row">
                            <label for="" class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-3">Status</label>
                            <div class="col-md-9">
                                <label for=""><input type="radio" name="status" value="1" checked>Published</label>
                                <label for=""><input class="ms-2" type="radio" name="status" value="0" >Unpublished</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success form-control" value="Create Category">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
