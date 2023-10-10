@extends('store.layouts.main')
@section('content')
<!-- Carousel Start -->
<!-- @if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{ session()->get('message') }}
</div>
@endif

<div id="header-carousel" class="carousel slide" data-ride="carousel">



    <ol class="carousel-indicators">
        @foreach($carousels as $carousel)
        <li data-target=".carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <div class="carousel-inner ">
        @foreach($carousels as $carousel)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 800px;">

            <img class="img-fluid" src="{{ asset('storage/'.$carousel->image) }}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">{{ $carousel->promo }} </h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{ $carousel->desc }} </h3>
                    <a href="/shop" class="btn rounded btn-light py-2 px-3 {{ Request::is('shop') ?
                    'active' : '' }}">Shop Now</a>
                    {{-- <a href="" class="btn btn-light py-2 px-3">Shop Now</a> --}}
                </div>
            </div>

        </div>
        @endforeach
    </div>


    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div> -->

<!-- Carousel End -->

<!-- Featured Start -->

<!-- Featured End -->


<!-- New Arrival Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-5">
        <h1 class="font-weight-bold px-5"><span class="px-2">Berantas Tuberkulosa</span></h1>
        <h1 class="font-weight-bold px-5"><span class="px-2">untuk Perusahaan Sehat</span></h1>
    </div>
    <div class="text-center pb-5">
        <p class="font-weight-light fs-1 px-5"><span class="px-2">Ayo mulai sadar dengan gejala penyakit TBC, </span></p>
        <p class="font-weight-light px-5"><span class="px-2">langkah pertama menuju kesehatan yang lebih baik.</span></p>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12 pb-1 text-center">
        <a href="/screening" class="btn btn-outline-success rounded py-md-2 px-md-3">Mulai Screening</a>
    </div>
</div>

<!-- New Arrival End -->

<!-- Categories Start -->
<div class="container mt-5">
    <div class="row justify-content-center pt-5">
        <div class="col-md-6">
            <!-- Bootstrap card to hold the image -->
            <div class="card">
                <div class="rounded-image-container">
                    <img src="https://dk4fkkwa4o9l0.cloudfront.net/production/uploads/article/image/1277/Artikel-Paru-dr-Tantri-RSHMCB.jpg" alt="Image" class="rounded-lg img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Categories End -->

<!--about start-->
<div class="pt-3">
    <div class="pt-5">
        <div class="container-fluid pt-5">
            <div class=" text-center pt-5">
                <p>About us</p>
                <h1 class=" font-weight-bold">BRANTASAURUS</h1>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Image on the left -->
                        <img src="https://www.mindinventory.com/blog/wp-content/uploads/2022/10/web-app.png" alt="Image" class="rounded-lg img-fluid">
                    </div>
                    <div class="col-md-6 text-justify">
                        <!-- Text on the right -->
                        <p>Brantasaurus adalah sebuah aplikasi inovatif yang bertujuan untuk memudahkan self-screening (pemeriksaan mandiri) terkait tuberkulosa (TB) bagi karyawan dalam perusahaan. Tuberkulosa adalah penyakit menular yang serius dan dapat mempengaruhi kesehatan karyawan serta produktivitas mereka. Dengan Brantasaurus, perusahaan dapat memastikan bahwa karyawan memiliki akses cepat dan mudah untuk menilai risiko mereka terkait TB.</p>
                        <a href="/screening" class="btn btn-info rounded py-md-2 px-md-3">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection

</html>