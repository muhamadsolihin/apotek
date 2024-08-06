@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>
    <div class="col-md-10 py-5 container">

        <div class="mb-3 d-flex flex-wrap justify-content-between">
            <a class="btn btn-primary flex d-flex align-items-center items-center"
                href="{{ route('databansos.create') }}">Tambah Data</a>
            <form method="GET" action="{{ route('databansos.index') }}" class="mb-3">
                <div class="d-flex flex ms-auto input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
        <table class="table table-bordered table-striped ">
            <thead class="table-primary bg-primary">
                <tr>
                    <th>No KK</th>
                    <th>Kepala Keluarga</th>
                    <th>Tanggal Penerimaan Bansos</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_bansos_items as $item)
                    <tr>
                        <td>{{ $item->no_kk }}</td>
                        <td>{{ $item->nama_kk }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            <a href="{{ route('databansos.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('databansos.destroy', $item->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
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