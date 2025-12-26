<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique(); // لو Guest ممكن تكون null
            $table->string('phone')->nullable();

            $table->string('password')->nullable(); // Guest => null
            $table->rememberToken();

            $table->timestamp('last_login_at')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
