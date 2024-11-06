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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->double('current_balance')->default(0);
            $table->longText('api_key')->nullable();
            $table->longText('client_id')->nullable();
            $table->longText('client_secret')->nullable();
            $table->longText('public_key')->nullable();
            $table->string('status')->default('active');
            $table->string('prefix')->nullable();
            $table->string('currency')->default('TZS');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
