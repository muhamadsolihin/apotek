@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>
    <div class="col-md-10 py-5 container">
        <form action="{{ route('pengeluaran.store') }}" method="POST">
            @csrf
            <div class="d-flex flex-wrap justify-content-left">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Jenis Pengeluaran</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Keluar</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label"> Nominal</label>
                        <input type="text" class="form-control" id="nominal" name="nominal" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>
</div>
@endsection