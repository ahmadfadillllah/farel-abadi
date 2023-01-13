<?php

namespace App\Http\Controllers;

use App\Models\HasilLaut;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HasilLautController extends Controller
{
    //
    public function index()
    {
        $kategorii = Kategori::all();
        $hasillaut = HasilLaut::with('kategori')->get();
        return view('hasil_laut.index', compact('hasillaut', 'kategorii'));
    }

    public function insert(Request $request)
    {
        $date = date('YmdHisgis');
        try {

            $hasiillaut = new HasilLaut;
            $hasiillaut->kategori_id = $request->kategori_id;
            $hasiillaut->nama = $request->nama;
            $hasiillaut->stok = 0;
            $hasiillaut->status = $request->status;

            if($request->hasFile('gambar')){
                $request->file('gambar')->move('admin/mophy.dexignzone.com/xhtml/images/product/', $date.$request->file('gambar')->getClientOriginalName());
                $hasiillaut->gambar = $date.$request->file('gambar')->getClientOriginalName();
                $hasiillaut->save();
            }
            return redirect()->back()->with('success', 'Hasil Laut telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            HasilLaut::whereId($id)->update([
                'kategori_id' => $request->kategori_id,
                'nama' => $request->nama,
                'status' => $request->status,
            ]);

            return redirect()->back()->with('success', 'Hasil Laut telah diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            HasilLaut::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Hasil Laut telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
