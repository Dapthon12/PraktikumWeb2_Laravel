<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW viewtunai AS
            SELECT DISTINCT
            tunais.id,
            tunais.nik_kk,
            penduduks.nama_kk,
            penduduks.jeniskelamin_kk,
            penduduks.pekerjaan_kk,
            penduduks.penghasilan_kk,
            penduduks.alamat_kk,
            tunais.tgl_bantuan,
            tunais.jumlah_dana,
            tunais.keterangan,
            tunais.created_at,
            tunais.updated_at
            FROM
            penduduks
            INNER JOIN
            tunais
            ON
            penduduks.nik_kk = tunais.nik_kk
            ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
