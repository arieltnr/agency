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
        Schema::create('client_onboardings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('client_m_s')->cascadeOnDelete();
            $table->string('slogan')->nullable();
            $table->string('kategori_produk')->nullable();
            $table->string('produk_unggulan')->nullable();
            $table->string('tujuan_sosmed')->nullable();
            $table->string('target_usia')->nullable();
            $table->string('target_gender')->nullable();
            $table->string('target_profesi')->nullable();
            $table->string('target_pendapatan')->nullable();
            $table->string('platform_prioritas')->nullable();
            $table->string('gaya_komunikasi')->nullable();
            $table->string('gaya_visual')->nullable();
            $table->string('nada_bahasa')->nullable();
            $table->boolean('kampanye_sebelumnya')->nullable();
            $table->string('perasaan_diinginkan')->nullable();
            $table->text('merek_inspirasi')->nullable();
            $table->boolean('panduan_warna')->nullable();
            $table->string('representasi_visual')->nullable();
            $table->text('variasi_logo')->nullable();
            $table->string('elemen_grafis')->nullable();
            $table->string('filter_visual')->nullable();
            $table->string('konsistensi_visual')->nullable();
            $table->string('nama_admin')->nullable();
            $table->string('nama_audiens')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_onboardings');
    }
};
