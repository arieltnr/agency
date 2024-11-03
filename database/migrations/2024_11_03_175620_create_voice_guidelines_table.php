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
        Schema::create('voice_guidelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('client_m_s')->cascadeOnDelete();
            $table->text('nada_suara')->nullable();
            $table->text('gaya_bahasa')->nullable();
            $table->text('intonasi_suasana')->nullable();
            $table->string('kategori_konten')->nullable();
            $table->text('persona_merek')->nullable();
            $table->text('bahasa_visual')->nullable();
            $table->text('panduan_respon')->nullable();
            $table->string('kosakata')->nullable();
            $table->string('kata_terlarang')->nullable();
            $table->string('adaptasi_platform')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voice_guidelines');
    }
};
