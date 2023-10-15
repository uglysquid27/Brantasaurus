@extends('store.layouts.main')
@section('content')

{{-- @if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{ session()->get('message') }}
</div>
@endif --}}

<script>
    $(document).ready(function() {
        // Listen for the form submission
        $('#screeningForm').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Check conditions for tuberculosis indication
            var batukValue = $('input[name="batuk"]:checked').val();
            var bbValue = $('input[name="bb"]:checked').val();
            var demamValue = $('input[name="demam"]:checked').val();

            if (batukValue === "ya" && bbValue === "ya" && demamValue === "ya") {
                $('#tbIndicationModal').modal('show'); // Open the tuberculosis indication modal
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const personalInfoSection = document.getElementById("personalInfoSection");
        const screeningFormSection = document.getElementById("screeningFormSection");
        const nextButton = document.getElementById("nextButton");
        const prevButton = document.getElementById("prevButton");

        nextButton.addEventListener("click", function() {
            personalInfoSection.style.display = "none";
            screeningFormSection.style.display = "block";
        });

        prevButton.addEventListener("click", function() {
            screeningFormSection.style.display = "none";
            personalInfoSection.style.display = "block";
        });
    });
</script>


<div class="container mt-5" class="mx-auto">


    <form action="/screening" method="POST" enctype="multipart/form-data" id="screeningForm" class="mx-auto">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="section" id="personalInfoSection">
                    <div class="card-body">
                        <h6 class="card-title">Personal Information</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="firstname">Nama</label>
                                <input type="text" class="form-control" name="namaLengkap" required>
                            </div>
                            <div class="col-md-6">
                                <label for="firstname">NIK</label>
                                <input type="text" class="form-control" name="nik" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">No Telepon</label>
                                <input type="text" class="form-control" placeholder="Enter your phone number" name="phone" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Alamat</label>
                                <input type="text" class="form-control" placeholder="Enter your address" name="alamat" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Pekerjaan (Perusahaan)</label>
                                <input type="text" class="form-control" placeholder="Enter your city" name="work" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="born" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Gender</label>
                                <div class="col-sm-9">
                                    <input type="radio" name="gender" value="Male"> Laki-laki
                                    <input type="radio" name="gender" value="Female"> Perempuan
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <a class="btn btn-info rounded-lg" id="nextButton">Next</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="section" id="screeningFormSection">
                    <div class="card">
                        <div class="card-body">
                            <h6>Screening Form</h6>
                            <div class="card-body">
                                <p class="text-uppercase text-sm text-center">Gejala Utama</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group text-center"> <!-- Use text-center here -->
                                            <label for="example-text-input" class="form-control-label"> Batuk (Semua batuk tanpa melihat durasi)</label>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="radio" name="batuk" value="ya"> Ya
                                                    </div>
                                                    <div class="col-md-2"></div> <!-- This empty column creates a gap -->
                                                    <div class="col-md-5">
                                                        <input type="radio" name="batuk" value="Tidak"> Tidak
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-uppercase text-sm text-center">Gejala Tambahan</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <label for="example-text-input" class="form-control-label"> BB Turun tanpa penyebab jelas/BB tidak naik/nafsu makan turun</label>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="radio" name="bb" value="ya"> Ya
                                                    </div>
                                                    <div class="col-md-2"></div> <!-- This empty column creates a gap -->
                                                    <div class="col-md-5">
                                                        <input type="radio" name="bb" value="Tidak"> Tidak
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <label for="example-text-input" class="form-control-label"> Demam yang tidak diketahui penyebabnya</label>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="radio" name="demam" value="ya"> Ya
                                                    </div>
                                                    <div class="col-md-2"></div> <!-- This empty column creates a gap -->
                                                    <div class="col-md-5">
                                                        <input type="radio" name="demam" value="Tidak"> Tidak
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <label for="example-text-input" class="form-control-label"> Badan lemas/lesu</label>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="radio" name="lemas" value="ya"> Ya
                                                    </div>
                                                    <div class="col-md-2"></div> <!-- This empty column creates a gap -->
                                                    <div class="col-md-5">
                                                        <input type="radio" name="lemas" value="Tidak"> Tidak
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <label for="example-text-input" class="form-control-label"> Berkeringat malam hari tanpa kegiatan</label>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="radio" name="keringat" value="ya"> Ya
                                                    </div>
                                                    <div class="col-md-2"></div> <!-- This empty column creates a gap -->
                                                    <div class="col-md-5">
                                                        <input type="radio" name="keringat" value="Tidak"> Tidak
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <label for="example-text-input" class="form-control-label"> Sesak napas tanpa nyeri dada</label>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="radio" name="sesak" value="ya"> Ya
                                                    </div>
                                                    <div class="col-md-2"></div> <!-- This empty column creates a gap -->
                                                    <div class="col-md-5">
                                                        <input type="radio" name="sesak" value="Tidak"> Tidak
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <label for="example-text-input" class="form-control-label"> Ada pembesaran getah bening di leher atau ketiak</label>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="radio" name="getah" value="ya"> Ya
                                                    </div>
                                                    <div class="col-md-2"></div> <!-- This empty column creates a gap -->
                                                    <div class="col-md-5">
                                                        <input type="radio" name="getah" value="Tidak"> Tidak
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <label for="example-text-input" class="form-control-label"> Apakah pernah berkontakan dengan seseorang yang terjangkit?</label>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="radio" name="jangkit" value="ya"> Ya
                                                    </div>
                                                    <div class="col-md-2"></div> <!-- This empty column creates a gap -->
                                                    <div class="col-md-5">
                                                        <input type="radio" name="jangkit" value="Tidak"> Tidak
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <label for="example-text-input" class="form-control-label">Lainnya</label>
                                            <div class="col-md-12 d-flex justify-content-center"> <!-- Use d-flex and justify-content-center -->
                                                <input class="form-control mx-auto" type="text" name="lainnya"> <!-- Add mx-auto class here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="button" class="btn btn-info mx-2 rounded-lg" id="prevButton">Previous</button>
                                <button type="submit" class="btn btn-primary mx-2 rounded-lg">Simpan</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection