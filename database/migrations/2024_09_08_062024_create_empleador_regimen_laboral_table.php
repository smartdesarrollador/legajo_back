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
        Schema::create('empleador_regimen_laboral', function (Blueprint $table) {
            $table->id('id_empleador');
        $table->unsignedBigInteger('id_regimen_laboral')->nullable();
        $table->string('empleador_regimen_laboral', 200)->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        $table->foreign('id_regimen_laboral')->references('id_regimen_laboral')->on('regimen_laboral')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleador_regimen_laboral');
    }
};
