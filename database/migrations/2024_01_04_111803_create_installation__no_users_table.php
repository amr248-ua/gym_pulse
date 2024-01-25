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
        Schema::create('installation__no_users', function (Blueprint $table) {
            $table->id();
            $table->integer('duracion');
            $table->foreignId('installation_id')->constrained()->onDelete('cascade');
            $table->foreignId('no_user_id')->constrained()->onDelete('cascade');
            $table->foreignId('calendar_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('installation__no_users');
    }
};
