<?php

namespace App\Http\Controllers;

use App\Models\HasilLaut;
use App\Models\Pemasukan;
use App\Models\Pemesanan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PemesananController extends Controller
{
    public function index($id)
    {
        $pengeluaran = Pengeluaran::whereId($id)->first();
        $pemesanan = Pemesanan::with('pengeluaran', 'hasillaut')->where('pengeluaran_id', $id)->get();
        $pengeluaranById = Pengeluaran::whereId($id)->select('id')->first()->toArray();
        $hasillaut = HasilLaut::with('kategori')->where('status', 'Tersedia')->get();

        $total = $pemesanan->sum('total');

        if($total == NULL){
            $total = 1;
        }else{
            $total = $pemesanan->sum('total');
        }

        \Midtrans\Config::$serverKey = 'SB-Mid-server-5aQABsAA0KihdYoBHSk1kgPy';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => $pengeluaran->nama_pembeli,
                'email' => $pengeluaran->email,
                'phone' => $pengeluaran->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('pemesanan.index', compact('pengeluaran', 'pemesanan', 'hasillaut', 'total', 'snapToken', 'pengeluaranById'));
    }

    public function show_data(Request $request)
    {
        $hasillaut = HasilLaut::where('id', $request->query('hasillaut_id'))->first();
        return response()->json($hasillaut, 200);
    }

    public function insert(Request $request)
    {
        $banyaknya_conv = Str::replace(',', '.', $request->banyaknya);
        $harga_conv = Str::replace('Rp', '', $request->harga);
        $harga_conv2 = Str::replace('.', '', $harga_conv);

        if($request->sisa_stok < 0){
            return redirect()->back()->with('info', 'Sisa stok dibawah 0');
        }

        Pengeluaran::whereId($request->pengeluaran_id)->update([
            'status' => 'Pending',
        ]);

        HasilLaut::whereId($request->hasillaut_id)->update([
            'stok' => $request->sisa_stok,
        ]);

        Pemesanan::create([
            'pengeluaran_id' => $request->pengeluaran_id,
            'hasillaut_id' => $request->hasillaut_id,
            'banyaknya' => $banyaknya_conv,
            'harga' => $harga_conv2,
            'total'=> $banyaknya_conv * $harga_conv2
        ]);

        return redirect()->back()->with('success', 'Berhasil masuk ke nota');
    }

    public function success(Request $request)
    {
        try {
            foreach($request->idPemesanan as $key=>$value){
                $pemesanan = Pengeluaran::find($request->idPemesanan[$key]);
                $pemesanan->status = $request->status;
                $pemesanan->save();
            }
            return json_encode([
                'status' => 'success',
                'kode' => 200,
                'dataPemesanan' => $pemesanan
            ]);
        } catch (\Throwable $th) {
            return json_encode([
                'status' => 'success',
                'kode' => 500,
                'message' => $pemesanan
            ]);
        }
    }

    public function ditunda(Request $request)
    {
        try {
            foreach($request->idPemesanan as $key=>$value){
                $pemesanan = Pengeluaran::find($request->idPemesanan[$key]);
                $pemesanan->status = $request->status;
                $pemesanan->save();
            }
            return json_encode([
                'status' => 'success',
                'kode' => 200,
                'dataPemesanan' => $pemesanan
            ]);
        } catch (\Throwable $th) {
            return json_encode([
                'status' => 'success',
                'kode' => 500,
                'message' => $pemesanan
            ]);
        }
    }

    public function tunai($id)
    {
        try {
            Pengeluaran::where('id', $id)->update(['status' => 'Success']);

            return redirect()->route('pengeluaran.index')->with('success', 'Pembayaran tunai telah berhasil');
        } catch (\Throwable $th) {
            return redirect()->route('pengeluaran.index')->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Pemesanan::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Item telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
