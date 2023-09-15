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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('introduction');
            $table->text('image');
            $table->decimal('price', 20, 3);
            $table->tinyInteger('status')->default(1);
            //قابل فروش هست یا نه
            $table->tinyInteger('marketable')->default(1)->comment('1 => marketable, 0 => is not marketable');
            //تعداد فروخته شده
            $table->tinyInteger('sold_number')->default(0);
            $table->foreignId('category_id')->constrained('product_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
