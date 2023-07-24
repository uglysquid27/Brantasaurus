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
                        <h6 class="my-1">Nama Produk</h6>
                        <p>{{ $product->product_name }}</p>
                        <h6 class="my-1">Kategori</h6>
                        <p>{{ $product->category->name }}</p>
                        <h6 class="my-1">Tag Product</h6>
                        <p>@forelse($product->tag as $tag)
                            <span class="badge bg-secondary"> {{ $tag->name }} </span>
                            @empty
                        <p>Belum ada Tag terpilih</p>
                        @endforelse</p>
                        {{-- <h6 class="my-1">Size Product</h6>
                        <p>@forelse($product->size as $size)
                            <span class="badge bg-secondary"> {{ $size->name }} </span>
                            @empty
                        <p>Belum ada size terpilih</p>
                        @endforelse</p> --}}
                        <h6 class="my-1">Kuantitas</h6>
                        <p>{{ $product->quantity }}</p>
                        <h6 class="my-1">Harga</h6>
                        <p>Rp. {{ $product->price }}</p>
                        <h6 class="my-1">Url</h6>
                        <p>{{ $product->url }}</p>
                        <h6 class="my-1">Deskripsi Produk</h6>
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