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
        Schema::create('timetable', function (Blueprint $table) {
            $table->id();
            $table->foreignid('schedule_id')
                ->references('id')->on('schedule')
                ->onDelete('cascade');
            $table->string('time')->nullable();
            $table->string('place')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('sort');
            $table->string('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetable');
    }
};
