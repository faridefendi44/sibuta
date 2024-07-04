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
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('asal_instansi');
            $table->string('tanggal_bertamu');
            $table->string('jam_bertamu');
            $table->string('email');
            $table->string('no_wa');
            $table->string('target_tamu');
            $table->string('keperluan');
            $table->string('catatan')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamus');
    }
};
