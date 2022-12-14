<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('argus_sessions', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('cookie_id');
            $table->string('key');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('argus_sessions');
    }
};