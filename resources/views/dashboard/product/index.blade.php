@extends('dashboard.layouts.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row mb-3">
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
                                <a href="{{ '/dashboard/product/create' }}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Product Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Product Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tag</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Quantity</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Price</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Image</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            @foreach($products as $product)
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-md">{{ $product->product_name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $product->slug }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-md text-secondary mb-0">{{ $product->category->name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-md text-secondary mb-0">
                                            @forelse($product->tag as $tag)
                                            <span class="badge bg-secondary"> {{ $tag->name }} </span>
                                            @empty
                                            <p>No Tags</p>
                                            @endforelse
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-md text-secondary mb-0">{{ $product->quantity }}</p>
                                    </td>
                                    <td>
                                        <p class="text-md text-secondary mb-0">Rp. {{ $product->price }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <img class="img-fluid mt-3" src="{{ asset('storage/'.$product->image) }}"
                                            alt="Image of {{ $product->product_name }}" style="height: 150px; width: 150px;">
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="/dashboard/product/{{ $product->slug }}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                        <a href="/dashboard/product/{{ $product->slug }}/edit" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form action="/dashboard/product/{{ $product->slug }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are You Sure to Delete?')">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
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