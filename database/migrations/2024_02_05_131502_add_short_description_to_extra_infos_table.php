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
            $table->longText('short_description')->nullable()->before('description');
            $table->longText('bn_short_description')->nullable()->after('short_description');
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
            $table->dropColumn('short_description');
            $table->dropColumn('bn_short_description');
        });
    }
};
