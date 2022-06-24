@extends('dashboard.layouts.main')
@section('content')
<div class="container-fluid py-4">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Payment Evidence</p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <a href=""><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="/dashboard/orders/view-orders/{{ $orders->id }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4 mt-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <img src="{{ asset('storage/' . $orders->payment_image) }}" alt="Payment Evidence">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection