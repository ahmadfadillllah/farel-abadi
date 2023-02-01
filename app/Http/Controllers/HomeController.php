<?php

namespace App\Http\Controllers;

use App\Models\HasilLaut;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $kategori = Kategori::all();
        $hasillaut = HasilLaut::with('kategori')->get();
        return view('home.index', compact('hasillaut', 'kategori'));
    }
}
