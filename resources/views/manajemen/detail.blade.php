@extends('layout.main')
@section('content')
<div class="page-heading">
    <h3>Detail</h3>
    <p class="text-subtitle text-muted">Halaman Detail Barang</p>
</div>
<div class="page-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Barang</h4>
                    </div>
                    <div class="card-content">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/'. $barang->foto)  }}" class="img-fluid rounded-start" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $barang->nama }}</h5>
                                        <p class="card-text">Category : {{ $barang->categorybarang->nama }}</p>
                                        <p class="card-text">Qty : {{ $barang->qty }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection