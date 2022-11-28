<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisJabatan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "jenis_jabatan";
    protected $primaryKey = "id";
    protected $guarded = ['id'];
    protected $fillable = ["kodeJabatan"];

    public function Users(){
        return $this->hasMany(User::class, 'jenisJabatan_id');
    }

    public function disposisi(){
        return $this->hasMany(disposisi::class, 'tujuan');
    }
}
