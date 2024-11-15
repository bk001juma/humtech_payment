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
        Schema::create('business_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained('business_products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('operator_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('initiator_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('unique_id')->unique();
            $table->string('operator_transaction_id')->nullable();
            $table->string('operator_conversation_id')->nullable();
            $table->string('customer_id')->unique();
            $table->enum('type',['credit','debit'])->default('debit');
            $table->string('sub_type')->nullable();
            $table->string('status')->default('pending');

            $table->string('phone_number')->nullable();
            $table->dateTime('transaction_date');

            $table->double('amount')->default(0);
            $table->double('charges')->default(0);

            $table->string('message');
            $table->string('note')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_transactions');
    }
};
