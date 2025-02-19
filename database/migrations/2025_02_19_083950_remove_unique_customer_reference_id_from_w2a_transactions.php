<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('w2a_transactions', function (Blueprint $table) {
            $table->dropUnique(['customer_reference_id']);
        });
    }

    public function down()
    {
        Schema::table('w2a_transactions', function (Blueprint $table) {
            $table->unique('customer_reference_id');
        });
    }
};
;
