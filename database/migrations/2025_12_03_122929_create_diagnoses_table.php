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
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // لو حابة تربطيه بمستخدم معيّن
            $table->integer('age');
            $table->enum('gender', ['male','female','other']);

            $table->integer('duration')->nullable();   // من الفورم عندك
            $table->integer('severity')->nullable();   // من الفورم عندك

            $table->string('risk')->nullable();        // low / moderate / high
            $table->string('top_disease')->nullable(); // أعلى مرض من الـ AI
            $table->float('top_probability')->nullable(); // بين 0 و 1

            $table->json('predictions')->nullable();   // كل جدول الـ AI Suggestions (disease + prob + نصائح)
            $table->text('notes')->nullable();         // ملاحظات المستخدم إن وجدت

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnoses');
    }
};
