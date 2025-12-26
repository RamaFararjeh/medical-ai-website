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
        Schema::create('process', function (Blueprint $table) {
            $table->id();

            // items: array of { title: string, description: string }
            // example:
            // [
            //   {"title":"Collect Symptoms","description":"Patient enters symptoms via form."},
            //   {"title":"AI Inference","description":"Run ML model and get ranked diseases."}
            // ]
            $table->json('items')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process');
    }
};
