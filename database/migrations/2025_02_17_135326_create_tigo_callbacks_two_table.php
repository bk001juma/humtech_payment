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
        Schema::create('tigo_callbacks_two', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->string('description')->nullable();
            $table->string('reference_id')->nullable()->unique();
            $table->integer('amount')->default(0);
            $table->string('mfs_transaction_id')->nullable();
            $table->unsignedBigInteger('operator_id')->nullable()->default(3);
            $table->json('raw_response')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tigo_callbacks_two');
    }
};
