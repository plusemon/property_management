<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('property_id');
            $table->integer('tent_id');
            $table->string('duration');
            $table->boolean('status')->default(0);
            $table->string('name');
            $table->integer('advance');
            $table->integer('wallet')->default(0);
            $table->integer('yearly_percent');
            $table->string('attachment');
            $table->dateTime('incr_at');
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
        Schema::dropIfExists('agreements');
    }
}
