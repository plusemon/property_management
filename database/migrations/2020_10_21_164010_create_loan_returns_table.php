<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_returns', function (Blueprint $table) {
            $table->id();

            $table->integer('loan_id');
            $table->integer('accountant_id');
            $table->integer('entry_id');
            $table->string('loancounter');
            $table->string('type')->default('return');
            $table->integer('amount');
            $table->integer('remain');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_returns');
    }
}
