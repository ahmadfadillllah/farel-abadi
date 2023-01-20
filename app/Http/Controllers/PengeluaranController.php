<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    //
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index', compact('pengeluaran'));
    }

    public function insert(Request $request)
    {
        try {
            Pengeluaran::create([
                'tanggal_keluar' => $request->tanggal_keluar,
                'nama_pembeli' => $request->nama_pembeli,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'status' => 'Belum Memasukkan Barang',
            ]);

            return redirect()->back()->with('success', 'Nota telah dimasukkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            Pengeluaran::where('id', 1)->update([
                'tanggal_keluar' => $request->tanggal_keluar,
                'nama_pembeli' => $request->nama_pembeli,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);

            return redirect()->back()->with('success', 'Nota telah diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Pengeluaran::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Nota telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
