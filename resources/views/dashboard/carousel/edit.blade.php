@extends('dashboard.layouts.main')
@section('content')
<form method="POST" action="/dashboard/carousel/{{ $carousel->slug }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Carousel</p>
                            <button class="btn btn-primary btn-sm ms-auto" type="submit">Save</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Carousel Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Carousel Promo</label>
                                    <input class="form-control" type="text" name="promo" id="name"
                                        value="{{old('name',$carousel->promo)}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Slug</label>
                                    <input class="form-control" type="text" name="slug" id="slug"
                                        value="{{old('slug',$carousel->slug)}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Carousel Description</label>
                                    <input class="form-control" type="text" name="desc"
                                        value="{{old('desc',$carousel->desc)}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="oldImage" value="{{ $carousel->image }}">
                            <div class="col-md-3 mt-3">
                                @if($carousel->image)
                                <label for="">Old Image</label>
                                <img src="{{ asset('storage/'.$carousel->image) }}" alt="products Image"
                                    style="width: 200px;" class="d-flex">
                                @endif
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Carousel Image</label>
                                    <input type="file" name="image" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection