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
            $table->string("username",20);
            $table->string("email",30)->unique();
            $table->unsignedBigInteger('candidate_id')->nullable()->index();
            $table->foreignId('candidate_id')->references('id')->on("candidates")->onDelete("restrict");
            $table->timestamp('voted_at')->default(DB::raw('CURRENT_TIMESTAMP'));;
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
