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
        Schema::create('user_card_progress', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('card_id')->constrained()->cascadeOnDelete();
    $table->integer('correct_answers')->default(0);
    $table->integer('incorrect_answers')->default(0);
    $table->float('confidence_level')->default(0.0); // Рівень впевненості 0-1
    $table->timestamp('last_reviewed_at')->nullable();
    $table->timestamp('next_review_at')->nullable();
    $table->boolean('is_learned')->default(false);
    $table->timestamps();
});
    }
 
    public function down(): void
    {
        Schema::dropIfExists('user_card_progress');
    }
};
