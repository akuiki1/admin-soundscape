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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->foreignId('id_venue');
            $table->enum('status', ['segera', 'aktif', 'berlangsung', 'berakhir'])->default('segera');
            $table->dateTime('date');
            $table->text('description');
            $table->timestamps();
            $table->foreign('venue_id')->references('id_venue')->on('venues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['venue_id']);
        });

        Schema::dropIfExists('events');
    }
};
