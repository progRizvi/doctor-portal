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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->string("gender");
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("image")->nullable();
            $table->string("background_image")->nullable();
            $table->text("bio")->nullable();
            $table->text("description")->nullable();
            $table->string("hospital")->nullable();
            $table->string("address")->nullable();
            $table->integer("area_id")->nullable();
            $table->text("treatments");
            $table->json("schedules");
            $table->enum("status", ["active", "inactive"])->default("active");
            $table->string("new_patient_fee")->nullable();
            $table->string("old_patient_fee")->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
