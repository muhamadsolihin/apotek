<div class="sidebar h-full  py-5 ">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link fw-bold" href="{{ url('/home') }}">
                    <div class="d-flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25   " height="25" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
</svg>
 <div class="ml-5 ms-3 d-flex justify-center">  Dashboard</div>
</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  fw-bold" href="{{ url('/inventory') }}">
            <div class="d-flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
  <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
</svg></svg>
 <div class="ml-5 ms-3 d-flex justify-center"> Kelola Stok Obat</div>
</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  fw-bold" href="{{ url('/transaksi') }}">
            <div class="d-flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
  <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
  <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
</svg> <div class="ml-5 ms-3 d-flex justify-center"> Transaksi Penjualan</div>
</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  fw-bold" href="{{ url('/laporan') }}">
            <div class="d-flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z"/>
</svg><div class="ml-5 ms-3 d-flex justify-center"> Laporan Penjualan</div>
</div>
            </a>
        </li>
    </ul>
</div>

<style>
.nav-link {
  background-color: transparent;
  border-radius:10px;
  padding:10px;
  font-size:16px;
  color: #fff;
  transition: background-color 0.3s, color 0.3s; 
}

.icon-apotek{
    width:100px;
    justify:center;
}

.nav-link:hover {
 border-radius:10px;
 background-color: #fff;
 color: #000;
}

/* Apply a special style to the active .nav-link */
.nav-link.active {
  background-color: #fff;
  color: #fff;
}

/* Remove the hover effect for the active .nav-link */
.nav-link.active:hover {
  background-color: #fff;
  color: #fff;
}
    
</style>

