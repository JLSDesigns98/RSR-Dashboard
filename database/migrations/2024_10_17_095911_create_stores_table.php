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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('code')->nullable();
            $table->string('manager')->nullable();
            $table->integer('speedDial')->nullable();
            $table->integer('orderNumber')->nullable();
            $table->integer('orderValue')->nullable();
            $table->text('notes')->nullable();
            $table->integer('order');
            $table->boolean('status')->default(0);
            $table->string('colour')->nullable();
            $table->string('textColour')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};