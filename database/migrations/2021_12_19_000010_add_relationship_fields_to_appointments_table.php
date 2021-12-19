<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('masa_temu_janji_id');
            $table->foreign('masa_temu_janji_id', 'masa_temu_janji_fk_5623428')->references('id')->on('masa_temu_janjis');
            $table->unsignedBigInteger('bahagian_id');
            $table->foreign('bahagian_id', 'bahagian_fk_5623009')->references('id')->on('bahagians');
        });
    }
}
