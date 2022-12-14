<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\JenisJabatan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
Use DB;

class SuratKeluarController extends Controller
{

    /*
    * SURAT KELUAR
    */
    //view surat keluar
    public function viewSk()
    {
        $dataSk = SuratKeluar::all();
        if(Auth::user()->type == 'Maha' || Auth::user()->type == 'Dosen')
        {
            $dataSk = SuratKeluar::where('tujuan', Auth::user()->name)->get();
            return view("surat-k.view-sk", ['data' => $dataSk]);
        }
        return view("surat-k.view-sk", ['data' => $dataSk]);
    }

    //Input surat keluar
    public function inputSk()
    {
        $jenisSurat = JenisSurat::all();
        return view("surat-k.input-sk", ['data' => $jenisSurat]);
    }
    public function saveSk(Request $x)
    {
        //Validasi
        $messages = [
            'noSkeluar.required' => 'Nomor surat tidak boleh kosong!',
            'tglKeluar.required' => 'Tanggal surat tidak boleh kosong!',
            'asal.required' => 'Asal tidak boleh kosong!',
            'tujuan.required' => 'Tujuan tidak boleh kosong!',
            'jenisSurat_id.required' => 'Perihal tidak boleh kosong!',
            // 'file.required' => 'File surat tidak boleh kosong!',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];
        $cekValidasi = $x->validate([
            'noSkeluar' => 'required',
            'tglKeluar' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'jenisSurat_id' => 'required',
            'file' => 'mimes:pdf|max:2048'
        ], $messages);

        $file = $x->file('file');
        if (empty($file)) {
            SuratKeluar::create([
                'noSkeluar' => $x->noSkeluar,
                'tglKeluar' => $x->tglKeluar,
                'asal' => $x->asal,
                'tujuan' => $x->tujuan,
                'jenisSurat_id' => $x->jenisSurat_id,
            ], $cekValidasi);
        } else {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $fileN = $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $patAsli = $file->getRealPath();
            $namaFolder = 'file';
            $file->move($namaFolder, $nama_file);
            $pathPublic = $namaFolder . "/" . $nama_file;

            SuratKeluar::create([
                'noSkeluar' => $x->noSkeluar,
                'tglKeluar' => $x->tglKeluar,
                'asal' => $x->asal,
                'tujuan' => $x->tujuan,
                'jenisSurat_id' => $x->jenisSurat_id,
                'filename' => $fileN,
                'file' => $pathPublic,
            ], $cekValidasi);
        }
        return redirect('/view-sk')->with('toast_success', 'Data berhasil tambah!');
    }

    //Edit surat keluar
    public function editSk($idSkeluar)
    {
        $dataJenis = JenisSurat::all();
        $dataSk = SuratKeluar::find($idSkeluar);
        return view("surat-k.edit-sk", ['data' => $dataSk], ['jenis' => $dataJenis]);
    }
    public function updateSk($idSkeluar, Request $x)
    {
        //Validasi
        $messages = [
            'noSkeluar.required' => 'Nomor surat tidak boleh kosong!',
            'tglKeluar.required' => 'Tanggal surat tidak boleh kosong!',
            'tujuan.required' => 'Tujuan tidak boleh kosong!',
            'jenisSurat_id.required' => 'Perihal tidak boleh kosong!',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];
        $cekValidasi = $x->validate([
            'noSkeluar' => 'required',
            'tglKeluar' => 'required',
            'tujuan' => 'required',
            'jenisSurat_id' => 'required',
            'file' => 'mimes:pdf|max:2048'
        ], $messages);

        $file = $x->file('file');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $fileN = $file->getClientOriginalName();
            $folder = 'file';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = SuratKeluar::where('id', $idSkeluar)->first();
            File::delete($data->file);
            SuratKeluar::where("id", "$idSmasuk")->update([
                'filename' => $fileN,
            ], $cekValidasi);
        } else {
            $path = $x->pathFile;
        }
        SuratKeluar::where("id", "$idSkeluar")->update([
            'noSkeluar' => $x->noSkeluar,
            'tglKeluar' => $x->tglKeluar,
            'asal' => $x->asal,
            'tujuan' => $x->tujuan,
            'jenisSurat_id' => $x->jenisSurat_id,
            'file' => $path,

        ], $cekValidasi);
        return redirect('/view-sk')->with('toast_success', 'Data berhasil di update!');
    }

    //hapus surat masuk
    public function hapusSk($idSkeluar)
    {
        try {
            $data = SuratKeluar::where('id', $idSkeluar)->first();
            File::delete($data->file);
            SuratKeluar::where('id', $idSkeluar)->delete();
            return redirect('/view-sk')->with('toast_success', 'Data berhasil di hapus!');
            
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/view-sk')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }

    public function hapusFm($idSkeluar)
    {
        $data = SuratKeluar::where('id', $idSkeluar)->first();
        File::delete($data->file);
        SuratKeluar::where("id", "$idSkeluar")->update([
            'filename' => null,
            'file' => null,
        ]);
        return redirect()->back()->with('toast_success', 'File berhasil di hapus!');
    }

}
