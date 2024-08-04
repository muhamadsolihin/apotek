@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebarUser')
    </div>
    <div class="col-md-10 py-5 container">
        <!-- Add New Item Form -->
        <form action="{{ route('sktm.update',$kelahiran_items->id) }}" method="POST">
            @csrf
            <div class="d-flex flex-wrap justify-content-left">
                <div class="col-md-5">
                    <h5 class="fw-bold mb-3">Data Pengaju</h5>
                    <div class="mb-3">
                        <label for="nik_pengaju" class="form-label">Nik</label>
                        <input type="text" class="form-control" id="nik_pengaju" name="nik_pengaju" value="{{ $kelahiran_items->nik_pengaju }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="orgtua_pengaju" class="form-label">Nama Orang Tua</label>
                        <input type="text" class="form-control" id="orgtua_pengaju" name="orgtua_pengaju" value="{{ $kelahiran_items->orgtua_pengaju }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir_pengaju" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir_pengaju" name="tempat_lahir_pengaju" value="{{ $kelahiran_items->tanggal_lahir_pengaju }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir_pengaju" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir_pengaju" name="tanggal_lahir_pengaju" value="{{ $kelahiran_items->tanggal_lahir_pengaju }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan_pengaju" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan_pengaju" name="pekerjaan_pengaju" value="{{ $kelahiran_items->pekerjaan_pengaju }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $kelahiran_items->alamat }}"  required>
                    </div>
                </div>
                <div class="col-md-6 ms-2">
                <h5 class="fw-bold mb-3">Untuk Kepentingan</h5>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $kelahiran_items->nama }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $kelahiran_items->tempat_lahir }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $kelahiran_items->tanggal_lahir }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $kelahiran_items->pekerjaan }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_instansi" class="form-label">Nama Instansi</label>
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="{{ $kelahiran_items->nama_instansi }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="kepentingan" class="form-label">Kepentingan</label>
                        <input type="text" class="form-control" id="kepentingan" name="kepentingan" value="{{ $kelahiran_items->kepentingan }}"  required>
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
@endsection