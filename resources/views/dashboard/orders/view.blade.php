@extends('dashboard.layouts.main')
@section('content')
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">Order Details</h1>
        <div class="d-inline-flex">
            <p class="m-0 text-white"><a href="/dashboard/orders" class="text-white">Back</a></p>
            {{-- <p class="m-0 px-2">-</p>
            <p class="m-0">Order Details</p> --}}
        </div>
    </div>
</div>
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 ml-4">
            <div class="form-group">
                <form action="{{ url('update-order/'.$orders->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="example-text-input" class="form-control-label">Order Status</label>
                    <select class="form-control" name="order_status">
                        <option {{ $orders->status == '0'? 'selected':'' }} value="0">Pending</option>
                        <option {{ $orders->status == '1'? 'selected':'' }} value="1">Process</option>
                        <option {{ $orders->status == '2'? 'selected':'' }} value="2">Shipping</option>
                        <option {{ $orders->status == '3'? 'selected':'' }} value="3">Complete</option>
                    </select>                
                    <button class="btn btn-primary float-end mt-3" type="submit">Update</button>
                    @if($orders->status == 0)
                    <a href="{{ url('/dashboard/orders/image-payment/'.$orders->id) }}" class="btn btn-primary float-end mt-3 mx-2" type="submit">Payment Evidence</a>                    
                    @endif
                </form>
            </div>
        </div>        
    </div>
    <div class="row px-xl-5 mt-3">
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
                        <th>Size</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($orders->order_items as $item)
                    <tr>
                        <td class="align-middle"> {{ $item->product->product_name }} </td>
                        <td class="align-middle"> {{ $item->quantity }} </td>
                        <td class="align-middle"> {{ $orders->size }} </td>
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