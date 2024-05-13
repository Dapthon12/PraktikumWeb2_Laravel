<?php

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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->string('nik_kk', 16)->primary();
            $table->string('nama_kk');
            $table->string('jeniskelamin_kk');
            $table->date('tgllahir_kk');
            $table->string('pendidikan_kk');
            $table->string('pekerjaan_kk');
            $table->string('penghasilan_kk');
            $table->string('alamat_kk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
