<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string("username", 20);
            $table->string("email", 30)->unique();
            $table->foreignId('candidate_id')->nullable()->constrained('candidates')->onDelete('restrict'); // Esto establece la relación
            $table->timestamp('voted_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
