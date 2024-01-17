// Import Chart.js
import Chart from 'chart.js/auto';

// Ambil elemen canvas
const salesChartCanvas = document.getElementById('salesChart');

// Buat grafik
const salesChart = new Chart(salesChartCanvas, {
    type: 'bar',
    data: {
        labels: ['Obat A', 'Obat B', 'Obat C'], // Gantilah dengan nama obat yang sesuai
        datasets: [{
            label: 'Jumlah Terjual',
            data: [10, 15, 20], // Gantilah dengan data penjualan sesuai dengan obat
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1,
        }],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
// Mengambil data penjualan dari route sales-data
fetch("{{ route('sales-data') }}")
    .then((response) => response.json())
    .then((data) => {
        const labels = data.map((item) => item.nama_obat);
        const values = data.map((item) => item.total);

        // Memperbarui data grafik dengan data yang diambil
        salesChart.data.labels = labels;
        salesChart.data.datasets[0].data = values;

        // Memperbarui grafik
        salesChart.update();
    })
    .catch((error) => {
        console.error(error);
    });


    // nama-script.js

document.addEventListener('DOMContentLoaded', function () {
    // Mendapatkan data yang diperlukan
    const inventoryStatusData = 129;
    const approachingExpiryData = 205;
    const expiredData = 15;

    // Mengambil elemen canvas untuk chart
    const salesChart = document.getElementById('salesChart').getContext('2d');

    // Membuat chart dengan data yang sesuai
    new Chart(salesChart, {
        type: 'bar', // Jenis chart yang digunakan
        data: {
            labels: ['Inventory Status', 'Mendekati Masa Kadaluarsa', 'Kadaluarsa'],
            datasets: [{
                label: 'Jumlah',
                data: [inventoryStatusData, approachingExpiryData, expiredData],
                backgroundColor: [
                    'rgba(0, 255, 0, 0.5)', // Warna untuk Inventory Status
                    'rgba(0, 0, 255, 0.5)', // Warna untuk Mendekati Masa Kadaluarsa
                    'rgba(255, 0, 0, 0.5)' // Warna untuk Kadaluarsa
                ],
                borderWidth: 1 // Lebar garis
            }]
        },
        options: {
            responsive: true, // Chart responsif
            maintainAspectRatio: false // Mempertahankan rasio aspek
        }
    });
});
