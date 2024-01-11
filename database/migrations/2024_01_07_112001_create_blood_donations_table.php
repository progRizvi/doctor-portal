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
        Schema::create('blood_donations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bn_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('gender',10);
            $table->string('blood_group',5);
            $table->unsignedBigInteger('area_id');
            $table->text('address');
            $table->date('last_donation_date')->nullable();
            $table->string('status',10)->default('pending');
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
        Schema::dropIfExists('blood_donations');
    }
};
