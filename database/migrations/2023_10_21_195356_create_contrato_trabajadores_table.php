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
        Schema::create('contrato_trabajadores', function (Blueprint $table) {
            $table->id("id_contrato_trabajadores");
            $table->unsignedBigInteger('id_trabajador')->nullable();
            $table->foreign("id_trabajador")->references("id_trabajador")->on("trabajadores")->onDelete("set null");
            $table->unsignedBigInteger('id_contrato')->nullable();
            $table->foreign("id_contrato")->references("id_contrato")->on("contratos")->onDelete("set null");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrato_trabajadores');
    }
};
