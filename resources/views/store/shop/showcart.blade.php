@extends('store.layouts.main')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Cart') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        <th>{{ __('Total') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ((array)$cartItem as $item)
                                        <tr>
                                            <td>
                                                <a href="{{ route('shop.show', $item->product->slug) }}">
                                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid">
                                                </a>
                                                <a href="{{ route('shop.show', $item->product->slug) }}">
                                                    <span class="text-muted">{{ $item->product->name }}</span> 
                                                </a>
                                            </td>
                                            <td>{{ $item->product->price }}</td>
                                            <td>
                                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control">
                                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('Update') }}</button>
                                                </form>
                                            </td>
                                            <td>{{ $item->total }}</td>
                                            <td>
                                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">{{ __('Remove') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="{{ route('cart.destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">{{ __('Empty Cart') }}</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('shop.index') }}" class="btn btn-sm btn-primary">{{ __('Continue Shopping') }}</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('checkout.index') }}" class="btn btn-sm btn-success">{{ __('Checkout') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
