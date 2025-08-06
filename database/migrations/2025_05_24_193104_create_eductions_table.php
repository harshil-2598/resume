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
        Schema::create('eductions', function (Blueprint $table) {
            $table->id();

            // Foreign key to users table
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // Education fields
            $table->string('school_name')->nullable();
            $table->string('school_location')->nullable();
            $table->string('degree')->nullable();
            $table->string('study_field')->nullable();
            $table->string('passing_year')->nullable();

            $table->softDeletes(); // use softDeletes() instead of softDeletesTz for common use case
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eductions');
    }
};
