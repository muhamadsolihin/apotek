<?php

namespace App\Http\Controllers;

use App\Models\KelahiranItem;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    public function index(Request $request)
    {
        $query = KelahiranItem::query();
        $kelahiran_items = $query->paginate(10);
        return view('kelahiran.index', compact('kelahiran_items'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'anak_ke' => 'required|string',
            'pekerjaan' => 'required|string',
        ]);
        $validatedData['type'] = 'kelahiran';
        $validatedData['status'] = 'onproses';
        KelahiranItem::create($validatedData);
        return redirect()->route('kelahiran.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function create()
    {
        return view('kelahiran.create');
    }
    
    public function edit($id)
    {
        $kelahiran_items = KelahiranItem::findOrFail($id);
        return view('kelahiran.edit', compact('kelahiran_items'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'anak_ke' => 'required|string',
            'pekerjaan' => 'required|string',
        ]);

        $kelahiran_items = KelahiranItem::findOrFail($id);
        $kelahiran_items->update($validatedData);

        return redirect()->route('kelahiran.index')->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
{
    $kelahiran_items = KelahiranItem::findOrFail($id);
    $kelahiran_items->delete();

    return redirect()->route('kelahiran.index')->with('success', 'Item deleted successfully.');
}
}
