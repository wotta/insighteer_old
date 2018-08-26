<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('balance_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('reference')->nullable();
            $table->integer('amount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('balance_id')
                ->references('id')
                ->on('balances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
