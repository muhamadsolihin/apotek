<?php

namespace App\Http\Controllers;

use App\Models\IuranDataItem;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        $query = IuranDataItem::where('type', 'pengeluaran');
        $iuran_data_items = $query->paginate(10);
        return view('pengeluaran.index', compact('iuran_data_items'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'nominal' => 'required|string',
        ]);

        $validatedData['type'] = 'pengeluaran';
        IuranDataItem::create($validatedData);
        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function create()
    {
        return view('pengeluaran.create');
    }
    public function edit($id)
    {
        $iuran_data_items = IuranDataItem::findOrFail($id);
        return view('pengeluaran.edit', compact('iuran_data_items'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'nominal' => 'required|string',
        ]);
        $validatedData['type'] = 'pengeluaran';
        $iuran_data_items = IuranDataItem::findOrFail($id);
        $iuran_data_items->update($validatedData);

        return redirect()->route('pengeluaran.index')->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
{
    $iuran_data_items = IuranDataItem::findOrFail($id);
    $iuran_data_items->delete();

    return redirect()->route('pengeluaran.index')->with('success', 'Item deleted successfully.');
}
}
