<?php

namespace App\Http\Controllers;

use App\Models\DataBansosItem;
use Illuminate\Http\Request;

class DataBansosController extends Controller
{
    public function index(Request $request)
    {
        $query = DataBansosItem::query();
        $data_bansos_items = $query->paginate(10);
        return view('databansos.index', compact('data_bansos_items'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_kk' => 'required|string',
            'tanggal' => 'required|date',
            'nama_kk' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'umur' => 'required|string',
            'alamat' => 'required|string',
            'desa' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'jumlah_tanggungan' => 'required|string',
            'pekerjaan' => 'required|string',
            'pendapatan' => 'required|string',
        ]);

        DataBansosItem::create($validatedData);
        return redirect()->route('databansos.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function create()
    {
        return view('databansos.create');
    }
    
    public function edit($id)
    {
        $data_bansos_items = DataBansosItem::findOrFail($id);
        return view('databansos.edit', compact('data_bansos_items'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'no_kk' => 'required|string',
            'tanggal' => 'required|date',
            'nama_kk' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'umur' => 'required|string',
            'alamat' => 'required|string',
            'desa' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'jumlah_tanggungan' => 'required|string',
            'pekerjaan' => 'required|string',
            'pendapatan' => 'required|string',
        ]);

        $data_bansos_items = DataBansosItem::findOrFail($id);
        $data_bansos_items->update($validatedData);

        return redirect()->route('databansos.index')->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
{
    $data_bansos_items = DataBansosItem::findOrFail($id);
    $data_bansos_items->delete();

    return redirect()->route('databansos.index')->with('success', 'Item deleted successfully.');
}
}
