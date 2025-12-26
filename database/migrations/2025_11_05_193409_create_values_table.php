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
        Schema::create('values', function (Blueprint $table) {
            $table->id();

            // items: an array of { point: string, description: string }
            // example:
            // [
            //   {"point":"Fast diagnosis","description":"Get quick AI-powered assessments."},
            //   {"point":"Privacy","description":"We don't store personal health data."}
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
        Schema::dropIfExists('values');
    }
};
