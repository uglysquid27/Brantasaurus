@extends('store.layouts.main')
@section('content')
<div class="container py-4">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-lg-9">
            <div class="card">
                <!-- Image, Name, USername -->
                <div class="rounded-top text-white d-flex flex-row bg-primary field-content" style="height:200px;">
                    <div class="mx-4 mt-5 d-flex flex-column" style="width: 150px;">
                        @if(auth()->user()->image)
                        <img src="{{ asset('storage/'.auth()->user()->image) }}" alt="Generic placeholder image"
                            class="img-fluid img-thumbnail mt-4 mb-2 thumb-img"
                            style="z-index: 1; width: 150px; height: 150px">
                        @else
                        <img src="/assets/img/photo-profile.jpg" alt="Generic placeholder image"
                            class="img-fluid img-thumbnail mt-4 mb-2 thumb-img"
                            style="z-index: 1; width: 150px; height: 150px">
                        @endif
                        <button type="button" class="btn btn-outline-dark mt-3" data-mdb-ripple-color="dark"
                            style="z-index: 1;">
                            <a href="/profile/{{ auth()->user()->username }}/edit" class="text-primary">Edit profile</a>
                        </button>
                    </div>
                    <div class="ms-3" style="margin-top: 130px;">
                        <h5>{{ auth()->user()->name }}</h5>
                        <p>{{ auth()->user()->username }}</p>
                    </div>
                </div>
                <!-- History and Review -->
                <div class="p-4 text-black mb-3" style="background-color: #f8f9fa;">
                    <div class="d-flex justify-content-end text-center py-1">
                        <div class="mx-3">
                            <i class="fa-solid fa-box-archive fa-2x text-primary"></i>
                            <a href="" class="small text-muted mb-0 d-flex">History</a>
                        </div>
                        <div class="mx-3">
                            <i class="fa-solid fa-cart-flatbed fa-2x text-primary"></i>
                            <a href="/my-orders" class="small text-muted mb-0 d-flex">My Order</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="card-body p-4 text-black">
                    <div class="mb-3">
                        <p class="lead fw-normal mb-1">About</p>
                        <div class="p-4" style="background-color: #f8f9fa;">
                            <p class="font-italic mb-1">Web Developer</p>
                            <p class="font-italic mb-1">Lives in New York</p>
                            <p class="font-italic mb-0">Photographer</p>
                        </div>
                    </div>
                </div> -->
                <!-- Deactive -->
                <div class="">
                    <div class="mx-4 mb-3 d-flex flex-column">
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                            style="width: 150px; z-index:1;" data-target="#exampleModal" data-mdb-ripple-color="dark"
                            style="z-index: 1;">
                            Deactive
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deactive</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to delete your account?
                                        If you click YES it will make you can't use this account again!!!
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/profile/{{ auth()->user()->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-primary">YES</button>
                                            <button type="submit" class="btn btn-secondary"
                                                data-dismiss="modal">NO</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#image').ijaboCropTool({
        preview: '',
        setRatio: 1,
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        buttonsText: ['CROP', 'QUIT'],
        buttonsColor: ['#30bf7d', '#ee5155', -15],

        withCSRF: ['_token', '{{ csrf_token() }}'],
        onSuccess: function(message, element, status) {
            alert(message);
        },
        onError: function(message, element, status) {
            alert(message);
        }
    });
</script>
@endsection