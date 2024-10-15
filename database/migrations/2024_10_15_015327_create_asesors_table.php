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
        Schema::create('asesors', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('correo', 50); // Email field with max length 50
            $table->string('nombre', 100); // Name field with max length 100
            $table->timestamps(); // Laravel's created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesors');
    }
};
