<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('blood_type_id')->constrained('blood_types')->onDelete('cascade');
            $table->date('birth_date');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('donors');
    }
};
