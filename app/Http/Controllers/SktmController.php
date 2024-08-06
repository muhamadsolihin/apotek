<?php

namespace App\Http\Controllers;

use App\Models\KelahiranItem;
use Illuminate\Http\Request;

class SktmController extends Controller
{
    public function index(Request $request)
    {
        $query = KelahiranItem::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nik_pengaju', 'like', "%{$search}%")
                ->orWhere('tanggal', 'like', "%{p$search}%")
                ->orWhere('kepentingan', 'like', "%{$search}%");
        }
        $kelahiran_items = $query->paginate(10);
        return view('sktm.index', compact('kelahiran_items'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik_pengaju' => 'nullable|string',
            'tanggal_lahir_pengaju' => 'nullable|date',
            'tempat_lahir_pengaju' => 'nullable|string',
            'tanggal_lahir' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'pekerjaan_pengaju' => 'nullable|string',
            'orgtua_pengaju' => 'nullable|string',
            'nama' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'nama_instansi' => 'nullable|string',
            'kepentingan' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        $validatedData['type'] = 'sktm';
        $validatedData['status'] = 'onproses';
        KelahiranItem::create($validatedData);

        return redirect()->route('sktm.index')->with('success', 'Data berhasil ditambahkan.');
    }


    public function create()
    {
        return view('sktm.create');
    }

    public function edit($id)
    {
        $kelahiran_items = KelahiranItem::findOrFail($id);
        return view('sktm.edit', compact('kelahiran_items'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nik_pengaju' => 'nullable|string',
            'tanggal_lahir_pengaju' => 'nullable|date',
            'tempat_lahir_pengaju' => 'nullable|string',
            'tanggal_lahir' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'pekerjaan_pengaju' => 'nullable|string',
            'orgtua_pengaju' => 'nullable|string',
            'nama' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'nama_instansi' => 'nullable|string',
            'kepentingan' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        $kelahiran_items = KelahiranItem::findOrFail($id);
        $kelahiran_items->update($validatedData);

        return redirect()->route('sktm.index')->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
    {
        $kelahiran_items = KelahiranItem::findOrFail($id);
        $kelahiran_items->delete();

        return redirect()->route('sktm.index')->with('success', 'Item deleted successfully.');
    }
}
