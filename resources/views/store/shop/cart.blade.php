@extends('store.layouts.main')
@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{ session()->get('message') }}
</div>
@endif

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
            @if($cartItems->count() == 0)
            <h1 class="text-center text-uppercase text-primary font-weight-bold">Your Cart is Empty</h1>
        @else
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Image</th>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                @php $total_amount =0; @endphp
                @foreach($cartItems as $item)
                @php $total =0; @endphp
                @php $total += $item->product->sell_price * $item->quantity; @endphp
                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"><img src="{{ asset('storage/'.$item->product->image) }}" alt=""
                                style="width: 50px;"></td>
                        <td class="align-middle"> {{ $item->product->product_name }} </td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 120px;">
                                <div class="input-group text-center mb-3">
                                    @if($item->quantity > 1)
                                    <a href="{{url('/updatecart/'.$item->id.'/-1')}}"
                                        class="btn btn-sm bg-primary text-secondary">-</a>
                                    @endif
                                    <input type="text" value="{{ $item->quantity }}" name="quantity"
                                        class="form-control qty-input text-center" style="width:30px; height:35px">
                                    <a href="{{url('/updatecart/'.$item->id.'/1')}}"
                                        class="btn btn-sm bg-primary text-secondary">+</a>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle"> {{ $item->size }} </td>
                        <td class="align-middle"> {{ $total }} </td>
                        <td class="align-middle"><button class="btn btn-sm btn-primary"><a
                                    href="{{ url('deletecart/'.$item->id) }}"><i
                                        class="fa fa-times text-secondary"></i></a></button></td>
                    </tr>
                </tbody>
                @php $total_amount += $item->product->sell_price * $item->quantity; @endphp
                @endforeach

            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <!-- <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
            </div> -->
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">{{ $total_amount }}</h5>
                    </div>
                    <a href="{{ url('checkout')}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection