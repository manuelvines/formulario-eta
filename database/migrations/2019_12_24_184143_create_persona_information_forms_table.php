<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaInformationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_information_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('info_surnames')->nullable();
            $table->longText('info_email')->nullable();
            $table->longText('info_phone')->nullable();
            $table->longText('info_name')->nullable();
            $table->longText('info_birth_date')->nullable();
            $table->longText('info_country_of_birth')->nullable();
            $table->longText('info_place_of_birth')->nullable();
            $table->longText('info_gender')->nullable();
            $table->longText('info_marital_status')->nullable();
            $table->longText('info_country_of_nationality')->nullable();
            $table->longText('info_representative_surnames')->nullable();
            $table->longText('info_representative_name')->nullable();
            $table->longText('info_representative_address')->nullable();

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
        Schema::dropIfExists('persona_information_forms');
    }
}
