<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryItem; // Import your model

class PembeliController extends Controller
{

public function index(Request $request)
{
    $query = InventoryItem::query();

    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where('nama_obat', 'like', "%$searchTerm%")
            ->orWhere('jenis_obat', 'like', "%$searchTerm%");
        session(['inventory_search' => $searchTerm]);
    } else {
        $searchTerm = session('inventory_search');
    }

    $inventoryItems = $query->get();

    foreach ($inventoryItems as $item) {
        $item->isAboutToExpire = $this->isAboutToExpire($item->expired_date);
    }

    return view('pembeli.index', compact('inventoryItems', 'searchTerm'));
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

    InventoryItem::create($validatedData);

    return redirect()->route('pembeli.index')->with('success', 'Item added successfully.');
}


public function create()
{
    return view('pembeli.create'); 
}
public function edit($id)
{
    $inventoryItem = InventoryItem::findOrFail($id);
    return view('pembeli.edit', compact('inventoryItem'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama_obat' => 'required',
        'jenis_obat' => 'required',
        'jumlah_stok' => 'required|integer',
        'tanggal_kadaluarsa' => 'required|date',
    ]);

    $inventoryItem = InventoryItem::findOrFail($id);
    $inventoryItem->update($validatedData);

    return redirect()->route('pembeli.index')->with('success', 'Item updated successfully.');
}
public function destroy($id)
{
    $inventoryItem = InventoryItem::findOrFail($id);
    $inventoryItem->delete();

    return redirect()->route('pembeli.index')->with('success', 'Item deleted successfully.');
}




}

