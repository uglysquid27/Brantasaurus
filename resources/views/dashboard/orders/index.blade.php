@extends('dashboard.layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header bg-primary">
                            <h4 class="text-white">New Orders
                                <a href="{{ 'order-history' }}" class="btn btn-primary float-end">History</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-secondary text-dark">
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Tracking Number</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td class="align-middle"> {{ date('d-m-Y', strtotime($item->created_at)) }}
                                            </td>
                                            <td class="align-middle"> {{ $item->tracking_num }} </td>
                                            <td class="align-middle"> Rp. {{ number_format($item->total_price) }} </td>
                                            <td class="align-middle"> {{ $item->status == '0' ? 'Process' : 'Completed' }}
                                            </td>
                                            <td class="align-middle">
                                                <a href="/dashboard/orders/view-orders/{{ $item->id }}"
                                                    class="btn btn-sm btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
