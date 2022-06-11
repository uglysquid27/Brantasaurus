@extends('dashboard.layouts.main')
@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Hello</p>
                <h3 class="font-weight-bolder">
                  {{ auth()->user()->name }}
                </h3>
                <p class="mb-0">
                  Have a Nice Day
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <!-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> -->
                <i class="fa fa-smile-o text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection