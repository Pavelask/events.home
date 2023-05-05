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
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('events_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->string('week')->nullable();
            $table->string('data')->nullable();
            $table->text('description')->nullable();
            $table->string('sort');
            $table->ctring('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule');
    }
};
