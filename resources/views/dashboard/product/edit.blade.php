@extends('dashboard.templates.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-sm-6 col-md-6">
                @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops </strong>Input Gagal. <br> <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-center">Edit Product</h5>
                    <hr>
                    <form action="{{ "/product/update/" . $product->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <strong>Nama Product</strong>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" placeholder="Masukan Nama Product">
                        </div>
                        <div class="form-group mb-2">
                            <strong>Category Product</strong>
                            <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                                <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}</option>
                                @foreach($category as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach()
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <strong>Price Product</strong>
                            <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}" placeholder="Masukan Harga Product">
                        </div>
                        {{-- <div class="form-group mb-2">
                            <strong>Image Product</strong>
                            <input type="file" name="image" id="image" value="{{ asset('storage/' . $product->image) }}" class="form-control">
                        </div> --}}
                         <div class="form-group mb-2">
                            <label for="image" class="form-label"><strong>Product Image</strong></label>
                            <input type="hidden" name="oldImage" id="{{ $product->image }}">
                            @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <strong>Jumlah Barang</strong>
                            <input type="number" name="qty" id="qty" class="form-control" value="{{ $product->qty }}" placeholder="Masukan Jumlah Product">
                        </div>
                        <hr>
                        <div class="form-group mb-2">
                            <button class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection()