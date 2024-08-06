@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>
    <div class="col-md-10 py-3 container">
        <h5 class="h-1 mb-5" style="color:#000;"> Status Pengajuan Surat

            <div class="mb-3 d-flex flex-wrap mt-3 justify-content-between">

                <form method="GET" action="{{ route('kelahiran.index') }}" class="mb-3">
                    <div class="d-flex flex ms-auto input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan type.."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
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
                                @if($item->type == 'kelahiran')
                                    <a href="{{ route('kelahiran.edit', $item->id) }}" class="btn btn-info">Detail</a>
                                @elseif($item->type == 'kematian')
                                    <a href="{{ route('kematian.edit', $item->id) }}" class="btn btn-info">Detail</a>
                                @elseif($item->type == 'sktm')
                                    <a href="{{ route('sktm.edit', $item->id) }}" class="btn btn-info">Detail</a>
                                @endif

                                @if(Auth::user()->role == 'admin' && $item->status == 'onproses')
                                    <a href="{{ route('approve', ['id' => $item->id]) }}"
                                        class="btn btn-success btn-sm">Approve</a>
                                    <a href="{{ route('reject', ['id' => $item->id]) }}"
                                        class="btn btn-danger btn-sm">Reject</a>
                                @endif
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