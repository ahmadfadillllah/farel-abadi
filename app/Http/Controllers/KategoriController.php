<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function insert(Request $request)
    {
        try {
            Kategori::create([
                'nama' => $request->nama,
            ]);

            return redirect()->back()->with('success', 'Kategori telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            Kategori::whereId($id)->update([
                'nama' => $request->nama,
            ]);

            return redirect()->back()->with('success', 'Kategori telah diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Kategori::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Kategori telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
