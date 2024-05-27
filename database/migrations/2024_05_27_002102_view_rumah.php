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
            CREATE VIEW viewrumah AS
            SELECT DISTINCT
            rumahs.id,
            rumahs.nik_kk,
            penduduks.nama_kk,
            penduduks.jeniskelamin_kk,
            penduduks.pekerjaan_kk,
            penduduks.penghasilan_kk,
            penduduks.alamat_kk,
            rumahs.tgl_bantuan,
            rumahs.jumlah_dana,
            rumahs.keterangan,
            rumahs.created_at,
            rumahs.updated_at
            FROM
            penduduks
            INNER JOIN
            rumahs
            ON
            penduduks.nik_kk = rumahs.nik_kk
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
