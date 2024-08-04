@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>
    <div class="col-md-10 py-5 container">

        <form action="{{ route('keloladata.update', $kelola_data_items->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="d-flex flex-wrap justify-content-left">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="nik" class="form-label">Nik</label>
                        <input type="number" class="form-control" id="nik" name="nik"
                            value="{{ $kelola_data_items->nik }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $kelola_data_items->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_tanggal_lahir" class="form-label">Tempat Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ $kelola_data_items->tanggal_lahir }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                            value="{{ $kelola_data_items->jenis_kelamin }}" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label"> Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ $kelola_data_items->alamat }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="rt" class="form-label"> Alamat Lengkap</label>
                        <input type="rt" class="form-control" id="rt" name="rt" value="{{ $kelola_data_items->rt }}"
                            required>
                    </div>
                </div>
                <div class="col-md-6 ms-2">
                    <div class="mb-3 col-md-12">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama"
                            value="{{ $kelola_data_items->nik }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Perkawinan</label>
                        <input type="text" class="form-control" id="status" name="status"
                            value="{{ $kelola_data_items->status }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan"
                            value="{{ $kelola_data_items->kewarganegaraan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                            value="{{ $kelola_data_items->pendidikan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                            value="{{ $kelola_data_items->pekerjaan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pendapatan" class="form-label">Range Gaji</label>
                        <input type="text" class="form-control" id="pendapatan" name="pendapatan"
                            value="{{ $kelola_data_items->pendapatan }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection