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
            $table->string('cnica');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->json('contact');

            $table->string('g1_fname');
            $table->string('g1_lname');
            $table->string('g1_cnic');
            $table->string('g1_cnica');
            $table->string('g1_address');
            $table->string('g1_city');
            $table->string('g1_country');
            $table->json('g1_contact');

            $table->string('g2_fname');
            $table->string('g2_lname');
            $table->string('g2_cnic');
            $table->string('g2_cnica');
            $table->string('g2_address');
            $table->string('g2_city');
            $table->string('g2_country');
            $table->json('g2_contact');

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
