<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBalancesRelationToPaymentOnPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['balance_id']);
            $table->dropColumn('balance_id');

            $table->unsignedInteger('account_id')->nullable()->after('id');

            $table->foreign('account_id')
                ->references('id')
                ->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['account_id']);
            $table->dropColumn('account_id');

            $table->unsignedInteger('balance_id')->after('id');

            $table->foreign('balance_id')
                ->references('id')
                ->on('balances');
        });
    }
}
