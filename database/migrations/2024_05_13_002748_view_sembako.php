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
            CREATE VIEW viewsembako AS
            SELECT DISTINCT
            sembakos.id,
            sembakos.nik_kk,
            penduduks.nama_kk,
            penduduks.jeniskelamin_kk,
            penduduks.pekerjaan_kk,
            penduduks.penghasilan_kk,
            penduduks.alamat_kk,
            sembakos.tgl_bantuan,
            sembakos.jenis_bantuan,
            sembakos.keterangan,
            sembakos.created_at,
            sembakos.updated_at
            FROM
            penduduks
            INNER JOIN
            sembakos
            ON
            penduduks.nik_kk = sembakos.nik_kk
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
