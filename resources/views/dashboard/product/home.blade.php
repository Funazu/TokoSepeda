@extends('dashboard.templates.main')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <a href="/product/create" class="btn btn-primary">Add Product</a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="row">
                    @foreach($product as $p)
                    <div class="col-6 col-xl-3 col-sm-3 col-xs-3">
                        <div class="card h-100">
                        <img src="{{ asset('storage/' . $p->image ) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->name }}</h5>
                            <p class="card-text">{{ $p->category->name }} | Rp. {{ number_format($p->price) }} | Qty: {{ $p->qty }}</p>
                            <form action="{{ "/product/delete/" . $p->id }}" method="POST">
                                <a href="{{ "/product/edit/" . $p->id }}" class="btn btn-secondary">Edit</a>
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection