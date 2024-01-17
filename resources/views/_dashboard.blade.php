<div class="dashboard-content py-5 w-full">
    <h1 class="fw-bold h-1" style="color:#1B55A3;">DASHBOARD </h1>
    <h5 class="h-1" style="color:#1B55A3;"> Hai {{ Auth::user()->name }}, selamat datang di sistem informasi Apotek Aulia
    </h5>
    <div class="d-flex flex-wrap justify-content-between container py-3gx-3 mt-3">
    <div class="card-green text-center border-green mb-3">
        <a href="{{ route('inventory.index') }}" class="d-flex flex-column justify-content-center align-items-center" style="text-decoration: none; transition: 0.3s;">
            <p class="h-1">Inventory Status</p>
            <div class="d-flex justify-content-center">
                <h3 id="total-quantity" class="h-1 fw-bold ml-auto">Loading..</h3>
                <img class="img-card ms-auto" src="{{ asset('asset/card-1.svg') }}" alt="Example Image">
            </div>
        </a>
    </div>

    <div class="card-green text-center border-yellow  mb-3" >
        <a href="{{ route('transaksi.index') }}" class="d-flex flex-column justify-content-center align-items-center" style="text-decoration: none; transition: 0.3s;">
            <p class="h-1">Total Transaksi</p>
            <div class="d-flex justify-content-center">
                <h3 id="total-transaksi" class="h-1 fw-bold ml-auto">Loading..</h3>
                <img class="img-card ms-auto" src="{{ asset('asset/card-2.svg') }}" alt="Example Image">
            </div>
        </a>
    </div>

    <div class="card-green text-center border-green mb-3 ms-1">
        <a href="{{ route('expired-inventory') }}" class="d-flex flex-column justify-content-center align-items-center" style="text-decoration: none; transition: 0.3s;">
            <p class="h-1">Kadaluarsa</p>
            <div class="d-flex justify-content-center">
                <h3 id="total-kadaluarsa" class="h-1 fw-bold ml-auto">Loading..</h3>
                <img class="img-card ms-auto" src="{{ asset('asset/card-4.svg') }}" alt="Example Image">
            </div>
        </a>
    </div>
 </div>
 <div class="chart d-flex justify-center mt-5">


<canvas id="salesChart"></canvas>
<!-- <canvas class="ms-5" id="pieChart"></canvas> -->

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>






const salesChartCanvas = document.getElementById('salesChart');
const salesChart = new Chart(salesChartCanvas, {
    type: 'bar',
    data: {
        labels: ['Obat A', 'Obat B', 'Obat C'],
        datasets: [{
            label: 'Jumlah Terjual',
            data: [10,],
            backgroundColor: [
                'rgba(75, 192, 192, 1)',
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 0,
        }],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    font: {
                        size: 12,
                    },
                    stepSize: 5, // Customize the tick step size
                },
                grid: {
                    display: false,
                    color: 'rgba(0, 0, 0, 0.1)', // Customize the grid color
                },
            },
            x: {
                ticks: {
                    font: {
                        size: 14,
                    },
                },
            },
        },
        plugins: {
            legend: {
                display: true,
                position: 'top', // Customize legend position
            },
        },
        responsive: true, // Make the chart responsive
    },
});


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


// Mengambil data penjualan dari route sales-data
fetch("{{ route('sales-data') }}")
    .then((response) => response.json())
    .then((data) => {
        const totalQuantity = data.totalQuantity;
        const labels = data.map((item) => item.nama_obat);
        const values = data.map((item) => item.total);
        

        salesChart.data.labels = labels;
        salesChart.data.datasets[0].data = values;

        pieChart.data.labels = labels;
        pieChart.data.datasets[0].data = values;
        // Memperbarui grafik
        salesChart.update();

              // Memperbarui data grafik dengan data yang diambil
              pieChart.data.labels = labels;
              pieChart.data.datasets[0].data = values;

        
        // Memperbarui grafik
        pieChart.update();

    })
    .catch((error) => {
        console.error(error);
    });



    fetch("{{ route('total-data') }}")
    .then((response) => response.json())
    .then((data) => {
        const totalQuantity = data.totalQuantity;
        const totalExpiredStok = data.totalExpiredStok;
        const totalTransaction = data.totalTransaction;

        document.getElementById("total-quantity").innerText = totalQuantity;
        document.getElementById("total-kadaluarsa").innerText = totalExpiredStok;
        document.getElementById("total-transaksi").innerText = totalTransaction;

    })
    .catch((error) => {
        console.error(error);
    });


</script>

<style>
/* .dashboard-content {
    background: linear-gradient(to bottom, #624BFF 50%, #212B36 30%);
} */
.card-dashboard{
    width:20%;
    border-radius:10px;
    height:100px;
    background-color:#fff;
}

.card-green a {
    text-decoration: none; /* Untuk menghapus underline */
    transition: 0.3s; /* Untuk menambahkan efek transisi selama 0.3 detik */
}

.card-green a:hover {
    /* Ini adalah gaya yang akan diterapkan saat tautan dihover */
    transform: scale(1.1); /* Contoh: Membesar saat dihover */
}
.card-yellow a {
    text-decoration: none; /* Untuk menghapus underline */
    transition: 0.3s; /* Untuk menambahkan efek transisi selama 0.3 detik */
}

.card-yellow a:hover {
    /* Ini adalah gaya yang akan diterapkan saat tautan dihover */
    transform: scale(1.1); /* Contoh: Membesar saat dihover */
}

.card-red a {
    text-decoration: none; /* Untuk menghapus underline */
    transition: 0.3s; /* Untuk menambahkan efek transisi selama 0.3 detik */
}

.card-red a:hover {
    /* Ini adalah gaya yang akan diterapkan saat tautan dihover */
    transform: scale(1.1); /* Contoh: Membesar saat dihover */
}

.chart{
        background-color:#fff;
        border-radius:10px;
        padding:16px;
        width:35vw;
        height:35vh;
}
.scrolling-text {
  background-color: transparent; 
  color: #000; 
  padding:10px 0;

}

marquee {
  font-size: 20px;
  font-weight: bold;
  padding-left: 20px;
}

    </style>
