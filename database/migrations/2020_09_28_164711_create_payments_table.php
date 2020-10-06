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
            $table->id();
            $table->integer('agreement_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('method');
            $table->string('amount');
            $table->string('gst')->nullable();
            $table->string('bank')->nullable();
            $table->string('account')->nullable();
            $table->string('branch')->nullable();
            $table->string('cheque')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
