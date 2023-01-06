@extends('dashboard.templates.main')
@section('content')
<form action="/transaction/post" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-5">
            <div class="col-xs-3 col-sm-3 col-md-3 mb-2">
                <div class="row">
                    <div class="col-12 mb-2">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach()
                            </ul>
                        </div>
                        @endif
                        <div class="card shadow">
                            <img src="{{ asset('storage/' . $product->image ) }}" alt="{{ $product->name }}" class="card-img img-fluid">
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="card shadow">
                            <div class="card-body">
                                <strong>Ringkasan Belanja</strong>
                                <div class="row">
                                    <div class="col-6 mb-1">Harga Barang</div>
                                    <div class="col-6 mb-1">Rp. {{ number_format($product->price) }}</div>
                                    <div class="col-6 mb-1">Ongkir</div>
                                    <div class="col-6 mb-1">Rp. {{ number_format( $ongkir ) }}</div>
                                    <hr class="mt-1">
                                    <div class="col-6 mb-1"><strong>Total Harga</strong></div>
                                    <div class="col-6 mb-1"><strong>Rp. {{ number_format($product->price + $ongkir) }}</strong></div>
                                    <hr class="mt-1">
                                    <div class="d-grid gap-2 mb-1"><button class="btn btn-success">Selesaikan Pembayaran</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 mb-2">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title text-center">Transaction</h5>
                                <hr>
                                <div class="form-group mb-2">
                                    <strong>Nama Pembeli</strong>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}" placeholder="Masukan Nama Pembeli">
                                </div>
                                <div class="form-group mb-2">
                                    <strong>Alamat</strong>
                                    <input type="text" name="address" id="address" value="{{ auth()->user()->address }}" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <strong>Bukti Pembayaran</strong>
                                    <input type="file" name="upload" id="upload" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <input type="hidden" name="status" value="pending">
        <input type="hidden" name="total" value="{{ $product->price + $ongkir }}">

        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="price" value="{{ $product->price }}">
        
        <input type="hidden" name="qty" value="1">
    </form>
@endsection()