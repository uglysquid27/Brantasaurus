@extends('store.layouts.main')
@section('content')

<!-- Page Header Start -->
{{-- <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
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
        <div class="col-lg-4 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="">
                        <img class="img-fluid center-block d-block mx-auto"
                            src="{{ asset('storage/'.$products->image) }}" alt="Image" style="height: 500px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 pb-5 product_data">
            <!-- <h3 class="font-weight-semi-bold mb-3"> {{ $products->product_name }} </h3> -->
            <!-- <div class="col-lg-5 pb-5"> -->
            <h3 class="font-weight-semi-bold"> {{ $products->product_name }} </h3>
            <!-- <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
                </div> -->

            <h3 class="font-weight-semi-bold text-primary">Rp. {{ $products->sell_price }}</h3>
            <h6 class="text-muted mb-3"><del>Rp. {{ $products->price }}</del></h6>

            <p>{{ $products->small_description }} <a href="#desc">Read More</a></p>

            <p>Category &nbsp; :
                <a href="/shop?category={{ $products->category->slug }}" class="mb-4">
                    <span class="btn bg-secondary ml-3">
                        {{$products->category->name}}
                    </span>
                </a>
            </p>

            <p>Tags &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                @foreach($products->tag as $tag)
                <a href="/shop?tag={{ $tag->slug }}" class="mb-4">
                    <span class="btn bg-secondary ml-3">
                        {{ $tag->name }}
                    </span>
                </a>
                @endforeach
            </p>

            <!-- Start Share on Social Media -->
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
            <!-- End Share on Social Media -->
            <!-- </div> -->
        </div>

        <div class="col-lg-3 d-flex flex-column align-items-center justify-content-center">
            <div class="card px-3 py-3">
                <div class="card-body">
                    <form>
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <input type="hidden" name="product_id" value="{{ $products->id}}"
                                        class="product_id">
                                    <input type="number" value="1" name="quantity"
                                        class="form-control qty-input text-center">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <br>
                                <button type="submit" class="btn btn-primary my-2 px-3 addToCartBtn float-start"><i
                                        class="fa fa-shopping-cart mr-1"></i>Add to Cart</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                <!-- <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a> -->
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
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
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                    <div class="text-primary mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum
                                        et no
                                        at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->
@endsection

@section('script')
<script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js">
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

        });
    });
</script>
@endsection