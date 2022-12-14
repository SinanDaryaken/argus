<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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