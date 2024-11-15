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
        Schema::create('business_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('api_key')->nullable();
            $table->string('logo')->nullable();
            $table->longText('token')->nullable();
            $table->double('balance')->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_products');
    }
};
