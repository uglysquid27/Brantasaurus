@extends('store.layouts.main')
@section('content')
<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h2>Apakah Anda bersedia melakukan skrining mandiri?</h2>
                <p>Kami memberikan jaminan bahwa semua informasi yang Anda sertakan dalam formulir skrining akan tetap bersifat rahasia. Data ini hanya akan diakses oleh tenaga medis yang memiliki otorisasi demi kesejahteraan Anda</p>
            </div>
            <div class="modal-footer">
                <a href="/" class="btn btn-outline-danger rounded-lg" data-dismiss="modal">Tidak</a>
                <a href="/screening" class="btn btn-outline-success rounded-lg">Ya</a>
            </div>
        </div>
    </div>
</div>
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
        <button type="button" class="btn btn-success rounded-lg" data-toggle="modal" data-target="#confirmationModal">
            Mulai Screening
        </button>
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
<section id="about">
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
                        <div class="col-md-6 text-justify pt-4">
                            <!-- Text on the right -->
                            <p>Brantasaurus adalah sebuah aplikasi inovatif yang bertujuan untuk memudahkan self-screening (pemeriksaan mandiri) terkait tuberkulosa (TB) bagi karyawan dalam perusahaan. Tuberkulosa adalah penyakit menular yang serius dan dapat mempengaruhi kesehatan karyawan serta produktivitas mereka. Dengan Brantasaurus, perusahaan dapat memastikan bahwa karyawan memiliki akses cepat dan mudah untuk menilai risiko mereka terkait TB.</p>
                            <!-- <a href="/screening" class="btn btn-info rounded py-md-2 px-md-3">Contact Us</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--about end-->


@section('home')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navLinks = document.querySelectorAll("nav a");

        for (const link of navLinks) {
            link.addEventListener("click", smoothScroll);
        }

        function smoothScroll(event) {
            event.preventDefault();

            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    behavior: "smooth",
                    top: targetElement.offsetTop,
                });
            }
        }
    });
</script>
@endsection

@endsection

</html>