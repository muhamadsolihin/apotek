@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebarPemilik')
    </div>
    <div class="col-md-10 py-5 container">
        <div class="mb-3 d-flex flex-wrap justify-content-between">

            <form action="{{ route('laporan.index') }}" method="GET">
            <div class="input-group ml-auto">
        <input type="text" class="form-control" placeholder="Cari Obat" name="search" value="{{ $searchTerm }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
            </form>
            <form action="{{ route('laporan.pdf') }}" method="POST">
        @csrf
        <div class="input-group ml-auto">
        <input type="date" class="form-control" placeholder="Start Date" name="start_date" value="{{ $startDate }}">
       <div class="ml-5">
        <input type="date" class="form-control ml-3" placeholder="End Date" name="end_date" value="{{ $endDate }}">
        </div>
        <button  type="submit" class="btn ml-3 btn-success">Export to PDF</button>
</div>
    </form>
        </div>
        
        <table class="table table-bordered table-striped">
            <thead class="table-primary bg-primary">
                <tr>
                    <th>Id</th>
                    <th>Jumlah</th>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                    <th>Tangggal Pembelian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksiItems as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->jenis_obat }}</td>
                        <td>{{ $item->expired_date }}</td>
                        <td>
                            <form action="{{ route('laporan.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
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
