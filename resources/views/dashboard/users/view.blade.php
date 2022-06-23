@extends('dashboard.layouts.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
        <!-- <div class="col-lg-9 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">users Information</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="">
                            <h6 class="my-3">users Name</h6>
                            <p>{{ $users->name }}</p>
                            <h6 class="my-3">users Slug</h6>
                            <p>{{ $users->slug }}</p>
                            <h6 class="my-3">users Description</h6>
                            <p>{{ $users->desc }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-lg-9 mb-4">
            <div class="card p-3">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-2">Users Detail</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <h6 class="my-1">Name</h6>
                        <p>{{ $users->name }}</p>
                        <h6 class="my-1">Email</h6>
                        <p>{{ $users->email }}</p>
                        <h6 class="my-1">Address</h6>
                        <p>{{ $users->address }}</p>
                        <h6 class="my-1">City</h6>
                        <p>{{ $users->city }}</p>
                        <h6 class="my-1">State</h6>
                        <p>{{ $users->state }}</p>
                        <h6 class="my-1">Zip Code</h6>
                        <p>{{ $users->zip }}</p>
                    </div>
                </div>
                <div class="px-3">
                    <div class="">
                        <a href="/dashboard/users" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3 text-center">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">users Image</h6>
                </div>
                <div class="card-body">
                    <img src="{{ asset('storage/'.$users->image) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection