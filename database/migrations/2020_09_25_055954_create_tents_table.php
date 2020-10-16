<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tents', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('cnic');
            $table->string('cnica')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('contact1')->nullable();
            $table->string('contact2')->nullable();
            $table->string('contact3')->nullable();

            $table->string('g1_fname');
            $table->string('g1_lname');
            $table->string('g1_cnic');
            $table->string('g1_cnica')->nullable();
            $table->string('g1_address');
            $table->string('g1_city');
            $table->string('g1_country');
            $table->string('g1_contact1')->nullable();
            $table->string('g1_contact2')->nullable();
            $table->string('g1_contact3')->nullable();

            $table->string('g2_fname')->nullable();
            $table->string('g2_lname')->nullable();
            $table->string('g2_cnic')->nullable();
            $table->string('g2_cnica')->nullable();
            $table->string('g2_address')->nullable();
            $table->string('g2_city')->nullable();
            $table->string('g2_country')->nullable();
            $table->string('g2_contact1')->nullable();
            $table->string('g2_contact2')->nullable();
            $table->string('g2_contact3')->nullable();

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
        Schema::dropIfExists('tents');
    }
}
