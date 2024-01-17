@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebarPemilik')
    </div>
    <div class="col-md-10 py-5 container">
        <!-- Add New Item Form -->
        <form action="{{ route('laporan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat" required>
            </div>
            <div class="mb-3">
                <label for="jenis_obat" class="form-label">Jenis Obat</label>
                <input type="text" class="form-control" id="jenis_obat" name="jenis_obat" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_stok" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_kadaluarsa" class="form-label">Tanggal Pembelian</label>
                <input type="date" class="form-control" id="expired_Date" name="expired_Date" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Item</button>
        </form>
    </div>
</div>
@endsection
