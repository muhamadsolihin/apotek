<div class="sidebar h-full py-2 px-2">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link  fw-bold" href="{{ url('/umum') }}">
                <div class="d-flex justify-center">
                    <div class="ml-5 ms-3 d-flex justify-center">Dashboard</div>
                </div>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link  fw-bold" href="{{ url('/kelahiran') }}">
                <div class="d-flex justify-center">
                    <div class="ml-5 ms-3 d-flex justify-center"> Pengajuan Surat</div>
                </div>
            </a>
        </li> -->

    </ul>
</div>
<style>
    .nav-link {
        background-color: transparent;
        border-radius: 10px;
        padding: 10px;
        font-size: 16px;
        color: #000;
        transition: background-color 0.3s, color 0.3s;
    }


    .nav-link:hover {
        border-radius: 10px;
        background-color: #000;
        color: #000;
    }

    .nav-link.active {
        background-color: #000;
        color: #000 !important;
    }

    /* Remove the hover effect for the active .nav-link */
    .nav-link.active:hover {
        background-color: #000;
        color: #000 !important;
    }
</style>