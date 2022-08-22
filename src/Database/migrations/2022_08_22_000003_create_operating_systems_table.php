<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Blueprint;
use Illuminate\Supoort\Facedes\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('argus_operating_systems', function(Blueprint $table){
            $table->id();
            $table->string('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('argus_operating_systems');
    }
};