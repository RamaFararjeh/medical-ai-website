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
        Schema::create('work', function (Blueprint $table) {
            $table->id();
            // items: array of { point: string, description: string }
            // example:
            // [
            //   {"point":"Collect symptoms","description":"Gather patient symptoms form."},
            //   {"point":"ML inference","description":"Run model to get predictions."}
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
        Schema::dropIfExists('work');
    }
};
