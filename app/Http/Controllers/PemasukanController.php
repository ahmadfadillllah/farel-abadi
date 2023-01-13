<?php

namespace App\Http\Controllers;

use App\Models\HasilLaut;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PemasukanController extends Controller
{
    //
    public function index()
    {
        $hasillaut = HasilLaut::with('kategori')->where('status', 'Tersedia')->get();
        $pemasukan = Pemasukan::with('hasillaut')->get();
        return view('pemasukan.index', compact('pemasukan', 'hasillaut'));
    }

    public function insert(Request $request)
    {
        $jumlah_conv = Str::replace(',', '.', $request->jumlah);
        $harga_conv = Str::replace('Rp', '', $request->harga);
        $harga_conv2 = Str::replace('.', '', $harga_conv);

        try {
            HasilLaut::whereId($request->hasillaut_id)->update([
                'stok' => $request->stok_sebelumnya + $jumlah_conv,
            ]);

            Pemasukan::create([
                'tanggal_masuk' => $request->tanggal_masuk,
                'hasillaut_id' => $request->hasillaut_id,
                'nama_nelayan' => $request->nama_nelayan,
                'jumlah' => $jumlah_conv,
                'harga' => $harga_conv2,
                'total' => $jumlah_conv * $harga_conv2,
            ]);

            return redirect()->back()->with('success', 'Pesanan telah direkap');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Pemasukan::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Pemasukan telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
