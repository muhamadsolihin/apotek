@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>
    <div class="col-md-10 py-5 container">
        <!-- Add New Item Form -->
        <form action="{{ route('databansos.store') }}" method="POST">
            @csrf
            <div class="d-flex flex-wrap justify-content-left">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="no_kk" class="form-label">No KK</label>
                        <input type="number" class="form-control" id="no_kk" name="no_kk" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_kk" class="form-label">Nama KK</label>
                        <input type="text" class="form-control" id="nama_kk" name="nama_kk" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Menerima Bansos</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label"> Umur</label>
                        <input type="text" class="form-control" id="umur" name="umur" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label"> Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                </div>
                <div class="col-md-6 ms-2">
                    <div class="mb-3">
                        <label for="desa" class="form-label">Desa</label>
                        <input type="text" class="form-control" id="desa" name="desa" required>
                    </div>
                    <div class="mb-3">
                        <label for="rt" class="form-label">Rt</label>
                        <input type="rt" class="form-control" id="rt" name="rt" required>
                    </div>
                    <div class="mb-3">
                        <label for="rw" class="form-label">Rw</label>
                        <input type="rw" class="form-control" id="rw" name="rw" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_tanggungan" class="form-label">Jumlah Tanggungan</label>
                        <input type="text" class="form-control" id="jumlah_tanggungan" name="jumlah_tanggungan"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                    </div>
                    <div class="mb-3">
                        <label for="pendapatan" class="form-label">Range Gaji</label>
                        <input type="text" class="form-control" id="pendapatan" name="pendapatan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
@endsection