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

    public function Users(){
        return $this->hasMany(User::class, 'jenisJabatan_id');
    }
}
