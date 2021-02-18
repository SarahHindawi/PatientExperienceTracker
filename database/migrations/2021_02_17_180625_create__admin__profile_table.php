<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ADMIN_PROFILE', function (Blueprint $table) {
            $table->string('Email')->primary();
            $table->string('Password');
            $table->string('FirstName');
            $table->string('LastName');
            $table->boolean('RootAdmin')->default(false);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ADMIN_PROFILE');
    }
}
