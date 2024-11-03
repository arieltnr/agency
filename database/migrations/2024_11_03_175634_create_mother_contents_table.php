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
        Schema::create('mother_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('client_m_s')->cascadeOnDelete();
            $table->string('judul')->nullable();
            $table->string('tema')->nullable();
            $table->text('tujuan')->nullable();
            $table->date('waktu_mulai')->nullable();
            $table->date('waktu_selesai')->nullable();
            $table->string('pilar_konten')->nullable();
            $table->string('strategi_platform')->nullable();
            $table->string('target_kpi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mother_contents');
    }
};
