<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryItem; // Import your model
use App\Models\HomeController; // Import your model

class InventoryController extends Controller
{

    public function index(Request $request)
    {
        $query = InventoryItem::query();

        if ($request->has('filter')) {
            $filter = $request->input('filter');
    
            // Apply different filters based on the 'filter' value
            if ($filter === 'kadaluarsa') {
                $query->whereDate('expired_date', '<', now());
            } elseif ($filter === 'near-expiry') {
                $query->whereDate('expired_date', '>=', now())
                    ->whereDate('expired_date', '<=', now()->addMonths(3));
            }
        }
    
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nama_obat', 'like', "%$searchTerm%")
                ->orWhere('jenis_obat', 'like', "%$searchTerm%");
            session(['inventory_search' => $searchTerm]);
        } else {
            $searchTerm = session('inventory_search');
        }
    
        $inventoryItems = $query->paginate(10);
        // Menghitung total jumlah stok dari database
        $totalQuantity = $query->sum('jumlah_stok');
        $goodStatus = $totalQuantity > 100 ? 'Good' : 'Not Good';
    
        // Ambil data inventoryItems setelah perhitungan jumlah stok
        // $inventoryItems = $query->get();
    
        foreach ($inventoryItems as $item) {
            $item->isAboutToExpire = $this->isAboutToExpire($item->expired_date);
        }
    
        return view('inventory.index', compact('inventoryItems', 'searchTerm', 'totalQuantity', 'goodStatus'));
    }

    public function nearExpiry(Request $request)
{
    $query = InventoryItem::query();
    $query->whereDate('expired_date', '>=', now())
        ->whereDate('expired_date', '<=', now()->addMonths(3));

    $inventoryItems = $query->paginate(10);

    return view('inventory.near-expiry', compact('inventoryItems'));
}



public function expired(Request $request)
{
    $query = InventoryItem::query();
    $query->whereDate('expired_date', '<', now());

    $inventoryItems = $query->paginate(10);

    return view('inventory.expired', compact('inventoryItems'));
}



    public function getTotalQuantity()
    {
        $query = InventoryItem::query();

        $totalQuantity = $query->sum('jumlah_stok');
        $goodStatus = $totalQuantity > 100 ? 'Good' : 'Not Good';
    
        return response()->json($totalQuantity);

        
    }
    

protected function isAboutToExpire($expiryDate)
{
    $expiryThreshold = now()->addMonths(3);
    return $expiryDate <= $expiryThreshold;
}

public function expiredInventory()
{
    // Ambil daftar obat yang telah kadaluarsa
    $expiredInventoryItems = InventoryItem::where('expired_date', '<', now())->get();

    return view('expired_inventory', compact('expiredInventoryItems'));
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

    return redirect()->route('inventory.index')->with('success', 'Item added successfully.');
}

public function create()
{
    return view('inventory.create'); 
}
public function edit($id)
{
    $inventoryItem = InventoryItem::findOrFail($id);
    return view('inventory.edit', compact('inventoryItem'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama_obat' => 'required',
        'jenis_obat' => 'required',
        'dosis' => 'required', 
        'jumlah_stok' => 'required|integer',
        'expired_Date' => 'required|date',
    ]);

    $inventoryItem = InventoryItem::findOrFail($id);
    $inventoryItem->update($validatedData);

    return redirect()->route('inventory.index')->with('success', 'Item updated successfully.');
}
public function destroy($id)
{
    $inventoryItem = InventoryItem::findOrFail($id);
    $inventoryItem->delete();

    return redirect()->route('inventory.index')->with('success', 'Item deleted successfully.');
}







}

