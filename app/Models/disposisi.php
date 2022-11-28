<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disposisi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "disposisi";
    protected $primaryKey = "id";
    protected $guarded = ['id'];

    public function SuratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'sm_id');
    }

    public function jenisJabatan(){
        return $this->belongsTo(JenisJabatan::class, 'tujuan');
    }
}
