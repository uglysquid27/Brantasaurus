@extends('dashboard.layouts.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-9 mb-4">
            <div class="card p-3">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-2">Product Information</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <h6 class="my-1">Product Name</h6>
                        <p>{{ $product->product_name }}</p>
                        <h6 class="my-1">Category Product</h6>
                        <p>{{ $product->category->name }}</p>
                        <h6 class="my-1">Product Quantity</h6>
                        <p>{{ $product->quantity }}</p>
                        <h6 class="my-1">Product Price</h6>
                        <p>Rp. {{ $product->price }}</p>
                        <h6 class="my-1">Product Description</h6>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                <div class="px-3">
                    <div class="">
                        <a href="/dashboard/product" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 text-center">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Product Image</h6>
                </div>
                <div class="card-body">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection