@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>
    <div class="col-md-10 py-5 container">
        <div class="mb-3 d-flex flex-wrap justify-content-between">
            <form method="GET" action="{{ route('iuran-warga.index') }}" class="mb-3">
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
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($iuran_data_items as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->nominal }}</td>

                        <td>
                            <a href="{{ route('keloladata.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('keloladata.destroy', $item->id) }}" method="POST"
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
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th>{{ $total_nominal }}</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        <div class="d-flex justify-content-center">
            {{ $iuran_data_items->links() }}
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