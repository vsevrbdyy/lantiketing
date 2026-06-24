<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('destination_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->text('description');
            $table->integer('price'); // dalam Rupiah
            $table->string('image')->nullable();
            $table->json('tags')->nullable(); // simpan array tag
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
};
