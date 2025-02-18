<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateW2aTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('w2a_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('txn_id', 20);
            $table->string('msisdn', 12);
            $table->decimal('amount', 15, 2);
            $table->string('company_name', 6);
            $table->string('customer_reference_id', 50)->unique();
            $table->string('sender_name', 50);
            $table->unsignedBigInteger('operator_id')->nullable()->default(3);
            $table->text('request_data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('w2a_transactions');
    }
};
