<?php

namespace App\Http\Controllers;

use App\Models\IuranDataItem;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index(Request $request)
    {
        $query = IuranDataItem::where('type', 'pemasukan');
        $iuran_data_items = $query->paginate(10);
        return view('pemasukan.index', compact('iuran_data_items'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'nominal' => 'required|string',
        ]);

        $validatedData['type'] = 'pemasukan';
        IuranDataItem::create($validatedData);
        return redirect()->route('pemasukan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function create()
    {
        return view('pemasukan.create');
    }
    
    public function edit($id)
    {
        $iuran_data_items = IuranDataItem::findOrFail($id);
        return view('pemasukan.edit', compact('iuran_data_items'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'nominal' => 'required|string',
        ]);
        $validatedData['type'] = 'pemasukan';
        $iuran_data_items = IuranDataItem::findOrFail($id);
        $iuran_data_items->update($validatedData);

        return redirect()->route('pemasukan.index')->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
{
    $iuran_data_items = IuranDataItem::findOrFail($id);
    $iuran_data_items->delete();

    return redirect()->route('pemasukan.index')->with('success', 'Item deleted successfully.');
}
}
