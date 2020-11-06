<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_returns', function (Blueprint $table) {
            $table->id();
            $table->integer('payment_id');
            $table->integer('accountant_id');
            $table->integer('entry_id');
            $table->string('type')->default('return');
            $table->integer('amount');
            $table->string('method');

            $table->string('bank')->nullable();
            $table->integer('account')->nullable();
            $table->string('branch')->nullable();
            $table->string('cheque')->nullable();
            $table->string('attachment')->nullable();

            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_returns');
    }
}
