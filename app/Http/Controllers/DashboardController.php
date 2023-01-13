<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $pemesanan = Pemesanan::with('pengeluaran', 'hasillaut')->get();
        return view('dashboard.index', compact('pemesanan'));
    }
}
