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

        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('reservations_input_id');
//            ->constrained('reservation_inputs');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
