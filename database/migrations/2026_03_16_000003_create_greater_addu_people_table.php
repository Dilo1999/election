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
        Schema::create('greater_addu_people', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 191)->unique();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('name_en');
            $table->string('name_dv')->nullable();
            $table->string('role_en')->nullable();
            $table->string('role_dv')->nullable();
            $table->text('bio1_en')->nullable();
            $table->text('bio1_dv')->nullable();
            $table->text('bio2_en')->nullable();
            $table->text('bio2_dv')->nullable();
            $table->json('social')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('greater_addu_people');
    }
};

