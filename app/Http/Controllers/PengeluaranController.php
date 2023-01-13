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

            return redirect()->back()->with('success', 'Pengeluaran telah dimasukkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }


}
