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
        Schema::table('extra_infos', function (Blueprint $table) {
            $table->string('meta_title')->after('bn_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('extra_infos', function (Blueprint $table) {
            $table->string('meta_title')->after('bn_title')->nullable();
        });
    }
};
