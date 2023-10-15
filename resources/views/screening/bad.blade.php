@extends('store.layouts.main')
@section('content')

<!-- New Arrival Start -->

<div class="container-fluid pt-5">
    <div class="text-center ">
        <h1 class="font-weight-bold px-5"><span class="px-2">Hasil Screening</span></h1>
    </div>
</div>

<!-- New Arrival End -->

<!--about start-->
<section>
    <div class="container-fluid ">
        <!-- <div class=" text-center ">
                    <p>About us</p>
                    <h1 class=" font-weight-bold">BRANTASAURUS</h1>
                </div> -->
        <div class="container mt-5">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <!-- Image on the left -->
                    <img src="https://img.freepik.com/free-vector/coughing-person-illustration_23-2148490827.jpg?w=1480&t=st=1697067198~exp=1697067798~hmac=e4734925f2ae50f721c0c7a5a9269abf1b3523878ba53c404c789d812009bd48" alt="Image" class="rounded-lg img-fluid">
                </div>
                <div class="col-md-6 text-justify pt-4">
                    <!-- Text on the right -->
                    <p>Hasil skrining menunjukkan anda masuk dalam kategori terduga TBC. Segera hubungi puskesmas terdekat untuk dilakukan pemeriksaan lebih lanjut</p>
                    <a href="/" class="btn btn-info rounded py-md-2 px-md-3">Kembali</a>
                </div>
            </div>
        </div>

    </div>
</section>

<!--about end-->

@endsection

</html>