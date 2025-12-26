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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->string('name', 190);
            $table->string('specialty', 190)->nullable();
            $table->unsignedTinyInteger('age')->nullable();
            $table->enum('gender', ['male','female','other'])->nullable();

            $table->string('email', 190)->nullable();
            $table->string('phone', 50)->nullable();

            $table->unsignedTinyInteger('years_experience')->nullable();
            $table->string('photo')->nullable(); // path to stored image
            $table->text('bio')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['name','specialty']);
            $table->index('email');
            $table->index('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
