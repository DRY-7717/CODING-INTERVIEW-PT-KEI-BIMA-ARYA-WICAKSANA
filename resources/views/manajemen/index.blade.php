@extends('layout.main')
@section('content')
<div class="page-heading">
    <h3>Manajemen Inventory Barang</h3>
    <p class="text-subtitle text-muted">Di halaman ini anda bisa membuat, mengedit dan menghapus data Barang</p>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-block d-md-flex d-sm-flex d-lg-flex justify-content-between ">
                <span>Daftar Barang</span>
                <a href="/management/barang/create" class="btn btn-primary">+ Tambah Data Barang</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Category</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                        <tr>
                            <td>1</td>
                            <td>{{ $barang->nama }}</td>
                            <td>{{ $barang->categorybarang->nama }}</td>
                            <td>{{ $barang->qty }}</td>
                            <td>
                                <a href="/management/barang/{{ $barang->id }}" class="badge bg-warning"><i class="bi bi-eye"></i></a>
                                <a href="/management/barang/{{ $barang->id }}/edit" class="badge bg-primary"><i class="bi bi-pencil-square"></i></a>
                                <form action="/management/barang/{{ $barang->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="badge bg-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection