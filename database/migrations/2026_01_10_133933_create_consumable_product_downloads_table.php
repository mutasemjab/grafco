<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_product_downloads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumable_product_id');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('file_path');
            $table->string('file_type')->default('PDF');
            $table->string('file_size')->nullable();
            $table->date('updated_date')->nullable();
            $table->integer('sort_order')->default(0);
            $table->foreign('consumable_product_id')->references('id')->on('consumable_products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumable_product_downloads');
    }
};
