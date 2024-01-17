@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>
    <div class="col-md-10 py-5 container">
        <div class="mb-3 d-flex flex-wrap justify-content-left">
            <a class="btn btn-primary flex d-flex align-items-center items-center" href="{{ route('inventory.create') }}">Tambah Obat</a>
            <div class="d-flex flex-wrap align-items-center items-center ms-3" id="notificationIcon">
             <img src="{{ asset('asset/bell-fill.svg') }}" alt="Notification Icon" class="mr-2" width="24" height="24">
            <span class="badge badge-danger text-dark" id="notificationBadge"></span>
            </div>


            <div class="ms-3">
    <select id="filterSelect" class="form-select">
    <option value="" >Pilih Filter</option>
    <option value="" >All</option>
        <option value="{{ route('inventory.index', ['filter' => 'near-expiry']) }}">Mendekati Kadaluarsa</option>
        <option value="{{ route('inventory.index', ['filter' => 'kadaluarsa']) }}">Kadaluarsa</option>
    </select>
</div>


    
            <form class="ms-auto" action="{{ route('inventory.index') }}" method="GET">
                <div class="input-group ml-auto">
                    <input type="text" class="form-control" placeholder="Cari Obat" name="search" value="{{ $searchTerm }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        
        <table class="table table-bordered table-striped ">
            <thead class="table-primary bg-primary">
                <tr>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                    <th>Dosis</th>
                    <th>Jumlah Stok</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventoryItems as $item)
                    <tr>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->jenis_obat }}</td>
                        <td>{{ $item->dosis }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                        <td>{{ $item->expired_date }}</td>
                        <td>
                            @if (now() > $item->expired_date)
                                <span class="h-2 fw-bold">Telah Kadaluarsa</span>
                            @elseif (now()->addMonths(3) >= $item->expired_date)
                                <span class="h-3 fw-bold">Mendekati Masa Kadaluarsa</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
    <ul class="pagination">
        @if ($inventoryItems->currentPage() > 1)
            <li class="page-item"><a class="page-link" href="{{ $inventoryItems->previousPageUrl() }}">Previous</a></li>
        @endif

        @for ($i = 1; $i <= $inventoryItems->lastPage(); $i++)
            <li class="page-item {{ ($inventoryItems->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $inventoryItems->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($inventoryItems->currentPage() < $inventoryItems->lastPage())
            <li class="page-item"><a class="page-link" href="{{ $inventoryItems->nextPageUrl() }}">Next</a></li>
        @endif
    </ul>
</div>

        <div class="d-flex justify-content-center">
            </div>
    </div>
</div>

<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {

        const filterSelect = document.getElementById('filterSelect');

        filterSelect.addEventListener('change', function () {
        const selectedOption = filterSelect.value;

        if (selectedOption === "") {
            // If "Semua" (All) is selected, clear any query parameters and reset the filter
            const currentURL = window.location.href;
            const updatedURL = currentURL.split('?')[0]; // Remove query parameters
            window.location.href = updatedURL;
        } else {
            // Redirect to the selected filter option URL
            window.location.href = selectedOption;
        }
    });
        const notificationIcon = document.getElementById('notificationIcon');
        const notificationBadge = document.getElementById('notificationBadge');
        const tableRows = document.querySelectorAll('tbody tr');

        // Kode untuk menghitung obat yang mendekati kadaluarsa atau telah kadaluarsa
        let nearExpiryCount = 0;
        let expiredCount = 0;

        tableRows.forEach(function (row) {
            const expirationDate = new Date(row.querySelector('td:nth-child(4)').textContent);
            const description = row.querySelector('td:nth-child(5)').textContent;
            const now = new Date();

            if (now > expirationDate) {
                expiredCount++;
            } else if (expirationDate - now <= 3 * 30 * 24 * 60 * 60 * 1000) {
                nearExpiryCount++;
            }
        });

        // Tampilkan badge notifikasi dengan jumlah obat mendekati atau kadaluarsa
        if (nearExpiryCount > 0 || expiredCount > 0) {
            notificationBadge.style.display = 'block';
            notificationBadge.textContent = nearExpiryCount + expiredCount;
        }

    notificationIcon.addEventListener('click', function (event) {
    event.preventDefault();

    if (nearExpiryCount > 0 || expiredCount > 0) {
        const message = `
            Ada ${nearExpiryCount} obat mendekati kadaluarsa.
            Ada ${expiredCount} obat telah kadaluarsa.
        `;
        // Buat elemen notifikasi popup
        const notificationPopup = document.createElement('div');
        notificationPopup.className = 'notification-popup';
        notificationPopup.innerHTML = message;

        // Tambahkan tombol "Lihat Detail" ke notifikasi
        const viewDetailButton = document.createElement('a');
        viewDetailButton.href = "{{ route('expired-inventory') }}";
        viewDetailButton.className = 'btn btn-primary';
        viewDetailButton.textContent = 'Lihat Detail';

        // Tambahkan notifikasi beserta tombol ke dalam elemen notifikasi popup
        notificationPopup.appendChild(viewDetailButton);

        // Tambahkan gaya ke notifikasi popup
        notificationPopup.style.backgroundColor = '#ff0000'; // Warna latar merah
        notificationPopup.style.borderRadius = '5px';
        notificationPopup.style.padding = '10px';
        notificationPopup.style.color = '#fff';
        notificationPopup.style.fontFamily = 'Arial, sans-serif';
        notificationPopup.style.fontSize = '14px';
        notificationPopup.style.position = 'fixed';
        notificationPopup.style.top = '20px';
        notificationPopup.style.right = '20px';
        notificationPopup.style.zIndex = '9999';

        // Tambahkan notifikasi ke dalam dokumen
        document.body.appendChild(notificationPopup);

        // Setelah beberapa detik, hilangkan notifikasi
        setTimeout(function () {
            notificationPopup.remove();
        }, 5000); // Notifikasi akan hilang setelah 5 detik
    }
});

    });
</script> -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

const filterSelect = document.getElementById('filterSelect');
const notificationIcon = document.getElementById('notificationIcon');
const notificationBadge = document.getElementById('notificationBadge');
const tableRows = document.querySelectorAll('tbody tr');

// Function to count "kadaluarsa" and "mendekati kadaluarsa" items
function countExpiryItems() {
    let nearExpiryCount = 0;
    let expiredCount = 0;
    const now = new Date();

    tableRows.forEach(function (row) {
        const expirationDate = new Date(row.querySelector('td:nth-child(5)').textContent);

        if (now > expirationDate) {
            expiredCount++;
        } else if (expirationDate - now <= 3 * 30 * 24 * 60 * 60 * 1000) {
            nearExpiryCount++;
        }
    });

    return { nearExpiryCount, expiredCount };
}

// Function to update the notification badge
function updateNotificationBadge() {
    const { nearExpiryCount, expiredCount } = countExpiryItems();

    if (nearExpiryCount > 0 || expiredCount > 0) {
        notificationBadge.style.display = 'block';
        notificationBadge.textContent = nearExpiryCount + expiredCount;
    } else {
        notificationBadge.style.display = 'none';
    }
}

// Initial update of the notification badge
updateNotificationBadge();

// Listen for changes in the filter select
filterSelect.addEventListener('change', function () {
    const selectedOption = filterSelect.value;

    if (selectedOption === "") {
        // If "Semua" (All) is selected, clear any query parameters and reset the filter
        const currentURL = window.location.href;
        const updatedURL = currentURL.split('?')[0]; // Remove query parameters
        window.location.href = updatedURL;
    } else {
        // Redirect to the selected filter option URL
        window.location.href = selectedOption;
    }
});

notificationIcon.addEventListener('click', function (event) {
    event.preventDefault();

    const { nearExpiryCount, expiredCount } = countExpiryItems();

    if (nearExpiryCount > 0 || expiredCount > 0) {
        const message = `
            Ada ${nearExpiryCount} obat mendekati kadaluarsa.
            Ada ${expiredCount} obat telah kadaluarsa.
        `;

        // Create a notification popup element
        const notificationPopup = document.createElement('div');
        notificationPopup.className = 'notification-popup';
        notificationPopup.innerHTML = message;

        // Add a "Lihat Detail" button to the notification
        const viewDetailButton = document.createElement('a');
        viewDetailButton.href = "{{ route('expired-inventory') }}";
        viewDetailButton.className = 'btn btn-primary';
        viewDetailButton.textContent = 'Lihat Detail';

        // Add the notification and button to the popup
        notificationPopup.appendChild(viewDetailButton);

        // Style the notification popup
        notificationPopup.style.backgroundColor = '#ff0000'; // Red background color
        notificationPopup.style.borderRadius = '5px';
        notificationPopup.style.padding = '10px';
        notificationPopup.style.color = '#fff';
        notificationPopup.style.fontFamily = 'Arial, sans-serif';
        notificationPopup.style.fontSize = '14px';
        notificationPopup.style.position = 'fixed';
        notificationPopup.style.top = '20px';
        notificationPopup.style.right = '20px';
        notificationPopup.style.zIndex = '9999';

        // Add the notification to the document
        document.body.appendChild(notificationPopup);

        // Remove the notification after a few seconds
        setTimeout(function () {
            notificationPopup.remove();
        }, 5000); // Notification will disappear after 5 seconds
    }
});
});

</script>

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
  background-color: #ff5733; /* Warna latar merah saat hover */
  transform: scale(1.1); /* Perbesar badge saat hover */
}

</style>