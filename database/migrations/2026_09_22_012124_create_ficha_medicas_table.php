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
        Schema::create('fichas_medicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->uuid('uuid')->unique();
            $table->string('nome_paciente');
            $table->string('foto_paciente')->nullable();
            $table->string('tipo_sanguineo');
            $table->text('alergias_graves')->nullable();
            $table->text('remedios_uso_continuo')->nullable();
            $table->string('nome_contato_emergencia_1');
            $table->string('telefone_contato_emergencia_1');
            $table->string('nome_contato_emergencia_2')->nullable();
            $table->string('telefone_contato_emergencia_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas_medicas');
    }
};
