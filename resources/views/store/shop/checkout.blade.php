@extends('store.layouts.main')
@section('content')

{{-- @if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{ session()->get('message') }}
</div>
@endif --}}
<div class="container mt-5">
    <form action="{{ url('place-order') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="firstname">Name</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="firstname">Email</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" name="email"
                                    required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Phone Number</label>
                                <input type="text" class="form-control" value="{{ $user->phone }}"
                                    placeholder="Enter your phone number" name="phone" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Address</label>
                                <input type="text" class="form-control" value="{{ $user->address }}"
                                    placeholder="Enter your address" name="address" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">City</label>
                                <input type="text" class="form-control" value="{{ $user->city }}"
                                    placeholder="Enter your city" name="city" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">State</label>
                                <input type="text" class="form-control" value="{{ $user->state }}"
                                    placeholder="Enter your state" name="state" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Postal Code</label>
                                <input type="text" class="form-control" value="{{ $user->postal }}"
                                    placeholder="Enter your postal code" name="postal" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-border">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quanity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total_amount =0; @endphp
                                @foreach($cartProduct as $item)
                                @php $total =0; @endphp
                                @php $total += $item->product->sell_price * $item->quantity; @endphp
                                <tr>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->product->sell_price }}</td>
                                </tr>
                                @php $total_amount += $item->product->sell_price * $item->quantity; @endphp
                                @endforeach
                                <tr>
                                    <td>
                                        <h6 class="font-weight-bold">Total</h6>
                                    </td>
                                    <td></td>
                                    <td>
                                        <h6 class="font-weight-bold">{{ $total_amount }}</h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Place order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection