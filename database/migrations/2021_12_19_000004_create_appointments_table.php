<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('appointment_date');
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('phone_number');
            $table->string('alamat_1');
            $table->string('alamat_2')->nullable();
            $table->string('alamat_3')->nullable();
            $table->string('postcode')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
