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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('bn_heading')->nullable();
            $table->string('sub_heading');
            $table->string('bn_sub_heading')->nullable();
            $table->string('slider_image');
            $table->string('cta_text');
            $table->string('bn_cta_text')->nullable();
            $table->string('cta_url');
            $table->string('summery')->nullable();
            $table->string('bn_summery')->nullable();
            $table->text('description')->nullable();
            $table->text('bn_description')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_title')->nullable();
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
        Schema::dropIfExists('home_pages');
    }
};
