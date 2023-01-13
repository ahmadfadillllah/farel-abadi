<?php

namespace App\Http\Controllers;

use App\Models\HasilLaut;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $hasillaut = HasilLaut::with('kategori')->get();
        return view('home.index', compact('hasillaut'));
    }
}
