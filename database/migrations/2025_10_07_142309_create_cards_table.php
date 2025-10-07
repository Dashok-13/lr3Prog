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
        Schema::create('cards', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('category_id')->constrained()->cascadeOnDelete();
    $table->string('front_text');  
    $table->text('back_text');  
    $table->string('example_sentence')->nullable(); 
    $table->string('pronunciation')->nullable();  
    $table->string('image_url')->nullable();  
    $table->string('audio_url')->nullable();  
    $table->integer('difficulty_level')->default(1);  
    $table->timestamp('next_review_at')->nullable(); 
    $table->boolean('is_public')->default(false);  
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
