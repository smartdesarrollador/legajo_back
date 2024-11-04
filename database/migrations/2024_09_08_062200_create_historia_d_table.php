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
        Schema::create('historia_d', function (Blueprint $table) {
            $table->id('id_historia');
        $table->unsignedBigInteger('id_documento')->nullable();
        $table->unsignedBigInteger('id_situacion')->nullable();
        $table->string('comentario', 500)->nullable()->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_historia')->references('id_historia')->on('historia')->onDelete('cascade');
        $table->foreign('id_documento')->references('id_documento')->on('documento')->onDelete('cascade');
        $table->foreign('id_situacion')->references('id_situacion')->on('situacion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historia_d');
    }
};
