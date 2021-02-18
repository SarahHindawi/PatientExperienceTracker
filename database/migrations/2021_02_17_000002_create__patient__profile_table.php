<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PATIENT_PROFILE', function (Blueprint $table) {
            $table->string('Email')->primary();
            $table->string('Password');
            $table->string('FirstName');
            $table->string('LastName');
            $table->date('DOB');
            $table->string('Gender');
            $table->integer('Weight');
            $table->integer('HeightFeet');
            $table->integer('HeightInches');
            $table->string('Condition');
            $table->boolean('PREMFlag')->default(true);
            $table->boolean('PROMFlag')->default(true);
            $table->boolean('NewAccount')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PATIENT_PROFILE');
    }
}
