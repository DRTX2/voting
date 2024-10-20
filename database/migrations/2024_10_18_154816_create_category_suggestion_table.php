<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_suggestion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('suggestion_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('suggestion_id')->references('id')->on('suggestions');
            $table->unique(['category_id', 'suggestion_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_suggestion');
    }
};
