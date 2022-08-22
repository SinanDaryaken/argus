<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('argus_exceptions', function(Blueprint $table){
            $table->id();
            $table->string('exception');
            $table->text('message');
            $table->integer('code')->nullable();
            $table->string('file')->nullable();
            $table->integer('line')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('argus_exceptions');
    }
};