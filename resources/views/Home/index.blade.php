@extends('dashboard.templates.main')
@section('content')
    <div class="mt-5">
        <div class="row">
                @foreach($product as $p)
                    <div class="col-6 col-xl-3 col-sm-3 col-xs-3 mb-3">
                        <div class="card h-100">
                        <img src="{{ asset('storage/' . $p->image ) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->name }}</h5>
                            <p class="card-text"><i class="bi bi-bookmarks"></i> {{ $p->category->name }} | <i class="bi bi-tags"></i> Rp. {{ number_format($p->price) }} | <i class="bi bi-view-list"></i> {{ $p->qty }}</p>
                            <a href="{{ "/detail/" . $p->id }}" class="btn btn-success">Detail Product</a>
                        </div>
                        </div>
                    </div>
                    @endforeach
        </div>
    </div>
@endsection()