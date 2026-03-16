<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('greater_addu_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('hashtag_en')->nullable();
            $table->string('hashtag_dv')->nullable();
            $table->string('header_en');
            $table->string('header_dv')->nullable();
            $table->string('sub_en')->nullable();
            $table->string('sub_dv')->nullable();
            $table->string('intro_en')->nullable();
            $table->string('intro_dv')->nullable();
            $table->text('history_en')->nullable();
            $table->text('history_dv')->nullable();
            $table->text('challenge_en')->nullable();
            $table->text('challenge_dv')->nullable();
            $table->string('question_en')->nullable();
            $table->string('question_dv')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('vision_dv')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('greater_addu_heroes');
    }
};

