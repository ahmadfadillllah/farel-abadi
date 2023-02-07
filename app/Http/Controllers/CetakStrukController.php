<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class CetakStrukController extends Controller
{
    public function index()
    {
        $struk = Pengeluaran::with('hasillaut', 'pemesanan')->where('status', 'Success')->get();
        // dd($struk);
        return view('cetak_struk.index', compact('struk'));
    }

    public function show(Request $request)
    {
        $struk = Pemesanan::with('hasillaut', 'pengeluaran')->where('pengeluaran_id', $request->query('pengeluaran_id'))->get();
        return response()->json($struk, 200);
    }
}
