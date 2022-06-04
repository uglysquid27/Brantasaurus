@extends('store.layouts.main')
@section('content')
<div class="container">
    <div class="card px-5 py-5">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-primary">
            <h1 class="h2">Edit Profile</h1>
        </div>
        <form method="POST" action="/profile/{{ auth()->user()->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
                <input type="text" id="form6Example3" class="form-control" />
                <label class="form-label" for="form6Example3">Name</label>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <input type="text" id="form6Example3" class="form-control" />
                <label class="form-label" for="form6Example3">Company name</label>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <input type="text" id="form6Example4" class="form-control" />
                <label class="form-label" for="form6Example4">Address</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form6Example5" class="form-control" />
                <label class="form-label" for="form6Example5">Email</label>
            </div>

            <!-- Number input -->
            <div class="form-outline mb-4">
                <input type="number" id="form6Example6" class="form-control" />
                <label class="form-label" for="form6Example6">Phone</label>
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                <label class="form-label" for="form6Example7">Additional information</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
        </form>
    </div>
</div>
@endsection