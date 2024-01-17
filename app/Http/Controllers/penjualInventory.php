<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryItem; // Import your model

class penjualInventory extends Controller
{

public function index(Request $request)
{
    $query = InventoryItem::query();


    $inventoryItems = InventoryItem::all();

    // Calculate the total quantity of items
    $totalQuantity = $inventoryItems->sum('jumlah_stok');

    // Determine the "Good" status based on a threshold
    $goodStatus = $totalQuantity > 100 ? 'Good' : 'Not Good';


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

    return view('inventorypemilik.index', compact('inventoryItems', 'searchTerm', ));

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
        'dosis' => 'required', 
        'jenis_obat' => 'required',
        'jumlah_stok' => 'required|integer',
        'expired_Date' => 'required|date',
    ]);

    InventoryItem::create($validatedData);

    return redirect()->route('inventorypemilik.index')->with('success', 'Item added successfully.');
}


public function create()
{
    return view('inventorypemilik.create'); 
}
public function edit($id)
{
    $inventoryItem = InventoryItem::findOrFail($id);
    return view('inventorypemilik.edit', compact('inventoryItem'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama_obat' => 'required', 
        'dosis' => 'required', 
        'jenis_obat' => 'required',
        'jumlah_stok' => 'required|integer',
        'expired_Date' => 'required|date',
    ]);

    $inventoryItem = InventoryItem::findOrFail($id);
    $inventoryItem->update($validatedData);

    return redirect()->route('inventorypemilik.index')->with('success', 'Item updated successfully.');
}
public function destroy($id)
{
    $inventoryItem = InventoryItem::findOrFail($id);
    $inventoryItem->delete();

    return redirect()->route('inventory.index')->with('success', 'Item deleted successfully.');
}




}

