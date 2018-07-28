<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_type_id')->nullable();
            $table->string('iban', 32)->unique();
            $table->string('bic', 11)->nullable();
            $table->string('bank_name')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('account_type_id')
                ->references('id')
                ->on('account_types')
                ->onDelete('SET NULL');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
}
