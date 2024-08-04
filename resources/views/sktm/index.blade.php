@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebarUser')
    </div>
    <div class="col-md-10 py-5 container">
        <h5 class="h-1 mb-5 " style="color:#000;"> Status Pengajuan Surat
            <table class="table mt-3 table-bordered table-striped ">
                <thead class="table-primary bg-primary">
                    <tr>
                        <th>Jenis Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelahiran_items as $item)
                    <tr>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('kelahiran.create') }}" class="btn btn-primary">Tambah Data</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
            </div>
    </div>
</div>

@endsection


<style>
    #notificationIcon {
        cursor: pointer;
        transition: transform 0.2s ease-in-out;
    }

    #notificationIcon:hover {
        transform: scale(1.1);
    }

    #notificationIcon img {
        transition: opacity 0.2s ease-in-out;
    }

    #notificationIcon:hover img {
        opacity: 0.8;
    }

    #notificationBadge {
        transition: background-color 0.2s ease-in-out, transform 0.2s ease-in-out;
    }

    #notificationIcon:hover #notificationBadge {
        background-color: #ff5733;
        /* Warna latar merah saat hover */
        transform: scale(1.1);
        /* Perbesar badge saat hover */
    }
</style>