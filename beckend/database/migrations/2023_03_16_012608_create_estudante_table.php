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
        Schema::create('estudante', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->string('email');
            // $table->string('endereco');
            $table->string('rua');
            $table->string('bairro');
            $table->string('numero');
            $table->string('complemento');
            $table->timestamps();
        });
    }
    // php artisan refresh att no banco os campos

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudante');
    }
};