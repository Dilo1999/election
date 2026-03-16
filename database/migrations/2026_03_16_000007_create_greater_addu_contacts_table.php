<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('greater_addu_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('email_en')->nullable();
            $table->string('email_dv')->nullable();
            $table->string('phone_en')->nullable();
            $table->string('phone_dv')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_dv')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('x_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('greater_addu_contacts');
    }
};

