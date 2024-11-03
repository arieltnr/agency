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
        Schema::create('visual_guidelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('client_m_s')->cascadeOnDelete();
            $table->string('file_logo')->nullable();
            $table->string('palet_warna')->nullable();
            $table->text('nada_suasana')->nullable();
            $table->string('tipografi')->nullable();
            $table->text('ikon_elemen')->nullable();
            $table->string('preset_filter')->nullable();
            $table->text('gaya_fotografi')->nullable();
            $table->text('konsistensi_platform')->nullable();
            $table->text('ringkasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visual_guidelines');
    }
};
