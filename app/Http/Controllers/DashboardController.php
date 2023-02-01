<?php

namespace App\Http\Controllers;

use App\Models\HasilLaut;
use App\Models\Kategori;
use App\Models\Pemasukan;
use App\Models\Pemesanan;
use App\Models\Pengeluaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $pemesanan = Pemesanan::with('pengeluaran', 'hasillaut')->paginate(5);
        $kategori = Kategori::all();
        $hasillaut = HasilLaut::all();
        $pemasukan = Pemasukan::all();
        $pengeluaran = Pengeluaran::all();

        $cek_pemasukan = Pemasukan::whereMonth('created_at', date('m'))->get()->count();
        $cek_pengeluaran = Pengeluaran::whereMonth('created_at', date('m'))->get()->count();
        $cek_pemesanan = Pemesanan::whereMonth('created_at', date('m'))->get()->count();

        $cek_pemasukan_total = Pemasukan::whereMonth('created_at', date('m'))->sum('total');
        $cek_pemesanan_total = Pemesanan::whereMonth('created_at', date('m'))->sum('total');

        $data = [
            $cek_pemasukan,
            $cek_pengeluaran,
            $cek_pemesanan
        ];


        $hasil = response()->json($data, 200);

        return view('dashboard.index', compact(
            'pemesanan',
            'kategori',
            'hasillaut',
            'pemasukan',
            'pengeluaran',
            'data',
            'cek_pemasukan_total',
            'cek_pemesanan_total'
        ));
    }
}
