<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('destination_tickets', function (Blueprint $table) {
            $table->text('deskripsi_panjang')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('destination_tickets', function (Blueprint $table) {
            $table->dropColumn('deskripsi_panjang');
        });
    }
};