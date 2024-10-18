<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_proposal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('proposal_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('proposal_id')->references('id')->on('proposals');
            $table->unique(['category_id', 'proposal_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_proposal');
    }
};
