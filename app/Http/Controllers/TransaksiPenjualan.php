<?php

namespace App\Http\Controllers;

use App\Models\KelolaDataItem;
use App\Models\IuranDataItem;
use App\Models\DataBansosItem;

class TransaksiPenjualan extends Controller
{

    public function getTotalData()
    {
        $totalQuantity = KelolaDataItem::count();
        $penerimaBansos = DataBansosItem::count();
        $totalIuran = IuranDataItem::sum('nominal');

        $formattedTotalIuran = "Rp " . number_format($totalIuran, 0, ',', '.');

        return response()->json(['penerimaBansos' => $penerimaBansos, 'totalQuantity' => $totalQuantity, 'totalIuran' => $formattedTotalIuran]);
    }



}