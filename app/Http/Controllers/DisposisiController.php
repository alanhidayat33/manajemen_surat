<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\disposisi;
use App\Models\SuratMasuk;
use App\Models\JenisJabatan;


class DisposisiController extends Controller
{
    public function viewDp($id)
    {
        $smasuk = SuratMasuk::find($id);
        $data = disposisi::where('sm_id', $id)->get();
        return view("disposisi.view-disposisi", ['smasuk' => $smasuk], ['dispo' => $data]);
    }

    public function inputDp($id)
    {
        $jabatan = JenisJabatan::all();
        $smasuk = SuratMasuk::find($id);
        return view('disposisi.input-disposisi',['jenis' => $jabatan],['smasuk' => $smasuk]);
    }

    public function saveDp(Request $x)
    {
        Disposisi::create([
            'tujuan' => $x->tujuan,
            'catatan' => $x->catatan,
            'sifat' => $x->sifat,
            'done' => 0,
            'read' => 0,
            'sm_id' => $x->sm_id,
            'users_id' => Auth::id(),
        ]);
        return redirect()->back();
    }

    public function inputDisp(){
        $wadirU = ['UPT Perpustakaan', 'UPT Perjuangan'];
        return view('disposisi.input-tanggap', ['data' => $wadirU]);
    }


}
