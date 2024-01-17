@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebarPemilik')
    </div>
    <div class="col-md-10 py-5 container">
        <div class="mb-3 d-flex flex-wrap justify-content-between">
            <a class="btn btn-primary" href="{{ route('inventorypemilik.create') }}">Tambah Obat</a>

            <form action="{{ route('inventorypemilik.index') }}" method="GET">
                <div class="input-group ml-auto">
                    <input type="text" class="form-control" placeholder="Cari Obat" name="search" value="{{ $searchTerm }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        
        <table class="table table-bordered table-striped">
            <thead class="table-primary bg-primary">
                <tr>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                    <th>Jumlah Stok</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Keterangan</th>
                    <th>Action</th> <!-- Add this column for Edit and Delete buttons -->
                </tr>
            </thead>
            <tbody>
                @foreach ($inventoryItems as $item)
                    <tr>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->jenis_obat }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                        <td>{{ $item->expired_date }}</td>
                        <td>
                            @if (now() > $item->expired_date)
                                <span class="h-2 fw-bold">Telah Kadaluarsa</span>
                            @elseif (now()->addMonths(3) >= $item->expired_date)
                                <span class="h-3 fw-bold">Mendekati Masa Kadaluarsa</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display: inline-block;">
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
