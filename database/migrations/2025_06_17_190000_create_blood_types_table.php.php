<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Criar a tabela 'blood_types'
        Schema::create('blood_types', function (Blueprint $table) {
            $table->id();
            $table->string('type', 3); // Tipo sanguíneo (exemplo: A+, O-, etc.)
            $table->timestamps();
        });

        // Inserir os tipos sanguíneos padrão
        DB::table('blood_types')->insert([
            ['type' => 'A+'],
            ['type' => 'A-'],
            ['type' => 'B+'],
            ['type' => 'B-'],
            ['type' => 'AB+'],
            ['type' => 'AB-'],
            ['type' => 'O+'],
            ['type' => 'O-'],
        ]);
    }

    public function down(): void {
        Schema::dropIfExists('blood_types');
    }
};
