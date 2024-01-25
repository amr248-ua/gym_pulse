<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->float('saldo')->default(0);
            $table->boolean('webmaster')->default(false);
            $table->boolean('recepcionista')->default(false);
            $table->boolean('socio')->default(false);
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('codigo_postal');
            $table->string('direccion');
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('dni')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
