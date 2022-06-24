@extends('dashboard.layouts.main')
@section('content')
    <div class="container-fluid py-4">
        {{-- <div class="row mb-3">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Add</p>
                                    <h5 class="font-weight-bolder">
                                        <a href="{{ '/dashboard/product/create' }}">
                                            Product</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <a href="{{ '/dashboard/product/create' }}"><i class="fa fa-plus"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Registered User</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Id</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Address</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Phone</th>
                                        {{-- <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Image</th> --}}
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                @foreach ($users as $product)
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-md">{{ $product->id }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $product->slug }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-md text-secondary mb-0">{{ $product->username }}</p>
                                            </td>
                                            <td>
                                                <p class="text-md text-secondary mb-0">{{ $product->email }}</p>
                                            </td>
                                            <td>
                                                <p class="text-md text-secondary mb-0">{{ $product->address }}</p>
                                            </td>
                                            <td>
                                                <p class="text-md text-secondary mb-0">{{ $product->phone }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="/dashboard/users/view/{{ $product->id }}"
                                                    class="btn btn-primary"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
