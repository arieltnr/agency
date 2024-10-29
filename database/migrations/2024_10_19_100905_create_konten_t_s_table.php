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
        Schema::create('konten_t_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('client_m_s')->cascadeOnDelete();
            $table->string('konten_nama');
            $table->string('konten_type');
            $table->text('copywriting')->nullable();
            $table->text('caption')->nullable();
            $table->text('cover')->nullable();
            $table->text('gambar1')->nullable();
            $table->text('gambar2')->nullable();
            $table->text('gambar3')->nullable();
            $table->text('gambar4')->nullable();
            $table->text('konten_video')->nullable();
            $table->timestamp('tglposting')->nullable();
            $table->boolean('aktivasi')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_t_s');
    }
};
