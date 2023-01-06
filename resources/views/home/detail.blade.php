@extends('dashboard.templates.main')
@section('content')
    <div class="container row mt-5">
        <div class="col-xs-12 col-md-12 col-sm-12">
            <div class="row justify-content-between">
                <div class="col-4">
                    <img src="{{ asset('storage/' . $product->image ) }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-4">
                    <h5 class="text-center">{{ $product->name }}</h5>
                    <hr>
                    <p class="text-center"><i class="bi bi-bookmarks"></i> {{ $product->category->name }} | <i class="bi bi-view-list"></i> {{ $product->qty }}</p>
                    
                </div>
                <div class="col-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <h5>Rp. {{ number_format($product->price) }}</h5>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <p><i class="bi bi-geo-alt"></i> Barang siap diantarke <b>Rumahmu</b></p>
                                    <p><i class="bi bi-car-front"></i> Gratis <b>Ongkir</b></p>
                                    <p><i class="bi bi-clock"></i> Estimasi tiba <b>Besok</b></p>
                                </div>
                                <hr>
                                <div class="d-grid gap-2 mb-2">
                                    <a href="{{ "/transaction/" . $product->id }}" class="btn btn-success">Beli Sekarang</a>
                                    <a href="/cart" class="btn btn-primary">Masukkan Keranjang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()