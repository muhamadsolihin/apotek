<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelolaDataItem;

class KelolaDataController extends Controller
{
    public function index(Request $request)
    {
        $query = KelolaDataItem::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nik', 'like', "%{$search}%")
                  ->orWhere('nama', 'like', "%{$search}%")
                  ->orWhere('tanggal_lahir', 'like', "%{$search}%")
                  ->orWhere('jenis_kelamin', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
        }

        $kelola_data_items = $query->paginate(10);

        return view('keloladata.index', compact('kelola_data_items'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|numeric',
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'rt' => 'required|string',
            'agama' => 'required|string',
            'status' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
            'pendapatan' => 'required|string',
        ]);

        KelolaDataItem::create($validatedData);
        return redirect()->route('keloladata.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function create()
    {
        return view('keloladata.create');
    }

    public function edit($id)
    {
        $kelola_data_items = KelolaDataItem::findOrFail($id);
        return view('keloladata.edit', compact('kelola_data_items'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nik' => 'required|numeric',
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'rt' => 'required|string',
            'agama' => 'required|string',
            'status' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
            'pendapatan' => 'required|string',
        ]);

        $kelola_data_items = KelolaDataItem::findOrFail($id);
        $kelola_data_items->update($validatedData);

        return redirect()->route('keloladata.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $kelola_data_items = KelolaDataItem::findOrFail($id);
        $kelola_data_items->delete();

        return redirect()->route('keloladata.index')->with('success', 'Item deleted successfully.');
    }
}
