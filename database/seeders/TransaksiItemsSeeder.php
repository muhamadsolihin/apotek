<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransaksiItem; // Import the model

class TransaksiItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $items = [
            ['nama_obat' => 'Oskadon', 'jenis_obat' => 'Sakit Kepala', 'jumlah_stok' => 10, 'expired_date' => '2023-08-24 05:54:41'],
            ['nama_obat' => 'Paramex', 'jenis_obat' => 'Sakit Kelapa', 'jumlah_stok' => 10,'expired_date' => '2023-08-24 05:54:41'],
            
            // Add more items as needed
        ];
    
        foreach ($items as $item) {
            TransaksiItem::create($item);
        }
    }
    
}
