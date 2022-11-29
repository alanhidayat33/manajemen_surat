<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\disposisi;
use App\Models\SuratMasuk;
use App\Models\JenisJabatan;
use App\Models\JenisSurat;
use PDF;


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
        // dd($x->tujuan);
        Disposisi::create([
            'catatan' => $x->catatan,
            'sifat' => $x->sifat,
            'tujuan' => $x->tujuan,
            'done' => 0,
            'read' => 0,
            'sm_id' => $x->sm_id,
        ]);
        return redirect()->back();
    }


    //ranah Direktur & Wadir
    public function inputDisp($id){
        $idDispo = disposisi::where('sm_id',$id)->first();
        $wadirU = ['UPT Perpustakaan', 'UPT Perjuangan', 'UPT Keuangan', 'UPT Kebajikan', 'UPT Keyakinan'];
        return view('disposisi.input-tanggap', ['wadirU' => $wadirU], ['data' => $idDispo ]);
    }

    public function updateDp($id,Request $x){
        disposisi::where('sm_id', $id)->where('tujuan', Auth::user()->jenisJabatan_id )->update([
            'tanggapan' => $x->tanggapan,
            'sebar' => json_encode($x->sebar),
            'read' => 1,
        ]);
        return redirect('/view-sm');
    }

    public function detailDp()
    {
        $data = JenisSurat::all();
        $pdf = PDF::loadview('view-jenis', compact('data'));
        return $pdf->stream();
    }
}
