@extends('dashboard.layouts.main')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-9 mb-4">
                <div class="card p-3">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-2">Carousel Information</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <h6 class="my-1">Carousel Promo</h6>
                            <p>{{ $carousel->name }}</p>
                            <h6 class="my-1">Carousel Slug</h6>
                            <p>{{ $carousel->slug }}</p>
                            <h6 class="my-1">Carousel Description</h6>
                            <p>{{ $carousel->desc }}</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="">
                            <a href="/dashboard/carousel" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-center">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Carousel Image</h6>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $carousel->image) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
