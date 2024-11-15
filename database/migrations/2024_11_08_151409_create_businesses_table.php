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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tariff_percentage')->default(0);
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('tin');
            $table->string('category')->nullable();
            $table->string('logo')->nullable();
            $table->longText('token')->nullable();
            $table->double('balance')->default(0);
            $table->double('actual_balance')->default(0);
            $table->string('status')->default('inactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
