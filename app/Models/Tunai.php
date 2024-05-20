<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunai extends Model
{
    use HasFactory;

    protected $table = 'tunais';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nik_kk',
        'tgl_bantuan',
        'jumlah_dana',
        'keterangan'
    ];
}
