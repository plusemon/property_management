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
            $table->integer('accountant_id');
            $table->integer('entry_id');
            $table->string('type')->default('payment');
            $table->string('state');
            $table->integer('year')->nullable();
            $table->json('month')->nullable();
            $table->string('method');
            $table->integer('amount');
            $table->string('tnxid')->nullable();
            $table->string('gst')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
