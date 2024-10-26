<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssesoriesTable extends Migration
{
    public function up()
    {
        Schema::create('assesories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('email');
            $table->datetime('date'); // Changed from 'date' to 'datetime' to support date and time
            $table->integer('duration');
            $table->unsignedBigInteger('id_sede');
            $table->unsignedBigInteger('category_id'); // Foreign key for the category
            $table->timestamps();

            // Add foreign key constraint for category
            $table->foreign('category_id')->references('id')->on('categorias');
        });

        // Pivot table for the many-to-many relationship between asesors and assesories
        Schema::create('asesor_assesory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asesor_id');
            $table->unsignedBigInteger('assesory_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('asesor_id')->references('id')->on('asesors')->onDelete('cascade');
            $table->foreign('assesory_id')->references('id')->on('assesories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asesor_assesory');
        Schema::dropIfExists('assesories');
    }
}
