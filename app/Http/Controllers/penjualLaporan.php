<?php

namespace App\Http\Controllers;

use PDF;

use Illuminate\Http\Request;
use App\Models\LaporanItem; // Import your model
use App\Models\TransaksiItem; // Import your model

class penjualLaporan extends Controller
{
    public function index(Request $request)
    {
        $query = TransaksiItem::query(); // Use the TransaksiItem model for the report

        $startDate = null; // Initialize $startDate
        $endDate = null; // Initialize $endDate


        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nama_obat', 'like', "%$searchTerm%")
                ->orWhere('jenis_obat', 'like', "%$searchTerm%");
            session(['laporan_search' => $searchTerm]);
        } else {
            $searchTerm = session('laporan_search');
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $query->whereBetween('expired_date', [$startDate, $endDate]);
        }

        $transaksiItems = $query->get();

        foreach ($transaksiItems as $item) {
            $item->isAboutToExpire = $this->isAboutToExpire($item->expired_date);
        }

        return view('laporanpemilik.index', compact('transaksiItems', 'searchTerm', 'startDate', 'endDate'));
    }


    public function exportToPdf(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $transaksiItems = TransaksiItem::whereBetween('expired_date', [$startDate, $endDate])->get();
    
        $pdf = PDF::loadView('laporanpemilik.pdf', compact('transaksiItems', 'startDate', 'endDate'));
    
        return $pdf->download('laporanpemilik.pdf');
    }


    protected function isAboutToExpire($expiryDate)
    {
        $expiryThreshold = now()->addMonths(3);
        return $expiryDate <= $expiryThreshold;
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'jumlah_stok' => 'required|integer',
            'expired_Date' => 'required|date',
        ]);

        LaporanItem::create($validatedData);

        return redirect()->route('laporanpemilik.index')->with('success', 'Item added successfully.');
    }


    public function create()
    {
        return view('laporanpemilik.create');
    }
    public function edit($id)
    {
        $laporanItem = LaporanItem::findOrFail($id);
        return view('laporanpemilik.edit', compact('laporanItem'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'jumlah_stok' => 'required|integer',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $laporanItem = LaporanItem::findOrFail($id);
        $laporanItem->update($validatedData);

        return redirect()->route('laporanpemilik.index')->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
    {
        $laporanItem = LaporanItem::findOrFail($id);
        $laporanItem->delete();

        return redirect()->route('laporan.index')->with('success', 'Item deleted successfully.');
    }




}