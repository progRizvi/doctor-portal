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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("image")->nullable();
            $table->string("background_image")->nullable();
            $table->string("website")->nullable();
            $table->text("description")->nullable();
            $table->string("hospital")->nullable();
            $table->json("schedules");
            $table->string("address")->nullable();
            $table->integer("area_id")->nullable();
            $table->enum("type", ["hospital","clinic"])->default("hospital");
            $table->enum("status", ["active", "inactive"])->default("active");
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
        Schema::dropIfExists('hospitals');
    }
};
