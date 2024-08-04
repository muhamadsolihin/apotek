@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>
    <div class="col-md-10 py-5 container">
        <!-- Add New Item Form -->
        <form action="{{ route('kelahiran.update',$kelahiran_items->id) }}" method="POST">
            @csrf
            <div class="d-flex flex-wrap justify-content-left">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $kelahiran_items->nama }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Tanggal lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $kelahiran_items->tempat_lahir }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $kelahiran_items->tanggal_lahir }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $kelahiran_items->jenis_kelamin }}"  required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" value="{{ $kelahiran_items->agama }}"  required>
                    </div>
                </div>
                <div class="col-md-6 ms-2">
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $kelahiran_items->alamat }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" value="{{ $kelahiran_items->alamat_lengkap }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $kelahiran_items->pekerjaan }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ayah" class="form-label">Nama Ayah Kandung</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ $kelahiran_items->nama_ayah }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ibu" class="form-label">Nama Ibu Kandung</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $kelahiran_items->nama_ibu }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="anak_ke" class="form-label">Anak Ke-</label>
                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" value="{{ $kelahiran_items->anak_ke }}"  required>
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
@endsection