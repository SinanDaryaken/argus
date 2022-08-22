<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('argus_visits', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('cookie_id')->index();
            $table->unsignedBigInteger('session_id')->index();
            $table->string('url')->index()->nullable();
            $table->string('ip');
            $table->tinyInteger('hour')->nullable();
            $table->tinyInteger('week')->nullable();
            $table->text('query_string')->nullable();
            $table->text('referer')->nullable();
            $table->text('utm')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('argus_visits');
    }
};