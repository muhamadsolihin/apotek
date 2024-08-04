<?php

namespace App\Http\Controllers;

use App\Models\KelahiranItem;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function detail($id)
    {
        // Logika untuk menampilkan halaman detail pengajuan
        $item = KelahiranItem::findOrFail($id);
        return view('detail', compact('item'));
    }

    public function approve($id)
    {
        // Logika untuk menyetujui pengajuan
        $item = KelahiranItem::findOrFail($id);
        $item->update(['status' => 'Diterima']);
        return redirect()->route('kelahiran.index')->with('success', 'Pengajuan Diterima.');
    }

    public function reject($id)
    {
        // Logika untuk menolak pengajuan
        $item = KelahiranItem::findOrFail($id);
        $item->update(['status' => 'Ditolak']);
        return redirect()->route('kelahiran.index')->with('error', 'Pengajuan Ditolak.');
    }
}
