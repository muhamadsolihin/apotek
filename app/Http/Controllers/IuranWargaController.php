<?php

namespace App\Http\Controllers;

use App\Models\IuranDataItem;
use Illuminate\Http\Request;

class IuranWargaController extends Controller
{
    public function index(Request $request)
    {
        $query = IuranDataItem::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('tanggal', 'like', "%{p$search}%")
                ->orWhere('nominal', 'like', "%{$search}%")
                ->orWhere('type', 'like', "%{$search}%");
        }
        $iuran_data_items = $query->paginate(10);
        $total_nominal = $query->sum('nominal');

        return view('iuranwarga.index', compact('iuran_data_items', 'total_nominal'));
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
