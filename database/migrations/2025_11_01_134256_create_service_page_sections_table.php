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
        Schema::create('service_page_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_page_id');
            $table->string('photo');
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_en');
            $table->text('description_ar');
            $table->json('features_en')->nullable();
            $table->json('features_ar')->nullable();
            $table->boolean('image_right')->default(false);
            $table->integer('order')->default(0);
            $table->foreign('service_page_id')->references('id')->on('service_pages')->onDelete('cascade');
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
        Schema::dropIfExists('service_page_sections');
    }
};
