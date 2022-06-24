@extends('store.layouts.main')
@section('content')
<div class="container mt-5">
    @foreach($order as $order)
    <form action="/update-payment/{{ $order->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="card">
                <div class="card-body my-3">
                    <h6>Payment</h6>
                    <hr>
                    <p>Payment can be made via bank transfer and e-wallet (DANA, LINK AJA, OVO, GOPAY)</p>
                    <p>E-Wallet = <b>081233631626</b></p>
                    <p>BRI = <b>DE68500105178297336485</b></p>
                    <table class="table table-striped table-border">
                        <thead>
                            <tr>
                                <th>Please input here the evidence</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h6 class="font-weight-bold">Total : {{ $order->total_price }}</h6>
                                </td>
                            </tr>                            
                            <tr>
                                <td>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Payment Image</label>
                                    <input type="file" name="payment_image" id="" class="form-control">
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-primary float-end">Pay Now</button>
                </div>
            </div>
        </div>
    </form>
    @endforeach
</div>
@endsection