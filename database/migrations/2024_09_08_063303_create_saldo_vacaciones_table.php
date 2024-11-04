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
        Schema::create('saldo_vacaciones', function (Blueprint $table) {
            $table->id('id_saldo_vacaciones');
        $table->unsignedBigInteger('id_trabajador')->nullable();
        $table->string('anno', 20)->nullable();
        $table->integer('dias_acumulados')->nullable();
        $table->integer('dias_vencidos')->nullable();
        $table->integer('dias_usados')->nullable();
        $table->integer('saldo_vacaciones')->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saldo_vacaciones');
    }
};
