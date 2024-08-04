<?php

namespace App\Http\Controllers;

use App\Models\IuranDataItem;
use Illuminate\Http\Request;

class IuranWargaController extends Controller
{
    public function index(Request $request)
    {
        $query = IuranDataItem::query();
        $iuran_data_items = $query->paginate(10);
        return view('iuranwarga.index', compact('iuran_data_items'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'nominal' => 'required|number',
            'type' => 'required|string',
        ]);

        IuranDataItem::create($validatedData);
        return redirect()->route('iuranwarga.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function create()
    {
        return view('iuranwarga.create');
    }
    public function edit($id)
    {
        $iuran_data_items = IuranDataItem::findOrFail($id);
        return view('iuranwarga.edit', compact('iuran_data_items'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'nominal' => 'required|number',
        ]);

        $iuran_data_items = IuranDataItem::findOrFail($id);
        $iuran_data_items->update($validatedData);

        return redirect()->route('iuranwarga.index')->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
{
    $iuran_data_items = IuranDataItem::findOrFail($id);
    $iuran_data_items->delete();

    return redirect()->route('iuranwarga.index')->with('success', 'Item deleted successfully.');
}
}
