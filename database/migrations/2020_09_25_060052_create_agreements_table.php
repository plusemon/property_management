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
            $table->integer('property_id');
            $table->integer('tent_id');
            $table->integer('entry_id');
            $table->string('name');
            $table->integer('rent');
            $table->integer('incr');
            $table->string('period');
            $table->integer('security');
            $table->string('attachment');
            $table->integer('wallet')->default(0);
            $table->integer('status')->default(0);
            $table->dateTime('incr_at')->nullable();
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
