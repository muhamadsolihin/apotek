<div class="dashboard-content  py-3 w-full">
    <h5 class="h-1" style="color:#1B55A3;"> Hai {{ Auth::user()->name }}, selamat datang di sistem informasi Desa Maju Jaya
    </h5>
    <br />
    @if(Auth::user()->role == 'umum')
    <h5 class="h-1" style="color:#000;"> Pilih surat yang ingin kamu ajukan
    </h5>
    <div class="d-flex flex-wrap justify-content-between container py-3gx-3 mt-3">
        <div class="card-green text-center border-yellow mb-3 justify-content-center d-flex align-items-center">
            <a class="d-flex flex-column justify-content-center align-items-center"
                href="{{ url('/kelahiran/create') }}" style="text-decoration: none; transition: 0.3s;">
                <div class="d-flex justify-content-center">
                    <h3 id="total-transaksi" class="h-1 fw-bold ml-auto text-center">Surat Ket. Lahir</h3>
                </div>
            </a>
        </div>

        <div class="card-green text-center border-yellow mb-3 justify-content-center d-flex align-items-center">
            <a class="d-flex flex-column justify-content-center align-items-center" href="{{ url('/sktm/create') }}"
                style="text-decoration: none; transition: 0.3s;">
                <div class="d-flex justify-content-center">
                    <h3 id="total-transaksi" class="h-1 fw-bold ml-auto text-center">SKTM</h3>
                </div>
            </a>
        </div>

        <div class="card-green text-center border-yellow mb-3 justify-content-center d-flex align-items-center">
            <a class="d-flex flex-column justify-content-center align-items-center" href="{{ url('/kematian/create') }}"
                style="text-decoration: none; transition: 0.3s;">
                <div class="d-flex justify-content-center">
                    <h3 id="total-transaksi" class="h-1 fw-bold ml-auto text-center">Surat Ket. Meninggal</h3>
                </div>
            </a>
        </div>
    </div>
    @endif
</div>
</div>
<script>



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