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
        Schema::create('feriado', function (Blueprint $table) {
            $table->id('id_feriado');
        $table->string('feriado', 200)->nullable();
        $table->unsignedBigInteger('id_anno')->nullable();
        $table->date('fecha')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feriado');
    }
};
