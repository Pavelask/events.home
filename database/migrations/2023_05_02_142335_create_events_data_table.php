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
        Schema::create('events_data', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('events_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->string('banner')->nullable();
            $table->text('contacts')->nullable();
            $table->string('image')->nullable();
            $table->text('info')->nullable();
            $table->text('locate')->nullable();
            $table->text('adress')->nullable();
            $table->text('shema')->nullable();
            $table->string('map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_data');
    }
};
