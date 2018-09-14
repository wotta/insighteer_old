<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBalanceColumnsOnAccountsTable extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('balances');

        Schema::enableForeignKeyConstraints();

        Schema::table('accounts', function (Blueprint $table) {
            $table->integer('amount')->default(0)->after('iban');
            $table->integer('previous_amount')->default(0)->after('amount');
        });
    }

    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn([
                'amount',
                'previous_amount'
            ]);
        });

        (app()->make(CreateBalancesTable::class))->up();
    }
}
