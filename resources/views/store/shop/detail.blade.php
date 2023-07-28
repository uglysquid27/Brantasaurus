@extends('store.layouts.main')
@section('content')
@if (session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{ session()->get('message') }}
</div>
@endif

<!-- Page Header Start -->
{{-- <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 500px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop Detail</p>
        </div>
    </div>
</div> --}}
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="">
                        <img class="img-fluid center-block d-block mx-auto" src="{{ asset('storage/' . $products->image) }}" alt="Image" style="height: 500px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 pb-5 product_data">
            <h3 class="font-weight-semi-bold"> {{ $products->product_name }} </h3>

            <h3 class="font-weight-semi-bold text-primary">Rp. {{ $products->sell_price }}</h3>
            <h6 class="text-muted mb-3"><del>Rp. {{ $products->price }}</del></h6>
            <h6 class="text-muted mb-3">Product left : {{ $products->quantity }}</h6>

            <p>{{ $products->small_description }} <a class="text-primary" href="#desc">Read More</a></p>

            <p>Category &nbsp; :
                <a href="/shop?category={{ $products->category->slug }}" class="mb-4">
                    <span class="btn text-white bg-primary ml-3">
                        {{ $products->category->name }}
                    </span>
                </a>
            </p>

            <p>Size &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                {{-- @foreach ($products->tag as $tag)
                <a href="/shop?tag={{ $tag->slug }}" class="mb-4">
                <span class="btn bg-secondary ml-3">
                    {{ $tag->name }}
                </span>
                </a>
                @endforeach --}}
                {{-- @foreach ($products->tag as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  name="size" type="text" value="{{ $tag->id }}" />
                <label class="form-check-label">{{ $tag->name }}</label>
        </div>
        @endforeach --}}

        {{-- <input type="number" value="1" name="size" class="form-control qty-input text-center"
                        style="width:70px; height:35px"> --}}

        </p>
        <form action="{{ url('addcart', $products->id) }}" method="post">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <select class="form-control" name="product_size" style="width:70px; height:35px">
                        @foreach ($products->tag as $tag)
                        <option value={{ $tag->name }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @csrf
            <p>Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            <div class="col-md-6 mb-3">
                <input type="hidden" name="product_id" value="{{ $products->id }}" class="product_id">
                <input type="number" value="1" name="quantity" class="form-control qty-input text-center" style="width:70px; height:35px">
            </div>

            </p>
            <br>
            <input type="submit" class="btn btn-primary px-3 addToCartBtn float-start" value="Add to Cart">
        </form>
        {{-- <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" name="quantity" class="form-control bg-secondary text-center" value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div> --}}
    </div>
</div>
</div>
<div class="row px-xl-5">
    <div class="col">
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
            <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
            {{-- <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a> --}}
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-pane-1">
                <h4 class="mb-3" id="desc">Product Description</h4>
                <p> {{ $products->description }} </p>
            </div>
            <div class="tab-pane fade" id="tab-pane-3">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                        <div class="media mb-4">
                            {{-- <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;"> --}}
                            <div class="media-body">
                                <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                <div class="text-primary mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no
                                    at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Shop Detail End -->
@endsection

@section('script')
{{-- <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js">
    $(document).ready(function() {
        $('.addToCartBtn').click(function(e) {
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();

            alert(product_id);

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // $.ajax({
            //     method: 'POST',
            //     url: "/cart",
            //     data: {
            //         'product_id': product_id,
            //         'product_qty': product_qty,
            //     },
            //     success: function(response) {
            //         alert(response.status);
            //     }
            // });
            alert(product_id);
            alert(product_qty);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: "/cart",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                },
                
                success: function(response) {
                    alert(response.status);
                }
            });

        });
    });
</script> --}}
@endsection