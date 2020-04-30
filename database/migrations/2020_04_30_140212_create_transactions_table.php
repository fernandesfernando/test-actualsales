<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('hour');
            $table->integer('deal_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('accepted');
            $table->integer('refused');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('deal_id')->references('id')->on('deals');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
