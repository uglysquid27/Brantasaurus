@extends('store.layouts.main')
@section('content')


<!-- Search Start -->
<div class="container-fluid pt-5">
    <div class="vh-100 d-flex align-items-center justify-content-center">
        <div class="col-lg-8 col-md-12">
            <form action="/shop">

            <div class="input-group mb-3">
                <input type="text" class="form-control input-text" placeholder="Search products...." name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-dark btn-lg" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>

            </form>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Search End -->

@endsection