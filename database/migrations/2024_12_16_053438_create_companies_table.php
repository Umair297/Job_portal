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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 

            $table->text('name');
            $table->text('email')->nullable();
            $table->text('website')->nullable();
            $table->text('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();

            $table->text('category')->nullable(); 
            $table->text('industry')->nullable(); 
            $table->text('employees')->default(0);
            $table->text('description')->nullable();

            $table->text('linkedin_url')->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('twitter_url')->nullable();
            $table->text('instagram_url')->nullable();

            $table->text('services')->nullable();

            $table->text('certifications')->nullable(); 
            $table->text('awards')->nullable(); 
            $table->text('registration_number')->nullable(); 
            $table->text('logo')->nullable();

            // Timestamps
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
