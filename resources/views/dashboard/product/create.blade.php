@extends('dashboard.layouts.main')
@section('content')
    <form method="POST" action="/dashboard/product" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Add Product</p>
                                <button class="btn btn-primary btn-sm ms-auto" type="submit">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Product Information</p>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Product Name</label>
                                        <input class="form-control" type="text" name="product_name" id="product_name">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Slug</label>
                                        <input class="form-control" type="text" name="slug" id="slug">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Category Product</label>
                                        <select class="form-control" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value={{ $category->id }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label d-flex mb-2">Size
                                            Product</label>
                                        @foreach ($tags as $tag)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="tag[]" type="checkbox"
                                                    value="{{ $tag->id }}" />
                                                <label class="form-check-label">{{ $tag->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="col-md-10 mb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Size</label><br>
                                        @foreach ($size as $size)
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" class="form-check-input" name="size_id"
                                                    value={{ $size->id }}>
                                                <label>{{ $size->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div> --}}
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Quantity</label>
                                        <input class="form-control" type="text" name="quantity">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Price</label>
                                        <input class="form-control" type="text" name="price">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Selling Price</label>
                                        <input class="form-control" type="text" name="sell_price">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Description</label>
                                        <input class="form-control" type="text" name="description">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Product Image</label>
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
    <script>
        const product_name = document.querySelector('#product_name');
        const slug = document.querySelector('#slug');

        product_name.addEventListener('change', function() {
            fetch('/dashboard/product/checkSlug?product_name=' + product_name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
