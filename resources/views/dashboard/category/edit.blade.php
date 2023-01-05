@extends('dashboard.templates.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xs-6 col-md-6 col-sm-6">
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
                    <h5 class="text-center">Edit Category</h5>
                    <hr>
                    <form action="{{ "/category/update/" . $category->id }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <strong>Name</strong>
                            <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" placeholder="Masukan Nama Category">
                        </div>
                        <hr>
                        <div class="form-group mb-2">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()