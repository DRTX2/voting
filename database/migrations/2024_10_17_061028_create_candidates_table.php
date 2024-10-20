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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name",20);
            $table->string("position",20);
            $table->string("experience",50);
            $table->string("education",50);
            $table->string("description",50);
            $table->unsignedBigInteger("faculty_id");
            $table->foreign("faculty_id")->references("id")->on("faculties");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
