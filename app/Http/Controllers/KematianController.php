<?php

namespace App\Http\Controllers;

use App\Models\KelahiranItem;
use Illuminate\Http\Request;

class KematianController extends Controller
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
            'nik_pengaju' => 'required|string',
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'alamat' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'status_perkawinan' => 'required|string',
            'tempat_wafat' => 'required|string',
            'tanggal_wafat' => 'required|date',
            'alasan_wafat' => 'required|string',
        ]);
        $validatedData['type'] = 'kematian';
        $validatedData['status'] = 'onproses';
        KelahiranItem::create($validatedData);
        return redirect()->route('kelahiran.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function create()
    {
        return view('kematian.create');
    }
    public function edit($id)
    {
        $kelahiran_items = KelahiranItem::findOrFail($id);
        return view('kematian.edit', compact('kelahiran_items'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nik_pengaju' => 'required|string',
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'alamat' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'status_perkawinan' => 'required|string',
            'tempat_wafat' => 'required|string',
            'tanggal_wafat' => 'required|date',
            'alasan_wafat' => 'required|string',
        ]);

        $kelahiran_items = KelahiranItem::findOrFail($id);
        $kelahiran_items->update($validatedData);

        return redirect()->route('kematian.index')->with('success', 'Item updated successfully.');
    }

}
