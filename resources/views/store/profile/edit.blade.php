@extends('store.layouts.main')
@section('content')
<div class="container">
    <div class="card px-3 pt-3">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-primary">
            <h1 class="h2">Edit Profile</h1>
        </div>
        <form method="POST" action="/profile/{{ auth()->user()->username }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <!-- Name input -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required autofocus value="{{old('name', auth()->user()->name)}}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" required autofocus value="{{old('username', auth()->user()->username)}}" readonly>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    required autofocus value="{{old('email', auth()->user()->email)}}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                @if(auth()->user()->image)
                <img class="img-preview img-fluid mb-3 col-sm-4 d-block" src="">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-4 d-block">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mt-3">Update Profile</button>
        </form>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#image'); //#itu name
        const imgPreview = document.querySelector('.img-preview'); //. itu class

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    $('#image').ijaboCropTool({
        preview: '.image-previewer',
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