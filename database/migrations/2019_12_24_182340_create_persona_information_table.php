<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surnames');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('name');
            $table->date('birth_date');
            $table->unsignedBigInteger('country_of_birth');
            $table->string('place_of_birth');
            $table->boolean('gender');
            $table->string('marital_status');
            $table->unsignedBigInteger('country_of_nationality');
            $table->string('representative_surnames')->nullable();
            $table->string('representative_name')->nullable();
            $table->string('representative_address')->nullable();

            $table->foreign('country_of_birth')->references('id')
                ->on('countries');
            $table->foreign('country_of_nationality')->references('id')
                ->on('countries');

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
        Schema::dropIfExists('persona_information');
    }
}
