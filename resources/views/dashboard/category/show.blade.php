@extends('dashboard.layouts.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
        <!-- <div class="col-lg-9 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Category Information</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="">
                            <h6 class="my-3">Category Name</h6>
                            <p>{{ $category->name }}</p>
                            <h6 class="my-3">Category Slug</h6>
                            <p>{{ $category->slug }}</p>
                            <h6 class="my-3">Category Description</h6>
                            <p>{{ $category->desc }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-lg-9 mb-4">
            <div class="card p-3">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-2">Category Information</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <h6 class="my-1">Category Name</h6>
                        <p>{{ $category->name }}</p>
                        <h6 class="my-1">Category Slug</h6>
                        <p>{{ $category->slug }}</p>
                        <h6 class="my-1">Category Description</h6>
                        <p>{{ $category->desc }}</p>
                    </div>
                </div>
                <div class="px-3">
                    <div class="">
                        <a href="/dashboard/category" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 text-center">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Category Image</h6>
                </div>
                <div class="card-body">
                    <img src="{{ asset('storage/'.$category->image) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection