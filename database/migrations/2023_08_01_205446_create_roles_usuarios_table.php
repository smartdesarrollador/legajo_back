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
        Schema::create('roles_usuarios', function (Blueprint $table) {
            $table->id('id_rol_user');
            $table->unsignedBigInteger("id_rol")->nullable();
            $table->foreign("id_rol")->references("id_rol")->on("roles")->onDelete("set null");
            $table->unsignedBigInteger("id_user")->nullable();
            $table->foreign("id_user")->references("id")->on("users")->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_usuarios');
    }
};
