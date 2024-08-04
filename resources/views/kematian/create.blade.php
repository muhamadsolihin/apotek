@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>
    <div class="col-md-10 py-5 container">
        <!-- Add New Item Form -->
        <form action="{{ route('kematian.store') }}" method="POST">
            @csrf
            <div class="d-flex flex-wrap justify-content-left">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="nik_pengaju" class="form-label">Nik</label>
                        <input type="text" class="form-control" id="nik_pengaju" name="nik_pengaju" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                </div>
                <div class="col-md-6 ms-2">
                    <div class="mb-3">
                        <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <select class="form-control" id="status_perkawinan" name="status_perkawinan"
                            required>
                            <option value="lajang">Lajang</option>
                            <option value="menikah">Menikah</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_wafat" class="form-label">Tempat Wafat</label>
                        <input type="text" class="form-control" id="tempat_wafat" name="tempat_wafat" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_wafat" class="form-label">Tanggal Wafat</label>
                        <input type="date" class="form-control" id="tanggal_wafat" name="tanggal_wafat" required>
                    </div>
                    <div class="mb-3">
                        <label for="alasan_wafat" class="form-label">Alasan Wafat</label>
                        <input type="text" class="form-control" id="alasan_wafat" name="alasan_wafat" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
@endsection