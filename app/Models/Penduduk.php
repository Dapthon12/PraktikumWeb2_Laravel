<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduks';

    protected $primaryKey = 'nik_kk';

    protected $fillable = [
        'nik_kk',
        'nama_kk',
        'jeniskelamin_kk',
        'tgllahir_kk',
        'pendidikan_kk',
        'pekerjaan_kk',
        'penghasilan_kk',
        'alamat_kk'
    ];
}
