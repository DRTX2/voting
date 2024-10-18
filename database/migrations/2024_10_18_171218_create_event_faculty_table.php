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
        Schema::create('event_faculty', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->foreignId('faculty_id')->constrained('faculties')->onDelete('cascade');

            // Asegúrate de que la columna que deseas incluir aquí existe en la tabla
            // Aquí asumo que solo necesitas la combinación de event_id y faculty_id para la clave única.
            $table->unique(['event_id', 'faculty_id']); // Cambié category_id a faculty_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_faculty');
    }
};
