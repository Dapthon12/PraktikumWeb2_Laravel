<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sembako extends Model
{
    use HasFactory;
    protected $table = 'sembakos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nik_kk',
        'tgl_bantuan',
        'jenis_bantuan',
        'keterangan'
    ];
}
