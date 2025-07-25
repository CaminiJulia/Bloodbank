<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('recipients', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->foreignId('blood_type_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}


    public function down(): void {
        Schema::dropIfExists('recipients');
    }
};
