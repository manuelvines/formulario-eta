<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('persona_information_id');
            /*
             * Passport data
             */
            $table->unsignedBigInteger('country_id');
            $table->string('passport_id');
            $table->date('passport_expedition_date');
            $table->date('passport_expiration_date');
            $table->boolean('is_citizen_other_country')->default(0);
            $table->unsignedBigInteger('citizen_other_country')->nullable();
            $table->boolean('visa_request_before')->default(0);
            $table->string('identifier_uci')->nullable();
            /*
             * Home data
             */
            $table->string('street');
            $table->string('another_street')->nullable();
            $table->string('number');
            $table->string('apartment')->nullable();
            $table->string('town');
            $table->unsignedBigInteger('country_home');
            /*
             * Personal history data
             */
            $table->boolean('access_denied')->default(0);
            $table->longText('access_denied_comment')->nullable();
            $table->boolean('have_tuberculosis')->default(0);
            $table->longText('have_tuberculosis_comment')->nullable();
            $table->string('health_condition');
            $table->boolean('committed_crime')->default(0);


            /*
             *  data relations
             */
            $table->foreign('persona_information_id')->references('id')
                ->on('persona_information');

            $table->foreign('country_home')->references('id')
                ->on('countries');


            $table->foreign('country_id')->references('id')
                ->on('countries');


            $table->foreign('citizen_other_country')->references('id')
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
        Schema::dropIfExists('other_information');
    }
}
