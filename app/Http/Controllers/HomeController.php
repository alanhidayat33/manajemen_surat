<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //count surat
        $data2 = User::count();
        $keluar = SuratKeluar::count();
        $suratMasuk = SuratMasuk::count();
        $total = $keluar + $suratMasuk;
        //Take Surat
        $dataSm = SuratMasuk::all();

        $data = [$data2, $keluar, $suratMasuk, $total, $dataSm];
        return view("home",['data'=>$data] );
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('/login');
    }
}
