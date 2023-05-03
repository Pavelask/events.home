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
        Schema::create('events_type', function (Blueprint $table) {
            $table->id();
            $table->string('events_id')->nullable();
            $table->foreign('events_id')
                ->references('id')
                ->on('events');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('sort')->default(500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_types');
    }
};
