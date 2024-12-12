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
        Schema::create('tigo_callbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operator_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->longText('raw_response')->nullable();
            $table->string('request_id')->nullable();
            $table->longText('message')->nullable();
            $table->string('status_code')->nullable();
            $table->string('airtel_money_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tigo_callbacks');
    }
};
