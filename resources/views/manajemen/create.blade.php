@extends('layout.main')
@section('content')
<div class="page-heading">
    <h3>Tambah Data Barang</h3>
    <p class="text-subtitle text-muted">Halaman Tambah Data Barang</p>
</div>
<div class="page-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Data</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/management/barang" method="post" enctype="multipart/form-data"class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama"
                                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                    placeholder="Name" value="{{ old('nama') }}">

                                                @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="foto">Foto</label>
                                                <input type="file"
                                                    class="form-control @error('foto') is-invalid @enderror" id="foto"
                                                    name="foto">
                                                @error('foto')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="categorybarang_id">Category</label>
                                                <select class="form-select @error('categorybarang_id') is-invalid @enderror"
                                                    id="categorybarang_id" name="categorybarang_id">
                                                    <option selected disabled>Pilih Category</option>
                                                    @foreach ($categories as $category)
                                                    @if (old('categorybarang_id') == $category->id)
                                                    <option selected value="{{ $category->id }}">{{ $category->nama }}</option>
                                                    @else
                                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('categorybarang_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="qty">Qty</label>
                                                <input type="text" id="qty"
                                                    class="form-control @error('qty') is-invalid @enderror"
                                                    name="qty" placeholder="qty"
                                                    value="{{ old('qty') }}">
                                                @error('qty')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                        </div>
                                       
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection