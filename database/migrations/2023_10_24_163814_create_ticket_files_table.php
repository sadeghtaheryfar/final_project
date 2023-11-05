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
        Schema::create('ticket_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_path');
            $table->bigInteger('file_size')->default(null)->nullable();
            $table->string('file_type')->default(null)->nullable();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('ticket_id')->constrained('tickets')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_files');
    }
};
