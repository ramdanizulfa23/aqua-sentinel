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
        Schema::create('water_logs', function (Blueprint $table) {
            $table->id();
            $table->float('ph');           // Nilai pH
            $table->float('temp');         // Suhu Air
            $table->float('turbidity');    // Kekeruhan (optional)
            $table->string('status');      // 'Aman', 'Waspada', 'Bahaya'
            $table->timestamps();          // Ini otomatis nyatat waktu kirim
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_logs');
    }
};
