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
        Schema::create('permission_rol', function (Blueprint $table) {
            $table->id('id_permission_rol');
            $table->unsignedBigInteger("id_permission")->nullable();
            $table->foreign("id_permission")->references("id_permission")->on("permission")->onDelete("set null");
            $table->unsignedBigInteger("id_rol")->nullable();
            $table->foreign("id_rol")->references("id_rol")->on("roles")->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_rol');
    }
};
