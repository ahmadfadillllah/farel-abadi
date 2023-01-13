<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class CetakStrukController extends Controller
{
    public function index()
    {
        $struk = Pengeluaran::where('status', 'Success')->get();
        return view('cetak_struk.index', compact('struk'));
    }
}
