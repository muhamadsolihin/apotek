<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiItem; // Import your model
use App\Models\InventoryItem;

class TransaksiPenjualan extends Controller
{

    public function index(Request $request)
    {
        $query = TransaksiItem::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nama_obat', 'like', "%$searchTerm%")
                ->orWhere('jenis_obat', 'like', "%$searchTerm%");
            session(['inventory_search' => $searchTerm]);
        } else {
            $searchTerm = session('inventory_search');
        }

        $transaksiItems = $query->get();

        foreach ($transaksiItems as $item) {
            $item->isAboutToExpire = $this->isAboutToExpire($item->expired_date);
        }

        return view('transaksi.index', compact('transaksiItems', 'searchTerm'));
    }

    protected function isAboutToExpire($expiryDate)
    {
        $expiryThreshold = now()->addMonths(3);
        return $expiryDate <= $expiryThreshold;
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'jumlah_stok' => 'required|integer',
            'expired_Date' => 'required|date',
        ]);


        // Ambil value dari nama_obat (nilai yang dipilih dari dropdown)
        $nama_obat = $request->input('nama_obat');

        // Cari item inventaris berdasarkan nama_obat
        $inventoryItem = InventoryItem::where('nama_obat', $nama_obat)->first();

        // Kurangkan stok di InventoryItem
        $inventoryItem->jumlah_stok -= $validatedData['jumlah_stok'];
        $inventoryItem->save();

        TransaksiItem::create($validatedData);

        return redirect()->route('transaksi.index')->with('success', 'Item added successfully.');
    }

    public function getSalesData()
    {
        $salesData = TransaksiItem::select('nama_obat', \DB::raw('SUM(jumlah_stok) as total'))
            ->groupBy('nama_obat')
            ->get();
    
        return response()->json($salesData,);
    }
    
    public function getTotalData()
    {
    $totalQuantity = InventoryItem::sum('jumlah_stok');
    $totalTransaction = TransaksiItem::sum('jumlah_stok');

    $totalExpiredStok = InventoryItem::where('expired_Date', '<', now()) // Filter data yang sudah kadaluarsa
    ->count();

    return response()->json(['totalQuantity' => $totalQuantity, 'totalExpiredStok' => $totalExpiredStok, 'totalTransaction' => $totalTransaction]);
    }

        


    public function create()
    {
        $inventoryItems = InventoryItem::pluck('nama_obat');
        return view('transaksi.create', compact('inventoryItems'));
    }

    public function edit($id)
    {
        $inventoryItem = TransaksiItem::findOrFail($id);
        return view('transaksi.edit', compact('inventoryItem'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'jumlah_stok' => 'required|integer',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $inventoryItem = TransaksiItem::findOrFail($id);
        $inventoryItem->update($validatedData);

        return redirect()->route('transaksi.index')->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
    {
        $inventoryItem = TransaksiItem::findOrFail($id);
        $inventoryItem->delete();

        return redirect()->route('transaksi.index')->with('success', 'Item deleted successfully.');
    }




}