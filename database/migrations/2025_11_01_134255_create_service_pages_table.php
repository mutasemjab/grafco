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
      Schema::create('service_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // software, appointment, parts
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('subtitle_en')->nullable();
            $table->text('subtitle_ar')->nullable();
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('service_pages');
    }
};
