<div class="sidebar h-full py-2">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white fw-bold"  href="{{ url('/penjual') }}">
                <i class="bi bi-house-door text-body me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white fw-bold" href="{{ url('/inventory/pemilik') }}">
                <i class="bi bi-box me-2"></i> Pemeliharaan Stok Obat
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white fw-bold" href="{{ url('/laporan/pemilik') }}">
                <i class="bi bi-file-text me-2"></i> Laporan Penjualan
            </a>
        </li>
    </ul>
</div>
