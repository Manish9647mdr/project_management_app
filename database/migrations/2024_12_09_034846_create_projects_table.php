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
        Schema::create('projects', function (Blueprint $table) {
            // Auto incrementing primary key
            $table->id();
            // Project name(string, max 255 characters by defaul)
            $table->string('name');
            // Detailed description of the project (long text)
            $table->longText('description');
            // Optional due date for the project
            $table->timestamp('due_date')->nullable();
            // Current status of the project
            $table->string('status');
            // Optional path to an image related to the project
            $table->string('image_path')->nullable();
            // Foreign key referencing the 'id' column in the 'users' table(creator)
            $table->foreignId('created_by')->constrained('users');
            // Foreign key referencing the 'id' column in the 'users' table (last updaer)
            $table->foreignId('updated_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
