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
        Schema::create('content_blueprints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('client_m_s')->cascadeOnDelete();
            $table->foreignId('mother_content_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_post')->nullable();
            $table->string('platform')->nullable();
            $table->string('jenis_konten')->nullable();
            $table->string('pilar_konten')->nullable();
            $table->text('caption')->nullable();
            $table->text('tagar')->nullable();
            $table->text('kebutuhan_visual')->nullable();
            $table->text('kebutuhan_teks')->nullable();
            $table->string('status')->default('draft');
            $table->timestamp('waktu_terbit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_blueprints');
    }
};
