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
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->string("name", 20);
            $table->string("description", 70);
            $table->dateTime("time");

            // Usar foreignId para simplificar la declaración
            $table->foreignId("proposal_id")->constrained("proposals")->onDelete("cascade");
            $table->foreignId("guest_id")->constrained("guests")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestions');
    }
};
