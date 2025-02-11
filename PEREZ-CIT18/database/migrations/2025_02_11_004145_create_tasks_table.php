<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id(); // Auto-incrementing primary key (big integer)
        $table->string('title'); // Title of the task
        $table->text('description')->nullable(); // Optional description (nullable means it can be empty)
        $table->boolean('is_completed')->default(false); // Boolean to track completion status, default false
        $table->timestamps(); // Automatically adds `created_at` and `updated_at`
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
