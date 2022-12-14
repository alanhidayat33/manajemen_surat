<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\disposisi;
use App\Models\JenisJabatan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
Use DB;

class SuratMasukController extends Controller
{
    /*
    * SURAT MASUK
    */
    //view surat masuk
    public function viewSm()
    {
        $dataSm = SuratMasuk::all();
        $dispo = disposisi::all();
        $jabatan = JenisJabatan::all();

        //menampilkan SM disposisi yg berhubungan dengan tujuan disposisi
        $id_user = Auth::user()->jenisJabatan_id;
        $result = SuratMasuk::whereHas('disposisi', function($query) use($id_user)
        {
            $query->where('tujuan', $id_user);
        })->get();

        $result2 = SuratMasuk::whereHas('disposisi', function($query) use($id_user)
        {
            $query->where('tujuan', $id_user);
        })->first();

        if(Auth::user()->type == 'Direktur' || Auth::user()->type == 'Wadir')
        {
            if($result2 == null){
                return view("surat-m.view-sm", compact('result','dataSm', 'result2')); 
            }
            else{
                $disp = $result[0]->id;
                $SM = disposisi::where('tujuan', Auth::user()->jenisJabatan_id )->get();
                return view("surat-m.view-sm", compact('result','SM'));   
            }
        }
        return view("surat-m.view-sm", compact('dataSm', 'result2')); 
        
    }

    //Input surat masuk
    public function inputSm()
    {
        $dataSm = JenisSurat::all();
        return view("surat-m.input-sm", ['data' => $dataSm]);
    }
    public function saveSm(Request $x)
    {
        //Validasi
        $messages = [
            'noSmasuk.required' => 'Nomor surat tidak boleh kosong!',
            'tglMasuk.required' => 'Tanggal surat tidak boleh kosong!',
            'pengirim.required' => 'Pengirim tidak boleh kosong!',
            'jenisSurat_id.required' => 'Perihal tidak boleh kosong!',
            'file.required' => 'File surat tidak boleh kosong!',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];
        $cekValidasi = $x->validate([
            'noSmasuk' => 'required',
            'tglMasuk' => 'required',
            'pengirim' => 'required',
            'jenisSurat_id' => 'required',
            'file' => 'mimes:pdf|max:2048',
        ], $messages);

        $file = $x->file('file');
        if (empty($file)) {

            SuratMasuk::create([
                'noSmasuk' => $x->noSmasuk,
                'tglMasuk' => $x->tglMasuk,
                'pengirim' => $x->pengirim,
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

            SuratMasuk::create([
                'noSmasuk' => $x->noSmasuk,
                'tglMasuk' => $x->tglMasuk,
                'pengirim' => $x->pengirim,
                'jenisSurat_id' => $x->jenisSurat_id,
                'filename' => $fileN,
                'file' => $pathPublic,
            ], $cekValidasi);
        }
        return redirect('/view-sm')->with('toast_success', 'Data berhasil tambah!');
    }

    //Edit surat masuk
    public function editSm($idSmasuk)
    {
        $dataJenis = JenisSurat::all();
        $dataSm = SuratMasuk::find($idSmasuk);
        return view("surat-m.edit-sm", ['data' => $dataSm], ['jenis' => $dataJenis]);
    }
 
    public function updateSm($idSmasuk, Request $x)
    {
        //Validasi
        $messages = [
            'noSmasuk.required' => 'Nomor surat tidak boleh kosong!',
            'tglMasuk.required' => 'Tanggal surat tidak boleh kosong!',
            'pengirim.required' => 'Pengirim tidak boleh kosong!',
            'jenisSurat_id.required' => 'Perihal tidak boleh kosong!',
            // 'file.required' => 'File surat tidak boleh kosong!',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];
        $cekValidasi = $x->validate([
            'noSmasuk' => 'required',
            'tglMasuk' => 'required',
            'pengirim' => 'required',
            'jenisSurat_id' => 'required',
            // 'file' => 'nullable|mimes:pdf|max:2048'
        ], $messages);

        $file = $x->file('file');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $fileN = $file->getClientOriginalName();
            $folder = 'file';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = SuratMasuk::where('id', $idSmasuk)->first();
            File::delete($data->file);
            SuratMasuk::where("id", "$idSmasuk")->update([
                'filename' => $fileN,
            ], $cekValidasi);
        } else {
            $path = $x->pathFile;
        }
        SuratMasuk::where("id", "$idSmasuk")->update([
            'noSmasuk' => $x->noSmasuk,
            'tglMasuk' => $x->tglMasuk,
            'pengirim' => $x->pengirim,
            'jenisSurat_id' => $x->jenisSurat_id,
            'file' => $path,

        ], $cekValidasi);
        return redirect('/view-sm')->with('toast_success', 'Data berhasil di update!');
    }

    //hapus surat masuk
    public function hapusSm($idSmasuk)
    {
        try {
            disposisi::where('sm_id', $idSmasuk)->delete();
            $data = SuratMasuk::where('id', $idSmasuk)->first();
            File::delete($data->file);
            disposisi::where('id', $idSmasuk)->delete();
            SuratMasuk::where('id', $idSmasuk)->delete();
            return redirect('/view-sm')->with('toast_success', 'Data berhasil di hapus!');
            
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/view-sm')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }

        //hapus File
    public function hapusFm($idSmasuk)
    {
        $data = SuratMasuk::where('id', $idSmasuk)->first();
        File::delete($data->file);
        SuratMasuk::where("id", "$idSmasuk")->update([
            'filename' => null,
            'file' => null
        ]);
        return redirect()->back()->with('toast_success', 'File berhasil di hapus!');
    }
}
