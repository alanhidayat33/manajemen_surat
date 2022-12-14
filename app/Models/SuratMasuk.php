<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "surat_masuk";
    protected $primaryKey = "id";
    protected $fillable = ["noSmasuk","tglMasuk","pengirim","file","filename","jenisSurat_id","done","ringkasan"];
    //protected $fillable = ["noSmasuk","pengirim","file","jenisSurat_id"];

    public function jenisSurat(){
        return $this->belongsTo(jenisSurat::class, 'jenisSurat_id');
    }

    public function disposisi(){
        return $this->hasMany(disposisi::class, 'sm_id');
    }
}
