<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkhidmatansTable extends Migration
{
    public function up()
    {
        Schema::create('perkhidmatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
