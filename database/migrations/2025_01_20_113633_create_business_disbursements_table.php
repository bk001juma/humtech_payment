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
        Schema::create('business_disbursements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('business_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('operator_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('business_transaction_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('approve_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('channel');
            $table->string('company');
            $table->string('account_number');
            $table->double('amount');
            $table->string('status')->default('pending');
            $table->dateTime('request_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('approved_date')->nullable();
            $table->dateTime('rejected_date')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_disbursements');
    }
};
