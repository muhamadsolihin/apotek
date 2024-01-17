@extends('layouts.app')

@section('content')
<div class="container-fluid row py-0">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>

    <div class="col-md-10  container py-5">

        <div class="mb-3 d-flex flex-wrap justify-content-end">
            <form action="{{ route('transaksi.index') }}" method="GET">
                <div class="input-group ml-auto">
                    <input type="text" class="form-control" placeholder="Cari Obat" name="search" value="{{ $searchTerm }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <a class="btn btn-primary ms-3 " href="{{ route('transaksi.create') }}">Tambah</a>
        </div>
    <div class="d-flex flex-justify-between">
        <div class="chart ml-5 ms-3 p-2">
        <canvas  id="pieChart"></canvas>
        </div>
        <table class="table ms-3 table-bordered table-striped">
            <thead class="table-primary bg-primary">
                <tr>
                    <th>Jumlah</th>
                    <th>Nama Obat</th>
                    <th>Tangggal Pembelian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksiItems as $item)
                    <tr>
                        <td>{{ $item->jumlah_stok }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->expired_date }}</td>
                        <td>
                            <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const pieChartCanvas = document.getElementById('pieChart'); // Replace 'pieChart' with the ID of your canvas element

const pieChart = new Chart(pieChartCanvas, {
  type: 'pie',
  data: {
    labels: ['Obat A', 'Obat B', 'Obat C'],
    datasets: [{
      data: [10, 35, 20],
      backgroundColor: [
        '#5F9EA0', // Green
        '#A9A9A9', // Red
        '#DB7093', 
        '#F08080'
        // Blue
      ],
      border:"none",
      borderWidth: 2,
    }],
  },
  options: {
    plugins: {
      legend: {
        position: 'top', // Customize legend position
      },
    },
    responsive: true, // Make the chart responsive
  },
});

fetch("{{ route('sales-data') }}")
    .then((response) => response.json())
    .then((data) => {
        const labels = data.map((item) => item.nama_obat);
        const values = data.map((item) => item.total);

        // Memperbarui data grafik dengan data yang diambil
        pieChart.data.labels = labels;
        pieChart.data.datasets[0].data = values;

        // Memperbarui grafik
        pieChart.update();
    })
    .catch((error) => {
        console.error(error);
    });



</script>

<style>
    
.chart{
       background-color:#fff;
       border-radius:10px;
       display:flex;
       justify:center;
       align-items:center;
        width:400px;
        height:400px;
 }
.scrolling-text {
  background-color: transparent; 
  color: #000; 
  padding:10px 0;

}

/* CSS for the marquee element */
marquee {
  font-size: 20px; /* Set the font size */
  font-weight: bold; /* Make the text bold */
  padding-left: 20px; /* Add left padding for spacing */
}

    </style>

@endsection
