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
        Schema::table('doctors', function (Blueprint $table) {
            $table->string("bn_name")->nullable();
            $table->text("bn_bio")->nullable();
            $table->text("bn_description")->nullable();
            $table->string("bn_hospital")->nullable();
            $table->string("bn_address")->nullable();
            $table->text("bn_treatments")->nullable();
            $table->integer("serial");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn([
                'bn_name',
                'bn_bio',
                'bn_description',
                'bn_hospital',
                'bn_address',
                'bn_treatments',
                'serial',
            ]);

        });
    }
};
