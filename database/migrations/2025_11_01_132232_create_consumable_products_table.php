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
        Schema::create('consumable_products', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('name_en');
            $table->string('name_ar');
            $table->unsignedBigInteger('consumable_id');
            $table->foreign('consumable_id')->references('id')->on('consumables')->onDelete('cascade');
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
        Schema::dropIfExists('consumable_products');
    }
};
