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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cpf', 20)->unique();
            $table->string('rg', 20)->unique();
            $table->date('data_nascimento');
            $table->string('endereco', 255);
            $table->string('telefone', 20);
            $table->string('email', 100)->unique();
            $table->string('cargo', 100);
            $table->decimal('salario', 10, 2);
            $table->date('data_admissao');
            $table->date('data_demissao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
