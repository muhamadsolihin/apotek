@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>
    <div class="col-md-10 py-5 container">
        <h5 class="fw-bold mb-3">Daftar Obat yang Telah Kadaluarsa</h5>
        <table class="table table-bordered table-striped">
            <thead class="table-primary bg-primary">
                <tr>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                    <th>Jumlah Stok</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expiredInventoryItems as $item)
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
