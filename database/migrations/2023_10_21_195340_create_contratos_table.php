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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id("id_contrato");
            $table->string("contrato", 100)->nullable();
            $table->unsignedBigInteger('id_empleador')->nullable();
            $table->foreign("id_empleador")->references("id_empleador")->on("empleadores")->onDelete("set null");
            $table->unsignedBigInteger('id_documento')->nullable();
            $table->foreign("id_documento")->references("id_documento")->on("documentos")->onDelete("set null");
            $table->date('fecha')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->unsignedBigInteger('id_estado_contrato')->nullable();
            $table->foreign("id_estado_contrato")->references("id_estado_contrato")->on("estado_contratos")->onDelete("set null");
            $table->unsignedBigInteger('id_modalidad')->nullable();
            $table->foreign("id_modalidad")->references("id_modalidad")->on("modalidades")->onDelete("set null");
            $table->unsignedBigInteger('id_tipo_contrato')->nullable();
            $table->foreign("id_tipo_contrato")->references("id_tipo_contrato")->on("tipo_contratos")->onDelete("set null");



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
