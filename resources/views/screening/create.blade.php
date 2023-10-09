@extends('dashboard.layouts.main')
@section('content')
<form method="POST" action="/screening" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Form Data</p>
                            <button class="btn btn-primary btn-sm ms-auto" type="submit">Save</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Data diri</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama</label>
                                    <input class="form-control" type="text" name="namaLengkap" id="namaLengkap">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">NIK</label>
                                    <input class="form-control" type="text" name="nik" id="nik">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No HP</label>
                                    <input class="form-control" type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Alamat</label>
                                    <input class="form-control" type="text" name="alamat">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Pekerjaan (Perusahaan)</label>
                                    <input type="text" name="work" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                                    <input type="date" name="born" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Gender</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="gender" value="Male"> Laki-laki
                                        <input type="radio" name="gender" value="Female"> Perempuan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Screening</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label"> Batuk (Semua batuk tanpa melihat durasi)</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="batuk" value="Male"> Ya
                                        <input type="radio" name="batuk" value="Female"> Tidak
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label"> BB Turun tanpa penyebab jelas/BB tidak naik/nafsu makan turun</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="bb" value="Male"> Ya
                                        <input type="radio" name="bb" value="Female"> Tidak
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">  Demam yang tidak diketahui penyebabnya</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="demam" value="Male"> Ya
                                        <input type="radio" name="demam" value="Female"> Tidak
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">  Badan lemas/lesu</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="lemas" value="Male"> Ya
                                        <input type="radio" name="lemas" value="Female"> Tidak
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">  Berkeringat malam hari tanpa kegiatan</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="keringat" value="Male"> Ya
                                        <input type="radio" name="keringat" value="Female"> Tidak
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">  Sesak napas tanpa nyeri dada</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="sesak" value="Male"> Ya
                                        <input type="radio" name="sesak" value="Female"> Tidak
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">  Ada pembesaran getah bening di leher atau ketiak</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="getah" value="Male"> Ya
                                        <input type="radio" name="getah" value="Female"> Tidak
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">  Apakah pernah berkontakan dengan seseorang yang terjangkit?</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="jangkit" value="Male"> Ya
                                        <input type="radio" name="jangkit" value="Female"> Tidak
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Lainnya</label>
                                    <input class="form-control" type="text" name="lainnya">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- <script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/dashboard/category/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script> -->
@endsection