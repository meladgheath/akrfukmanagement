<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('overnights', function (Blueprint $table) {
            $table->id();
            $table->integer('emplyee_id');
            $table->string('name');
            $table->string('management');
            $table->date('from');
            $table->date('to');
            $table->string('hotel');
            $table->integer('days');
            $table->integer('value');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overnights');
    }
};
