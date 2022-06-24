@extends('store.layouts.main')
@section('content')
<!-- Page Header Start -->
{{-- <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div> --}}
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 col-md-12">
            <div class="row pb-3">
                @foreach($products as $product)
                @if($product->quantity >0)
                <div class="col-lg-2.5 pb-1 text-center mx-3">
                    <div class="card product-item border-0 mb-4">
                        <div
                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid" src="{{ asset('storage/'.$product->image) }}" alt=""
                                style="object-fit: cover; width: 300px; height: 300px;">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"> {{ $product->product_name }} </h6>
                            <div class="d-flex justify-content-center">
                                <h6> {{ $product->sell_price }} </h6>
                                <h6 class="text-muted ml-2"><del>{{ $product->price }}</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="/shop/{{ $product->slug }}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i> View
                                Detail</a>
                        <form action="{{ url('addcart', $product->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id}}" class="product_id">
                            <input type="hidden" value="1" name="quantity" class="form-control qty-input text-center" style="width:70px; height:35px">
                            <i class="fas fa-shopping-cart text-primary mr-1"></i> 
                                    <input type="submit" class="btn btn-sm text-dark p-0" value="Add to Cart">
                            {{-- <input type="submit" class="btn btn-primary px-3 addToCartBtn float-start" value="Add to Cart"> --}}
                         </form>   
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <div class="col-12 pb-1">
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->

@endsection