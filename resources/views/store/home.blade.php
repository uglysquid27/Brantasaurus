@extends('store.layouts.main')
@section('content')
<!-- Carousel Start -->
@if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{ session()->get('message') }}
</div>
@endif

<!-- <div id="header-carousel" class="carousel slide" data-ride="carousel">



    <ol class="carousel-indicators">
        @foreach($carousels as $carousel)
        <li data-target=".carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <div class="carousel-inner ">
        @foreach($carousels as $carousel)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 800px;">

            <img class="img-fluid" src="{{ asset('storage/'.$carousel->image) }}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">{{ $carousel->promo }} </h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{ $carousel->desc }} </h3>
                    <a href="/shop" class="btn rounded btn-light py-2 px-3 {{ Request::is('shop') ?
                    'active' : '' }}">Shop Now</a>
                    {{-- <a href="" class="btn btn-light py-2 px-3">Shop Now</a> --}}
                </div>
            </div>

        </div>
        @endforeach
    </div>


    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div> -->

<!-- Carousel End -->

<!-- Featured Start -->
<div class="container-fluid pt-5">

</div>
<!-- Featured End -->


    <!-- New Arrival Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">New Arrival</span></h2>
        </div>

        <div class="row px-xl-5 pb-3 justify-content-center">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent p-0">
                        <img class="img-fluid center-block d-block mx-auto" src="{{ asset('storage/'.$product->image) }}" alt="" style="height: 300px; object-fit: cover;">
                    </div>
                    <div class="card-body text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3 font-weight-bold"> {{ $product->product_name }} </h6>
                        <div class="d-flex justify-content-center">
                            <h6 class=" font-weight-light">Rp. {{ number_format($product->sell_price) }} </h6>
                            <!-- <h6 class="text-muted ml-2"><del>Rp. {{ $product->price }}</del></h6> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12 col-md-6 col-sm-12 pb-1 text-center">
                <a href="/shop" class="btn btn-outline-dark py-md-2 px-md-3">Show More</a>
            </div>
        </div>
    </div>

    <!-- New Arrival End -->

<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
    <h1 class="text-center font-weight-semi-bold m-0">CATEGORIES</h1>
    </div>
    <div class="row px-xl-5 pb-3 justify-content-center">
        @foreach($categories as $category)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="cat-item d-flex flex-column mb-4">
                <p class="text-right">{{ $category->product_count }}</p>
                <a href="/shop?category={{ $category->slug }}" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid center-block d-block mx-auto" src="{{ asset('storage/'.$category->image) }}" alt="" style="width: 300px; height: 300px; object-fit: cover;">
                </a>
                <h5 class="font-weight-semi-bold m-0"> {{ $category->name }} </h5>
            </div>
        </div>
        @endforeach
    </div>
</div>
    <!-- Categories End -->

    @endsection

    </html>