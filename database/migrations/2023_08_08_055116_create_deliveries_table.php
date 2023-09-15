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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
             //مثلا می خواهیم بگوییم پست دو روز طول می کشد:
            // name=post
            //delivery_time=2
            //delivery_time_unit= روز
            $table->string('name');
            $table->decimal('amount', 20, 3)->nullable();
            $table->integer('delivery_time')->nullable();
            $table->string('delivery_time_unit')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
};
