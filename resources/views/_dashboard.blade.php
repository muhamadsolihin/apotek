<div class="dashboard-content py-5 w-full">
    <h1 class="fw-bold h-1" style="color:#1B55A3;">DASHBOARD </h1>
    <h5 class="h-1" style="color:#1B55A3;"> Hai {{ Auth::user()->name }}, selamat datang di sistem informasi Desa Suka
        Maju
    </h5>
    <div class="d-flex flex-wrap justify-content-between container py-3gx-3 mt-3">
        <div class="card-green text-center border-green mb-3">
            <a href="{{ route('keloladata.index') }}"
                class="d-flex flex-column justify-content-center align-items-center"
                style="text-decoration: none; transition: 0.3s;">
                <p class="h-1">Total Data</p>
                <div class="d-flex justify-content-center">
                    <h3 id="total-quantity" class="h-1 fw-bold ml-auto">Loading..</h3>
                </div>
            </a>
        </div>

        <div class="card-green text-center border-yellow  mb-3">
            <a href="{{ route('iuran-warga.index') }}"
                class="d-flex flex-column justify-content-center align-items-center"
                style="text-decoration: none; transition: 0.3s;">
                <p class="h-1">Total Iuran Warga</p>
                <div class="d-flex justify-content-center">
                    <h3 id="total-transaksi" class="h-1 fw-bold ml-auto">Loading..</h3>
                </div>
            </a>
        </div>

        <div class="card-green text-center border-green mb-3 ms-1">
            <a href="{{ route('databansos.index') }}"
                class="d-flex flex-column justify-content-center align-items-center"
                style="text-decoration: none; transition: 0.3s;">
                <p class="h-1">Penerima Bansos</p>
                <div class="d-flex justify-content-center">
                    <h3 id="penerima-bansos" class="h-1 fw-bold ml-auto">Loading..</h3>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    fetch("{{ route('total-data') }}")
        .then((response) => response.json())
        .then((data) => {
            const totalQuantity = data.totalQuantity;
            const penerimaBansos = data.penerimaBansos;
            const totalIuran = data.totalIuran;

            document.getElementById("total-quantity").innerText = totalQuantity;
            document.getElementById("penerima-bansos").innerText = penerimaBansos;
            document.getElementById("total-transaksi").innerText = totalIuran;

        })
        .catch((error) => {
            console.error(error);
        });


</script>

<style>
    /* .dashboard-content {
    background: linear-gradient(to bottom, #624BFF 50%, #212B36 30%);
} */
    .card-dashboard {
        width: 20%;
        border-radius: 10px;
        height: 100px;
        background-color: #fff;
    }

    .card-green a {
        text-decoration: none;
        /* Untuk menghapus underline */
        transition: 0.3s;
        /* Untuk menambahkan efek transisi selama 0.3 detik */
    }

    .card-green a:hover {
        /* Ini adalah gaya yang akan diterapkan saat tautan dihover */
        transform: scale(1.1);
        /* Contoh: Membesar saat dihover */
    }

    .card-yellow a {
        text-decoration: none;
        /* Untuk menghapus underline */
        transition: 0.3s;
        /* Untuk menambahkan efek transisi selama 0.3 detik */
    }

    .card-yellow a:hover {
        /* Ini adalah gaya yang akan diterapkan saat tautan dihover */
        transform: scale(1.1);
        /* Contoh: Membesar saat dihover */
    }

    .card-red a {
        text-decoration: none;
        /* Untuk menghapus underline */
        transition: 0.3s;
        /* Untuk menambahkan efek transisi selama 0.3 detik */
    }

    .card-red a:hover {
        /* Ini adalah gaya yang akan diterapkan saat tautan dihover */
        transform: scale(1.1);
        /* Contoh: Membesar saat dihover */
    }

    .chart {
        background-color: #fff;
        border-radius: 10px;
        padding: 16px;
        width: 35vw;
        height: 35vh;
    }

    .scrolling-text {
        background-color: transparent;
        color: #000;
        padding: 10px 0;

    }

    marquee {
        font-size: 20px;
        font-weight: bold;
        padding-left: 20px;
    }
</style>