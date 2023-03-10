<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('profile.index');
    }

    public function change_information(Request $request)
    {
        try {
            User::where('id', Auth::user()->id)->update([
                'email' => $request->email,
                'name' => $request->name,
                'no_hp' => $request->no_hp,
            ]);

            return redirect()->back()->with('success', 'Informasi telah diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Informasi gagal diupdate');
        }
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password_sekarang' => ['required', 'min:8'],
            'password_baru' => ['required', 'min:8'],
        ],
        [
            'password_sekarang.min' => 'Password sekarang minimal 8 karakter',
            'password_baru.min' => 'Password baru minimal 8 karakter',
        ]);

        if(!Hash::check($request->password_sekarang, auth()->user()->password)){
            return back()->with("info", "Password sekarang salah");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return back()->with("success", "Password telah diubah");
    }

    public function change_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required','mimes:png,jpg,jpeg,JPG',
        ]);

        $date = date('Ymd His gis');

        try {
            $produk = User::find(Auth::user()->id);

            if($request->hasFile('avatar')){
                $request->file('avatar')->move('admin/mophy.dexignzone.com/xhtml/images/avatar/', $date.$request->file('avatar')->getClientOriginalName());
                $produk->avatar = $date.$request->file('avatar')->getClientOriginalName();
                $produk->save();
            }

            return redirect()->back()->with('success', 'Avatar telah diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Avatar gagal diupdate');
        }
    }
}
