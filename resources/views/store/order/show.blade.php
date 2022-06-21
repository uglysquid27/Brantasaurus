@extends('store.layouts.main')
@section('content')
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Order Details</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="/">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Order Details</p>
        </div>
    </div>
</div>
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 d-flex flex-row-reverse">
                <a href="/my-orders/{{ $orders->id }}/print" class="btn border">
                    <i class="fa fa-print text-primary"></i> Print
                </a>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-8 mb-3">
            <table class="table table-borderless">
                <h4 class="mb-3 text-primary font-weight-bold text-uppercase">Shipping Details</h4>
                <tr>
                    <th>Tracking No.</th>
                    <td style="width:5%">:</td>
                    <td> {{ $orders->tracking_num }} </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td style="width:5%">:</td>
                    <td> {{ $orders->name }} </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td style="width:5%">:</td>
                    <td> {{ $orders->email }} </td>
                </tr>
                <tr>
                    <th>Contact No</th>
                    <td style="width:5%">:</td>
                    <td> {{ $orders->phone }} </td>
                </tr>
                <tr>
                    <th>Shipping Address</th>
                    <td style="width:5%">:</td>
                    <td>
                        {{ $orders->address }},
                        {{ $orders->city }},
                        {{ $orders->state }},
                        {{ $orders->zip }}
                    </td>
                </tr>
                <tr>
                    <th>Order Date</th>
                    <td style="width:5%">:</td>
                    <td> {{ $orders->created_at->format('d-m-Y') }} </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-12 table-responsive mb-5">
            <h4 class="mb-3 text-primary font-weight-bold text-uppercase">Order Details</h4>
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($orders->order_items as $item)
                    <tr>
                        <td class="align-middle"> {{ $item->product->product_name }} </td>
                        <td class="align-middle"> {{ $item->quantity }} </td>
                        <td class="align-middle">Rp. {{ number_format($item->price) }} </td>
                        <td class="align-middle"> <img src="{{ asset('storage/'.$item->product->image) }}" alt=""
                                class="img-fluid" style="width: 150px;"> </td>
                    </tr>
                    @endforeach
                </tbody>
                <th colspan="4">
                    <h4>Total Price : <b>Rp. {{ number_format($orders->total_price) }}</b> </h4>
                </th>
            </table>
        </div>
    </div>
</div>
@endsection