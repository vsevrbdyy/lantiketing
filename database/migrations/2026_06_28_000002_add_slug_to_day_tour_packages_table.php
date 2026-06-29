<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('day_tour_packages', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('title');
        });
    }

    public function down()
    {
        Schema::table('day_tour_packages', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
